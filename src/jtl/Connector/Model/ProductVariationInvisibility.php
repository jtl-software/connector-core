<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

/**
 * Specify productVariation to hide from customerGroup.
 *
 * @access public
 * @subpackage Product
 */
class ProductVariationInvisibility extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
     */
    protected $_customerGroupId = null;
    
    /**
     * @var Identity Reference to productVariation
     */
    protected $_productVariationId = null;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_customerGroupId',
        '_productVariationId'
    );
    
    /**
     * ProductVariationInvisibility Setter
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
                case "_customerGroupId":
                case "_productVariationId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ProductVariationInvisibility
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        $this->_customerGroupId = $customerGroupId;
        return $this;
    }
    
    /**
     * @return Identity Reference to customerGroup
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    /**
     * @param Identity $productVariationId Reference to productVariation
     * @return \jtl\Connector\Model\ProductVariationInvisibility
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
}