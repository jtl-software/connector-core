<?php
namespace Jtl\Connector\Test\Assertions;

/**
 * Class DatabaseTableContain
 * @package Jtl\Connector\Test\Assertions
 */
class TableContains extends AbstractDatabase
{
    /**
     * @param mixed $other
     * @return bool
     */
    public function matches($other): bool
    {
        return $this->rowCount($other['params'],$other['table']) === 1 ? true : false;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return "Database table contain row";
    }
}