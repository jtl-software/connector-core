<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Transaction
 */

namespace jtl\Connector\Transaction;

use jtl\Core\Result\Transaction as TransactionResult;
use \jtl\Core\Rpc\RequestPacket;
use \jtl\Core\Exception\TransactionException;
use \jtl\Core\Rpc\Error;
use \jtl\Core\Utilities\RpcMethod;
use \jtl\Core\ModelContainer\MainContainer;
use \jtl\Connector\Result\Action;
use \jtl\Connector\ModelContainer;

/**
 * Transaction Handler Class
 */
final class Handler
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
                
                if ($trid !== null && strlen($trid) > 0) {
                    if (!isset($_SESSION["trans"])) {
                        $_SESSION["trans"] = array();
                    }
                    
                    $type = MainContainer::allocate($method->getController());
                    if ($type === null) {
                        throw new TransactionException("Could not find any Container for Controller ({$method->getController()})");
                    }
                    
                    if (!isset($_SESSION["trans"][$type])) {
                        $_SESSION["trans"][$type] = array();
                    }
                    
                    if (isset($_SESSION["trans"][$type][$trid])) {                        
                        $result = new TransactionResult();
                        $result->setTransactionId($trid);
                        if ($_SESSION["trans"][$type][$trid]->add($method->getController(), $requestpacket->getParams())) {
                            $action->setResult($result->getPublic());
                        }
                        else {
                            throw new TransactionException("Model is not a part of type ({$type}) or class not found");
                        }
                    }
                    else {
                        $container = "{$type}Container";
                        $class = "\\jtl\\Connector\\ModelContainer\\{$container}";
                        if (class_exists($class)) {
                            $_SESSION["trans"][$type][$trid] = new $class();
                            
                            $result = new TransactionResult();
                            $result->setTransactionId($trid);
                            
                            if ($_SESSION["trans"][$type][$trid]->add($method->getController(), $requestpacket->getParams())) {
                                $action->setResult($result->getPublic());
                            }
                            else {
                                throw new TransactionException("Model is not a part of type ({$type}) or class not found");
                            }    
                        }
                        else {
                            throw new TransactionException("ModelContainer {$type}Container does not exist");
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
     * Get Transaction Container
     * 
     * @param string $controller
     * @param string $trid
     * @throws \jtl\Core\Exception\TransactionException
     * @return \jtl\Connector\ModelContainer
     */
    public static function getContainer($controller, $trid)
    {
        $type = MainContainer::allocate($controller);
        if ($type === null) {
            throw new TransactionException("Could not find any Container for Controller ({$controller})");
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
        $type = MainContainer::allocate($controller);
        if ($type === null) {
            throw new TransactionException("Could not find any Container for Controller ({$controller})");
        }
        
        return (strtolower($controller) == strtolower($type));
    }
}
?>