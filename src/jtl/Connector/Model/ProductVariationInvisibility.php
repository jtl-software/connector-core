<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Specify productVariation to hide from customerGroup.
 *
 * @access public
 * @subpackage Product
 */
class ProductVariationInvisibility extends DataModel
{
    /**
     * @var string Reference to customerGroup
     */
    protected $_customerGroupId = '';             
    
    /**
     * @var string Reference to productVariation
     */
    protected $_productVariationId = '';             
    
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
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ProductVariationInvisibility
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
     * @param string $productVariationId Reference to productVariation
     * @return \jtl\Connector\Model\ProductVariationInvisibility
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
}