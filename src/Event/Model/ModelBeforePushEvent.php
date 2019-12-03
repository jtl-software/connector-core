<?php
namespace Jtl\Connector\Core\Event\Model;

use Jtl\Connector\Core\Model\AbstractDataModel;
use Jtl\Connector\Core\Event\EventInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class AfterModelPushEvent
 * @package Jtl\Connector\Core\Event
 */
class ModelBeforePushEvent extends Event implements EventInterface
{
    /**
     * @var AbstractDataModel
     */
    protected $model;

    /**
     * BeforePushEvent constructor.
     * @param AbstractDataModel $model
     */
    public function __construct(AbstractDataModel $model)
    {
        $this->model = $model;
    }

    /**
     * @return AbstractDataModel
     */
    public function getModel(): AbstractDataModel
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

        return sprintf("%s.before.push", strtolower($modelName));
    }

}