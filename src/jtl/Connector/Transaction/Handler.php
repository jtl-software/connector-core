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
use \jtl\Connector\Result\Action;

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
     * @throws \jtl\Core\Exception\TransactionException
     * @return \jtl\Connector\Result\Action
     */
    public static function insert(RequestPacket $requestpacket)
    {
        $action = new Action();
        $action->setHandled(true);
        try {
            if ($_SESSION) {
                $obj = RpcMethod::splitMethod($requestpacket->getMethod());
                $trid = $requestpacket->getGlobals()->getTransaction()->getId();
                
                if ($trid !== null && intval($trid) > 0) {
                    if (!isset($_SESSION["trans"])) {
                        $_SESSION["trans"] = array();
                    }
                    
                    if (!isset($_SESSION["trans"][$obj->controller])) {
                        $_SESSION["trans"][$obj->controller] = array();
                    }
                    
                    $_SESSION["trans"][$obj->controller][$trid] = $requestpacket->getParams();
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
}
?>