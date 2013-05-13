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
     * @param mixed $params An array of parameters to read
     */
    public function read($params = null)
    {
        $ret = new Action();
        try {
            $ret->setResult($this->getConfig()->reads($params));
            $ret->setHandled(true);
        } catch (\Exception $e) {
            $ret->setHandled($e->jtl);
            $err = new Error();
            $err->setCode($e->getCode());
            $err->setMessage($e->getMessage());
            $ret->setError($err);
        }
        return $ret;
    }

    /**
     * Writes the controller configuration and returns the result.
     * 
     * @param mixed $params An array of parameters to write
     */
    public function write($params = null)
    {
        $ret = new Action();
        try {
            $ret->setResult($this->getConfig()->writes($params));
            $ret->setHandled(true);
        } catch (\Exception $e) {
            $ret->setHandled($e->jtl);
            $err = new Error();
            $err->setCode($e->getCode());
            $err->setMessage($e->getMessage());
            $ret->setError($err);
        }
        return $ret;
    }
    

}