<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Base
 */
namespace jtl\Connector\Base;

use \jtl\Connector\Application\IEndpointConnector;
use \jtl\Core\Utilities\Singleton;
use \jtl\Core\Utilities\Config\Config;
use \jtl\Core\Exception\ConnectorException;

/**
 * Base Connector
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Connector extends Singleton implements IEndpointConnector
{
    protected $config;

    /**
     * Setter connector config.
     *
     * @param \jtl\Core\Utilities\Config\Config $config
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
     * (non-PHPdoc)
     * 
     * @see \jtl\Connector\Application\IEndpointConnector::canHandle()
     */
    public function canHandle($method)
    {        
        if (preg_match("/core.[a-z0-9]{3,}[.]{1}[a-z0-9]{3,}/", $method) === 1) {
            list ($core, $controller, $action) = explode(".", $method);
            
            $controller = ucfirst($controller);
            $class = "\\jtl\\Connector\\Controller\\{$controller}";
            if (class_exists($class)) {
                $this->_controller = $class::getInstance();
                $this->_action = $action;
            
                return method_exists($this->_controller, $action);
            }
        }
        
        return false;
    }
    
    /**
     * (non-PHPdoc)
     * 
     * @see \jtl\Connector\Application\IEndpointConnector::handle()
     */
    public function handle($id, $method, $params = null)
    {
        $this->_controller->setConfig($this->getConfig());
        return $this->_controller->{$this->_action}($params);
    }
}
?>