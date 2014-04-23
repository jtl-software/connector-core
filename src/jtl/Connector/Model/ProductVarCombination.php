<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Product to productVariationValue Allocation.
 *
 * @access public
 * @subpackage Product
 */
class ProductVarCombination extends DataModel
{
    /**
     * @var Identity Reference to product
     */
    protected $_productId = null;
    
    /**
     * @var Identity Reference to productVariation
     */
    protected $_productVariationId = null;
    
    /**
     * @var Identity Reference to productVariationValue
     */
    protected $_productVariationValueId = null;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        'productId',
        'productVariationId',
        'productVariationValueId'
    );
    
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
                
                    $this->$name = Identity::convert();
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductVarCombination
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
     * @param Identity $productVariationId Reference to productVariation
     * @return \jtl\Connector\Model\ProductVarCombination
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
     * @param Identity $productVariationValueId Reference to productVariationValue
     * @return \jtl\Connector\Model\ProductVarCombination
     */
    public function setProductVariationValueId(Identity $productVariationValueId)
    {
        $this->_productVariationValueId = $productVariationValueId;
        return $this;
    }
    
    /**
     * @return Identity Reference to productVariationValue
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
}