<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Core\Controller
 */

namespace jtl\Connector\Core\Controller;

use \jtl\Connector\Core\Config\Config;
use \jtl\Connector\Core\Exception\ControllerException;

abstract class ControllerHelper
{
    protected static $_config;
    
    /**
     * Setter controller config.
     *
     * @param \jtl\Connector\Core\Config\Config $config
     */
    public static function setConfig(Config $config)
    {
        self::$_config = $config;
    }
    
    /**
     * Returns the config.
     *
     * @return object
     * @throws ControllerException
     */
    public function getConfig()
    {
        if (empty(self::$_config)) {
            throw new ControllerException('The controller configuration is not set!');
        }
        
        return self::$_config;
    }
}