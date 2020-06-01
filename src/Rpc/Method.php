<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Rpc
 */

namespace Jtl\Connector\Core\Rpc;

use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\RpcMethod;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Exception\RpcException;
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
     * @return string
     */
    public function getRpcMethod(): string
    {
        return $this->rpcMethod;
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
        $parts = explode('.', $rpcMethod);
        $partsCount = count($parts);
        if (!in_array($partsCount, [2,3], true)) {
            $parts = ['invalid', 'invalid'];
        }
        $offset = $partsCount === 3 ? 1 : 0;
        $controller = Str::toPascalCase($parts[0 + $offset]);
        $action = Str::toCamelCase($parts[1 + $offset]);
        return new static($rpcMethod, $controller, $action);
    }

    /**
     * @param RequestPacket $packet
     * @return Method
     * @throws \Exception
     */
    public static function createFromRequestPacket(RequestPacket $packet): Method
    {
        return static::createFromRpcMethod(RpcMethod::mapMethod($packet->getMethod()));
    }
}
