<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Database
 */

namespace jtl\Connector\Database;

use jtl\Connector\Core\Database\Sqlite3 as Sqlite3Core;

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
     * @var Sqlite3
     */
    private static $_instance;

    /**
     * Singleton
     *
     * @return Sqlite3
     */
    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    /**
     * @throws \Exception
     */
    public function check()
    {
        $schemaQueries = [
            'CREATE TABLE [session] (' . "\n" .
            '   [sessionId] VARCHAR(255)  UNIQUE NOT NULL,' . "\n" .
            '   [sessionExpires] INTEGER  NOT NULL,' . "\n" .
            '   [sessionData] BLOB  NULL' . "\n" .
            ')',

            'CREATE INDEX [sessionIndex] ON [session](' . "\n" .
            '  [sessionId]  ASC,' . "\n" .
            '  [sessionExpires]  ASC' . "\n" .
            ')'
        ];

        $checkQuery = 'SELECT name FROM sqlite_master WHERE type = \'table\' AND name = \'session\'';
        $checkResult = $this->db->querySingle($checkQuery);
        if ($checkResult === false) {
            throw new \Exception('Something went wrong while checking existence of session schema');
        } elseif ($checkResult === null) {
            foreach ($schemaQueries as $query) {
                $this->db->query($query);
            }
        }
    }
}
