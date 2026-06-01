<?php

declare(strict_types=1);

namespace Jtl\Connector\Dbc\Query;

use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Schema\SchemaException;
use Jtl\Connector\Dbc\CoordinatesStub;
use Jtl\Connector\Dbc\DbcRuntimeException;
use Jtl\Connector\Dbc\Schema\TableRestriction;
use Jtl\Connector\Dbc\TestCase;
use PHPUnit\Framework\ExpectationFailedException;
use Throwable;

class QueryBuilderTest extends TestCase
{
    protected QueryBuilder $qb;

    protected CoordinatesStub $coordsTable;

    protected string $tableExpression = 'yolo';

    /** @var string[] */
    protected array $globalIdentifiers = ['foo' => 'bar'];

    /**
     * @return void
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testTableRestrictionWithSelect(): void
    {
        $this->qb
            ->select('something')
            ->from($this->tableExpression)
            ->where('yo = :yo')
            ->orWhere('hanni = nanni');

        $sql        = $this->qb->getSQL();
        $whereSplit = \explode('WHERE', $sql);
        $andSplit   = \array_map([$this, 'myTrim'], \explode('AND', $whereSplit[1]));
        $this->assertContains('foo = :glob_id_foo', $andSplit);
    }

    /**
     * @return void
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testTableRestrictionWithInsert(): void
    {
        $this->qb
            ->insert($this->tableExpression)
            ->values(['a' => ':a', 'b' => ':b']);

        $sql          = $this->qb->getSQL();
        $valuesSplit  = \explode('VALUES', $sql);
        $valuesString = \str_replace(['(', ')'], ['', ''], $valuesSplit[1]);
        $values       = \array_map('trim', \explode(',', $valuesString));
        $this->assertContains(':glob_id_foo', $values);
    }

    /**
     * @return void
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testGlobalIdentifierWithUpdate(): void
    {
        $this->qb->update($this->tableExpression)->set('key', 'value');
        $sql = $this->qb->getSQL();

        $setSplit    = \explode('SET', $sql);
        $paramsSplit = \explode('WHERE', $setSplit[1]);

        $setParams = \array_map('trim', \explode(',', $paramsSplit[0]));
        $sets      = [];
        foreach ($setParams as $value) {
            $split           = \array_map('trim', \explode('=', $value));
            $sets[$split[0]] = $split[1];
        }

        $whereParams = \array_map('trim', \explode(',', $paramsSplit[1]));
        $wheres      = [];
        foreach ($whereParams as $value) {
            $split             = \array_map('trim', \explode('=', $value));
            $wheres[$split[0]] = $split[1];
        }

        $this->assertArrayHasKey('foo', $sets);
        $this->assertEquals(':glob_id_foo', $sets['foo']);
        $this->assertArrayHasKey('foo', $wheres);
        $this->assertEquals(':glob_id_foo', $wheres['foo']);
    }

    /**
     * @return void
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testGlobalIdentifierWithDelete(): void
    {
        $this->qb->delete($this->tableExpression)->where('a = b');
        $sql        = $this->qb->getSQL();
        $whereSplit = \explode('WHERE', $sql);
        $andSplit   = \array_map([$this, 'myTrim'], \explode('AND', $whereSplit[1]));
        $this->assertContains('foo = :glob_id_foo', $andSplit);
    }

    /**
     * @return void
     * @throws DbcRuntimeException
     * @throws Exception
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws SchemaException
     */
    public function testTableRestriction(): void
    {
        $this->getDBManager()->getConnection()->restrictTable(
            new TableRestriction($this->coordsTable->getTableSchema(), CoordinatesStub::COL_X, 1.)
        );
        $this->assertEquals(4, $this->countRows($this->coordsTable->getTableName()));
        /** @var array<int, array<string, float>>|array{empty} $datasets */
        $datasets = $this->coordsTable->findAll();
        if (empty($datasets)) {
            $this->fail('$datasets is empty.');
        }
        $this->assertArrayHasKey(0, $datasets);
        $this->assertArrayHasKey(1, $datasets);
        $this->assertEquals(3, $datasets[0]['z']); //@phpstan-ignore-line
        $this->assertEquals(5., $datasets[1]['z']); //@phpstan-ignore-line

        $qb = $this->getDBManager()->getConnection()->createQueryBuilder();
        $qb->update($this->coordsTable->getTableName())
           ->set('z', ':z')
           ->setParameter('z', 10.5)
            ->executeStatement();

        $datasets = $this->coordsTable->findAll();
        $this->assertEquals(10.5, $datasets[0]['z']); //@phpstan-ignore-line
        $this->assertEquals(10.5, $datasets[1]['z']); //@phpstan-ignore-line
    }

    /**
     * @return void
     * @throws Exception
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testSelectWithLockedFromTableAndCalledFromMethod(): void
    {
        $fromTable   = 'tableau';
        $connection  = $this->getDBManager()->getConnection();
        $qb          = new QueryBuilder($connection, [], $fromTable);
        $actualSql   = $qb->select('a', 'b', 'c')->from('somewhere')->getSQL();
        $expectedSql = 'SELECT a, b, c FROM tableau';
        $this->assertEquals($expectedSql, $actualSql);
    }

    /**
     * @return void
     * @throws Exception
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testSelectWithLockedFromTableAndFromAliasAndNotCalledFromMethod(): void
    {
        $fromTable   = 'tableau';
        $fromAlias   = 't';
        $connection  = $this->getDBManager()->getConnection();
        $qb          = new QueryBuilder($connection, [], $fromTable, $fromAlias);
        $actualSql   = $qb->select('a', 't.b', 't.c')->getSQL();
        $expectedSql = 'SELECT a, t.b, t.c FROM tableau t';
        $this->assertEquals($expectedSql, $actualSql);
    }

    /**
     * @return void
     * @throws Exception
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testInsertWithLockedFromTableAndTableNameInInsert(): void
    {
        $fromTable   = 'tableau';
        $connection  = $this->getDBManager()->getConnection();
        $qb          = new QueryBuilder($connection, [], $fromTable);
        $actualSql   = $qb->insert('something')->setValue('foo', ':bar')->getSQL();
        $expectedSql = 'INSERT INTO tableau (foo) VALUES(:bar)';
        $this->assertEquals($expectedSql, $actualSql);
    }

    /**
     * @return void
     * @throws Exception
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testInsertWithLockedFromTableAndNotTableNameInInsert(): void
    {
        $fromTable   = 'tableau';
        $connection  = $this->getDBManager()->getConnection();
        $qb          = new QueryBuilder($connection, [], $fromTable);
        $actualSql   = $qb->insert($fromTable)->getSQL();
        $expectedSql = 'INSERT INTO tableau () VALUES()';
        $this->assertEquals($expectedSql, $actualSql);
    }

    /**
     * @return void
     * @throws Exception
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testUpdateWithLockedFromTableAndFromAliasAndTableNameInUpdate(): void
    {
        $fromTable   = 'tableau';
        $fromAlias   = 't';
        $connection  = $this->getDBManager()->getConnection();
        $qb          = new QueryBuilder($connection, [], $fromTable, $fromAlias);
        $actualSql   = $qb->update('foobar')->getSQL();
        $expectedSql = 'UPDATE tableau SET ';
        $this->assertEquals($expectedSql, $actualSql);
    }

    /**
     * @return void
     * @throws Exception
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testUpdateWithLockedFromTableAndNotTableNameInUpdate(): void
    {
        $fromTable   = 'tableau';
        $connection  = $this->getDBManager()->getConnection();
        $qb          = new QueryBuilder($connection, [], $fromTable);
        $actualSql   = $qb->update($fromTable)->getSQL();
        $expectedSql = 'UPDATE tableau SET ';
        $this->assertEquals($expectedSql, $actualSql);
    }

    /**
     * @return void
     * @throws Exception
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testDeleteWithLockedFromTableAndTableNameInDelete(): void
    {
        $fromTable   = 'tableau';
        $connection  = $this->getDBManager()->getConnection();
        $qb          = new QueryBuilder($connection, [], $fromTable);
        $actualSql   = $qb->delete('foobar')->getSQL();
        $expectedSql = 'DELETE FROM tableau';
        $this->assertEquals($expectedSql, $actualSql);
    }

    /**
     * @return void
     * @throws Exception
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testDeleteWithLockedFromTableAndFromAliasAndTableNameNotInDelete(): void
    {
        $fromTable   = 'tableau';
        $fromAlias   = 't';
        $connection  = $this->getDBManager()->getConnection();
        $qb          = new QueryBuilder($connection, [], $fromTable, $fromAlias);
        $actualSql   = $qb->delete($fromTable)->getSQL();
        $expectedSql = 'DELETE FROM tableau';
        $this->assertEquals($expectedSql, $actualSql);
    }

    /**
     * @param string $str
     *
     * @return string
     */
    public function myTrim(string $str): string
    {
        return \trim($str, " \t\n\r\0\x0B()");
    }

    /**
     * @return void
     * @throws Exception
     * @throws \Exception
     * @throws Throwable
     */
    protected function setUp(): void
    {
        $this->coordsTable = new CoordinatesStub($this->getDBManager());
        $this->qb          = new QueryBuilder(
            $this->getDBManager()->getConnection(),
            [$this->tableExpression => $this->globalIdentifiers]
        );
        parent::setUp();
        $this->insertFixtures($this->coordsTable, self::getCoordinatesFixtures());
    }
}
