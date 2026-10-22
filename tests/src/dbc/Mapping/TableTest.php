<?php

declare(strict_types=1);

namespace Jtl\Connector\Dbc\Mapping;

use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Exception\InvalidArgumentException;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\DBAL\Types\Types;
use Jtl\Connector\Dbc\CoordinatesStub;
use Jtl\Connector\Dbc\DbcRuntimeException;
use Jtl\Connector\Dbc\TableStub;
use Jtl\Connector\Dbc\TestCase;
use Jtl\Connector\MappingTables\Validator;
use PHPUnit\Framework\ExpectationFailedException;
use ReflectionException;
use Throwable;

class TableTest extends TestCase
{
    protected CoordinatesStub $coords;

    /**
     * @return void
     * \RuntimeException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testGetName(): void
    {
        $this->assertEquals(CoordinatesStub::TABLE_NAME, $this->coords->getName());
    }

    /**
     * @return void
     * \RuntimeException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testGetTableName(): void
    {
        $this->assertEquals(self::TABLE_PREFIX . $this->coords->getName(), $this->coords->getTableName());
    }

    /**
     * @return void
     * @throws Exception
     * @throws \Exception
     * @throws SchemaException
     */
    public function testRestrict(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        $table = $this->table;
        $table->restrict(TableStub::B, 'a string');
        $data = $table->findAll();
        $this->assertCount(1, $data);
        $row = \reset($data);
        if ($row === false) {
            throw new \RuntimeException('$row must not be false.');
        }
        $this->assertEquals(1, $row[TableStub::A]);
        $this->assertEquals('a string', $row[TableStub::B]);
        $this->assertEquals(new \DateTime('@' . \strtotime("2017-03-29 00:00:00")), $row[TableStub::C]);
    }

    /**
     * @return void
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws \PHPUnit\Framework\Exception
     * \RuntimeException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws SchemaException
     */
    public function testGetTableSchema(): void
    {
        $table   = $this->coords->getTableSchema();
        $columns = $table->getColumns();
        $this->assertCount(3, $columns);
        $this->assertTrue($table->hasColumn(CoordinatesStub::COL_X));
        $this->assertEquals(CoordinatesStub::COL_X, $table->getColumn(CoordinatesStub::COL_X)->getName());
        $this->assertTrue($table->hasColumn(CoordinatesStub::COL_Y));
        $this->assertEquals(CoordinatesStub::COL_Y, $table->getColumn(CoordinatesStub::COL_Y)->getName());
        $this->assertTrue($table->hasColumn(CoordinatesStub::COL_Z));
        $this->assertEquals(CoordinatesStub::COL_Z, $table->getColumn(CoordinatesStub::COL_Z)->getName());
    }

    /**
     * @return void
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws \PHPUnit\Framework\Exception
     * \RuntimeException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws SchemaException
     */
    public function testGetColumnTypes(): void
    {
        $columns = $this->coords->getColumnTypes();
        $this->assertCount(3, $columns);
        $this->assertArrayHasKey(CoordinatesStub::COL_X, $columns);
        $this->assertArrayHasKey(CoordinatesStub::COL_Y, $columns);
        $this->assertArrayHasKey(CoordinatesStub::COL_Z, $columns);
        $this->assertEquals(Types::FLOAT, $columns[CoordinatesStub::COL_X]);
        $this->assertEquals(Types::FLOAT, $columns[CoordinatesStub::COL_Y]);
        $this->assertEquals(Types::FLOAT, $columns[CoordinatesStub::COL_Y]);
    }

    /**
     * @return void
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws \PHPUnit\Framework\Exception
     * \RuntimeException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testGetColumnNames(): void
    {
        $columns = $this->coords->getColumnNames();
        $this->assertCount(3, $columns);
        $this->assertArrayHasKey(0, $columns);
        $this->assertArrayHasKey(1, $columns);
        $this->assertArrayHasKey(2, $columns);
        $this->assertEquals(CoordinatesStub::COL_X, $columns[0]);
        $this->assertEquals(CoordinatesStub::COL_Y, $columns[1]);
        $this->assertEquals(CoordinatesStub::COL_Z, $columns[2]);
    }

    /**
     * @return void
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws \PHPUnit\Framework\Exception
     * \RuntimeException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testConvertToPhpValuesAssoc(): void
    {
        $connection = $this->table->getDbManager()->getConnection();
        $result     = $connection->createQueryBuilder()
                                 ->select(...$this->table->getColumnNames())
                                 ->from($this->table->getTableName())
                                 ->executeQuery();

        $rows = $result->fetchAllAssociative();

        $this->assertCount(2, $rows);
        $mappedRow = $this->invokeMethodFromObject($this->table, 'convertToPhpValues', $rows[1]);
        $mappedRow = Validator::returnArray($mappedRow, 'mappedRow');
        $this->assertArrayHasKey(TableStub::ID, $mappedRow);
        $this->assertIsInt($mappedRow[TableStub::ID]);
        $this->assertEquals(3, $mappedRow[TableStub::ID]);
        $this->assertArrayHasKey(TableStub::A, $mappedRow);
        $this->assertIsInt($mappedRow[TableStub::A]);
        $this->assertEquals(4, $mappedRow[TableStub::A]);
        $this->assertArrayHasKey(TableStub::B, $mappedRow);
        $this->assertIsString($mappedRow[TableStub::B]);
        $this->assertEquals('b string', $mappedRow[TableStub::B]);
        $this->assertArrayHasKey(TableStub::C, $mappedRow);
        $this->assertInstanceOf(\DateTimeImmutable::class, $mappedRow[TableStub::C]);
    }

    /**
     * @return void
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws \PHPUnit\Framework\Exception
     * \RuntimeException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testConvertToPhpValuesPartiallyAssoc(): void
    {
        $connection = $this->table->getDbManager()->getConnection();
        $result     = $connection->createQueryBuilder()
                                 ->select('a', 'c')
                                 ->from($this->table->getTableName())
                                 ->executeQuery();
        $rows       = $result->fetchAllAssociative();

        $this->assertCount(2, $rows);
        /** @var array<string, mixed> $mappedRow */
        $mappedRow = $this->invokeMethodFromObject($this->table, 'convertToPhpValues', $rows[1]);
        $this->assertCount(2, $mappedRow);
        $this->assertArrayHasKey(TableStub::A, $mappedRow);
        $this->assertIsInt($mappedRow[TableStub::A]);
        $this->assertEquals(4, $mappedRow[TableStub::A]);
        $this->assertArrayHasKey(TableStub::C, $mappedRow);
        $this->assertInstanceOf(\DateTimeImmutable::class, $mappedRow[TableStub::C]);
    }

    /**
     * @return void
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws Exception
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testConvertToPhpValuesNumeric(): void
    {
        $connection = $this->table->getDbManager()->getConnection();
        $result     = $connection->createQueryBuilder()
                                 ->select(...$this->table->getColumnNames())
                                 ->from($this->table->getTableName())
                                 ->executeQuery();
        $rows       = $result->fetchAllNumeric();

        $this->assertCount(2, $rows);
        /** @var array<int|string, mixed> $mappedRow */
        $mappedRow = $this->invokeMethodFromObject($this->table, 'convertToPhpValues', $rows[1]);
        $this->assertArrayHasKey(0, $mappedRow);
        $this->assertIsInt($mappedRow[0]);
        $this->assertEquals(3, $mappedRow[0]);
        $this->assertArrayHasKey(1, $mappedRow);
        $this->assertIsInt($mappedRow[1]);
        $this->assertEquals(4, $mappedRow[1]);
        $this->assertArrayHasKey(2, $mappedRow);
        $this->assertIsString($mappedRow[2]);
        $this->assertEquals('b string', $mappedRow[2]);
        $this->assertArrayHasKey(3, $mappedRow);
        $this->assertInstanceOf(\DateTimeImmutable::class, $mappedRow[3]);
    }

    /**
     * @return void
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * \RuntimeException
     */
    public function testConvertToPhpValuesPartiallyNumericFails(): void
    {
        $this->expectException(DbcRuntimeException::class);
        $this->expectExceptionCode(DbcRuntimeException::INDICES_MISSING);

        $connection = $this->table->getDbManager()->getConnection();
        $result     = $connection->createQueryBuilder()
                                 ->select('a', 'c')
                                 ->from($this->table->getTableName())
                                 ->executeQuery();

        $rows = $result->fetchAllNumeric();

        $this->assertCount(2, $rows);
        $this->invokeMethodFromObject($this->table, 'convertToPhpValues', $rows[1]);
    }

    /**
     * @return void
     * @throws Exception
     * @throws \Exception
     */
    public function testInsertWithTableColumnTypes(): void
    {
        $a = \mt_rand();
        $b = 'foobar';
        $c = new \DateTimeImmutable(\sprintf('@%d', \random_int(1, \time())));
        $this->assertInstanceOf(TableStub::class, $this->table);
        $this->table->insert(['a' => $a, 'b' => $b, 'c' => $c]);
        $rows = $this->table->find(['a' => $a, 'b' => $b]);
        $this->assertCount(1, $rows);
        $data = \reset($rows);
        $this->assertIsNotBool($data);
        $this->assertArrayHasKey('c', $data);
        $this->assertInstanceOf(\DateTimeImmutable::class, $data['c']);
        $this->assertEquals($c, $data['c']);
    }

    /**
     * @return void
     * @throws Exception
     * @throws \Exception
     */
    public function testInsertWithoutTypes(): void
    {
        $a = \mt_rand();
        $b = 'foobar';
        $c = new \DateTimeImmutable(\sprintf('@%d', \random_int(1, \time())));
        $this->assertInstanceOf(TableStub::class, $this->table);
        $this->table->insert(['a' => $a, 'b' => $b, 'c' => $c->format('Y-m-d H:i:s')], []);
        $rows = $this->table->find(['a' => $a, 'b' => $b]);
        $this->assertCount(1, $rows);
        $data = \reset($rows);
        $this->assertIsNotBool($data);
        $this->assertArrayHasKey('c', $data);
        $this->assertEquals($c, $data['c']);
    }

    /**
     * @return void
     * @throws Exception
     * @throws \Exception
     * @throws \Exception
     */
    public function testUpdateWithTableColumnTypes(): void
    {
        $a    = \mt_rand();
        $b    = 'foobar';
        $c    = new \DateTimeImmutable(\sprintf('@%d', \random_int(1, \time())));
        $newC = new \DateTimeImmutable(\sprintf('@%d', \random_int(1, \time())));
        $this->assertInstanceOf(TableStub::class, $this->table);
        $this->table->insert(['a' => $a, 'b' => $b, 'c' => $c]);
        $this->table->update(['c' => $newC], ['a' => $a, 'b' => $b]);
        $rows = $this->table->find(['a' => $a, 'b' => $b]);
        $this->assertEquals($newC, $rows[0]['c']);
    }

    /**
     * @return void
     * @throws Exception
     * @throws \Exception
     * @throws \Exception
     */
    public function testUpdateWithoutTypes(): void
    {
        $a    = \mt_rand();
        $b    = 'foobar';
        $c    = new \DateTimeImmutable(\sprintf('@%d', \random_int(1, \time())));
        $newC = new \DateTimeImmutable(\sprintf('@%d', \random_int(1, \time())));
        $this->assertInstanceOf(TableStub::class, $this->table);
        $this->table->insert(['a' => $a, 'b' => $b, 'c' => $c]);
        $this->table->update(['c' => $newC->format('Y-m-d H:i:s')], ['a' => $a, 'b' => $b], []);
        $rows = $this->table->find(['a' => $a, 'b' => $b]);
        $this->assertEquals($newC, $rows[0]['c']);
    }

    /**
     * @return void
     * @throws Exception
     * @throws \Exception
     * @throws \InvalidArgumentException
     */
    public function testDeleteWithTableColumnTypes(): void
    {
        $a = \mt_rand();
        $b = 'foobar';
        $c = new \DateTimeImmutable(\sprintf('@%d', \random_int(1, \time())));
        $this->assertInstanceOf(TableStub::class, $this->table);
        $this->table->insert(['a' => $a, 'b' => $b, 'c' => $c]);
        $this->table->delete(['a' => $a, 'c' => $c]);
        $this->assertCount(0, $this->table->find(['a' => $a, 'b' => $b]));
    }

    /**
     * @return void
     * @throws Exception
     * @throws \Exception
     * @throws \InvalidArgumentException
     */
    public function testDeleteWithoutTypes(): void
    {
        $a = \mt_rand();
        $b = 'foobar';
        $c = new \DateTimeImmutable(\sprintf('@%d', \random_int(1, \time())));
        $this->assertInstanceOf(TableStub::class, $this->table);
        $this->table->insert(['a' => $a, 'b' => $b, 'c' => $c]);
        $this->table->delete(['a' => $a, 'c' => $c->format('Y-m-d H:i:s')], []);
        $this->assertCount(0, $this->table->find(['a' => $a, 'b' => $b]));
    }

    /**
     * @return void
     * @throws Exception
     * @throws \Exception
     * @throws \Exception
     * @throws Throwable
     */
    protected function setUp(): void
    {
        $this->table = new TableStub($this->getDBManager());
        $this->assertInstanceOf(TableStub::class, $this->table);
        $this->coords = new CoordinatesStub($this->getDBManager());
        parent::setUp();
        $this->insertFixtures($this->table, self::getTableStubFixtures());
        $this->insertFixtures($this->coords, self::getCoordinatesFixtures());
    }
}
