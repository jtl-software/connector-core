<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Base
 */
namespace jtl\Connector\Base;

use \jtl\Core\Rpc\RequestPacket;
use \jtl\Connector\Application\IEndpointConnector;
use \jtl\Core\Utilities\Singleton;
use \jtl\Core\Utilities\RpcMethod;
use \jtl\Core\Config\Config;
use \jtl\Core\Exception\ConnectorException;
use \jtl\Core\Rpc\Method;

/**
 * Base Connector
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Connector extends Singleton implements IEndpointConnector
{
    protected $config;
    protected $method;
    protected $modelNamespace;

    /**
     * Setter connector config.
     *
     * @param \jtl\Core\Config\Config $config
     */
    public function setConfig(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Returns the config.
     *
     * @return object
     * @throws ConnectorException
     */
    public function getConfig()
    {
        if (empty($this->config)) {
            throw new ConnectorException('The connector configuration is not set!');
        }
        return $this->config;
    }
    
    /**
     * Method Setter
     *
     * @param \jtl\Core\Rpc\Method $method
     * @return \jtl\Core\Controller\Controller
     */
    public function setMethod(Method $method)
    {
        $this->method = $method;
        return $this;
    }
    
    /**
     * Method Getter
     *
     * @return \jtl\Core\Rpc\Method
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Method Setter
     *
     * @param string $method
     * @return \jtl\Core\Controller\Controller
     */
    public function setModelNamespace($modelNamespace)
    {
        if (!is_string($modelNamespace) || $modelNamespace[strlen($modelNamespace) - 1] == '\\' || $modelNamespace[0] == '\\') {
            throw new \InvalidArgumentException(sprintf('Wrong Namespace (%s) syntax. Example: jtl\Connector\Model', $modelNamespace));
        }

        $this->modelNamespace = $modelNamespace;
        return $this;
    }
    
    /**
     * Method Getter
     *
     * @return string
     */
    public function getModelNamespace()
    {
        return $this->modelNamespace;
    }
    
    /**
     * (non-PHPdoc)
     * 
     * @see \jtl\Connector\Application\IEndpointConnector::canHandle()
     */
    public function canHandle()
    {        
        $controller = RpcMethod::buildController($this->getMethod()->getController());
        
        $class = "\\jtl\\Connector\\Controller\\{$controller}";
        if (class_exists($class)) {
            $this->controller = $class::getInstance();
            $this->action = $this->getMethod()->getAction();
        
            return method_exists($this->controller, $this->action);
        }
        
        return false;
    }
    
    /**
     * (non-PHPdoc)
     * 
     * @see \jtl\Connector\Application\IEndpointConnector::handle()
     */
    public function handle(RequestPacket $requestpacket)
    {        
        $this->controller->setConfig($this->getConfig());
        $this->controller->setMethod($this->getMethod());
        
        return $this->controller->{$this->action}($requestpacket->getParams());
    }
}