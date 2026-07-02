<?php

declare(strict_types=1);

namespace Jtl\Connector\MappingTables;

use Doctrine\DBAL\Exception as DBALException;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;

class TableCollectionTest extends TestCase
{
    protected TableCollection $collection;

    /**
     * @return void
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testToArray(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        $collection = new TableCollection($this->table);
        $tables     = $collection->toArray();
        $this->assertCount(1, $tables);
        $this->assertEquals($this->table, $tables[0]);
    }

    /**
     * @return void
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testSetAndGet(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        /** @var TableStub $tableStub */
        $tableStub  = $this->table;
        $collection = new TableCollection();
        $this->assertCount(0, $collection->toArray());
        $collection->set($tableStub);
        $table = $collection->get(TableStub::TYPE1);
        $this->assertInstanceOf(TableStub::class, $table);
        $this->assertEquals($tableStub, $table);
    }

    /**
     * @return void
     * @throws ExpectationFailedException|Exception
     * @throws \InvalidArgumentException
     */
    public function testHas(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        $collection = new TableCollection($this->table);
        $this->assertTrue($collection->has(TableStub::TYPE1));
    }

    /**
     * @return void
     * @throws ExpectationFailedException|Exception
     * @throws \InvalidArgumentException
     */
    public function testHasNot(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->table);
        $collection = new TableCollection($this->table);
        $this->assertFalse($collection->has(9854));
    }

    /**
     * @return void
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testRemoveByType(): void
    {
        $table1 = $this->createStub(TableInterface::class);
        $table1->method('getTypes')->willReturn([1, 2, 3]);

        $table2 = $this->createStub(TableInterface::class);
        $table2->method('getTypes')->willReturn([4]);

        $collection = new TableCollection($table1, $table2);
        $collection->removeByType(4);
        $this->assertCount(1, $collection->toArray());

        $this->assertSame($table1, $collection->toArray()[0]);
    }

    /**
     * @return void
     * @throws \Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testRemoveByInstance(): void
    {
        $table = $this->createStub(TableInterface::class);
        $table->method('getTypes')->willReturn([1, 2, 3, 4, 5, 6, 7, 8, 9]);

        $collection = new TableCollection($table);
        $this->assertEquals($table, $collection->get(\random_int(1, 9)));
        $collection->removeByInstance($table);
        $this->assertFalse($collection->has(\random_int(1, 9)));
    }

    /**
     * @return void
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testGetNotExistingTableWithStrictModeEnabled(): void
    {
        $this->expectException(MappingTablesException::class);
        $this->expectExceptionCode(MappingTablesException::TABLE_FOR_TYPE_NOT_FOUND);
        $this->assertInstanceOf(TableStub::class, $this->table);
        $collection = new TableCollection($this->table);
        $collection->setStrictMode(true);
        $collection->get(12434);
    }

    /**
     * @return void
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testGetNotExistingTableWithStrictModeDisabled(): void
    {
        $type = 73443534;
        $this->assertInstanceOf(TableStub::class, $this->table);
        $collection = new TableCollection($this->table);
        $collection->setStrictMode(false);
        $this->assertFalse($collection->has($type));
        $table = $collection->get($type);
        $this->assertInstanceOf(TableDummy::class, $table);
    }

    /**
     * @return void
     * @throws DBALException
     * @throws \Exception
     * @throws \Throwable
     */
    protected function setUp(): void
    {
        $this->table = new TableStub($this->getDbManager());
        $this->assertInstanceOf(TableStub::class, $this->table);
        $this->collection = new TableCollection($this->table);
        parent::setUp();
        $this->insertFixtures($this->table, self::getTableStubFixtures());
    }
}
