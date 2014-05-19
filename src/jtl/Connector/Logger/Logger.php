<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector
 */

namespace jtl\Connector\Logger;

use \jtl\Core\Logger\LoggerFactory;
use \Monolog\Logger as Monolog;
use \Monolog\Handler\StreamHandler;

class Logger
{
    public static function log($message, $level = Monolog::ERROR, $channel = 'general')
    {
        if ($level == Monolog::DEBUG && getenv('APPLICATION_ENV') != 'development') {
            return null;
        }

        $log = LoggerFactory::get($channel);
        $log->pushHandler(new StreamHandler('/tmp/log.log', $level));

        return $log->log($level, $message);
    }
}