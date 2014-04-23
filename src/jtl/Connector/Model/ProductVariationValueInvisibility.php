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
     * @var Identity Reference to customerGroup
     */
    protected $_customerGroupId = null;
    
    /**
     * @var Identity Reference to productVariationValue to hide from customerGroup
     */
    protected $_productVariationValueId = null;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        'customerGroupId',
        'productVariationValueId'
    );
    
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
                
                    $this->$name = Identity::convert($value);
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ProductVariationValueInvisibility
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
     * @param Identity $productVariationValueId Reference to productVariationValue to hide from customerGroup
     * @return \jtl\Connector\Model\ProductVariationValueInvisibility
     */
    public function setProductVariationValueId(Identity $productVariationValueId)
    {
        $this->_productVariationValueId = $productVariationValueId;
        return $this;
    }
    
    /**
     * @return Identity Reference to productVariationValue to hide from customerGroup
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
}