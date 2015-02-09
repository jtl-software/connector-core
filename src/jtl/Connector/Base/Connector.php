<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Base
 */
namespace jtl\Connector\Base;

use \jtl\Connector\Core\Rpc\RequestPacket;
use \jtl\Connector\Application\IEndpointConnector;
use \jtl\Connector\Core\Utilities\Singleton;
use \jtl\Connector\Core\Utilities\RpcMethod;
use \jtl\Connector\Core\Config\Config;
use \jtl\Connector\Core\Exception\ConnectorException;
use \jtl\Connector\Core\Rpc\Method;
use \jtl\Connector\Mapper\IPrimaryKeyMapper;

/**
 * Base Connector
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Connector extends Singleton implements IEndpointConnector
{
    protected $keyMapper;
    protected $config;
    protected $method;
    protected $modelNamespace = 'jtl\Connector\Model';

    public function initialize()
    {
        
    }

    /**
     * Setter primary key mapper
     *
     * @param \jtl\Connector\Mapper\IPrimaryKeyMapper $mapper
     * @return \jtl\Connector\Base\Connector
     */
    public function setPrimaryKeyMapper(IPrimaryKeyMapper $mapper)
    {
        $this->keyMapper = $mapper;
        return $this;
    }

    /**
     * Returns primary key mapper
     *
     * @return \jtl\Connector\Mapper\IPrimaryKeyMapper
     */
    public function getPrimaryKeyMapper()
    {
        return $this->keyMapper;
    }

    /**
     * Setter connector config.
     *
     * @param \jtl\Connector\Core\Config\Config $config
     * @return \jtl\Connector\Base\Connector
     */
    public function setConfig(Config $config)
    {
        $this->config = $config;
        return $this;
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
     * @param \jtl\Connector\Core\Rpc\Method $method
     * @return \jtl\Connector\Core\Controller\Controller
     */
    public function setMethod(Method $method)
    {
        $this->method = $method;
        return $this;
    }
    
    /**
     * Method Getter
     *
     * @return \jtl\Connector\Core\Rpc\Method
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Method Setter
     *
     * @param string $method
     * @return \jtl\Connector\Core\Controller\Controller
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
