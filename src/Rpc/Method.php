<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Rpc
 */
namespace Jtl\Connector\Core\Rpc;

class Method
{
    const ACTION_PULL = 'pull';
    const ACTION_PUSH = 'push';
    const ACTION_DELETE = 'delete';
    const ACTION_STATISTIC = 'statistic';
    const ACTION_AUTH = 'auth';
    const ACTION_ACK = 'ack';
    const ACTION_CLEAR = 'clear';
    const ACTION_FINISH = 'finish';
    const ACTION_IDENTIFY = 'identify';

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
    public function __construct($rpcMethod = '', $controller = '', $action = '')
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
        if ($this->getRpcMethod() !== false && strpos($this->getRpcMethod(), "core.") !== false) {
            return true;
        }
        
        return false;
    }

    /**
     * Method Setter
     *
     * @param string $rpcMethod
     * @return Method
     */
    public function setRpcMethod($rpcMethod): Method
    {
        $this->rpcMethod = $rpcMethod;
        return $this;
    }

    /**
     * Controller Setter
     *
     * @param string $controller
     * @return Method
     */
    public function setController($controller): Method
    {
        $this->controller = $controller;
        return $this;
    }

    /**
     * Action Setter
     *
     * @param string $action
     * @return Method
     */
    public function setAction($action): Method
    {
        $this->action = $action;
        return $this;
    }
}
