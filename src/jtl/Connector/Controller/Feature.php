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
 * Base Features Controller
 *
 * @access public
 * @author David Spickers <david.spickers@jtl-software.de>
 */
class Feature extends CoreController
{

    /**
     * Returns what this connector is supporting.
     *
     * @param mixed $params An array of parameters to read
     */
    public function pull($params = null)
    {
//        $ret = new Action();
//        try {
//            $ret->setResult($this->getConfig()->reads($params));
//            $ret->setHandled(true);
//        } catch (\Exception $e) {
//            if (isset($e->jtl)) {
//                $ret->setHandled($e->jtl);
//            }
//            else {
//                $ret->setHandled(false);
//            }
//            $err = new Error();
//            $err->setCode($e->getCode());
//            $err->setMessage($e->getMessage());
//            $ret->setError($err);
//        }
        return $ret;
    }

    /**
     * Writes the controller configuration and returns the result.
     * 
     * @param mixed $params An array of parameters to write
     */
    public function push($params = null)
    {
        return $params;
    }

    /**
     * Delete is not needed.
     * 
     * @param mixed $params An array of parameters to write
     */
    public function delete($params = null)
    {
        return $params;
    }

}