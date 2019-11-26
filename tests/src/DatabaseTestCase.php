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
    use TestCaseTrait;

    /**
     * @var null
     */
    static private $pdo = null;

    /**
     * @var null
     */
    private $connection = null;

    /**
     * @return \PHPUnit\DbUnit\Database\DefaultConnection|null
     */
    final public function getConnection()
    {
        if ($this->connection === null) {
            if (self::$pdo == null) {
                self::$pdo = new \PDO('sqlite::memory:');
                self::$pdo->exec("CREATE TABLE mapping (endpoint VARCHAR(255), host INTEGER, type INTEGER);");
            }
            $this->connection = $this->createDefaultDBConnection(self::$pdo, ':memory:');
        }

        return $this->connection;
    }

    /**
     * @return YamlDataSet
     */
    public function getDataSet()
    {
        $dataset = new YamlDataSet(TEST_DIR . 'fixtures' . DIRECTORY_SEPARATOR . 'identity_linker.yaml');

        return $dataset;
    }

}