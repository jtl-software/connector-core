<?php
namespace Jtl\Connector\Core\Controller;


interface TransactionalInterface
{
    public function beginTransaction(): bool;

    public function commit(): bool;

    public function rollback(): bool;
}