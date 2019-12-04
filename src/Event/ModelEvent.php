<?php
namespace Jtl\Connector\Core\Event;

use Jtl\Connector\Core\Model\AbstractDataModel;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class ModelAfterActionEvent
 * @package Jtl\Connector\Core\Event\Model
 */
class ModelEvent extends Event
{
    /**
     * @var AbstractDataModel
     */
    protected $model;

    /**
     * ModelAfterActionEvent constructor.
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