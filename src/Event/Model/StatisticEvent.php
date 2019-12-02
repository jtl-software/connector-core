<?php

namespace Jtl\Connector\Core\Event\Model;

use Jtl\Connector\Core\Event\AbstractEvent;
use Jtl\Connector\Core\Model\AbstractDataModel;
use Jtl\Connector\Core\Model\QueryFilter;

/**
 * Class StatisticEvent
 * @package Jtl\Connector\Core\Event
 */
class StatisticEvent extends AbstractEvent
{
    /**
     * @var QueryFilter
     */
    protected $model;

    /**
     * @var string(before|after)
     */
    protected $moment;

    /**
     * StatisticEvent constructor.
     * @param QueryFilter $model
     * @param $moment
     */
    public function __construct(QueryFilter $model, $moment)
    {
        $this->model = $model;
        $this->moment = $moment;
    }

    /**
     * @return QueryFilter
     */
    public function getModel(): QueryFilter
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getMoment()
    {
        return $this->moment;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public function getEventName(): string
    {
        $modelName = (new \ReflectionClass($this->getModel()))->getShortName();

        return sprintf("%s.%s.statistic", strtolower($modelName), $this->getMoment());
    }

}