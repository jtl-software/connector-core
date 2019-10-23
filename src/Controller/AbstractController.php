<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Controller
 */

namespace jtl\Connector\Controller;

use jtl\Connector\Exception\NotImplementedException;
use jtl\Connector\Rpc\Method;
use jtl\Connector\Model\DataModel;
use jtl\Connector\Model\QueryFilter;

/**
 * Base Controller Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
abstract class AbstractController implements IController
{
    protected $_method;

    /**
     * (non-PHPdoc)
     * @see \jtl\Connector\Controller\IController::push()
     */
    public function push(DataModel $model)
    {
        throw new NotImplementedException();
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Connector\Controller\IController::pull()
     */
    public function pull(QueryFilter $queryFilter)
    {
        throw new NotImplementedException();
    }

    /**
     * (non-PHPdoc)
     * @see \jtl\Connector\Controller\IController::delete()
     */
    public function delete(DataModel $model)
    {
        throw new NotImplementedException();
    }

    /**
     * (non-PHPdoc)
     * @see \jtl\Connector\Controller\IController::statistic()
     */
    public function statistic(QueryFilter $queryFilter)
    {
        throw new NotImplementedException();
    }
    
    /**
     * Method Setter
     *
     * @param \jtl\Connector\Rpc\Method $method
     * @return \jtl\Connector\Controller\AbstractController
     */
    public function setMethod(Method $method)
    {
        $this->_method = $method;
        return $this;
    }
    
    /**
     * Method Getter
     *
     * @return \jtl\Connector\Rpc\Method
     */
    public function getMethod()
    {
        return $this->_method;
    }
}
