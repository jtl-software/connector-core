<?php
namespace Jtl\Connector\Core\Session;


interface SessionHandlerInterface extends \SessionHandlerInterface
{
    public function isValid(string $sessionId): bool;
}