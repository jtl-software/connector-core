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

    /**
     * Rcp Method
     *
     * @var string
     */
    protected $rpcMethod;
    
    /**
     * Connector Controller
     *
     * @var string
     */
    protected $controller;
    
    /**
     * Connector Action
     *
     * @var string
     */
    protected $action;
    
    /**
     * Constructor
     *
     * @param string $rpcMethod
     * @param string $controller
     * @param string $action
     */
    public function __construct($rpcMethod = null, $controller = null, $action = null)
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
    public function getRpcMethod()
    {
        return $this->rpcMethod;
    }

    /**
     * Controller Getter
     *
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Action Getter
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }
    
    /**
     * Commit check
     *
     * @return boolean
     */
    public function isCommit()
    {
        return ($this->action !== null && $this->action == "commit");
    }
    
    /**
     * Core check
     *
     * @return boolean
     */
    public function isCore()
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
    public function setRpcMethod($rpcMethod)
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
    public function setController($controller)
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
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }
}
