<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Database
 */
namespace jtl\Connector\Database;

use \jtl\Connector\Core\Database\Sqlite3 as Sqlite3Core;

/**
 * Sqlite 3 Database Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
final class Sqlite3 extends Sqlite3Core
{
    /**
     * Database Singleton
     *
     * @var \jtl\Connector\Core\Database\Sqlite3
     */
    private static $_instance;
    
    /**
     * Singleton
     *
     * @return \jtl\Connector\Core\Database\Sqlite3
     */
    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }
    
        return self::$_instance;
    }

    private function __construct() { }
    private function __clone() { }

    public function check()
    {
        $names = $this->fetch("SELECT name FROM sqlite_master WHERE type='table'");

        $ready = false;
        if (is_array($names) && count($names) > 0) {
            foreach ($names as $name) {
                if ($name === 'session') {
                    $ready = true;
                    break;
                }
            }
        }

        if (!$ready) {
            $this->exec('
                CREATE TABLE [session] (
                    [sessionId] VARCHAR(255)  UNIQUE NOT NULL,
                    [sessionExpires] INTEGER  NOT NULL,
                    [sessionData] BLOB  NULL
                )
            ');

            $this->exec('
                CREATE INDEX [sessionIndex] ON [session](
                    [sessionId]  ASC,
                    [sessionExpires]  ASC
                )
            ');
        }
    }
}
