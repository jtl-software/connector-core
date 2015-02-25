<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Application
 */

namespace jtl\Connector\Controller;

use \jtl\Connector\Core\Controller\Controller as CoreController;
use \jtl\Connector\Result\Action;
use \jtl\Connector\Core\Rpc\Error;
use \jtl\Connector\Linker\IdentityLinker;
use \jtl\Connector\Core\Model\DataModel;
use \jtl\Connector\Core\Model\QueryFilter;

/**
 * Base Linker Controller
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.com>
 */
class Linker extends CoreController
{
    /**
     * (non-PHPdoc)
     * @see \jtl\Connector\Core\Controller\IController::push()
     */
    public function push(DataModel $model)
    {
        // Not yet implemented
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Connector\Core\Controller\IController::pull()
     */
    public function pull(QueryFilter $queryFilter)
    {
        // Not yet implemented
    }

    /**
     * (non-PHPdoc)
     * @see \jtl\Connector\Core\Controller\IController::statistic()
     */
    public function statistic(QueryFilter $queryFilter)
    {
        // Not yet implemented
    }

    public function clear()
    {
        $action = new Action();
        $action->setHandled(true);

        try {
            $identityLinker = IdentityLinker::getInstance();

            $action->setResult($identityLinker->clear());
        } catch (\Exception $e) {
            $err = new Error();
            $err->setCode($e->getCode());
            $err->setMessage($e->getMessage());
            $action->setError($err);
        }

        return $action;
    }
}
