<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Application
 */
namespace jtl\Connector\Controller;

use \jtl\Core\Controller\Controller as CoreController;
use \jtl\Core\Exception\ControllerException;

/**
 * Base Config Controller
 *
 * @access public
 * @author David Spickers <david.spickers@jtl-software.de>
 */
class Config extends CoreController
{
    /**
     * Reads the controller configuration and returns it.
     *
     * @param mixed $params            
     */
    public function read($params = null)
    {
        if ($params !== null && count($params) === 1) {
            $key = $params[0];
            if (!isset($this->config->{$key})) {
                throw new ControllerException(sprintf('Can\'t find the configuration for your key "%s"', $key));
            }
        }
        else {
            return $this->config;
        }
    }
}