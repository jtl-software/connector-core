<?php
namespace Jtl\Connector\Core\Event\Rpc;

use Jtl\Connector\Core\Event\EventInterface;
use Symfony\Contracts\EventDispatcher\Event;

class RpcEvent extends Event implements EventInterface
{
    protected $data;
    protected $controller;
    protected $action;
    protected $moment;

    public function __construct(&$data, $controller, $action, $moment)
    {
        $this->data = $data;
        $this->controller = $controller;
        $this->action = $action;
        $this->moment = $moment;
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

    public function getMoment()
    {
        return $this->moment;
    }

    public function getEventName(): string
    {
        return sprintf('rpc.%s', $this->getMoment());
    }
}
