<?php
namespace Jtl\Connector\Core\Event\Model;

use Jtl\Connector\Core\Model\AbstractDataModel;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class ModelAfterActionEvent
 * @package Jtl\Connector\Core\Event\Model
 */
class ModelAfterActionEvent extends Event
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