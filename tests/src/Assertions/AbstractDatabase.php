<?php
namespace Jtl\Connector\Test\Assertions;

use PHPUnit\Framework\Constraint\Constraint;

/**
 * Class DatabaseAssertion
 * @package Jtl\Connector\Test\Assertions
 */
abstract class AbstractDatabase extends Constraint
{
    /**
     * @var \PDO
     */
    protected static $pdo;

    /**
     * DatabaseAssertion constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        self::$pdo = $pdo;
    }

    /**
     * @param string $tableName
     * @return array
     */
    public function fetchAll($tableName = 'mapping'): array
    {
        return self::$pdo->query(sprintf('SELECT * FROM %s', $tableName))->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @param array $params
     * @param string $tableName
     * @return int
     */
    public function rowCount(array $params, $tableName = 'mapping'): int
    {
        $columns = [];
        $values = [];
        foreach ($params as $column => $value) {
            $values[] = $value;
            $columns[] = sprintf("%s = ?", $column);
        }

        $select = sprintf('SELECT * FROM %s WHERE %s', $tableName, join("AND ", $columns));

        $stmt = self::$pdo->prepare($select);
        $stmt->execute(array_values($params));

        return $stmt->rowCount();
    }
}