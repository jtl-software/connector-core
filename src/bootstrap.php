<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 */

require_once (__DIR__ . "/../vendor/autoload.php");

use \jtl\Connector\Application\Application;
use \jtl\Core\Rpc\ResponsePacket;
use \jtl\Core\Rpc\Error;
use \jtl\Core\Http\Response;

function exception_handler(\Exception $exception)
{
    $error = new Error();
    $error->setCode($exception->getCode())
        ->setData("Exception: " . substr(strrchr(get_class($exception), "\\"), 1) . " - File: {$exception->getFile()} - Line: {$exception->getLine()}")
        ->setMessage($exception->getMessage());
    
    $reponsepacket = new ResponsePacket();
    $reponsepacket->setError($error)
        ->setJtlrpc("2.0");
    
    Response::send($reponsepacket);
}

set_exception_handler('exception_handler');

Application::getInstance()->run();
?>