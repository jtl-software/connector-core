<?php
namespace Jtl\Connector\Core\Event\Model;

use Jtl\Connector\Core\Event\EventInterface;
use Jtl\Connector\Core\Model\AbstractDataModel;
use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\QueryFilter;

/**
 * Class AfterPullEvent
 * @package Jtl\Connector\Core\Event
 */
class ModelAfterPullEvent extends Event implements EventInterface
{
    /**
     * @var AbstractDataModel
     */
    protected $model;

    /**
     * ModelAfterPullEvent constructor.
     * @param AbstractDataModel $model
     */
    public function __construct(AbstractDataModel $model)
    {
        $this->model = $model;
    }

    /**
     * @return AbstractDataModel
     */
    public function getModel()
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

        return sprintf("%s.after.pull", strtolower($modelName));
    }

}