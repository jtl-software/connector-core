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
     * @var array
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
     * @param array $data
     * @param string $controller
     * @param string $action
     * @param string $moment
     */
    public function __construct(array &$data, string $controller, string $action)
    {
        $this->data = $data;
        $this->controller = $controller;
        $this->action = $action;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
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
