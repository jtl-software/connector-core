<?php
namespace Jtl\Connector\Core\Test\Stub\Controller;

use Jtl\Connector\Core\Controller\DeleteInterface;
use Jtl\Connector\Core\Controller\PullInterface;
use Jtl\Connector\Core\Controller\PushInterface;
use Jtl\Connector\Core\Controller\StatisticInterface;
use Jtl\Connector\Core\Controller\TransactionalInterface;
use Jtl\Connector\Core\Model\AbstractDataModel;
use Jtl\Connector\Core\Model\QueryFilter;

/**
 * Class TransactionalController
 * @package Jtl\Connector\Core\Test\Stub\Controller
 */
class TransactionalControllerStub implements DeleteInterface, StatisticInterface, PullInterface, PushInterface, TransactionalInterface
{
    /**
     * @var bool
     */
    protected $commitThrowsException = false;

    /**
     * TransactionalControllerStub constructor.
     * @param bool $commitThrowsException
     */
    public function __construct(bool $commitThrowsException = false)
    {
        $this->commitThrowsException = $commitThrowsException;
    }

    /**
     * @param QueryFilter $queryFilter
     * @return int
     */
    public function statistic(QueryFilter $queryFilter): int
    {
        return 150;
    }

    /**
     * @param AbstractDataModel $model
     * @return AbstractDataModel
     */
    public function delete(AbstractDataModel $model): AbstractDataModel
    {
        return $model;
    }

    /**
     * @param QueryFilter $queryFilter
     * @return array
     */
    public function pull(QueryFilter $queryFilter): array
    {
        return [1, 2, 3];
    }

    /**
     * @param AbstractDataModel $model
     * @return AbstractDataModel
     */
    public function push(AbstractDataModel $model): AbstractDataModel
    {
        return $model;
    }

    /**
     * @return bool
     */
    public function beginTransaction(): bool
    {
        return true;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function commit(): bool
    {
        if($this->commitThrowsException){
            throw new \Exception("Transaction exception");
        }
        return true;
    }

    /**
     * @return bool
     */
    public function rollback(): bool
    {
        return true;
    }
}