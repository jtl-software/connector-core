<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductWarehouseInfo Model
 * @access public
 */
class ProductWarehouseInfo extends DataModel
{
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var int
     */
    protected $_warehouseId;
    
    /**
     * @var double
     */
    protected $_stockLevel;
    
    /**
     * @var double
     */
    protected $_inflowQuantity;
    
    /**
     * @var string
     */
    protected $_inflowDate;
    
    /**
     * ProductWarehouseInfo Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_productId":
            case "_warehouseId":
            
                $this->$name = (int)$value;
                break;
        
            case "_stockLevel":
            case "_inflowQuantity":
            
                $this->$name = (double)$value;
                break;
        
            case "_inflowDate":
            
                $this->$name = (string)$value;
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