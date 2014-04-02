<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Specify productVariationValue to hide from specific customerGroup.
 *
 * @access public
 * @subpackage Product
 */
class ProductVariationValueInvisibility extends DataModel
{
    /**
     * @var string Reference to customerGroup
     */
    protected $_customerGroupId = '';             
    
    /**
     * @var string Reference to productVariationValue to hide from customerGroup
     */
    protected $_productVariationValueId = '';             
    
    /**
     * ProductVariationValueInvisibility Setter
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
                case "_productVariationValueId":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ProductVariationValueInvisibility
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (string)$customerGroupId;
        return $this;
    }
    
    /**
     * @return string Reference to customerGroup
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    /**
     * @param string $productVariationValueId Reference to productVariationValue to hide from customerGroup
     * @return \jtl\Connector\Model\ProductVariationValueInvisibility
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = (string)$productVariationValueId;
        return $this;
    }
    
    /**
     * @return string Reference to productVariationValue to hide from customerGroup
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
}