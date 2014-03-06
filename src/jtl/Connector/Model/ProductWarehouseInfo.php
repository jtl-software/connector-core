<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductWarehouseInfo Model
 * Product to warehouse info association.
 *
 * @access public
 */
class ProductWarehouseInfo extends DataModel
{
    /**
     * @var string - Reference to product
     */
    protected $_productId = '';
    
    /**
     * @var string - Reference to warehouse
     */
    protected $_warehouseId = '';
    
    /**
     * @var double - Optional product stock level in specified warehouse
     */
    protected $_stockLevel = 0;
    
    /**
     * @var double - Optional product inflow quantity for specified warehouse
     */
    protected $_inflowQuantity = 0;
    
    /**
     * @var string - Optional product inflow date for specified warehouse
     */
    protected $_inflowDate = null;
    
    /**
     * ProductWarehouseInfo Setter
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
                case "_productId":
                case "_warehouseId":
                case "_inflowDate":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_stockLevel":
                case "_inflowQuantity":
                
                    $this->$name = (double)$value;
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