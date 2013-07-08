<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector
 */
namespace jtl\Connector\Logger;

use \jtl\Core\Logger\ILogger;
use \jtl\Core\Database\Sqlite3;

/**
 * Sqlite logger implementation
 *
 * @access public
 * @author Christian Spoo <christian.spoo@jtl-software.com>
 */
class Logger implements ILogger
{
    public static function getLogEntries($maxLevel = ILogger::WARNING, $since = NULL, $module = NULL)
    {
        $db = Sqlite3::getInstance();
        if (!$db->isConnected())
            $db->connect(array("location" => CONNECTOR_DIR . "db/connector.s3db"));
        
        if (is_null($since))
            $since = 0;
        
        $stmt = 'SELECT timestamp,level,module,message FROM log WHERE level <= ' . ((int)$maxLevel) . ' AND timestamp >= ' . ((int)$since);
        if (!is_null($module))
            $stmt .= ' AND module = "' . $db->escapeString($module) . '"';
        
        return $db->query($stmt);
    }

    public static function log($message, $level = ILogger::ERROR, $module = 'General')
    {
        $db = Sqlite3::getInstance();
        if (!$db->isConnected())
            $db->connect(array("location" => CONNECTOR_DIR . "db/connector.s3db"));
        
        $stmt = sprintf('INSERT INTO log (level, timestamp, module, message) VALUES ("%u", "%u", "%s", "%s")', $level, time(), $db->escapeString($module), $db->escapeString($message));
        $db->exec($stmt);
    }
    
    public static function clearLog()
    {
        $db = Sqlite3::getInstance();
        if (!$db->isConnected())
            $db->connect(array("location" => CONNECTOR_DIR . "db/connector.s3db"));
        
        $db->exec('DELETE FROM log');
        $db->exec('VACUUM');
    }
}
