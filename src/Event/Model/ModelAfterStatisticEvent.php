<?php
namespace Jtl\Connector\Core\Event\Model;

use Jtl\Connector\Core\Event\EventInterface;
use Jtl\Connector\Core\Model\Statistic;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class AfterStatisticEvent
 * @package Jtl\Connector\Core\Event
 */
class ModelAfterStatisticEvent extends Event implements EventInterface
{
    /**
     * @var Statistic
     */
    protected $model;

    /**
     * ModelAfterStatisticEvent constructor.
     * @param Statistic $model
     */
    public function __construct(Statistic $model)
    {
        $this->model = $model;
    }

    /**
     * @return Statistic
     */
    public function getModel(): Statistic
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

        return sprintf("%s.after.statistic", strtolower($modelName));
    }

}