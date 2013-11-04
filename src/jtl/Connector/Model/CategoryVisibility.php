<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CategoryVisibility Model
 * Only specify which CustomerGroup is not permitted to view Category
 *
 * @access public
 */
class CategoryVisibility extends DataModel
{
    /**
     * @var string - Customer group that is not allowed to view $_categoryId
     */
    protected $_customerGroupId = "0";
    
    /**
     * @var string - Category id to hide from $_customerGroupId
     */
    protected $_categoryId = "0";
    
    /**
     * CategoryVisibility Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_customerGroupId":
                case "_categoryId":
                
                    $this->$name = (string)$value;
                    break;
            
            }
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