<?php 
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Shop3
 */

namespace jtl\Connector\Config\Loader;

use jtl\Core\Exception\ConfigException;
use jtl\Core\Config\Loader\Base as BaseLoader;
use \jtl\Core\Database\Mysql;

/**
 * Email Config class.
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
abstract class Email extends BaseLoader
{
    /**
     * @var jtl\Core\Database\Mysql
     */
    protected $db;
    
    /**
     * Constructor.
     *
     * This loader needs database access.
     */
    public function __construct()
    {
        $this->checkDb();
    }
    
    /**
     * Checks if the database connection is empty.
     *
     * @throws ConfigException
     */
    public function checkDb()
    {
        $this->db = Mysql::getInstance();
        if (empty($this->db)) {
            throw new ConfigException('Unable to retrieve database instance', 100);
        }
    }
}
?>