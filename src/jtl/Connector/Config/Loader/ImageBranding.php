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
    //Connector
    const GROUP_ALL = 0;
    const GROUP_PRODUCT = 'product';
    const GROUP_CATEGORY = 'category';
    const GROUP_PRODUCT_VARIATION_VALUE = 'productVariationValue';
    const GROUP_SPECIFIC = 'specific';
    const GROUP_SPECIFIC_VALUE = 'specificValue';
    const GROUP_MANUFACTURER = 'manufacturer';
    
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
     * 
     * @param \jtl\Core\Database\Mysql $mysql
     */
    public function __construct(Mysql $mysql)
    {
        $this->db = $mysql;
    }
    
}