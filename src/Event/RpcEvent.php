<?php
namespace Jtl\Connector\Core\Event;

use Jtl\Connector\Core\Rpc\Packet;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class RpcEvent
 * @package Jtl\Connector\Core\Event
 */
class RpcEvent extends Event
{
    /**
     * @var Packet
     */
    protected $packet;

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
     * @param Packet $packet
     * @param string $controller
     * @param string $action
     */
    public function __construct(Packet $packet, string $controller, string $action)
    {
        $this->packet = $packet;
        $this->controller = $controller;
        $this->action = $action;
    }

    /**
     * @return Packet
     */
    public function getPacket(): Packet
    {
        return $this->packet;
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
