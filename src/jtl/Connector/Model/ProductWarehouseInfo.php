<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

/**
 * Product to warehouse info association.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class ProductWarehouseInfo extends DataModel
{
    /**
     * @var Identity Reference to product
     */
    protected $_productId = null;
    
    /**
     * @var Identity Reference to warehouse
     */
    protected $_warehouseId = null;
    
    /**
     * @var double Optional product stock level in specified warehouse
     */
    protected $_stockLevel = 0;
    
    /**
     * @var double Optional product inflow quantity for specified warehouse
     */
    protected $_inflowQuantity = 0;
    
    /**
     * @var string Optional product inflow date for specified warehouse
     */
    protected $_inflowDate = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_productId',
        '_warehouseId'
    );
    
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
                
                    $this->$name = Identity::convert($value);
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
    }
    
    /**
     * @param Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductWarehouseInfo
     */
    public function setProductId(Identity $productId)
    {
        $this->_productId = $productId;
        return $this;
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    /**
     * @param Identity $warehouseId Reference to warehouse
     * @return \jtl\Connector\Model\ProductWarehouseInfo
     */
    public function setWarehouseId(Identity $warehouseId)
    {
        $this->_warehouseId = $warehouseId;
        return $this;
    }
    
    /**
     * @return Identity Reference to warehouse
     */
    public function getWarehouseId()
    {
        return $this->_warehouseId;
    }
    /**
     * @param double $stockLevel Optional product stock level in specified warehouse
     * @return \jtl\Connector\Model\ProductWarehouseInfo
     */
    public function setStockLevel($stockLevel)
    {
        $this->_stockLevel = (double)$stockLevel;
        return $this;
    }
    
    /**
     * @return double Optional product stock level in specified warehouse
     */
    public function getStockLevel()
    {
        return $this->_stockLevel;
    }
    /**
     * @param double $inflowQuantity Optional product inflow quantity for specified warehouse
     * @return \jtl\Connector\Model\ProductWarehouseInfo
     */
    public function setInflowQuantity($inflowQuantity)
    {
        $this->_inflowQuantity = (double)$inflowQuantity;
        return $this;
    }
    
    /**
     * @return double Optional product inflow quantity for specified warehouse
     */
    public function getInflowQuantity()
    {
        return $this->_inflowQuantity;
    }
    /**
     * @param string $inflowDate Optional product inflow date for specified warehouse
     * @return \jtl\Connector\Model\ProductWarehouseInfo
     */
    public function setInflowDate($inflowDate)
    {
        $this->_inflowDate = (string)$inflowDate;
        return $this;
    }
    
    /**
     * @return string Optional product inflow date for specified warehouse
     */
    public function getInflowDate()
    {
        return $this->_inflowDate;
    }
}