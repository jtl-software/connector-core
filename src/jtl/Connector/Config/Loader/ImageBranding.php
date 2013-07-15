<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Shop3
 */

namespace jtl\Connector\Config\Loader;

use jtl\Core\Exception\ConfigException;
use jtl\Core\Config\Loader\Base as BaseLoader;

/**
 * Shop3 Imagebranding class.
 *
 * @access public
 * @author David Spickers <david.spickers@jtl-software.de>
 */
abstract class ImageBranding extends BaseLoader
{    
    const GROUP_ALL = 0;
    
    /**
     * @var jtl\Core\Database\Mysql
     */
    protected $db;
    
    /**
     * @var array
     */
    protected $_brandinggroups = array();

    /**
     * @var array
     */
    protected $_brandingsettings = array();
    
    /**
     * Constructor.
     * 
     * This loader needs database access.
     */
    public function __construct()
    {
        $this->db = Mysql::getInstance();
    }
    
}