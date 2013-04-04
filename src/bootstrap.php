<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH 
 */

require_once(__DIR__ . "/../vendor/autoload.php");

use \jtl\Connector\Application\Application as MainApplication;

MainApplication::getInstance()->run();
?>