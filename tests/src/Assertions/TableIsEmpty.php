<?php
namespace Jtl\Connector\Test\Assertions;

/**
 * Class TableIsEmpty
 * @package Jtl\Connector\Test\Assertions
 */
class TableIsEmpty extends AbstractDatabase
{
    /**
     * @param mixed $tableName
     * @return bool
     */
    public function matches($tableName): bool
    {
        return $this->rowCount([], $tableName) === 0 ? true : false;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return "database table is empty";
    }
}