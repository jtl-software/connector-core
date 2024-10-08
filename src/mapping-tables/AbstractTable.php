<?php

declare(strict_types=1);

namespace Jtl\Connector\MappingTables;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Result;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\Types;
use Jtl\Connector\Dbc\AbstractTable as AbstractDbcTable;
use Jtl\Connector\Dbc\DbManager;
use Jtl\Connector\Dbc\Query\QueryBuilder;
use Jtl\Connector\Dbc\DbcRuntimeException;
use Jtl\Connector\MappingTables\Schema\EndpointColumn;

abstract class AbstractTable extends AbstractDbcTable implements TableInterface
{
    public const
        ENDPOINT_INDEX_NAME             = 'endpoint_idx',
        HOST_INDEX_NAME                 = 'host_idx',
        HOST_ID                         = 'host_id',
        IDENTITY_TYPE                   = 'identity_type';
    protected string $endpointDelimiter = '||';
    protected bool   $singleIdentity    = true;

    /** @var EndpointColumn[] */
    private array $endpointColumns = [];

    /**
     * @param DbManager $dbManager
     * @param bool      $isSingleIdentity
     *
     * @throws MappingTablesException
     * @throws \Exception
     */
    public function __construct(DbManager $dbManager, bool $isSingleIdentity = true)
    {
        if (\count($this->getTypes()) === 0) {
            throw MappingTablesException::typesEmpty();
        }

        foreach ($this->getTypes() as $type) {
            if (!\is_int($type)) {
                throw MappingTablesException::typeNotInteger();
            }
        }

        $this->singleIdentity = $isSingleIdentity;
        parent::__construct($dbManager);
        $this->defineEndpoint();

        if (!$this->singleIdentity && !$this->hasEndpointColumn(self::IDENTITY_TYPE)) {
            $this->setEndpointColumn(self::IDENTITY_TYPE, Types::INTEGER);
        }
    }

    /**
     * @return void
     */
    abstract protected function defineEndpoint(): void;

    /**
     * @param string $name
     *
     * @return bool
     */
    protected function hasEndpointColumn(string $name): bool
    {
        return isset($this->endpointColumns[$name]);
    }

    /**
     * @param string $columnName
     * @param string $columnType
     * @param bool   $primary
     *
     * @return Column
     * @throws Exception
     * @throws MappingTablesException
     */
    protected function setEndpointColumn(string $columnName, string $columnType, bool $primary = true): Column
    {
        $column = new Column($columnName, Type::getType($columnType));
        if ($this->hasEndpointColumn($columnName)) {
            throw MappingTablesException::endpointColumnExists($columnName);
        }

        $this->endpointColumns[$column->getName()] = EndpointColumn::create($column, $primary);

        return $column;
    }

    /**
     * @param string $endpoint
     *
     * @return int|null
     * @throws DBALException
     * @throws MappingTablesException
     * @throws \RuntimeException
     * @throws \Doctrine\DBAL\Driver\Exception
     */
    public function getHostId(string $endpoint): ?int
    {
        $qb = $this->createQueryBuilder()
                   ->select(self::HOST_ID)
                   ->from($this->getTableName());

        $primaryColumnNames = $this->getEndpointColumnNames(true);

        foreach ($this->extractEndpoint($endpoint) as $column => $value) {
            if (\in_array($column, $primaryColumnNames, true)) {
                $qb->andWhere($column . ' = :' . $column)
                   ->setParameter($column, $value, $this->endpointColumns[$column]->getColumn()->getType()->getName());
            }
        }

        $hostId = $qb->execute();
        if (($hostId instanceof Result) && \is_numeric(($id = $hostId->fetchOne()))) {
            return (int)$id;
        }

        return null;
    }

    /**
     * @param bool $onlyPrimaryColumns
     *
     * @return array<string>
     */
    protected function getEndpointColumnNames(bool $onlyPrimaryColumns = false): array
    {
        return \array_map(static function (Column $column) {
            return $column->getName();
        }, $this->getEndpointColumns($onlyPrimaryColumns));
    }

    /**
     * @param bool $onlyPrimaryColumns
     *
     * @return array<Column>
     */
    protected function getEndpointColumns(bool $onlyPrimaryColumns = false): array
    {
        $endpointColumns =
            \array_filter(
                $this->endpointColumns,
                static function (EndpointColumn $endpointColumn) use ($onlyPrimaryColumns) {
                    return \in_array($endpointColumn->primary(), [true, $onlyPrimaryColumns], true);
                }
            );

        return \array_values(\array_map(static function (EndpointColumn $endpointColumn) {
            return $endpointColumn->getColumn();
        }, $endpointColumns));
    }

    /**
     * @param string $endpointId
     *
     * @return mixed[]
     * @throws DBALException|MappingTablesException
     * @throws DbcRuntimeException
     * @throws \RuntimeException
     */
    public function extractEndpoint(string $endpointId): array
    {
        $data = $this->createEndpointData($this->explodeEndpoint($endpointId));
        if (!$this->singleIdentity) {
            $type = $data[self::IDENTITY_TYPE];
            if (!(\is_int($type) || \is_null($type))) {
                throw new MappingTablesException('$type must be integer or null.');
            }
            if (!$this->isResponsible($type)) {
                throw MappingTablesException::tableNotResponsibleForType($type);
            }
        }

        return $data;
    }

    /**
     * @param mixed[] $data
     *
     * @return mixed[]
     * @throws DBALException
     * @throws MappingTablesException
     * @throws DbcRuntimeException
     * @throws \RuntimeException
     */
    protected function createEndpointData(array $data): array
    {
        $dataCount    = \count($data);
        $columnNames  = $this->getEndpointColumnNames();
        $columnsCount = \count($columnNames);

        if ($dataCount !== $columnsCount) {
            throw MappingTablesException::wrongEndpointPartsAmount($dataCount, $columnsCount);
        }

        //@phpstan-ignore-next-line
        return $this->convertToPhpValues(\array_combine($columnNames, $data));
    }

    /**
     * @param string $endpointId
     *
     * @return string[]
     * @throws MappingTablesException
     */
    protected function explodeEndpoint(string $endpointId): array
    {
        if (empty($endpointId)) {
            throw MappingTablesException::emptyEndpointId($this);
        }

        if (empty($this->endpointDelimiter)) {
            throw new MappingTablesException('endpointDelimiter must not be empty.');
        }

        return \explode($this->endpointDelimiter, $endpointId);
    }

    /**
     * @param int|null $type
     *
     * @return bool
     */
    public function isResponsible(?int $type): bool
    {
        return $this->singleIdentity || \in_array($type, $this->getTypes(), true);
    }

    /**
     * @param int      $hostId
     * @param int|null $type
     *
     * @return string|null
     * @throws Exception
     * @throws MappingTablesException
     * @throws DbcRuntimeException
     * @throws \RuntimeException
     */
    public function getEndpoint(int $hostId, ?int $type = null): ?string
    {
        $endpointData = $this->createEndpointIdQuery($hostId, $type)->execute();
        if (!($endpointData instanceof Result)) {
            throw new \RuntimeException('$endpoint data must be an Result - object.');
        }
        $endpointData = $endpointData->fetch();

        if (\is_array($endpointData)) {
            return $this->buildEndpoint($endpointData);
        }

        return null;
    }

    /**
     * @param int      $hostId
     * @param int|null $type
     *
     * @return QueryBuilder
     * @throws Exception
     * @throws MappingTablesException
     * @throws DbcRuntimeException
     * @throws \RuntimeException
     * @throws \RuntimeException
     */
    protected function createEndpointIdQuery(int $hostId, ?int $type = null): QueryBuilder
    {
        if (!$this->isResponsible($type)) {
            throw MappingTablesException::tableNotResponsibleForType($type);
        }

        $columnExpressions = $this->getEndpointColumnExpressions();

        $qb = $this->createQueryBuilder()
                   ->select($columnExpressions)
                   ->from($this->getTableName())
                   ->andWhere(\sprintf('%s = :hostId', self::HOST_ID))
                   ->setParameter('hostId', $hostId);

        if (!$this->singleIdentity) {
            $qb->andWhere(\sprintf('%s = :identityType', self::IDENTITY_TYPE))
               ->setParameter('identityType', $type);
        }

        return $qb;
    }

    /**
     * @param bool $onlyPrimaryColumns
     *
     * @return array<string>
     * @throws Exception
     */
    protected function getEndpointColumnExpressions(bool $onlyPrimaryColumns = false): array
    {
        return \array_map(function (Column $column) {
            return $column->getType()->convertToPHPValueSQL(
                $column->getName(),
                $this->getConnection()->getDatabasePlatform()
            );
        }, $this->getEndpointColumns($onlyPrimaryColumns));
    }

    /**
     * @param array<string, mixed>|array<string> $data
     *
     * @return string
     */
    public function buildEndpoint(array $data): string
    {
        $columnNames = $this->getEndpointColumnNames();

        $allColumnNamesExist = true;
        foreach ($data as $columnName => $value) {
            if (!\in_array($columnName, $columnNames, true)) {
                $allColumnNamesExist = false;
                break;
            }
        }

        if ($allColumnNamesExist) {
            $tData = $data;
            $data  = [];
            foreach ($tData as $columnName => $value) {
                $data[\array_search($columnName, $columnNames)] = $value;
            }

            \ksort($data, \SORT_NUMERIC);
        }

        return $this->implodeEndpoint($data);
    }

    /**
     * @param mixed[] $data
     *
     * @return string
     */
    protected function implodeEndpoint(array $data): string
    {
        return \implode($this->endpointDelimiter, $data);
    }

    /**
     * @param string $endpoint
     * @param int    $hostId
     *
     * @return int
     * @throws DBALException
     * @throws MappingTablesException
     * @throws DbcRuntimeException
     * @throws \RuntimeException
     * @throws \RuntimeException
     */
    public function save(string $endpoint, int $hostId): int
    {
        $data                = $this->extractEndpoint($endpoint);
        $data[self::HOST_ID] = $hostId;

        try {
            return $this->insert($data);
        } catch (UniqueConstraintViolationException $ex) {
            $primaryColumnNames = $this->getEndpointColumnNames(true);

            $identifier = [];
            foreach ($data as $column => $value) {
                if (\in_array($column, $primaryColumnNames, true)) {
                    $identifier[$column] = $value;
                }
            }

            return $this->update($data, $identifier);
        }
    }

    /**
     * @param string|null $endpoint
     * @param int|null    $hostId
     * @param int|null    $type
     *
     * @return int
     * @throws DBALException
     * @throws Exception
     * @throws MappingTablesException
     * @throws DbcRuntimeException
     * @throws \RuntimeException
     */
    public function remove(?string $endpoint = null, ?int $hostId = null, ?int $type = null): int
    {
        $qb = $this->createQueryBuilder()
                   ->delete($this->getTableName());

        $primaryColumns     = $this->getEndpointColumns(true);
        $primaryColumnNames = $this->getEndpointColumnNames(true);
        $useHostId          = !\in_array($hostId, [null, 0], true);

        if ($useHostId) {
            $qb->andWhere(self::HOST_ID . ' = :' . self::HOST_ID)
               ->setParameter(self::HOST_ID, $hostId, Types::INTEGER);
        } else {
            if ($endpoint !== null) {
                foreach ($this->extractEndpoint($endpoint) as $column => $value) {
                    if (\in_array($column, $primaryColumnNames)) {
                        $qb
                            ->andWhere($column . ' = :' . $column)
                            ->setParameter(
                                $column,
                                $value,
                                $primaryColumns[\array_search($column, $primaryColumnNames)]->getType()->getName()
                            );
                    }
                }
            }
        }

        if (!$this->singleIdentity && ($useHostId || ($endpoint === null && $hostId === null))) {
            if (!$this->isResponsible($type)) {
                throw MappingTablesException::tableNotResponsibleForType($type);
            }

            $qb->andWhere(\sprintf('%s = :%s', self::IDENTITY_TYPE, self::IDENTITY_TYPE))
               ->setParameter(self::IDENTITY_TYPE, $type, Types::INTEGER);
        }

        return $this->returnInt($qb->execute(), __FUNCTION__);
    }

    /**
     * @param mixed  $value
     * @param string $methodName
     *
     * @return int
     * @throws \RuntimeException
     */
    private function returnInt(mixed $value, string $methodName): int
    {
        if (!\is_int($value)) {
            throw new \RuntimeException(
                \sprintf('%s must return an integer.', $methodName)
            );
        }

        return $value;
    }

    /**
     * @param int|null $type
     *
     * @return int
     * @throws Exception
     * @throws MappingTablesException
     * @throws DbcRuntimeException
     * @throws \RuntimeException
     */
    public function clear(?int $type = null): int
    {
        $qb = $this->createQueryBuilder()
                   ->delete($this->getTableName());

        if (!\is_null($type)) {
            if (!$this->isResponsible($type)) {
                throw MappingTablesException::tableNotResponsibleForType($type);
            }

            if (!$this->singleIdentity) {
                $qb->andWhere(\sprintf('%s = :%s', self::IDENTITY_TYPE, self::IDENTITY_TYPE))
                   ->setParameter(self::IDENTITY_TYPE, $type);
            }
        }

        return $this->returnInt($qb->execute(), __FUNCTION__);
    }

    /**
     * @param string[] $where
     * @param mixed[]  $parameters
     * @param string[] $orderBy
     * @param int|null $limit
     * @param int|null $offset
     * @param int|null $type
     *
     * @return int
     * @throws DBALException|MappingTablesException|\RuntimeException
     * @throws \Doctrine\DBAL\Driver\Exception
     */
    public function count(
        array $where = [],
        array $parameters = [],
        array $orderBy = [],
        ?int  $limit = null,
        ?int  $offset = null,
        ?int  $type = null
    ): int {
        if (
            !($dbPlatform = $this->getDbManager()->getConnection()->getDatabasePlatform()) instanceof AbstractPlatform
        ) {
            throw new \RuntimeException('$dbPlatform must instance of AbstractPlatform.');
        }

        $result = $this->createFindQuery($where, $parameters, $orderBy, $limit, $offset, $type)
                       ->select($dbPlatform->getCountExpression('*'))
                       ->execute();
        if ($result instanceof Result === false) {
            throw new \RuntimeException('$result must be instance of Result.');
        }
        $result = $result->fetchOne();

        return \is_numeric($result) ? (int)$result : 0;
    }

    /**
     * @param string[]                 $where
     * @param array<int|string, mixed> $parameters
     * @param array<string, string>    $orderBy
     * @param int|null                 $limit
     * @param int|null                 $offset
     * @param int|null                 $type
     *
     * @return QueryBuilder
     * @throws DBALException
     * @throws MappingTablesException
     * @throws DbcRuntimeException
     * @throws \RuntimeException
     * @throws \RuntimeException
     */
    public function createFindQuery(
        array $where = [],
        array $parameters = [],
        array $orderBy = [],
        ?int  $limit = null,
        ?int  $offset = null,
        ?int  $type = null
    ): QueryBuilder {
        $qb = $this->createQueryBuilder();

        if (!\is_null($type)) {
            if (!$this->isResponsible($type)) {
                throw MappingTablesException::tableNotResponsibleForType($type);
            }

            if (!$this->singleIdentity) {
                $qb->andWhere(\sprintf('%s = :%s', self::IDENTITY_TYPE, self::IDENTITY_TYPE))
                   ->setParameter(self::IDENTITY_TYPE, $type);
            }
        }

        foreach ($where as $condition) {
            $qb->andWhere($condition);
        }

        foreach ($parameters as $param => $value) {
            $qb->setParameter($param, $value);
        }

        if (\is_int($limit)) {
            $qb->setMaxResults($limit);
        }

        if (\is_int($offset)) {
            $qb->setFirstResult($offset);
        }

        $allColumns = $this->getColumnNames();
        foreach ($orderBy as $column => $direction) {
            if (!\in_array($column, $allColumns)) {
                throw MappingTablesException::endpointColumnNotFound($column);
            }

            $qb->addOrderBy($column, $direction);
        }

        return $qb;
    }

    /**
     * @param string[] $where
     * @param mixed[]  $parameters
     * @param string[] $orderBy
     * @param int|null $limit
     * @param int|null $offset
     * @param int|null $type
     *
     * @return string[]
     * @throws DBALException
     * @throws Exception
     * @throws MappingTablesException
     * @throws \RuntimeException
     */
    public function findEndpoints(
        array $where = [],
        array $parameters = [],
        array $orderBy = [],
        ?int  $limit = null,
        ?int  $offset = null,
        ?int  $type = null
    ): array {
        $stmt = $this->createFindQuery($where, $parameters, $orderBy, $limit, $offset, $type)
                     ->select($this->getEndpointColumnExpressions())
                     ->execute();

        if ($stmt instanceof Result === false) {
            throw new \RuntimeException('$stmt must be instance of Result.');
        }

        //@phpstan-ignore-next-line
        return \array_map(function (array $data): string {
            return $this->buildEndpoint($data);
        }, $stmt->fetchAll());
    }

    /**
     * @param string[] $endpoints
     *
     * @return array|string[]
     * @throws DBALException
     * @throws Exception
     * @throws MappingTablesException
     * @throws DbcRuntimeException
     * @throws \RuntimeException
     */
    public function filterMappedEndpoints(array $endpoints): array
    {
        $platform                 = $this->getConnection()->getDatabasePlatform();
        $primaryColumnExpressions = $this->getEndpointColumnExpressions(true);
        $primaryColumnNames       = $this->getEndpointColumnNames(true);

        $concatArray = [];
        foreach ($primaryColumnExpressions as $i => $columnExpression) {
            $concatArray[] = $columnExpression;
            if (isset($primaryColumnExpressions[$i + 1])) {
                $concatArray[] = $this->getConnection()->quote($this->endpointDelimiter);
            }
        }

        $preparedEndpoints = [];
        foreach ($endpoints as $endpoint) {
            $extracted = \array_filter(
                $this->extractEndpoint($endpoint),
                static function ($key) use ($primaryColumnNames) {
                    return \in_array($key, $primaryColumnNames);
                },
                \ARRAY_FILTER_USE_KEY
            );

            $preparedEndpoints[\implode($this->endpointDelimiter, $extracted)] = $endpoint;
        }

        $concatExpression = $platform->getConcatExpression(...$concatArray);
        $qb               = $this->createQueryBuilder()
                                 ->select($concatExpression)
                                 ->from($this->getTableName())
                                 ->where(
                                     $this->getConnection()->getExpressionBuilder()->in(
                                         $concatExpression,
                                         ':preparedEndpoints'
                                     )
                                 )
                                 ->setParameter(
                                     'preparedEndpoints',
                                     \array_keys($preparedEndpoints),
                                     Connection::PARAM_STR_ARRAY
                                 );

        $fetchedEndpoints = $qb->execute();
        if ($fetchedEndpoints instanceof Result === false) {
            throw new \RuntimeException('$fetchedEndpoints must be instance of Result.');
        }
        $fetchedEndpoints = $fetchedEndpoints->fetchAll(\PDO::FETCH_COLUMN);
        if (\is_array($fetchedEndpoints) && !empty($fetchedEndpoints)) {
            foreach ($preparedEndpoints as $prepared => $endpoint) {
                if (\in_array($prepared, $fetchedEndpoints)) {
                    unset($preparedEndpoints[$prepared]);
                }
            }

            return \array_values($preparedEndpoints);
        }

        return $endpoints;
    }

    /**
     * @return string
     */
    public function getEndpointDelimiter(): string
    {
        return $this->endpointDelimiter;
    }

    /**
     * @param string $endpointDelimiter
     *
     * @return $this
     */
    public function setEndpointDelimiter(string $endpointDelimiter): self
    {
        $this->endpointDelimiter = $endpointDelimiter;

        return $this;
    }

    /**
     * @param string $field
     * @param string $endpoint
     *
     * @return mixed|null
     * @throws DBALException
     * @throws MappingTablesException
     * @throws DbcRuntimeException
     * @throws \RuntimeException
     */
    public function extractValueFromEndpoint(string $field, string $endpoint): mixed
    {
        if (empty($endpoint)) {
            return null;
        }
        $extracted = $this->extractEndpoint($endpoint);

        return $extracted[$field] ?? null;
    }

    /**
     * @param int|null $type
     *
     * @return TableProxy
     * @throws MappingTablesException
     */
    public function createProxy(?int $type = null): TableProxy
    {
        if (\is_null($type)) {
            $types    = $this->getTypes();
            $typeTemp = \reset($types);
            if (!\is_int($typeTemp)) {
                throw new MappingTablesException('type must be an integer.');
            }
            $type = $typeTemp;
        }

        return new TableProxy($type, $this);
    }

    /**
     * @return bool
     */
    public function isSingleIdentity(): bool
    {
        return $this->singleIdentity;
    }

    /**
     * @return Table
     * @throws Exception
     * @throws DbcRuntimeException
     * @throws \RuntimeException
     */
    protected function createSchemaTable(): Table
    {
        return new Table($this->getTableName(), $this->getEndpointColumns());
    }

    /**
     * @param Table $tableSchema
     *
     * @return void
     * @throws Exception
     * @throws MappingTablesException
     * @throws DbcRuntimeException
     * @throws SchemaException
     * @throws \RuntimeException
     * @throws \RuntimeException
     */
    protected function createTableSchema(Table $tableSchema): void
    {
        $endpointColumnNames = $this->getEndpointColumnNames();
        $primaryColumnNames  = $this->getEndpointColumnNames(true);
        if (\count($endpointColumnNames) === 0) {
            throw MappingTablesException::endpointColumnsNotDefined();
        }

        $tableSchema->addColumn(self::HOST_ID, Types::INTEGER)
                    ->setNotnull(false);

        $tableSchema->addIndex([self::HOST_ID], $this->createIndexName(self::HOST_INDEX_NAME));

        $tableSchema->setPrimaryKey($primaryColumnNames);
        if (\count($primaryColumnNames) < \count($endpointColumnNames)) {
            $tableSchema->addIndex($endpointColumnNames, $this->createIndexName(self::ENDPOINT_INDEX_NAME));
        }
    }

    /**
     * @param string $name
     *
     * @return string
     * @throws DbcRuntimeException
     * @throws \RuntimeException
     */
    public function createIndexName(string $name): string
    {
        return \sprintf('%s_%s', $this->getTableName(), $name);
    }
}
