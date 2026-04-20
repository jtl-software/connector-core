<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\SyncError;

interface SyncErrorCollectorInterface
{
    /**
     * Collect a sync error for later aggregation.
     *
     * @param string     $controller The controller name (e.g. 'Product', 'Category')
     * @param string     $action     The action name (e.g. 'push', 'delete', 'pull')
     * @param string     $entityId   An identifier for the entity that failed
     * @param \Throwable $error      The exception that occurred
     *
     * @return void
     */
    public function collect(string $controller, string $action, string $entityId, \Throwable $error): void;

    /**
     * Retrieve all collected sync errors.
     *
     * @return SyncErrorEntry[]
     */
    public function getAll(): array;

    /**
     * Remove all collected sync errors.
     *
     * @return void
     */
    public function clear(): void;

    /**
     * Check whether any errors have been collected.
     *
     * @return bool
     */
    public function hasErrors(): bool;
}
