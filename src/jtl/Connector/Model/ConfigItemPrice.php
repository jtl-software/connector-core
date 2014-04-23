<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Customer group price for config item.
 *
 * @access public
 * @subpackage GlobalData
 */
class ConfigItemPrice extends DataModel
{
    /**
     * @var Identity Reference to configItem
     */
    protected $_configItemId = null;
    
    /**
     * @var Identity Reference to customerGroup
     */
    protected $_customerGroupId = null;
    
    /**
     * @var float Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
     */
    protected $_price;
    
    /**
     * @var int Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
     */
    protected $_type = 0;
    
    /**
     * ConfigItemPrice Setter
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
                case "_configItemId":
                case "_customerGroupId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_price":
                
                    $this->$name = (float)$value;
                    break;
            
                case "_type":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $configItemId Reference to configItem
     * @return \jtl\Connector\Model\ConfigItemPrice
     */
    public function setConfigItemId(Identity $configItemId)
    {
        $this->_configItemId = $configItemId;
        return $this;
    }
    
    /**
     * @return Identity Reference to configItem
     */
    public function getConfigItemId()
    {
        return $this->_configItemId;
    }
    /**
     * @param Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ConfigItemPrice
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
     * @param float $price Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
     * @return \jtl\Connector\Model\ConfigItemPrice
     */
    public function setPrice($price)
    {
        $this->_price = (float)$price;
        return $this;
    }
    
    /**
     * @return float Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
     */
    public function getPrice()
    {
        return $this->_price;
    }
    /**
     * @param int $type Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
     * @return \jtl\Connector\Model\ConfigItemPrice
     */
    public function setType($type)
    {
        $this->_type = (int)$type;
        return $this;
    }
    
    /**
     * @return int Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
     */
    public function getType()
    {
        return $this->_type;
    }
}