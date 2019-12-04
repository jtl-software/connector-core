<?php
namespace Jtl\Connector\Core\Event\Model;

use Jtl\Connector\Core\Model\AbstractDataModel;
use Jtl\Connector\Core\Event\EventInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class AfterModelPushEvent
 * @package Jtl\Connector\Core\Event
 */
class ModelBeforePushEvent extends Event
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
}