<?php
namespace Jtl\Connector\Core\Event\Rpc;

use Jtl\Connector\Core\Event\EventInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class RpcEvent
 * @package Jtl\Connector\Core\Event\Rpc
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
     * @var string
     */
    protected $moment;

    /**
     * RpcEvent constructor.
     * @param array $data
     * @param string $controller
     * @param string $action
     * @param string $moment
     */
    public function __construct(array &$data, string $controller, string $action, string $moment)
    {
        $this->data = $data;
        $this->controller = $controller;
        $this->action = $action;
        $this->moment = $moment;
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

    /**
     * @return string
     */
    public function getMoment(): string
    {
        return $this->moment;
    }
}
