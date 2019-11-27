<?php
namespace Jtl\Connector\Test\Assertions;

/**
 * Class TableDoesNotContains
 * @package Jtl\Connector\Test\Assertions
 */
class TableDoesNotContains extends AbstractDatabase
{
    /**
     * @param mixed $other
     * @return bool
     */
    public function matches($other): bool
    {
        return $this->rowCount($other['params'],$other['table']) === 0 ? true : false;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return "database table does not contain row";
    }
}