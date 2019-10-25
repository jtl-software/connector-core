<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Controller
 */

namespace Jtl\Connector\Core\Controller;

use Jtl\Connector\Core\Exception\NotImplementedException;
use Jtl\Connector\Core\Rpc\Method;
use Jtl\Connector\Core\Model\DataModel;
use Jtl\Connector\Core\Model\QueryFilter;
use Jtl\Connector\Core\Utilities\Singleton;

/**
 * Base Controller Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
abstract class AbstractController extends Singleton implements IController
{
    protected $_method;

    /**
     * (non-PHPdoc)
     * @see \Jtl\Connector\Core\Controller\IController::push()
     */
    public function push(DataModel $model)
    {
        throw new NotImplementedException();
    }
    
    /**
     * (non-PHPdoc)
     * @see \Jtl\Connector\Core\Controller\IController::pull()
     */
    public function pull(QueryFilter $queryFilter)
    {
        throw new NotImplementedException();
    }

    /**
     * (non-PHPdoc)
     * @see \Jtl\Connector\Core\Controller\IController::delete()
     */
    public function delete(DataModel $model)
    {
        throw new NotImplementedException();
    }

    /**
     * (non-PHPdoc)
     * @see \Jtl\Connector\Core\Controller\IController::statistic()
     */
    public function statistic(QueryFilter $queryFilter)
    {
        throw new NotImplementedException();
    }
    
    /**
     * Method Setter
     *
     * @param \Jtl\Connector\Core\Rpc\Method $method
     * @return \Jtl\Connector\Core\Controller\AbstractController
     */
    public function setMethod(Method $method)
    {
        $this->_method = $method;
        return $this;
    }
    
    /**
     * Method Getter
     *
     * @return \Jtl\Connector\Core\Rpc\Method
     */
    public function getMethod()
    {
        return $this->_method;
    }
}
