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
     * @var string
     */
    protected $_productId = '';
    
    /**
     * @var string
     */
    protected $_warehouseId = '';
    
    /**
     * @var double
     */
    protected $_stockLevel = 0.0;
    
    /**
     * @var double
     */
    protected $_inflowQuantity = 0.0;
    
    /**
     * @var string
     */
    protected $_inflowDate = '';
    
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