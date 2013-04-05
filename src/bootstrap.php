<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH 
 */

require_once(__DIR__ . "/../vendor/autoload.php");

use \jtl\Connector\Application\Application;
use \jtl\Core\Serializer\Json;
use jtl\Core\Rpc\ResponsePacket;
use jtl\Core\Rpc\Error;

function exception_handler(\Exception $exception) 
{
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    
    $error = new Error();
    $error->setCode($exception->getCode())
    	->setData("File: {$exception->getFile()} - Line: {$exception->getLine()}")
    	->setMessage($exception->getMessage());
    
    $response = new ResponsePacket();
    $response->setError($error)->setJsonrpc("2.0");
    
    echo Json::encode($response->getPublic(array()));
    exit();
}

set_exception_handler('exception_handler');

Application::getInstance()->run();
?>