<?php

namespace Jtl\Connector\Core\Event\Model;

use Jtl\Connector\Core\Event\AbstractEvent;
use Jtl\Connector\Core\Model\AbstractDataModel;

/**
 * Class AfterModelPushEvent
 * @package Jtl\Connector\Core\Event
 */
class PushEvent extends AbstractEvent
{
    /**
     * @var AbstractDataModel
     */
    protected $model;

    /**
     * @var string(before|after)
     */
    protected $moment;

    /**
     * PushEvent constructor.
     * @param AbstractDataModel $model
     * @param $moment
     */
    public function __construct(AbstractDataModel $model, $moment)
    {
        $this->model = $model;
        $this->moment = $moment;
    }

    /**
     * @return AbstractDataModel
     */
    public function getModel(): AbstractDataModel
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

        return sprintf("%s.%s.push", strtolower($modelName), $this->getMoment());
    }

}