<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Database
 */
namespace jtl\Connector\Database;

use \jtl\Core\Database\Sqlite3 as Sqlite3Core;

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
     * @var \jtl\Core\Database\Sqlite3
     */
    private static $_instance;
    
    /**
     * Singleton
     *
     * @return \jtl\Core\Database\Sqlite3
     */
    public static function getInstance()
    {
        if (self::$_instance === null)
            self::$_instance = new self;
    
        return self::$_instance;
    }

    private function __construct() { }
    private function __clone() { }
}