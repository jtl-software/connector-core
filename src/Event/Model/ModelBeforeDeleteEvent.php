<?php
namespace Jtl\Connector\Core\Event\Model;

use Jtl\Connector\Core\Event\EventInterface;
use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\AbstractDataModel;

/**
 * Class DeleteEvent
 * @package Jtl\Connector\Core\Event
 */
class ModelBeforeDeleteEvent extends Event
{
    /**
     * @var AbstractDataModel
     */
    protected $model;

    /**
     * ModelBeforeDeleteEvent constructor.
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