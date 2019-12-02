<?php
namespace Jtl\Connector\Core\Event\Model;

use Jtl\Connector\Core\Event\EventInterface;
use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\QueryFilter;

/**
 * Class PullEvent
 * @package Jtl\Connector\Core\Event
 */
class ModelBeforePullEvent extends Event implements EventInterface
{
    /**
     * @var QueryFilter
     */
    protected $model;

    /**
     * BeforePullEvent constructor.
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

        return sprintf("%s.before.pull", strtolower($modelName));
    }

}