<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */
namespace Jtl\Connector\Core\Controller;

use \Jtl\Connector\Core\Result\Action;
use \Jtl\Connector\Core\Rpc\Error;
use \Jtl\Connector\Core\Linker\IdentityLinker;

/**
 * Base Linker Controller
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.com>
 */
class Linker extends AbstractController
{
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
