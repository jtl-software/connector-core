<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Product variation value model. Each product defines its own variations and variation values. 
 *
 * @access public
 * @subpackage Product
 */
class ProductVariationValue extends DataModel
{
    /**
     * @var Identity Unique productVariationValue id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to productVariation
     */
    protected $_productVariationId = null;
    
    /**
     * @var double Optional variation extra weight
     */
    protected $_extraWeight = 0;
    
    /**
     * @var string Optional Stock Keeping Unit
     */
    protected $_sku = '';
    
    /**
     * @var int Optional sort number
     */
    protected $_sort = 0;
    
    /**
     * @var double Optional stock level
     */
    protected $_stockLevel = 0.0;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        'id',
        'productVariationId'
    );
    
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
                
                    $this->$name = Identity::convert();
                    break;
            
                case "_extraWeight":
                case "_stockLevel":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_sku":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique productVariationValue id
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique productVariationValue id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $productVariationId Reference to productVariation
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setProductVariationId(Identity $productVariationId)
    {
        $this->_productVariationId = $productVariationId;
        return $this;
    }
    
    /**
     * @return Identity Reference to productVariation
     */
    public function getProductVariationId()
    {
        return $this->_productVariationId;
    }
    /**
     * @param double $extraWeight Optional variation extra weight
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setExtraWeight($extraWeight)
    {
        $this->_extraWeight = (double)$extraWeight;
        return $this;
    }
    
    /**
     * @return double Optional variation extra weight
     */
    public function getExtraWeight()
    {
        return $this->_extraWeight;
    }
    /**
     * @param string $sku Optional Stock Keeping Unit
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setSku($sku)
    {
        $this->_sku = (string)$sku;
        return $this;
    }
    
    /**
     * @return string Optional Stock Keeping Unit
     */
    public function getSku()
    {
        return $this->_sku;
    }
    /**
     * @param int $sort Optional sort number
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int Optional sort number
     */
    public function getSort()
    {
        return $this->_sort;
    }
    /**
     * @param double $stockLevel Optional stock level
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setStockLevel($stockLevel)
    {
        $this->_stockLevel = (double)$stockLevel;
        return $this;
    }
    
    /**
     * @return double Optional stock level
     */
    public function getStockLevel()
    {
        return $this->_stockLevel;
    }
}