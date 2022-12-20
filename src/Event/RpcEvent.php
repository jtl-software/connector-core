<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Event;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class RpcEvent
 *
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
    protected string $controller;

    /**
     * @var string
     */
    protected string $action;

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
     * @return array<mixed>
     */
    public function getData(): array
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
