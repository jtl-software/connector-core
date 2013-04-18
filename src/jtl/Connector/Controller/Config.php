<?php

/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Application
 */

namespace jtl\Connector\Controller;

use \jtl\Core\Controller\Controller as CoreController;
use \jtl\Core\Exception\ControllerException;
use \jtl\Connector\Result\Action;
use \jtl\Core\Rpc\Error;

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
        $ret = new Action();
        $param = null;
        if ($params !== null && count($params) === 1) {
            $param = $params[0];
        }
        try {
            $ret->setResult($this->getConfig()->retrieve($param));
            $ret->setHandled(true);
        } catch (\Exception $e) {
            $err = new Error();
            $err->setCode($e->getCode());
            $err->setMessage($e->getMessage());
            $ret->setError($err);
        }
        return $ret;
    }

}