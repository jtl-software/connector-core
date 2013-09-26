<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CategoryCustomerGroup Model
 * @access public
 */
class CategoryCustomerGroup extends DataModel
{
    /**
     * @var int
     */
    protected $_customerGroupId = 0;
    
    /**
     * @var int
     */
    protected $_categoryId = 0;
    
    /**
     * @var double
     */
    protected $_discount = 0.0;
    
    /**
     * CategoryCustomerGroup Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if ($value === null) {
            $this->$name = null;
            return;
        }
        
        switch ($name) {
            case "_customerGroupId":
            case "_categoryId":
            
                $this->$name = (int)$value;
                break;
        
            case "_discount":
            
                $this->$name = (double)$value;
                break;
        
        }
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
?>