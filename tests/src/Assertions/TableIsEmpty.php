<?php
namespace Jtl\Connector\Test\Assertions;


class TableIsEmpty extends AbstractDatabase
{
    /**
     * @param mixed $tableName
     * @return bool
     */
    public function matches($tableName): bool
    {
        return empty($this->fetchAll($tableName)) ? true : false;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return "Database table is empty";
    }
}