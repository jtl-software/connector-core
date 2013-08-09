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
use \jtl\Connector\Application\Application;

/**
 * Base Config Controller
 *
 * @access public
 * @author David Spickers <david.spickers@jtl-software.de>
 */
class Connector extends CoreController
{
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Controller\IController::push()
     */
    public function push($params)
    {
        // Not yet implemented
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Controller\IController::pull()
     */
    public function pull($params)
    {
        // Not yet implemented
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Controller\IController::delete()
     */
    public function delete($params)
    {
        // Not yet implemented
    }
    
    /**
     * Initialize the connector.
     *
     * @param mixed $params Can be empty or not defined and a string.
     */
    public function init($params = null)
    {
        $ret = new Action();
        try {
            $ret->setResult($this->getConfig()->read($params));
            $ret->setHandled(true);
        } catch (\Exception $e) {
            $err = new Error();
            $err->setCode($e->getCode());
            $err->setMessage($e->getMessage());
            $ret->setError($err);
        }
        return $ret;
    }
    
    /**
     * Returns the connector features.
     * 
     * @param mixed $params Can be empty or not defined and a string.
     */
    public function features($params = null)
    {
        $ret = new Action();
        try {
            //@todo: irgend ne supertolle feature list methode
            $features = array();
            $ret->setResult($features);
            $ret->setHandled(true);
        } catch (\Exception $e) {
            $err = new Error();
            $err->setCode($e->getCode());
            $err->setMessage($e->getMessage());
            $ret->setError($err);
        }
        return $ret;
    }

    /**
     * Returns the connector auth action
     * 
     * @param mixed $params
     * @return \jtl\Connector\Result\Action
     */
    public function auth($params)
    {
        // TODO: do auth
        
        $action = new Action();        
        if (Application::$session !== null) {
            $session = new \stdClass();
            $session->sessionId = Application::$session->getSessionId();
            $session->lifetime = Application::$session->getLifetime();
            
            $action->setResult($session)
                ->setHandled(true);
        }
        else {
            $error = new Error();
            $error->setCode(789)
                ->setMessage("Could not get any Session");
            $action->setError($error);
        }
        
        return $action;
    }
}
?>