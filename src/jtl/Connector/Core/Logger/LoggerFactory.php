<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Core
 */

namespace jtl\Connector\Core\Logger;

class LoggerFactory
{
    /**
     * Array of Logger channels
     */
    protected static $_logger;

    /**
     * @param string $channel The log channel
     * @return \Monolog\Logger
     */
    public static function create($channel)
    {
        if (static::$_logger === null) {
            static::$_logger = array();
        }

        if (!isset(static::$_logger[$channel])) {
            static::$_logger[$channel] = new \Monolog\Logger($channel);
        }

        return static::$_logger[$channel];
    }

    /**
     * @param string $channel The log channel
     * @return \Monolog\Logger
     */
    public static function get($channel)
    {
        if (isset(static::$_logger[$channel])) {
            return static::$_logger[$channel];
        } else {
            return static::create($channel);
        }
    }
}
