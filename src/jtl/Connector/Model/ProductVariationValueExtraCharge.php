<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

/**
 * Extra charge for productVariationValue per customerGroup.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class ProductVariationValueExtraCharge extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
     */
    protected $_customerGroupId = null;
    
    /**
     * @var Identity Reference to productVariationValue
     */
    protected $_productVariationValueId = null;
    
    /**
     * @var double Extra charge (net)
     */
    protected $_extraChargeNet = 0.0;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_customerGroupId',
        '_productVariationValueId'
    );
    
    /**
     * ProductVariationValueExtraCharge Setter
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
            
                case "_extraChargeNet":
                
                    $this->$name = (double)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
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
     * @param Identity $productVariationValueId Reference to productVariationValue
     * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
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
    /**
     * @param double $extraChargeNet Extra charge (net)
     * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
     */
    public function setExtraChargeNet($extraChargeNet)
    {
        $this->_extraChargeNet = (double)$extraChargeNet;
        return $this;
    }
    
    /**
     * @return double Extra charge (net)
     */
    public function getExtraChargeNet()
    {
        return $this->_extraChargeNet;
    }
}