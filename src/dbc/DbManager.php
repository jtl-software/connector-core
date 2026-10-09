<?php

declare(strict_types=1);

namespace Jtl\Connector\Dbc;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Schema\Comparator;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\DBAL\Schema\Table;
use RuntimeException;

class DbManager
{
    protected Connection $connection;

    /** @var AbstractTable[] */
    protected array   $tables = [];
    protected ?string $tablesPrefix;

    /**
     * DbManager constructor.
     *
     * @param Connection  $connection
     * @param string|null $tablesPrefix
     */
    public function __construct(Connection $connection, ?string $tablesPrefix = null)
    {
        $this->connection   = $connection;
        $this->tablesPrefix = $tablesPrefix;
    }

    /**
     * @return Connection
     */
    public function getConnection(): Connection
    {
        return $this->connection;
    }

    /**
     * @param array<string, mixed> $params
     * @param Configuration|null   $config
     * @param string|null          $tablesPrefix
     *
     * @return self
     * @throws Exception
     */
    public static function createFromParams(
        array         $params,
        ?Configuration $config = null,
        ?string        $tablesPrefix = null
    ): self {
        $params['wrapperClass'] = Connection::class;
        /** @var array{wrapperClass: class-string<Connection>, driver?: 'ibm_db2'|'mysqli'|'oci8'|'pdo_mysql'|'pdo_oci'|'pdo_pgsql'|'pdo_sqlite'|'pdo_sqlsrv'|'pgsql'|'sqlite3'|'sqlsrv', path?: string, url?: string} $params */
        $connection = DriverManager::getConnection($params, $config);

        return new self($connection, $tablesPrefix);
    }

    /**
     * @param AbstractTable $table
     *
     * @return $this
     * @throws DbcRuntimeException
     */
    public function registerTable(AbstractTable $table): self
    {
        $this->tables[$table->getTableName()] = $table;

        return $this;
    }

    /**
     * @return string[]
     * @throws DbcRuntimeException
     * @throws Exception
     */
    public function getSchema(): array
    {
        $schema   = new Schema($this->getSchemaTables());
        $platform = $this->connection->getDatabasePlatform();

        return $platform->getAlterSchemaSQL(
            (new Comparator($platform))->compareSchemas(new Schema(), $schema)
        );
    }

    /**
     * @return Table[]
     * @throws DbcRuntimeException
     * @throws Exception
     */
    public function getSchemaTables(): array
    {
        return \array_map(static function (AbstractTable $table) {
            return $table->getTableSchema();
        }, $this->getTables());
    }

    /**
     * @return AbstractTable[]
     */
    public function getTables(): array
    {
        return \array_values($this->tables);
    }

    /**
     * @return bool
     * @throws DbcRuntimeException
     * @throws DbcRuntimeException|\RuntimeException
     * @throws Exception
     */
    public function hasSchemaUpdates(): bool
    {
        return \count($this->getSchemaUpdates()) > 0;
    }

    /**
     * @return string[]
     * @throws DbcRuntimeException
     * @throws DbcRuntimeException|RuntimeException
     * @throws Exception
     * @throws SchemaException
     */
    public function getSchemaUpdates(): array
    {
        $configuration              = $this->connection->getConfiguration();
        $schemaManager              = $this->connection->createSchemaManager();
        $originalSchemaAssetsFilter = $configuration->getSchemaAssetsFilter();
        $configuration->setSchemaAssetsFilter($this->createSchemaAssetsFilterCallback());
        $fromSchema = $schemaManager->introspectSchema();
        $toSchema   = new Schema($this->getSchemaTables());
        $this->normalizeIntrospectedSchema($fromSchema, $toSchema);
        $comparator       = $schemaManager->createComparator();
        $schemaDiff       = $comparator->compareSchemas($fromSchema, $toSchema);
        $platform         = $this->connection->getDatabasePlatform();
        $updateStatements = $platform->getAlterSchemaSQL($schemaDiff);
        $configuration->setSchemaAssetsFilter($originalSchemaAssetsFilter);
        return $updateStatements;
    }

    /**
     * Normalizes the introspected schema to account for platform-specific round-trip
     * inconsistencies (e.g. SQLite not distinguishing DateTime from DateTimeImmutable,
     * or returning float defaults as strings).
     *
     * @param Schema $introspectedSchema
     * @param Schema $targetSchema
     *
     * @return void
     */
    protected function normalizeIntrospectedSchema(Schema $introspectedSchema, Schema $targetSchema): void
    {
        foreach ($targetSchema->getTables() as $targetTable) {
            $tableName = $targetTable->getName();
            if (!$introspectedSchema->hasTable($tableName)) {
                continue;
            }

            $introspectedTable = $introspectedSchema->getTable($tableName);

            foreach ($targetTable->getColumns() as $targetColumn) {
                $columnName = $targetColumn->getName();
                if (!$introspectedTable->hasColumn($columnName)) {
                    continue;
                }

                $introspectedColumn = $introspectedTable->getColumn($columnName);
                $targetType         = $targetColumn->getType();
                $introspectedType   = $introspectedColumn->getType();

                if ($targetType::class !== $introspectedType::class) {
                    $introspectedColumn->setType($targetType);
                }

                $targetDefault       = $targetColumn->getDefault();
                $introspectedDefault = $introspectedColumn->getDefault();
                if ($targetDefault !== $introspectedDefault) {
                    if (\is_numeric($targetDefault) && \is_numeric($introspectedDefault)) {
                        if ((float)$targetDefault === (float)$introspectedDefault) {
                            $introspectedColumn->setDefault($targetDefault);
                        }
                    }
                }
            }
        }
    }

    /**
     * @return callable
     */
    public function createSchemaAssetsFilterCallback(): callable
    {
        return function (string $tableName) {
            $tableNames = \array_map(static function (AbstractTable $table) {
                return $table->getTableName();
            }, $this->getTables());

            return \in_array($tableName, $tableNames, true);
        };
    }

    /**
     * @return void
     * @throws \Throwable
     */
    public function updateDatabaseSchema(): void
    {
        // No transaction wrapper: schema updates are DDL, which implicitly COMMITs on
        // MySQL/MariaDB (and can't be rolled back there anyway). Wrapping it in a
        // transaction makes the surrounding commit fail with "There is no active transaction".
        foreach ($this->getSchemaUpdates() as $ddl) {
            $this->connection->executeStatement($ddl);
        }
    }

    /**
     * @return bool
     */
    public function hasTablesPrefix(): bool
    {
        return \is_string($this->tablesPrefix) && $this->tablesPrefix !== '';
    }

    /**
     * @return string|null
     */
    public function getTablesPrefix(): ?string
    {
        return $this->tablesPrefix;
    }

    /**
     * @param string $shortName
     *
     * @return string
     * @throws DbcRuntimeException
     */
    public function createTableName(string $shortName): string
    {
        if ($shortName === '') {
            throw DbcRuntimeException::tableNameEmpty();
        }
        return \sprintf('%s%s', (string)$this->tablesPrefix, $shortName);
    }
}
