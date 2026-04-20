<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\SyncError;

use Jtl\Connector\Core\Database\Sqlite3;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class SqliteSyncErrorCollector implements SyncErrorCollectorInterface, LoggerAwareInterface
{
    protected Sqlite3          $db;
    protected LoggerInterface  $logger;
    protected bool             $tableCreated = false;

    /**
     * @param Sqlite3 $db
     */
    public function __construct(Sqlite3 $db)
    {
        $this->db     = $db;
        $this->logger = new NullLogger();
        $this->ensureTable();
    }

    /**
     * @return void
     */
    protected function ensureTable(): void
    {
        if ($this->tableCreated) {
            return;
        }

        $this->db->exec(
            'CREATE TABLE IF NOT EXISTS sync_errors ('
            . 'id INTEGER PRIMARY KEY AUTOINCREMENT,'
            . 'controller TEXT NOT NULL,'
            . 'action TEXT NOT NULL,'
            . 'entity_id TEXT NOT NULL DEFAULT \'\',' // phpcs:ignore
            . 'message TEXT NOT NULL,'
            . 'created_at TEXT NOT NULL'
            . ')'
        );
        $this->tableCreated = true;
    }

    /**
     * @inheritDoc
     */
    public function collect(string $controller, string $action, string $entityId, \Throwable $error): void
    {
        $this->logger->warning(\sprintf(
            'Sync error collected: [%s.%s] entity=%s message=%s',
            $controller,
            $action,
            $entityId,
            $error->getMessage()
        ));

        $stmt = $this->db->prepare(
            'INSERT INTO sync_errors (controller, action, entity_id, message, created_at)'
            . ' VALUES (:controller, :action, :entity_id, :message, :created_at)'
        );

        if (!$stmt instanceof \SQLite3Stmt) {
            $this->logger->error('Failed to prepare sync error insert statement');
            return;
        }

        $stmt->bindValue(':controller', $controller, \SQLITE3_TEXT);
        $stmt->bindValue(':action', $action, \SQLITE3_TEXT);
        $stmt->bindValue(':entity_id', $entityId, \SQLITE3_TEXT);
        $stmt->bindValue(':message', $error->getMessage(), \SQLITE3_TEXT);
        $stmt->bindValue(':created_at', \date('Y-m-d H:i:s'), \SQLITE3_TEXT);
        $stmt->execute();
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        /** @var array<int, array<string, mixed>>|null $rows */
        $rows = $this->db->fetch('SELECT * FROM sync_errors ORDER BY id ASC');

        if ($rows === null) {
            return [];
        }

        $entries = [];
        foreach ($rows as $row) {
            /** @var array{controller: string, action: string, entity_id: string, message: string, created_at: string} $row */
            $entries[] = new SyncErrorEntry(
                $row['controller'],
                $row['action'],
                $row['entity_id'],
                $row['message'],
                $row['created_at']
            );
        }

        return $entries;
    }

    /**
     * @inheritDoc
     */
    public function clear(): void
    {
        $this->db->exec('DELETE FROM sync_errors');
    }

    /**
     * @inheritDoc
     */
    public function hasErrors(): bool
    {
        /** @var int|string|false|null $count */
        $count = $this->db->fetchSingle('SELECT COUNT(*) FROM sync_errors');

        return (int)$count > 0;
    }

    /**
     * @param LoggerInterface $logger
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }
}
