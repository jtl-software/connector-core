<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVarCombination Model
 * Product to productVariationValue Allocation.
 *
 * @access public
 */
class ProductVarCombination extends DataModel
{
    /**
     * @var string - Reference to product
     */
    protected $_productId = '';
    
    /**
     * @var string - Reference to productVariation
     */
    protected $_productVariationId = '';
    
    /**
     * @var string - Reference to productVariationValue
     */
    protected $_productVariationValueId = '';
    
    /**
     * ProductVarCombination Setter
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
                case "_productVariationId":
                case "_productVariationValueId":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $productId
     * @return \jtl\Connector\Model\ProductVarCombination
     */
    public function setProductId($productId)
    {
        $this->_productId = (string)$productId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    
    /**
     * @param string $productVariationId
     * @return \jtl\Connector\Model\ProductVarCombination
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
     * @param string $productVariationValueId
     * @return \jtl\Connector\Model\ProductVarCombination
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = (string)$productVariationValueId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}