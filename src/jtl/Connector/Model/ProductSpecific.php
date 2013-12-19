<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductSpecific Model
 * ProductSpecific model
Product specifics are used to assign characteristic product attributes like color or  size... When different products have common specifics, products are similar. 
 *
 * @access public
 */
class ProductSpecific extends DataModel
{
    /**
     * @var string - Unique productSpecific id
     */
    protected $_id = "0";
    
    /**
     * @var string - Reference to specificValue
     */
    protected $_specificValueId = "0";
    
    /**
     * @var string - Reference to product
     */
    protected $_productId = "0";
    
    /**
     * ProductSpecific Setter
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
                case "_id":
                case "_specificValueId":
                case "_productId":
                
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