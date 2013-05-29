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
    protected $_config;
    protected $_method;

    /**
     * Setter connector config.
     *
     * @param \jtl\Core\Config\Config $config
     */
    public function setConfig(Config $config)
    {
        $this->_config = $config;
    }

    /**
     * Returns the config.
     *
     * @return object
     * @throws ConnectorException
     */
    public function getConfig()
    {
        if (empty($this->_config)) {
            throw new ConnectorException('The connector configuration is not set!');
        }
        return $this->_config;
    }
    
    /**
     * Method Setter
     *
     * @param \jtl\Core\Rpc\Method $method
     * @return \jtl\Core\Controller\Controller
     */
    public function setMethod(Method $method)
    {
        $this->_method = $method;
        return $this;
    }
    
    /**
     * Method Getter
     *
     * @return \jtl\Core\Rpc\Method
     */
    public function getMethod()
    {
        return $this->_method;
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
            $this->_controller = $class::getInstance();
            $this->_action = $this->getMethod()->getAction();
        
            return method_exists($this->_controller, $this->_action);
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
        $this->_controller->setConfig($this->getConfig());
        $this->_controller->setMethod($this->getMethod());
        
        return $this->_controller->{$this->_action}($requestpacket->getParams());
    }
}
?>