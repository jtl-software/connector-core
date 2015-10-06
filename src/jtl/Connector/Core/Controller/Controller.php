<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Core\Controller
 */

namespace jtl\Connector\Core\Controller;

use \jtl\Connector\Core\Utilities\Singleton;
use \jtl\Connector\Core\Config\Config;
use \jtl\Connector\Core\Exception\ControllerException;
use \jtl\Connector\Core\Exception\NotImplementedException;
use \jtl\Connector\Core\Rpc\Method;
use \jtl\Connector\Core\Model\DataModel;
use \jtl\Connector\Core\Model\QueryFilter;

/**
 * Base Controller Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
abstract class Controller extends Singleton implements IController
{
    protected $_config;
    protected $_method;

    /**
     * (non-PHPdoc)
     * @see \jtl\Connector\Core\Controller\IController::push()
     */
    public function push(DataModel $model)
    {
        throw new NotImplementedException();
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Connector\Core\Controller\IController::pull()
     */
    public function pull(QueryFilter $queryFilter)
    {
        throw new NotImplementedException();
    }

    /**
     * (non-PHPdoc)
     * @see \jtl\Connector\Core\Controller\IController::delete()
     */
    public function delete(DataModel $model)
    {
        throw new NotImplementedException();
    }

    /**
     * (non-PHPdoc)
     * @see \jtl\Connector\Core\Controller\IController::statistic()
     */
    public function statistic(QueryFilter $queryFilter)
    {
        throw new NotImplementedException();
    }

    /**
     * Setter controller config.
     *
     * @param \jtl\Connector\Core\Config\Config $config
     */
    public function setConfig(Config $config)
    {
        $this->_config = $config;
        return $this;
    }

    /**
     * Returns the config.
     *
     * @return object
     * @throws ControllerException
     */
    public function getConfig()
    {
        if (empty($this->_config)) {
            throw new ControllerException('The controller configuration is not set!');
        }
        return $this->_config;
    }
    
    /**
     * Method Setter
     *
     * @param \jtl\Connector\Core\Rpc\Method $method
     * @return \jtl\Connector\Core\Controller\Controller
     */
    public function setMethod(Method $method)
    {
        $this->_method = $method;
        return $this;
    }
    
    /**
     * Method Getter
     *
     * @return \jtl\Connector\Core\Rpc\Method
     */
    public function getMethod()
    {
        return $this->_method;
    }
}
