<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Transaction
 */

namespace jtl\Connector\Transaction;

use \jtl\Core\Rpc\RequestPacket;
use \jtl\Core\Exception\TransactionException;
use \jtl\Core\Rpc\Error;
use \jtl\Core\Utilities\RpcMethod;
use \jtl\Core\ModelAdapter\MainAdapter;
use \jtl\Connector\Result\Action;
use \jtl\Connector\ModelAdapter;

/**
 * Transaction Handler Class
 */
class Handler
{
    /**
     * Checks if a Transaction exists
     * 
     * @param \jtl\Core\Rpc\RequestPacket $requestpacket
     * @return boolean
     */
    public static function exists(RequestPacket $requestpacket)
    {
        if ($requestpacket->getGlobals() !== null) {
            if ($requestpacket->getGlobals()->getTransaction() !== null) {
                if ($requestpacket->getGlobals()->getTransaction()->getId() !== null) {
                    
                    return true;
                }
            }
        }
        
        return false;
    }
    
    /**
     * 
     * @param \jtl\Core\Rpc\RequestPacket $requestpacket
     * @return \jtl\Connector\Result\Action
     */
    public static function insert(RequestPacket $requestpacket)
    {
        $action = new Action();
        $action->setHandled(true);
        try {
            if ($_SESSION !== null) {
                $method = RpcMethod::splitMethod($requestpacket->getMethod());
                $trid = $requestpacket->getGlobals()->getTransaction()->getId();
                
                if ($trid !== null && intval($trid) > 0) {
                    if (!isset($_SESSION["trans"])) {
                        $_SESSION["trans"] = array();
                    }
                    
                    $type = MainAdapter::allocate($method->getController());
                    if ($type === null) {
                        throw new TransactionException("Could not find any Adapter for Controller ({$method->getController()})");
                    }
                    
                    if (!isset($_SESSION["trans"][$type])) {
                        $_SESSION["trans"][$type] = array();
                    }
                    
                    if (isset($_SESSION["trans"][$type][$trid])) {
                        $result = $_SESSION["trans"][$type][$trid]->add($method->getController(), $requestpacket->getParams());
                        
                        $action->setResult($result);
                    }
                    else {
                        $adapter = "{$type}Adapter";
                        $class = "\\jtl\\Connector\\ModelAdapter\\{$adapter}";
                        if (class_exists($class)) {
                            $_SESSION["trans"][$type][$trid] = new $class();
                            $result = $_SESSION["trans"][$type][$trid]->add($method->getController(), $requestpacket->getParams());
                            
                            $action->setResult($result);
                        }
                        else {
                            throw new TransactionException("ModelAdapter {$type}Adapter does not exist");
                        }
                    } 
                }
                else {
                    throw new TransactionException("Transaction Id is empty");
                }
            }
            else {
                throw new TransactionException("Session does not exist");
            }
        }
        catch (\Exception $exc) {
            $error = new Error();
            $error->setCode($exc->getCode());
            $error->setMessage($exc->getMessage());
            $action->setError($error);
        }
        
        return $action;
    }
    
    /**
     * Get Transaction Adapter
     * 
     * @param string $controller
     * @param string $trid
     * @throws \jtl\Core\Exception\TransactionException
     * @return \jtl\Connector\ModelAdapter
     */
    public static function getAdapter($controller, $trid)
    {
        $type = MainAdapter::allocate($controller);
        if ($type === null) {
            throw new TransactionException("Could not find any Adapter for Controller ({$controller})");
        }
        
        if (!isset($_SESSION["trans"][$type])) {
            throw new TransactionException("Could not find any Transaction Session for Controller ({$controller}) and Type ({$type})");
        }
        
        if (!isset($_SESSION["trans"][$type][$trid])) {
            throw new TransactionException("Could not find any Transaction Session for Id ({$trid}) and Controller ({$controller}) and Type ({$type})");
        }
        
        return $_SESSION["trans"][$type][$trid];
    }
    
    /**
     * Checks if controller is a maincontroller
     * 
     * @param string $controller
     * @throws \jtl\Core\Exception\TransactionException
     * @return boolean
     */
    public static function isMain($controller)
    {
        $type = MainAdapter::allocate($controller);
        if ($type === null) {
            throw new TransactionException("Could not find any Adapter for Controller ({$controller})");
        }
        
        return ($controller == $type);
    }
}
?>