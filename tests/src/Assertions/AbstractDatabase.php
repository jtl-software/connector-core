<?php
namespace Jtl\Connector\Test\Assertions;

use PDO;
use PHPUnit\Framework\Constraint\Constraint;

/**
 * Class DatabaseAssertion
 * @package Jtl\Connector\Test\Assertions
 */
abstract class AbstractDatabase extends Constraint
{
    /**
     * @var PDO
     */
    protected $pdo;

    /**
     * DatabaseAssertion constructor.
     * @param \PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param string $tableName
     * @return array
     */
    public function fetchAll($tableName = 'mapping'): array
    {
        return $this->pdo->query(sprintf('SELECT * FROM %s', $tableName))->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param array $params
     * @param string $tableName
     * @return int
     */
    public function rowCount(array $params, $tableName = 'mapping'): int
    {
        $where = "";
        $columns = [];
        $values = [];

        if (count($params) > 0) {
            foreach ($params as $column => $value) {
                $values[] = $value;
                $columns[] = sprintf("%s = ?", $column);
            }

            $where = sprintf('WHERE %s', join(" AND ", $columns));
        }

        $select = sprintf('SELECT COUNT(*) FROM %s %s', $tableName, $where);

        $stmt = $this->pdo->prepare($select);
        $stmt->execute($values);

        return (int)$stmt->fetchColumn();
    }
}