<?php

namespace Jtl\Connector\Core\Event;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class RpcEvent
 * @package Jtl\Connector\Core\Event
 */
class RpcEvent extends Event
{
    /**
     * @var mixed
     */
    protected $data;

    /**
     * @var string
     */
    protected $controller;

    /**
     * @var string
     */
    protected $action;

    /**
     * RpcEvent constructor.
     *
     * @param mixed  $data
     * @param string $controller
     * @param string $action
     */
    public function __construct($data, string $controller, string $action)
    {
        $this->data       = $data;
        $this->controller = $controller;
        $this->action     = $action;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     *
     * @return RpcEvent
     */
    public function setData($data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }
}
