<?php

namespace Jtl\Connector\Core\Event\Model;

use Jtl\Connector\Core\Model\QueryFilter;
use Jtl\Connector\Core\Event\EventInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class StatisticEvent
 * @package Jtl\Connector\Core\Event
 */
class ModelBeforeStatisticEvent extends Event implements EventInterface
{
    /**
     * @var QueryFilter
     */
    protected $model;

    /**
     * BeforeStatisticEvent constructor.
     * @param QueryFilter $model
     */
    public function __construct(QueryFilter $model)
    {
        $this->model = $model;
    }

    /**
     * @return QueryFilter
     */
    public function getModel(): QueryFilter
    {
        return $this->model;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public function getEventName(): string
    {
        $modelName = (new \ReflectionClass($this->getModel()))->getShortName();

        return sprintf("%s.before.statistic", strtolower($modelName));
    }

}