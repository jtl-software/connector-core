<?php

/** @noinspection PhpHierarchyChecksInspection */

declare(strict_types=1);

namespace Jtl\Connector\MappingTables;

use Doctrine\DBAL\Exception as DBALException;
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\DBAL\Types\Types;
use Jtl\Connector\Dbc\DbcRuntimeException;
use Jtl\Connector\Dbc\DbManager;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\ExpectationFailedException;
use ReflectionException;
use Throwable;

class AbstractTableTest extends TestCase
{
    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testTableSchema(): void
    {
        /** @var TableStub $tableStub */
        $tableStub   = $this->table;
        $tableSchema = $tableStub->getTableSchema();
        $this->assertTrue($tableSchema->hasColumn(AbstractTable::HOST_ID));
        $this->assertTrue($tableSchema->hasColumn(TableStub::COL_ID1));
        $this->assertTrue($tableSchema->hasColumn(TableStub::COL_ID2));
        $this->assertTrue($tableSchema->hasColumn(TableStub::COL_VAR));
    }

    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws SchemaException
     */
    public function testHostIndex(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $table */
        $table       = $this->table;
        $tableSchema = $table->getTableSchema();
        $this->assertTrue($tableSchema->hasIndex($table->createIndexName(AbstractTable::HOST_INDEX_NAME)));
        $hostIndex   = $tableSchema->getIndex($table->createIndexName(AbstractTable::HOST_INDEX_NAME));
        $hostColumns = $hostIndex->getColumns();
        $this->assertCount(1, $hostColumns);
        /** @var Column $hostColumn */
        $hostColumn = \reset($hostColumns);
        $this->assertEquals(AbstractTable::HOST_ID, $hostColumn);
    }

    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws SchemaException
     */
    public function testPrimaryIndex(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub   = $this->table;
        $tableSchema = $tableStub->getTableSchema();
        $this->assertNotNull($tableSchema->getPrimaryKey());
        $primaryKey     = $tableSchema->getPrimaryKey();
        $primaryColumns = $primaryKey->getColumns();
        $this->assertCount(3, $primaryColumns);
        $this->assertEquals(TableStub::COL_ID1, $primaryColumns[0]);
        $this->assertEquals(TableStub::COL_ID2, $primaryColumns[1]);
        $this->assertEquals(AbstractTable::IDENTITY_TYPE, $primaryColumns[2]);
    }

    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws SchemaException
     */
    public function testEndpointIndex(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub   = $this->table;
        $tableSchema = $tableStub->getTableSchema();
        $this->assertTrue($tableSchema->hasIndex($tableStub->createIndexName(AbstractTable::ENDPOINT_INDEX_NAME)));
        $epIndex   = $tableSchema->getIndex($tableStub->createIndexName(AbstractTable::ENDPOINT_INDEX_NAME));
        $epColumns = $epIndex->getColumns();
        $this->assertCount(4, $epColumns);
        $this->assertEquals(TableStub::COL_ID1, $epColumns[0]);
        $this->assertEquals(TableStub::COL_ID2, $epColumns[1]);
        $this->assertEquals(TableStub::COL_VAR, $epColumns[2]);
        $this->assertEquals(AbstractTable::IDENTITY_TYPE, $epColumns[3]);
    }

    /**
     * @return void
     * @throws DBALException
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testGetHostId(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $this->assertEquals(3, $tableStub->getHostId(\sprintf('1||1||foo||%s', TableStub::TYPE1)));
        $this->assertEquals(2, $tableStub->getHostId(\sprintf('1||2||bar||%s', TableStub::TYPE2)));
        $this->assertEquals(5, $tableStub->getHostId(\sprintf('4||2||foobar||%s', TableStub::TYPE1)));
    }

    /**
     * @return void
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testGetEndpointId(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $this->assertEquals(
            \sprintf('1||1||foo||%s', TableStub::TYPE1),
            $tableStub->getEndpoint(3, TableStub::TYPE1)
        );
        $this->assertEquals(
            \sprintf('1||2||bar||%s', TableStub::TYPE2),
            $tableStub->getEndpoint(2, TableStub::TYPE2)
        );
        $this->assertEquals(
            \sprintf('4||2||foobar||%s', TableStub::TYPE1),
            $tableStub->getEndpoint(5, TableStub::TYPE1)
        );
    }

    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PDOException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testSave(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $tableStub->save(\sprintf('1||45||yolo||%s', TableStub::TYPE1), 4);
        $this->assertEquals(5, $this->countRows($tableStub->getTableName()));
    }

    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PDOException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testDeleteByEndpointId(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $this->assertEquals(
            \sprintf('1||1||foo||%s', TableStub::TYPE1),
            $tableStub->getEndpoint(3, TableStub::TYPE1)
        );
        $tableStub->remove(\sprintf('1||1||foo||%s', TableStub::TYPE1), null, TableStub::TYPE1);
        $this->assertEquals(3, $this->countRows($tableStub->getTableName()));
        $this->assertEquals(null, $tableStub->getEndpoint(3, TableStub::TYPE1));
    }

    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PDOException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testDeleteByHostId(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $this->assertEquals(
            \sprintf('1||1||foo||%s', TableStub::TYPE1),
            $tableStub->getEndpoint(3, TableStub::TYPE1)
        );
        $tableStub->remove(null, 3, TableStub::TYPE1);
        $this->assertEquals(3, $this->countRows($tableStub->getTableName()));
        $this->assertEquals(null, $tableStub->getEndpoint(3, TableStub::TYPE1));
    }

    /**
     * @param string|null $endpoint
     *
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('deleteByHostIdMultipleEntriesProvider')]
    public function testDeleteByHostIdMultipleEntries(?string $endpoint): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub       = $this->table;
        $relatedHostId   = 5;
        $anotherEndpoint = \sprintf('5||7||wat||%s', TableStub::TYPE1);
        $tableStub->save($anotherEndpoint, $relatedHostId);
        $this->assertEquals(5, $this->countRows($tableStub->getTableName()));
        $this->assertEquals($relatedHostId, $tableStub->getHostId($anotherEndpoint));
        $tableStub->remove($endpoint, $relatedHostId, TableStub::TYPE1);
        $this->assertEquals(2, $this->countRows($tableStub->getTableName()));
        $this->assertNull($tableStub->getEndpoint($relatedHostId, TableStub::TYPE1));
        $this->assertNull($tableStub->getHostId($anotherEndpoint));
    }

    /**
     * @return array{0: array{null}, 1: array{string}}
     */
    public static function deleteByHostIdMultipleEntriesProvider(): array
    {
        return [
            [null],
            [\sprintf('1||1||foo||%s', TableStub::TYPE1)],
        ];
    }

    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PDOException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testClearDifferentTypes(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $tableStub->clear(TableStub::TYPE1);
        $this->assertEquals(1, $this->countRows($tableStub->getTableName()));
        $tableStub->clear(TableStub::TYPE2);
        $this->assertEquals(0, $this->countRows($tableStub->getTableName()));
    }

    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PDOException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testClearAll(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $this->assertEquals(4, $this->countRows($tableStub->getTableName()));
        $tableStub->clear();
        $this->assertEquals(0, $this->countRows($tableStub->getTableName()));
    }

    /**
     * @return void
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws MappingTablesException
     * @throws \RuntimeException|\InvalidArgumentException
     */
    public function testClearUnknownType(): void
    {
        $this->expectException(MappingTablesException::class);
        $this->expectExceptionCode(MappingTablesException::TABLE_NOT_RESPONSIBLE_FOR_TYPE);
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $tableStub->clear(44232);
    }

    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testCount(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $this->assertEquals(4, $this->countRows($tableStub->getTableName()));
        $this->assertEquals(3, $tableStub->count([], [], [], null, null, TableStub::TYPE1));
        $this->assertEquals(1, $tableStub->count([], [], [], null, null, TableStub::TYPE2));
        $tableStub->remove(\sprintf('1||1||foo||%s', TableStub::TYPE1), null, TableStub::TYPE1);
        $this->assertEquals(3, $this->countRows($tableStub->getTableName()));
        $this->assertEquals(2, $tableStub->count([], [], [], null, null, TableStub::TYPE1));
    }

    /**
     * @return void
     * @throws DBALException
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testCountWithWhereCondition(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $where     = [TableStub::COL_ID2 . ' = :' . TableStub::COL_ID2];
        $this->assertEquals(
            0,
            $tableStub->count($where, [TableStub::COL_ID2 => 63], [], null, null, TableStub::TYPE1)
        );
        $this->assertEquals(
            1,
            $tableStub->count($where, [TableStub::COL_ID2 => 1], [], null, null, TableStub::TYPE1)
        );
        $this->assertEquals(
            1,
            $tableStub->count($where, [TableStub::COL_ID2 => 2], [], null, null, TableStub::TYPE1)
        );
    }

    /**
     * @return void
     * @throws DBALException
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testFindEndpointsByType(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $endpoints = $tableStub->findEndpoints([], [], [], null, null, TableStub::TYPE1);
        $this->assertCount(3, $endpoints);
        $this->assertEquals(\sprintf('1||1||foo||%s', TableStub::TYPE1), $endpoints[0]);
        $this->assertEquals(\sprintf('4||2||foobar||%s', TableStub::TYPE1), $endpoints[1]);
        $endpoints = $tableStub->findEndpoints([], [], [], null, null, TableStub::TYPE2);
        $this->assertCount(1, $endpoints);
        $this->assertEquals(\sprintf('1||2||bar||%s', TableStub::TYPE2), $endpoints[0]);
    }

    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testFindAllEndpointsWithNoData(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $tableStub->clear(TableStub::TYPE1);
        $endpoints = $tableStub->findEndpoints([], [], [], null, null, TableStub::TYPE1);
        $this->assertEmpty($endpoints);
    }

    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testFilterMappedEndpoints(): void
    {
        $mapped = [
            \sprintf('1||1||foo||%s', TableStub::TYPE1),
            \sprintf('1||2||bar||%s', TableStub::TYPE2),
        ];

        $notMappedExpected = [
            \sprintf('2||1||yolo||%s', TableStub::TYPE1),
            \sprintf('2||2||dito||%s', TableStub::TYPE1),
            \sprintf('2||3||mito||%s', TableStub::TYPE1)
        ];

        $endpoints = \array_merge($mapped, $notMappedExpected);

        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub       = $this->table;
        $notMappedActual = $tableStub->filterMappedEndpoints($endpoints);
        $this->assertCount(3, $notMappedActual);
        $this->assertEquals($notMappedExpected, $notMappedActual);
    }

    /**
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testCreateEndpointData(): void
    {
        $endpointData = ['5', '7', 'foobar', TableStub::TYPE1];
        $this->assertInstanceOf(TableStub::class, $this->table);
        $data = $this->invokeMethodFromObject($this->table, 'createEndpointData', $endpointData);
        $this->assertIsArray($data);
        $this->assertCount(4, $data);
        $this->assertArrayHasKey('id1', $data);
        $this->assertIsInt($data['id1']);
        $this->assertArrayHasKey('id2', $data);
        $this->assertIsInt($data['id2']);
        $this->assertArrayHasKey('strg', $data);
        $this->assertIsString($data['strg']);
    }

    /**
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testCreateEndpointDataFailsTooMuchData(): void
    {
        $this->expectException(MappingTablesException::class);
        $this->expectExceptionCode(MappingTablesException::WRONG_ENDPOINT_PARTS_AMOUNT);
        $endpointData = ['foo', 'bar', '123', '21', '1.3'];
        $this->assertInstanceOf(TableStub::class, $this->table);
        $this->invokeMethodFromObject($this->table, 'createEndpointData', $endpointData);
    }

    /**
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testCreateEndpointDataFailsNotEnoughData(): void
    {
        $this->expectException(MappingTablesException::class);
        $this->expectExceptionCode(MappingTablesException::WRONG_ENDPOINT_PARTS_AMOUNT);
        $endpointData = ['foo', 'bar'];
        $this->assertInstanceOf(TableStub::class, $this->table);
        $this->invokeMethodFromObject($this->table, 'createEndpointData', $endpointData);
    }

    /**
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testBuildEndpoint(): void
    {
        $data = ['f', 'u', 'c', 'k'];
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $expected  = \implode($tableStub->getEndpointDelimiter(), $data);
        $endpoint  = $tableStub->buildEndpoint($data);
        $this->assertEquals($expected, $endpoint);
    }

    /**
     * @param array<string, mixed> $endpointData
     * @param array<int, string>   $endpointColumnNames
     * @param string               $expectedEndpoint
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('endpointWithColumnKeysProvider')]
    public function testBuildEndpointWithColumnKeys(
        array  $endpointData,
        array  $endpointColumnNames,
        string $expectedEndpoint
    ): void {
        $tableMock = $this->createPartialMock(TableStub::class, ['getEndpointColumnNames']);

        $tableMock
            ->expects($this->once())
            ->method('getEndpointColumnNames')
            ->willReturn($endpointColumnNames);

        $givenEndpoint = $tableMock->buildEndpoint($endpointData);

        $this->assertEquals($expectedEndpoint, $givenEndpoint);
    }

    /**
     * @return array<int, array<int, array<string, string>|array<int, string>|string>>
     */
    public static function endpointWithColumnKeysProvider(): array
    {
        return [
            [
                ['foo' => 'bar', 'everything' => 'nothing', 'yes' => 'no', 'yo' => 'lo'],
                ['everything', 'yo', 'foo', 'yes'],
                'nothing||lo||bar||no'
            ]
        ];
    }

    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testExtractEndpoint(): void
    {
        $endpoint = \sprintf('3||5||bar||%s', TableStub::TYPE1);
        $expected =
            [
                TableStub::COL_ID1           => 3,
                TableStub::COL_ID2           => 5,
                TableStub::COL_VAR           => 'bar',
                AbstractTable::IDENTITY_TYPE => TableStub::TYPE1
            ];
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $data      = $tableStub->extractEndpoint($endpoint);
        $this->assertEquals($expected, $data);
    }

    /**
     * @return void
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testExplodeEndpoint(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $delimiter = '>=<';
        $tableStub->setEndpointDelimiter($delimiter);
        $exptected1 = 'foo';
        $exptected2 = 'bar';
        $endpoint   = \sprintf('%s%s%s', $exptected1, $delimiter, $exptected2);
        $exploded   = $tableStub->explodeEndpoint($endpoint);
        $this->assertCount(2, $exploded);
        $this->assertEquals($exptected1, $exploded[0]);
        $this->assertEquals($exptected2, $exploded[1]);
    }

    /**
     * @return void
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testExplodeEndpointWithEmptyString(): void
    {
        $this->expectException(MappingTablesException::class);
        $this->expectExceptionCode(MappingTablesException::EMPTY_ENDPOINT_ID);
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $tableStub->explodeEndpoint('');
    }

    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \RuntimeException|\InvalidArgumentException
     */
    public function testExtractEndpointUnknownType(): void
    {
        $this->expectException(MappingTablesException::class);
        $this->expectExceptionCode(MappingTablesException::TABLE_NOT_RESPONSIBLE_FOR_TYPE);
        $endpoint = \sprintf('3||5||bar||%s', 3244);
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub = $this->table;
        $tableStub->extractEndpoint($endpoint);
    }

    /**
     * @return void
     * @throws DBALException
     * @throws Exception
     * @throws \Exception
     * @throws MappingTablesException
     * @throws SchemaException
     */
    public function testAddColumnType(): void
    {
        $table = new TableStub($this->getDbManager());
        $table->setEndpointColumn('test', Types::BINARY);
        $schema = $table->getTableSchema();
        $column = $schema->getColumn('test');
        $this->assertEquals(
            Types::BINARY,
            \Doctrine\DBAL\Types\Type::getTypeRegistry()->lookupName($column->getType())
        );
    }

    /**
     * @return void
     * @throws DBALException
     * @throws Exception
     * @throws \Exception
     * @throws MappingTablesException
     */
    public function testAddColumn(): void
    {
        $table = new TableStub($this->getDbManager());
        $table->setEndpointColumn('test', Types::DATETIME_IMMUTABLE);
        $schema     = $table->getTableSchema();
        $primaryKey = $schema->getPrimaryKey();
        $this->assertNotNull($primaryKey);
        $this->assertContains('test', $primaryKey->getColumns());
    }

    /**
     * @return void
     * @throws DBALException
     * @throws Exception
     * @throws \Exception
     * @throws MappingTablesException
     */
    public function testAddColumnNotPrimary(): void
    {
        $table = new TableStub($this->getDbManager());
        $table->setEndpointColumn('test', Types::STRING, false);
        $schema = $table->getTableSchema();
        $this->assertTrue($schema->hasColumn('test'));
        $primaryKey = $schema->getPrimaryKey();
        $this->assertNotNull($primaryKey);
        $this->assertNotContains('test', $primaryKey->getColumns());
    }

    /**
     * @return void
     * @throws DBALException
     */
    public function testEmptyTypes(): void
    {
        $this->expectException(MappingTablesException::class);
        $this->expectExceptionCode(MappingTablesException::TYPES_ARRAY_EMPTY);
        new class ($this->getDBManager()) extends TableStub {
            /**
             * @return array{}
             */
            public function getTypes(): array
            {
                return [];
            }
        };
    }

    /**
     * @param string     $field
     * @param string     $endpoint
     * @param int|string $expectedValue
     *
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('extractValueFromEndpointProvider')]
    public function testExtractValueFromEndpoint(string $field, string $endpoint, int|string $expectedValue): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub   = $this->table;
        $actualValue = $tableStub->extractValueFromEndpoint($field, $endpoint);
        $this->assertEquals($expectedValue, $actualValue);
    }

    /**
     * @return array<int, array<int, int|string>>
     */
    public static function extractValueFromEndpointProvider(): array
    {
        return [
            [TableStub::COL_ID1, \sprintf('%d||%d||%s||%d', 5, 42, 'strg', TableStub::TYPE1), 5],
            [TableStub::COL_ID2, \sprintf('%d||%d||%s||%d', 5, 42, 'strg', TableStub::TYPE2), 42],
            [TableStub::COL_VAR, \sprintf('%d||%d||%s||%d', 5, 42, 'strg', TableStub::TYPE1), 'strg'],
        ];
    }

    /**
     * @param mixed[] $types
     *
     * @return void
     * @throws DBALException
     */
    #[DataProvider('wrongTypesProvider')]
    public function testWrongTypes(array $types): void
    {
        $this->expectException(MappingTablesException::class);
        $this->expectExceptionCode(MappingTablesException::TYPES_WRONG_DATA_TYPE);
        new class ($this->getDBManager(), $types) extends TableStub {
            /** @var mixed[] */
            protected array $types = [];

            /**
             * @param DbManager $dbManager
             * @param mixed[]   $types
             */
            public function __construct(DbManager $dbManager, array $types)
            {
                $this->types = $types;
                parent::__construct($dbManager);
            }

            /**
             * @return mixed[]
             */
            public function getTypes(): array
            {
                return $this->types;
            }
        };
    }

    /**
     * @return array<int, array<int, array<int, string|float|bool|\stdClass>>>
     */
    public static function wrongTypesProvider(): array
    {
        return [
            [['string']],
            [[0.1]],
            [[false]],
            [[new \stdClass()]],
        ];
    }

    /**
     * @return void
     * @throws DBALException
     * @throws \Exception
     * @throws Throwable
     */
    protected function setUp(): void
    {
        $this->table = new TableStub($this->getDbManager());
        parent::setUp();
        $this->insertFixtures($this->table, self::getTableStubFixtures());
    }
}
