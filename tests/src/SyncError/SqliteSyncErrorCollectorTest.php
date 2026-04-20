<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\SyncError;

use Jtl\Connector\Core\Database\Sqlite3;
use Jtl\Connector\Core\SyncError\SqliteSyncErrorCollector;
use Jtl\Connector\Core\SyncError\SyncErrorEntry;
use PHPUnit\Framework\TestCase;

class SqliteSyncErrorCollectorTest extends TestCase
{
    protected SqliteSyncErrorCollector $collector;

    /**
     * @return void
     * @throws \Jtl\Connector\Core\Exception\DatabaseException
     */
    protected function setUp(): void
    {
        parent::setUp();
        $sqlite = new Sqlite3();
        $sqlite->connect(['location' => ':memory:']);
        $this->collector = new SqliteSyncErrorCollector($sqlite);
    }

    /**
     * @return void
     */
    public function testCollectAndGetAll(): void
    {
        $this->assertFalse($this->collector->hasErrors());
        $this->assertSame([], $this->collector->getAll());

        $this->collector->collect('Product', 'push', '42', new \RuntimeException('Something broke'));
        $this->collector->collect('Category', 'delete', '7', new \RuntimeException('Category not found'));

        $this->assertTrue($this->collector->hasErrors());

        $errors = $this->collector->getAll();
        $this->assertCount(2, $errors);

        $this->assertInstanceOf(SyncErrorEntry::class, $errors[0]);
        $this->assertSame('Product', $errors[0]->getController());
        $this->assertSame('push', $errors[0]->getAction());
        $this->assertSame('42', $errors[0]->getEntityId());
        $this->assertSame('Something broke', $errors[0]->getMessage());

        $this->assertSame('Category', $errors[1]->getController());
        $this->assertSame('delete', $errors[1]->getAction());
    }

    /**
     * @return void
     */
    public function testClearRemovesAllErrors(): void
    {
        $this->collector->collect('Product', 'push', '1', new \RuntimeException('Error 1'));
        $this->collector->collect('Product', 'push', '2', new \RuntimeException('Error 2'));
        $this->assertTrue($this->collector->hasErrors());

        $this->collector->clear();
        $this->assertFalse($this->collector->hasErrors());
        $this->assertSame([], $this->collector->getAll());
    }

    /**
     * @return void
     */
    public function testHasErrorsReturnsFalseWhenEmpty(): void
    {
        $this->assertFalse($this->collector->hasErrors());
    }

    /**
     * @return void
     */
    public function testCreatedAtIsPopulated(): void
    {
        $this->collector->collect('Product', 'push', '1', new \RuntimeException('Error'));
        $errors = $this->collector->getAll();
        $this->assertCount(1, $errors);
        $this->assertNotEmpty($errors[0]->getCreatedAt());
    }

    /**
     * @return void
     */
    public function testPersistsAcrossGetAllCalls(): void
    {
        $this->collector->collect('Product', 'push', '1', new \RuntimeException('Error'));

        $first  = $this->collector->getAll();
        $second = $this->collector->getAll();

        $this->assertCount(1, $first);
        $this->assertCount(1, $second);
        $this->assertSame($first[0]->getMessage(), $second[0]->getMessage());
    }
}
