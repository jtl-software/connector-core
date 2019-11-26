<?php

namespace Jtl\Connector\Test;

use PHPUnit\DbUnit\DataSet\YamlDataSet;
use PHPUnit\DbUnit\TestCaseTrait;

/**
 * Class DatabaseTestCase
 * @package Jtl\Connector\Test
 */
abstract class DatabaseTestCase extends TestCase
{
    /**
     * @var null
     */
    private $connection = null;

    /**
     * @return \PDO
     */
    final public function getConnection(): \PDO
    {
        if ($this->connection === null) {
            $this->connection = new \PDO('sqlite::memory:');
            $this->connection->exec("CREATE TABLE mapping (endpoint VARCHAR(255), host INTEGER, type INTEGER);");
            $this->connection->exec("INSERT INTO mapping (endpoint, host, type) VALUES ('1', 1, 1)");
        }

        return $this->connection;
    }

    /**
     * @param string $tableName
     * @return array
     */
    public function fetchAll($tableName = 'mapping'): array
    {
        return $this->getConnection()->query(sprintf('SELECT * FROM %s', $tableName))->fetchAll(\PDO::FETCH_OBJ);
    }
}