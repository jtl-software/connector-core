<?php

declare(strict_types=1);

namespace Jtl\Connector\Dbc;

use Doctrine\DBAL\Exception as DBALException;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\DBAL\Result;
use RuntimeException;
use Throwable;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    public const string TABLE_PREFIX = 'pre_';
    public const string SCHEMA       = \TESTROOT . '/tmp/db.sqlite';
    protected TableStub|\Jtl\Connector\MappingTables\TableStub $table;
    private DbManager                                          $dbManager;

    /**
     * @return array<int, array<string, int|string|\DateTimeImmutable>>
     */
    public static function getTableStubFixtures(): array
    {
        return [
            ['id' => 1, 'a' => 1, 'b' => 'a string', 'c' => new \DateTimeImmutable('2017-03-29 00:00:00')],
            ['id' => 3, 'a' => 4, 'b' => 'b string', 'c' => new \DateTimeImmutable('2015-03-25 13:12:25')],
        ];
    }

    /**
     * @return array<int, array<string, int|float>>
     */
    public static function getCoordinatesFixtures(): array
    {
        return [
            ["x" => 1, "y" => 2, "z" => 3],
            ["x" => 1, "y" => 4, "z" => 5.],
            ["x" => 3, "y" => 1, "z" => 2],
            ["x" => 2, "y" => 3, "z" => 1],
        ];
    }

    /**
     * @return void
     * @throws DBALException
     * @throws Throwable
     */
    protected function setUp(): void
    {
        parent::setUp();
        if ($this->getDBManager()->hasSchemaUpdates()) {
            $this->getDBManager()->updateDatabaseSchema();
        }
    }

    /**
     * @return DbManager
     * @throws DBALException
     * @throws RuntimeException
     */
    protected function getDBManager(): DbManager
    {
        if (!isset($this->dbManager)) {
            if (
                !\is_dir(\dirname(self::SCHEMA))
                && !\mkdir($concurrentDirectory = \dirname(self::SCHEMA))
                && !\is_dir($concurrentDirectory)
            ) {
                throw new RuntimeException(\sprintf('Directory "%s" was not created', $concurrentDirectory));
            }

            if (\file_exists(self::SCHEMA)) {
                \unlink(self::SCHEMA);
            }

            /** @var DbManagerStub $dbManagerStub */
            $dbManagerStub   = DbManagerStub::createFromParams(
                ['driver' => 'pdo_sqlite', 'path' => self::SCHEMA],
                null,
                self::TABLE_PREFIX
            );
            $this->dbManager = $dbManagerStub;
        }

        return $this->dbManager;
    }

    /**
     * @param string                $tableName
     * @param array<string, scalar> $conditions
     *
     * @return int
     * @throws DBALException
     * @throws RuntimeException
     */
    protected function countRows(string $tableName, array $conditions = []): int
    {
        $connection = $this->getDbManager()->getConnection();

        $qb = (new QueryBuilder($connection))
            ->select(\sprintf('COUNT(%s)', '*'))
            ->from($tableName);

        foreach ($conditions as $column => $value) {
            $qb
                ->andWhere(\sprintf('%s = :%s', $column, $column))
                ->setParameter($column, $value);
        }

        $result = $qb->executeQuery();

        /** @var numeric-string $return */
        $return = $result->fetchOne();

        return (int)$return;
    }

    /**
     * @param AbstractTable                            $table
     * @param array<int, array<string, scalar|object>> $fixtures
     *
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws RuntimeException
     */
    protected function insertFixtures(AbstractTable $table, array $fixtures): void
    {
        foreach ($fixtures as $fixture) {
            $table->insert($fixture);
        }
    }

    /**
     * @param object $object
     * @param string $methodName
     * @param mixed  ...$arguments
     *
     * @return mixed
     * @throws \ReflectionException
     */
    protected function invokeMethodFromObject(object $object, string $methodName, mixed ...$arguments): mixed
    {
        $reflectionClass  = new \ReflectionClass($object);
        $reflectionMethod = $reflectionClass->getMethod($methodName);

        return $reflectionMethod->invoke($object, ...$arguments);
    }

    /**
     * @param object $object
     * @param string $propertyName
     *
     * @return mixed
     * @throws \RuntimeException
     */
    protected function getPropertyValueFromObject(object $object, string $propertyName): mixed
    {
        $reflectionClass = new \ReflectionClass($object);
        do {
            if ($reflectionClass->hasProperty($propertyName)) {
                break;
            }
        } while ($reflectionClass = $reflectionClass->getParentClass());

        if (!$reflectionClass instanceof \ReflectionClass) {
            throw new \RuntimeException(\sprintf('Property "%s" not found on %s', $propertyName, $object::class));
        }

        $reflectionProperty = $reflectionClass->getProperty($propertyName);

        return $reflectionProperty->getValue($object);
    }

    /**
     * @param object $object
     * @param string $propertyName
     * @param mixed  $value
     *
     * @return void
     * @throws \ReflectionException
     */
    protected function setPropertyValueFromObject(object $object, string $propertyName, mixed $value): void
    {
        $reflectionClass    = new \ReflectionClass($object);
        $reflectionProperty = $reflectionClass->getProperty($propertyName);
        $reflectionProperty->setValue($object, $value);
    }
}
