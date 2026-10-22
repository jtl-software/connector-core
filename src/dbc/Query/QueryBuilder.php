<?php

declare(strict_types=1);

namespace Jtl\Connector\Dbc\Query;

use Jtl\Connector\Dbc\Connection;

class QueryBuilder extends \Doctrine\DBAL\Query\QueryBuilder
{
    private const string
        TYPE_SELECT = 'select',
        TYPE_INSERT = 'insert',
        TYPE_UPDATE = 'update',
        TYPE_DELETE = 'delete';

    /** @var array{empty}|array<string, array<string, mixed>>|array<string, mixed> */
    protected array   $tableRestrictions = [];
    protected ?string $lockedFromTable;
    protected ?string $lockedFromAlias;
    protected ?string $currentTable        = null;
    protected string  $queryType           = self::TYPE_SELECT;
    protected bool    $restrictionsApplied = false;

    /**
     * @param Connection                                                            $connection
     * @param array{empty}|array<string, mixed>|array<string, array<string, mixed>> $tableRestrictions
     * @param string|null                                                           $fromTable
     * @param string|null                                                           $fromAlias
     */
    public function __construct(
        Connection $connection,
        array      $tableRestrictions = [],
        ?string    $fromTable = null,
        ?string    $fromAlias = null
    ) {
        parent::__construct($connection);
        $this->tableRestrictions = $tableRestrictions;
        $this->lockedFromTable   = $fromTable;
        $this->lockedFromAlias   = $fromAlias;

        if ($fromTable !== null) {
            parent::from($fromTable, $fromAlias);
        }
    }

    /**
     * @param string      $table
     * @param string|null $alias
     *
     * @return $this
     */
    public function from(string $table, ?string $alias = null): static
    {
        if ($this->lockedFromTable !== null) {
            return $this;
        }
        $this->currentTable = $table;

        return parent::from($table, $alias);
    }

    /**
     * @param string $table
     *
     * @return $this
     */
    public function insert(string $table): static
    {
        $actualTable        = $this->lockedFromTable ?? $table;
        $this->currentTable = $actualTable;
        $this->queryType    = self::TYPE_INSERT;

        return parent::insert($actualTable);
    }

    /**
     * @param string $table
     *
     * @return $this
     */
    public function update(string $table): static
    {
        $actualTable        = $this->lockedFromTable ?? $table;
        $this->currentTable = $actualTable;
        $this->queryType    = self::TYPE_UPDATE;

        return parent::update($actualTable);
    }

    /**
     * @param string $table
     *
     * @return $this
     */
    public function delete(string $table): static
    {
        $actualTable        = $this->lockedFromTable ?? $table;
        $this->currentTable = $actualTable;
        $this->queryType    = self::TYPE_DELETE;

        return parent::delete($actualTable);
    }

    /**
     * @param string $table
     *
     * @return void
     */
    protected function assignWhereRestrictions(string $table): void
    {
        if (isset($this->tableRestrictions[$table]) && \is_array($this->tableRestrictions[$table])) {
            foreach ($this->tableRestrictions[$table] as $column => $value) {
                $id = 'glob_id_' . $column;
                $this->setParameter($id, $value);
                $this->andWhere($column . ' = :' . $id);
            }
        }
    }

    /**
     * @param string $table
     *
     * @return void
     */
    protected function assignInsertRestrictions(string $table): void
    {
        if (isset($this->tableRestrictions[$table]) && \is_array($this->tableRestrictions[$table])) {
            foreach ($this->tableRestrictions[$table] as $column => $value) {
                $id = 'glob_id_' . $column;
                $this->setParameter($id, $value);
                $this->setValue($column, ':' . $id);
            }
        }
    }

    /**
     * @param string $table
     *
     * @return void
     */
    protected function assignUpdateRestrictions(string $table): void
    {
        if (isset($this->tableRestrictions[$table]) && \is_array($this->tableRestrictions[$table])) {
            foreach ($this->tableRestrictions[$table] as $column => $value) {
                $id = 'glob_id_' . $column;
                $this->setParameter($id, $value);
                $this->set($column, ':' . $id);
                $this->andWhere($column . ' = :' . $id);
            }
        }
    }

    /**
     * @return string
     */
    public function getSQL(): string
    {
        if (!$this->restrictionsApplied) {
            $table = $this->currentTable ?? $this->lockedFromTable;
            if ($table !== null) {
                switch ($this->queryType) {
                    case self::TYPE_INSERT:
                        $this->assignInsertRestrictions($table);
                        break;
                    case self::TYPE_UPDATE:
                        $this->assignUpdateRestrictions($table);
                        break;
                    default:
                        $this->assignWhereRestrictions($table);
                        break;
                }
            }
            $this->restrictionsApplied = true;
        }

        return parent::getSQL();
    }
}
