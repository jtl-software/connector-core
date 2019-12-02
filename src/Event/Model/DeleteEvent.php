<?php

namespace Jtl\Connector\Core\Event\Model;

use Jtl\Connector\Core\Event\AbstractEvent;
use Jtl\Connector\Core\Model\AbstractDataModel;

/**
 * Class DeleteEvent
 * @package Jtl\Connector\Core\Event
 */
class DeleteEvent extends AbstractEvent
{
    /**
     * @var
     */
    protected $model;

    /**
     * @var string(before|after)
     */
    protected $moment;

    /**
     * DeleteEvent constructor.
     * @param $model
     * @param $moment
     */
    public function __construct($model, $moment)
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

        return sprintf("%s.%s.delete", strtolower($modelName), $this->getMoment());
    }

}