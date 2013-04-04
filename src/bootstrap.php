<?php
require_once __DIR__ . '/../vendor/autoload.php';
define('APP_DIR', __DIR__);

use \jtl\Connector\Application\Application as MainApplication;

MainApplication::getInstance()->run();
?>