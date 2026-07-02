<?php

declare(strict_types=1);

namespace Jtl\Connector\Dbc;

use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Exception\InvalidArgumentException;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\Types;
use Jtl\Connector\Dbc\Query\QueryBuilder;
use Jtl\Connector\Dbc\Schema\TableRestriction;

abstract class AbstractTable
{
    protected DbManager $dbManager;

    protected Table $tableSchema;

    /**
     * Table constructor.
     *
     * @param DbManager $dbManager
     *
     * @throws \Exception
     */
    public function __construct(DbManager $dbManager)
    {
        $this->dbManager = $dbManager;
        $dbManager->registerTable($this);
    }

    /**
     * @param array<string, mixed>                                                                          $data
     * @param array<int<0, max>|string, \Doctrine\DBAL\ParameterType|\Doctrine\DBAL\Types\Type|string>|null $types
     *
     * @return int|string
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws \RuntimeException
     */
    public function insert(array $data, ?array $types = null): int|string
    {
        if (\is_null($types)) {
            $types = $this->getColumnTypesFor(...\array_keys($data));
        }

        return $this->getConnection()->insert($this->getTableName(), $data, $types);
    }

    /**
     * @param string ...$columnNames
     *
     * @return array<string, string>
     * @throws DbcRuntimeException
     * @throws Exception
     */
    protected function getColumnTypesFor(string ...$columnNames): array
    {
        return \array_filter($this->getColumnTypes(), static function (string $columnName) use ($columnNames) {
            return \in_array($columnName, $columnNames, true);
        }, \ARRAY_FILTER_USE_KEY);
    }

    /**
     * @return array<string, string>
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws SchemaException
     */
    public function getColumnTypes(): array
    {
        $columnTypes = [];
        foreach ($this->getTableSchema()->getColumns() as $column) {
            $columnTypes[$column->getName()] = Type::getTypeRegistry()->lookupName($column->getType());
        }
        return $columnTypes;
    }

    /**
     * @return Table
     * @throws DbcRuntimeException
     * @throws Exception
     */
    public function getTableSchema(): Table
    {
        if (!isset($this->tableSchema)) {
            $this->tableSchema = $this->createSchemaTable();
            $this->preCreateTableSchema($this->tableSchema);
            $this->createTableSchema($this->tableSchema);
            $this->postCreateTableSchema($this->tableSchema);
            /** @var array<int, \Doctrine\DBAL\Schema\Column> $columns */
            $columns = $this->tableSchema->getColumns();
            if (\count($columns) === 0) {
                throw DbcRuntimeException::tableEmpty($this->tableSchema->getName());
            }
        }

        return $this->tableSchema;
    }

    /**
     * @return Table
     * @throws DbcRuntimeException
     * @throws Exception
     */
    protected function createSchemaTable(): Table
    {
        return new Table($this->getTableName());
    }

    /**
     * @return string
     * @throws DbcRuntimeException
     */
    public function getTableName(): string
    {
        return $this->dbManager->createTableName($this->getName());
    }

    /**
     * @return string
     */
    abstract protected function getName(): string;

    /**
     * @param Table $schemaTable
     *
     * @return void
     */
    protected function preCreateTableSchema(Table $schemaTable): void
    {
    }

    /**
     * @param Table $tableSchema
     *
     * @return void
     */
    abstract protected function createTableSchema(Table $tableSchema): void;

    /**
     * @param Table $schemaTable
     *
     * @return void
     */
    protected function postCreateTableSchema(Table $schemaTable): void
    {
    }

    /**
     * @return Connection
     */
    protected function getConnection(): Connection
    {
        return $this->getDbManager()->getConnection();
    }

    /**
     * @return DbManager
     */
    public function getDbManager(): DbManager
    {
        return $this->dbManager;
    }

    /**
     * @param array<string, mixed>                                                                          $data
     * @param array<string, mixed>                                                                          $identifiers
     * @param array<int<0, max>|string, \Doctrine\DBAL\ParameterType|\Doctrine\DBAL\Types\Type|string>|null $types
     *
     * @return int|string
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws \RuntimeException
     */
    public function update(array $data, array $identifiers, ?array $types = null): int|string
    {
        if (\is_null($types)) {
            $types =
                $this->getColumnTypesFor(...\array_unique(\array_merge(\array_keys($data), \array_keys($identifiers))));
        }

        return $this->getConnection()->update($this->getTableName(), $data, $identifiers, $types);
    }

    /**
     * @param array<string, mixed>                                                                          $identifiers
     * @param array<int<0, max>|string, \Doctrine\DBAL\ParameterType|\Doctrine\DBAL\Types\Type|string>|null $types
     *
     * @return int|string
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws \RuntimeException
     */
    public function delete(array $identifiers, ?array $types = null): int|string
    {
        if (\is_null($types)) {
            $types = $this->getColumnTypesFor(...\array_keys($identifiers));
        }

        return $this->getConnection()->delete($this->getTableName(), $identifiers, $types);
    }

    /**
     * @return string[]
     * @throws DbcRuntimeException
     * @throws Exception
     */
    public function getColumnNames(): array
    {
        return \array_keys($this->getColumnTypes());
    }

    /**
     * @param string $doctrineType
     * @param mixed  $phpValue
     *
     * @return mixed
     * @throws Exception
     */
    protected function convertToDatabaseValue(string $doctrineType, mixed $phpValue): mixed
    {
        return Type::getType($doctrineType)->convertToDatabaseValue(
            $phpValue,
            $this->getConnection()->getDatabasePlatform()
        );
    }

    /**
     * @param array<int, array<int|string, mixed>> $rows
     *
     * @return array<int, array<int|string, mixed>>
     * @throws DbcRuntimeException
     * @throws Exception
     */
    protected function convertAllToPhpValues(array $rows): array
    {
        $return = [];
        foreach ($rows as $row) {
            $return[] = $this->convertToPhpValues($row);
        }

        return $return;
    }

    /**
     * @param array<int|string, mixed> $row
     *
     * @return array<int|string, mixed>
     * @throws DbcRuntimeException
     * @throws Exception
     */
    protected function convertToPhpValues(array $row): array
    {
        $types          = $this->getColumnTypes();
        $numericIndices = \is_int(\key($row));

        if ($numericIndices && \count($row) < \count($types)) {
            throw DbcRuntimeException::numericIndicesMissing();
        }

        if ($numericIndices) {
            $types = \array_values($types);
        }

        $result = [];
        foreach ($row as $index => $value) {
            $result[$index] = $value;
            if (isset($types[$index]) && $types[$index] !== Types::BINARY && Type::hasType($types[$index])) {
                $result[$index] = Type::getType($types[$index])->convertToPHPValue(
                    $value,
                    $this->getConnection()->getDatabasePlatform()
                );

                //Dirty BIGINT to int cast
                if ($result[$index] !== null && $types[$index] === Types::BIGINT) {
                    /** @var int|float|string|bool $bigintValue */
                    $bigintValue    = $result[$index];
                    $result[$index] = (int)$bigintValue;
                }
            }
        }

        return $result;
    }

    /**
     * @param string|null $tableAlias
     *
     * @return QueryBuilder
     * @throws DbcRuntimeException
     */
    protected function createQueryBuilder(?string $tableAlias = null): QueryBuilder
    {
        return new QueryBuilder(
            $this->getConnection(),
            $this->getConnection()->getTableRestrictions(),
            $this->getTableName(),
            $tableAlias
        );
    }

    /**
     * @param string $column
     * @param mixed  $value
     *
     * @return $this
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws SchemaException
     */
    protected function restrict(string $column, mixed $value): self
    {
        $this->getConnection()->restrictTable(new TableRestriction($this->getTableSchema(), $column, $value));

        return $this;
    }
}
