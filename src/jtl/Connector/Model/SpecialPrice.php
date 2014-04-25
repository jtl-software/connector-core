<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage 
 */

namespace jtl\Connector\Model;

/**
 * special price properties to define a net price for a customerGroup.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage 
 */
class SpecialPrice extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
     */
    protected $_customerGroupId = null;
    
    /**
     * @var Identity Reference to productSpecialPrice
     */
    protected $_productSpecialPriceId = null;
    
    /**
     * @var double net price value
     */
    protected $_priceNet = 0.0;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_customerGroupId',
        '_productSpecialPriceId'
    );
    
    /**
     * SpecialPrice Setter
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
                case "_productSpecialPriceId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_priceNet":
                
                    $this->$name = (double)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\SpecialPrice
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
     * @param Identity $productSpecialPriceId Reference to productSpecialPrice
     * @return \jtl\Connector\Model\SpecialPrice
     */
    public function setProductSpecialPriceId(Identity $productSpecialPriceId)
    {
        $this->_productSpecialPriceId = $productSpecialPriceId;
        return $this;
    }
    
    /**
     * @return Identity Reference to productSpecialPrice
     */
    public function getProductSpecialPriceId()
    {
        return $this->_productSpecialPriceId;
    }
    /**
     * @param double $priceNet net price value
     * @return \jtl\Connector\Model\SpecialPrice
     */
    public function setPriceNet($priceNet)
    {
        $this->_priceNet = (double)$priceNet;
        return $this;
    }
    
    /**
     * @return double net price value
     */
    public function getPriceNet()
    {
        return $this->_priceNet;
    }
}