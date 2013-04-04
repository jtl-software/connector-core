<?php
require_once __DIR__ . '/../vendor/autoload.php';

define('APP_DIR', __DIR__);

\jtl\Connector\Application::getInstance()->run();
?>