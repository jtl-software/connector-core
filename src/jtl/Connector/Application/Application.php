<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Application 
 */
namespace jtl\Connector\Application;

use \jtl\Core\Application\Application as CoreApplication;
use \jtl\Core\Exception\RpcException;
use \jtl\Core\Rpc\Handler;
use \jtl\Core\Rpc\RequestPacket;
use \jtl\Core\Rpc\ResponsePacket;
use \jtl\Core\Http\Response;
use \jtl\Core\Authentication\Wawi as WawiAuthentication;
use \jtl\Core\Utilities\Config\Config;
use \jtl\Core\Utilities\Config\Json as ConfigJson;
use \jtl\Connector\Result\Action;

/**
 * Application Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Application extends CoreApplication
{

    /**
     * List of connected EndpointConnectors
     *
     * @var multiple: IEndpointConnector
     */
    protected static $_connectors = array();
    

    /**
     * (non-PHPdoc)
     * 
     * @see \jtl\Core\Application\Application::run()
     */
    public function run()
    {
        // Rpc Request
        $requestpacket = new RequestPacket();
        $requestpacket->prepare();
        $requestpacket->validate();
        
        // Creates the config instance
        $config = new Config(new ConfigJson(APP_DIR . '/../config/default.json'));
        
        foreach (self::$_connectors as $endpointconnector)
        {
            if ($endpointconnector->canHandle($requestpacket->getMethod()))
            {
                $endpointconnector->setConfig($config);
                $actionresult = $endpointconnector->handle($requestpacket->getId(), $requestpacket->getMethod(), $requestpacket->getParams());
                
                if (get_class($actionresult) == "jtl\\Connector\\Result\\Action")
                {
                    if ($actionresult->isHandled())
                    {
                        $responsepacket = $this->rpcResponse($requestpacket, $actionresult);
                        Response::send($responsepacket);
                    }
                }
                else
                    throw new RpcException("Internal error", -32603);                
            }
        }
        
        // Could not be handled
        throw new RpcException("Method not found", -32601);
    }
    

    /**
     *
     * @param IEndpointConnector $endpointconnector            
     */
    public static function register(IEndpointConnector $endpointconnector)
    {
        $classname = get_class($endpointconnector);
        
        if (!isset(self::$_connectors[$classname]))
            self::$_connectors[$classname] = $endpointconnector;
    }
    
    
    /**
     * Build RPC Reponse Packet
     * 
     * @param jtl\Core\Rpc\ResponsePacket $requestpacket
     * @param jtl\Connector\Result\Action $actionresult
     * @return \jtl\Core\Rpc\ResponsePacket
     * @throws \jtl\Core\Exception\RpcException
     */
    protected function rpcResponse(RequestPacket $requestpacket, Action $actionresult)
    {
        $responsepacket = new ResponsePacket();
        $responsepacket->setId($requestpacket->getId())
        	->setJtlrpc($requestpacket->getJtlrpc())
        	->setResult($actionresult->getResult())
        	->setError($actionresult->getError());
        
        $responsepacket->validate();
        
        return $responsepacket;
    } 
}

?>