<?php

declare(strict_types=1);

namespace Jtl\Connector\Dbc\Schema;

use Doctrine\DBAL\Exception as DBALException;
use Doctrine\DBAL\Schema\SchemaException;
use Exception;
use Jtl\Connector\Dbc\DbcRuntimeException;
use Jtl\Connector\Dbc\TableStub;
use Jtl\Connector\Dbc\TestCase;
use PHPUnit\Framework\ExpectationFailedException;
use Throwable;

class TableRestrictionTest extends TestCase
{
    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws SchemaException
     */
    public function testInitializationSuccessful(): void
    {
        $tableSchema = $this->table->getTableSchema();
        $column      = TableStub::B;
        $value       = 'a string';
        $restriction = new TableRestriction($tableSchema, $column, $value);
        $this->assertEquals($tableSchema, $restriction->getTable());
        $this->assertEquals($column, $restriction->getColumnName());
        $this->assertEquals($value, $restriction->getColumnValue());
    }

    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws SchemaException
     */
    public function testInitializationWithNotExistingColumn(): void
    {
        $this->expectException(\Doctrine\DBAL\Schema\Exception\ColumnDoesNotExist::class);
        $tableSchema = $this->table->getTableSchema();
        new TableRestriction($tableSchema, 'yolo', 'c');
    }

    /**
     * @return void
     * @throws DBALException
     * @throws DbcRuntimeException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws SchemaException
     */
    public function testCreate(): void
    {
        $tableSchema = $this->table->getTableSchema();
        $column      = TableStub::C;
        $value       = new \DateTimeImmutable('2007-08-31T16:47+00:00');
        $restriction = TableRestriction::create($tableSchema, $column, $value);
        $this->assertEquals($tableSchema, $restriction->getTable());
        $this->assertEquals($column, $restriction->getColumnName());
        $this->assertEquals($value, $restriction->getColumnValue());
    }

    /**
     * @return void
     * @throws DBALException
     * @throws Exception
     * @throws Throwable
     */
    protected function setUp(): void
    {
        $this->table = new TableStub($this->getDBManager());
        parent::setUp();
        $this->insertFixtures($this->table, self::getTableStubFixtures());
    }
}
