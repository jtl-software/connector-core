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
     * @see \jtl\Core\Application\Application::run()
     */
	public function run()
	{
	    // Rpc Request	    
		$requestpacket = new RequestPacket();
		$requestpacket->prepare();
		$requestpacket->validate();
		
		foreach (self::$_instances as $endpointconnector)
		{
			if ($endpointconnector->handle($requestpacket->getMethod(), $requestpacket->getParams()))
			    break;
		}
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
}
?>