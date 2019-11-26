<?php
namespace Jtl\Connector\Test;

use Jtl\Connector\Test\Assertions\TableContains;
use Jtl\Connector\Test\Assertions\TableIsEmpty;

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
     * @param array $params
     * @param string $message
     */
    public function assertDatabaseHas(string $tableName, array $params, string $message = "")
    {
        self::assertThat(['table' => $tableName, 'params' => $params], new TableContains($this->getConnection()), $message);
    }

    /**
     * @param string $tableName
     * @param string $message
     */
    public function assertTableIsEmpty(string $tableName,string $message = "")
    {
        self::assertThat($tableName, new TableIsEmpty($this->getConnection()), $message);
    }
}