<?php

declare(strict_types=1);

namespace Jtl\Connector\MappingTables;

use Doctrine\DBAL\Exception as DBALException;
use Jtl\Connector\Dbc\DbcRuntimeException;
use PHPUnit\Framework\ExpectationFailedException;
use Throwable;

class TableProxyTest extends TestCase
{
    protected TableProxy $proxy;

    /**
     * @return void
     * @throws DBALException
     * @throws \Exception
     * @throws MappingTablesException
     * @throws Throwable
     */
    protected function setUp(): void
    {
        $this->table = new TableStub($this->getDbManager());
        $this->proxy = new TableProxy(TableStub::TYPE1, $this->table);
        parent::setUp();
        $this->insertFixtures($this->table, self::getTableStubFixtures());
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
        $expected = 5;
        $endpoint = \sprintf('4||2||foobar||%s', TableStub::TYPE1);
        $actual   = $this->proxy->getHostId($endpoint);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     * @throws DBALException
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testGetHostIdFromNotSelectedType(): void
    {
        $expected = 2;
        $endpoint = \sprintf('1||2||bar||%s', TableStub::TYPE2);
        $actual   = $this->proxy->getHostId($endpoint);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     * @throws DBALException
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testGetHostIdWhichNotExists(): void
    {
        $expected = null;
        $endpoint = \sprintf('1||4||3344||%s', TableStub::TYPE1);
        $actual   = $this->proxy->getHostId($endpoint);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     * @throws DBALException
     * @throws \Doctrine\DBAL\Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testCountAndClear(): void
    {
        $this->assertEquals(3, $this->proxy->count());
        $this->proxy->clear();
        $this->assertEquals(0, $this->proxy->count());
    }

    /**
     * @return void
     * @throws DbcRuntimeException
     * @throws \Doctrine\DBAL\Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testGetEndpoint(): void
    {
        $expected = \sprintf('4||2||foobar||%s', TableStub::TYPE1);
        $hostId   = 5;
        $actual   = $this->proxy->getEndpoint($hostId);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     * @throws DbcRuntimeException
     * @throws \Doctrine\DBAL\Exception
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testGetEndpointFromNotSelectedType(): void
    {
        //$expected = sprintf('1||2||bar||%s', TableStub::TYPE2);
        $expected = null;
        $hostId   = 2;
        $actual   = $this->proxy->getEndpoint($hostId);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     * @throws DBALException
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testDeleteByHostId(): void
    {
        $this->assertEquals(3, $this->proxy->count());
        $hostId = 3;
        $this->proxy->delete(null, $hostId);
        $this->assertEquals(2, $this->proxy->count());
    }

    /**
     * @return void
     * @throws DBALException
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testDeleteByHostIdWithMultipleEntries(): void
    {
        $this->assertEquals(3, $this->proxy->count());
        $hostId = 5;
        $this->proxy->delete(null, $hostId);
        $this->assertEquals(1, $this->proxy->count());
    }

    /**
     * @return void
     * @throws DBALException
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testDeleteByEndpointId(): void
    {
        $this->assertEquals(3, $this->proxy->count());
        $endpoint = \sprintf('1||1||foo||%s', TableStub::TYPE1);
        $this->proxy->delete($endpoint);
        $this->assertEquals(2, $this->proxy->count());
    }

    /**
     * @return void
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testGetAndSetType(): void
    {
        $this->assertEquals(TableStub::TYPE1, $this->proxy->getType());
        $this->proxy->setType(TableStub::TYPE2);
        $this->assertEquals(TableStub::TYPE2, $this->proxy->getType());
    }

    /**
     * @return void
     * @throws MappingTablesException
     */
    public function testSetWrongType(): void
    {
        $this->expectException(MappingTablesException::class);
        $this->expectExceptionCode(MappingTablesException::TABLE_NOT_RESPONSIBLE_FOR_TYPE);
        $this->proxy->setType(99999);
    }

    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testSave(): void
    {
        $hostId   = 999;
        $endpoint = \sprintf('44||11||juhuu||%s', TableStub::TYPE1);
        $this->assertEquals(3, $this->proxy->count());
        $this->assertEquals(4, $this->countRows($this->table->getTableName()));
        $this->proxy->save($endpoint, $hostId);
        $this->assertEquals(4, $this->proxy->count());
        $this->assertEquals(5, $this->countRows($this->table->getTableName()));
    }

    /**
     * @return void
     * @throws DBALException
     * @throws \InvalidArgumentException
     * @throws MappingTablesException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testFindEndpoints(): void
    {
        $this->assertCount(3, $this->proxy->findEndpoints());
    }

    /**
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testGetTable(): void
    {
        $this->assertInstanceOf(TableStub::class, $this->proxy->getTable());
    }
}
