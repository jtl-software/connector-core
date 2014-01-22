<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariationValue Model
 * Product variation value model. Each product defines its own variations and variation values. 
 *
 * @access public
 */
class ProductVariationValue extends DataModel
{
    /**
     * @var string - Unique productVariationValue id
     */
    protected $_id = '';
    
    /**
     * @var string - Reference to productVariation
     */
    protected $_productVariationId = '';
    
    /**
     * @var double - Optional variation extra weight
     */
    protected $_extraWeight = 0;
    
    /**
     * @var string - Optional Stock Keeping Unit
     */
    protected $_sku = '';
    
    /**
     * @var int - Optional sort number
     */
    protected $_sort = 0;
    
    /**
     * @var double - Optional stock level
     */
    protected $_stockLevel = 0.0;
    
    /**
     * ProductVariationValue Setter
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
                case "_productVariationId":
                case "_sku":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_extraWeight":
                case "_stockLevel":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $productVariationId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setProductVariationId($productVariationId)
    {
        $this->_productVariationId = (string)$productVariationId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductVariationId()
    {
        return $this->_productVariationId;
    }
    
    /**
     * @param double $extraWeight
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setExtraWeight($extraWeight)
    {
        $this->_extraWeight = (double)$extraWeight;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getExtraWeight()
    {
        return $this->_extraWeight;
    }
    
    /**
     * @param string $sku
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setSku($sku)
    {
        $this->_sku = (string)$sku;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSku()
    {
        return $this->_sku;
    }
    
    /**
     * @param int $sort
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getSort()
    {
        return $this->_sort;
    }
    
    /**
     * @param double $stockLevel
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setStockLevel($stockLevel)
    {
        $this->_stockLevel = (double)$stockLevel;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getStockLevel()
    {
        return $this->_stockLevel;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}