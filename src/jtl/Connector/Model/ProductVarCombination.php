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
     * @var string Reference to product
     */
    protected $_productId = '';
    
    /**
     * @var string Reference to productVariation
     */
    protected $_productVariationId = '';
    
    /**
     * @var string Reference to productVariationValue
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
     * @param string $productId Reference to product
     * @return \jtl\Connector\Model\ProductVarCombination
     */
    public function setProductId($productId)
    {
        $this->_productId = (string)$productId;
        return $this;
    }
    
    /**
     * @return string Reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    /**
     * @param string $productVariationId Reference to productVariation
     * @return \jtl\Connector\Model\ProductVarCombination
     */
    public function setProductVariationId($productVariationId)
    {
        $this->_productVariationId = (string)$productVariationId;
        return $this;
    }
    
    /**
     * @return string Reference to productVariation
     */
    public function getProductVariationId()
    {
        return $this->_productVariationId;
    }
    /**
     * @param string $productVariationValueId Reference to productVariationValue
     * @return \jtl\Connector\Model\ProductVarCombination
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = (string)$productVariationValueId;
        return $this;
    }
    
    /**
     * @return string Reference to productVariationValue
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
}