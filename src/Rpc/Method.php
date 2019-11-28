<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Rpc
 */
namespace Jtl\Connector\Core\Rpc;

use Jtl\Connector\Core\Utilities\Str;

class Method
{
    /**
     * Rcp Method
     *
     * @var string
     */
    protected $rpcMethod = '';
    
    /**
     * Connector Controller
     *
     * @var string
     */
    protected $controller = '';
    
    /**
     * Connector Action
     *
     * @var string
     */
    protected $action = '';
    
    /**
     * Constructor
     *
     * @param string $rpcMethod
     * @param string $controller
     * @param string $action
     */
    public function __construct(string $rpcMethod, string $controller, string $action)
    {
        $this->rpcMethod = $rpcMethod;
        $this->controller = $controller;
        $this->action = $action;
    }
    
    /**
     * Rpc Method Getter
     *
     * @return string
     */
    public function getRpcMethod(): string
    {
        return $this->rpcMethod;
    }

    /**
     * Controller Getter
     *
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * Action Getter
     *
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * Core check
     *
     * @return boolean
     */
    public function isCore(): bool
    {
        return strpos($this->getRpcMethod(), "core.") !== false;
    }

    /**
     * @param string $rpcMethod
     * @return Method
     * @throws \Exception
     */
    public static function createFromRpcMethod(string $rpcMethod): Method
    {
        $splitted = explode('.', $rpcMethod);
        $offset = count($splitted) === 3 ? 1 : 0;
        $controller = Str::toPascalCase($splitted[0 + $offset]);
        $action = Str::toCamelCase($splitted[1 + $offset]);
        return new static($rpcMethod, $controller, $action);
    }

    /**
     * @param RequestPacket $packet
     * @return Method
     * @throws \Exception
     */
    public function createFromRequestPacket(RequestPacket $packet): Method
    {
        return static::createFromRpcMethod($packet->getMethod());
    }
}
