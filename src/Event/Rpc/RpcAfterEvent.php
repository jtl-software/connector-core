<?php
namespace Jtl\Connector\Core\Event\Rpc;

use Jtl\Connector\Core\Event\AbstractEvent;


class RpcAfterEvent extends AbstractEvent
{
    const EVENT_NAME = 'rpc.after';

    protected $data;
    protected $controller;
    protected $action;

    public function __construct(&$data, $controller, $action)
    {
        $this->data = $data;
        $this->controller = $controller;
        $this->action = $action;
    }

    public function getData()
    {
        return $this->data;
    }
    
    public function getController()
    {
        return $this->controller;
    }
    
    public function getAction()
    {
        return $this->action;
    }

    public function getEventName(): string
    {
        return self::EVENT_NAME;
    }
}
