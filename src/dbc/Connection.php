<?php

declare(strict_types=1);

namespace Jtl\Connector\Dbc;

use Doctrine\DBAL\Exception;
use Jtl\Connector\Dbc\Query\QueryBuilder;
use Jtl\Connector\Dbc\Schema\TableRestriction;

class Connection extends \Doctrine\DBAL\Connection
{
    /** @var array<string, array<string, mixed>> */
    protected array $tableRestrictions = [];

    /**
     * @param TableRestriction $restriction
     *
     * @return $this
     */
    public function restrictTable(TableRestriction $restriction): self
    {
        $this->tableRestrictions[$restriction->getTable()->getName()][$restriction->getColumnName()] =
            $restriction->getColumnValue();

        return $this;
    }

    /**
     * @param string $tableExpression
     * @param string $column
     *
     * @return bool
     */
    public function hasTableRestriction(string $tableExpression, string $column): bool
    {
        return isset($this->tableRestrictions[$tableExpression][$column]);
    }

    /**
     * @return QueryBuilder
     */
    public function createQueryBuilder(): QueryBuilder
    {
        return new QueryBuilder($this, $this->getTableRestrictions());
    }

    /**
     * @param string|null $tableExpression
     *
     * @return array<string, mixed>|array<string, array<string, mixed>>
     */
    public function getTableRestrictions(?string $tableExpression = null): array
    {
        if ($tableExpression === null) {
            return $this->tableRestrictions;
        }

        return $this->tableRestrictions[$tableExpression] ?? [];
    }

    /**
     * @param string                                                                                   $tableExpression
     * @param array<int, array<string, scalar|\DateTimeInterface>>                                     $data
     * @param array<int<0, max>|string, \Doctrine\DBAL\ParameterType|\Doctrine\DBAL\Types\Type|string> $types
     *
     * @return int
     * @throws \Exception
     */
    public function multiInsert(string $tableExpression, array $data, array $types = []): int
    {
        $affectedRows = 0;
        $this->beginTransaction();
        try {
            foreach ($data as $row) {
                $affectedRows += (int)$this->insert($tableExpression, $row, $types);
            }
            $this->commit();
        } catch (\Exception $e) {
            $this->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * @param string                                                                                   $table
     * @param array<string, mixed>                                                                     $data
     * @param array<int<0, max>|string, \Doctrine\DBAL\ParameterType|\Doctrine\DBAL\Types\Type|string> $types
     *
     * @return int|string
     * @throws Exception
     */
    public function insert(string $table, array $data, array $types = []): int|string
    {
        return parent::insert(
            $table,
            \array_merge($data, $this->getTableRestrictions($table)),
            $types
        );
    }

    /**
     * @param string                                                                                   $table
     * @param array<string, mixed>                                                                     $data
     * @param array<string, mixed>                                                                     $criteria
     * @param array<int<0, max>|string, \Doctrine\DBAL\ParameterType|\Doctrine\DBAL\Types\Type|string> $types
     *
     * @return int|string
     * @throws Exception
     */
    public function update(string $table, array $data, array $criteria = [], array $types = []): int|string
    {
        $restrictions = $this->getTableRestrictions($table);
        $data         = \array_merge($data, $restrictions);
        $criteria     = \array_merge($criteria, $restrictions);

        return parent::update($table, $data, $criteria, $types);
    }

    /**
     * @param string                                                                                   $table
     * @param array<string, mixed>                                                                     $criteria
     * @param array<int<0, max>|string, \Doctrine\DBAL\ParameterType|\Doctrine\DBAL\Types\Type|string> $types
     *
     * @return int|string
     * @throws Exception
     */
    public function delete(string $table, array $criteria = [], array $types = []): int|string
    {
        $restrictions = $this->getTableRestrictions($table);
        $criteria     = \array_merge($criteria, $restrictions);

        return parent::delete($table, $criteria, $types);
    }
}
