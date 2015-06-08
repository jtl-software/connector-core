<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Core\System
 */

namespace jtl\Connector\Core\System;

use jtl\Connector\Core\Exception\MissingRequirementException;

class Check
{
    public static function run()
    {
        // PHP
        if (!version_compare(PHP_VERSION, '5.3', '>=')) {
            throw new MissingRequirementException(sprintf('The connector needs at least PHP version 5.3, %s given', PHP_VERSION));
        }

        // Sqlite 3
        if (!extension_loaded('sqlite3') || !class_exists('Sqlite3')) {
            throw new MissingRequirementException('The connector needs the sqlite3 PHP extension');
        }
    }
}