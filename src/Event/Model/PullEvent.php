<?php

namespace Jtl\Connector\Core\Event\Model;

use Jtl\Connector\Core\Event\AbstractEvent;
use Jtl\Connector\Core\Model\AbstractDataModel;
use Jtl\Connector\Core\Model\QueryFilter;
use MongoDB\Driver\Query;

/**
 * Class PullEvent
 * @package Jtl\Connector\Core\Event
 */
class PullEvent extends AbstractEvent
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
     * PullEvent constructor.
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

        return sprintf("%s.%s.pull", strtolower($modelName), $this->getMoment());
    }

}