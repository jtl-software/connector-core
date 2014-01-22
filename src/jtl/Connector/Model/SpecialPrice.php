<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * SpecialPrice Model
 * special price properties to define a net price for a customerGroup.
 *
 * @access public
 */
class SpecialPrice extends DataModel
{
    /**
     * @var string - Reference to customerGroup
     */
    protected $_customerGroupId = '';
    
    /**
     * @var string - Reference to productSpecialPrice
     */
    protected $_productSpecialPriceId = '';
    
    /**
     * @var double - net price value
     */
    protected $_priceNet = 0.0;
    
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
                
                    $this->$name = (string)$value;
                    break;
            
                case "_priceNet":
                
                    $this->$name = (double)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $customerGroupId
     * @return \jtl\Connector\Model\SpecialPrice
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (string)$customerGroupId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    
    /**
     * @param string $productSpecialPriceId
     * @return \jtl\Connector\Model\SpecialPrice
     */
    public function setProductSpecialPriceId($productSpecialPriceId)
    {
        $this->_productSpecialPriceId = (string)$productSpecialPriceId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductSpecialPriceId()
    {
        return $this->_productSpecialPriceId;
    }
    
    /**
     * @param double $priceNet
     * @return \jtl\Connector\Model\SpecialPrice
     */
    public function setPriceNet($priceNet)
    {
        $this->_priceNet = (double)$priceNet;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getPriceNet()
    {
        return $this->_priceNet;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}