<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core
 */
namespace Jtl\Connector\Core\Logger;

/**
 * Abstract logger interface
 *
 * @access public
 * @author Christian Spoo <christian.spoo@jtl-software.com>
 */
interface LoggerInterface
{
    const DEBUG = 3;
    const INFO = 2;
    const WARNING = 1;
    const ERROR = 0;
    
    public static function log($message, $level = LoggerInterface::ERROR, $module = 'General');
    public static function getLogEntries($maxLevel = LoggerInterface::WARNING, $since = null, $module = null);
    public static function clearLog();
}
