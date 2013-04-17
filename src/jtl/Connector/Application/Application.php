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

    //Creates the config instance
    $config = new Config(new ConfigJson(APP_DIR . '/../config/default.json'));

    foreach (self::$_connectors as $endpointconnector) {
      if ($endpointconnector->canHandle($requestpacket->getMethod())) {
        $endpointconnector->setConfig($config);
        $responsepacket = $endpointconnector->handle($requestpacket->getId(), $requestpacket->getMethod(), $requestpacket->getParams());

        if (get_class($responsepacket) == "jtl\\Core\\Rpc\\ResponsePacket") {
          $responsepacket->validate();
          Response::send($responsepacket);
        }
        else
          throw new RpcException("Internal error", -32603);
        break;
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

}

?>