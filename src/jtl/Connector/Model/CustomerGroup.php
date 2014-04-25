<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

/**
 * Customer group model.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class CustomerGroup extends DataModel
{
    /**
     * @var Identity Unique customerGroup id
     */
    protected $_id = null;
    
    /**
     * @var double Optional percentual discount on all products. Negative Value means surcharge. 
     */
    protected $_discount = 0;
    
    /**
     * @var bool Optional: Flag default customer group
     */
    protected $_isDefault = false;
    
    /**
     * @var bool Optional: Show net prices default instead of gross prices
     */
    protected $_applyNetPrice = false;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id'
    );
    
    /**
     * CustomerGroup Setter
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
                case "_id":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_discount":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_isDefault":
                case "_applyNetPrice":
                
                    $this->$name = (bool)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique customerGroup id
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique customerGroup id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param double $discount Optional percentual discount on all products. Negative Value means surcharge. 
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setDiscount($discount)
    {
        $this->_discount = (double)$discount;
        return $this;
    }
    
    /**
     * @return double Optional percentual discount on all products. Negative Value means surcharge. 
     */
    public function getDiscount()
    {
        return $this->_discount;
    }
    /**
     * @param bool $isDefault Optional: Flag default customer group
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setIsDefault($isDefault)
    {
        $this->_isDefault = (bool)$isDefault;
        return $this;
    }
    
    /**
     * @return bool Optional: Flag default customer group
     */
    public function getIsDefault()
    {
        return $this->_isDefault;
    }
    /**
     * @param bool $applyNetPrice Optional: Show net prices default instead of gross prices
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setApplyNetPrice($applyNetPrice)
    {
        $this->_applyNetPrice = (bool)$applyNetPrice;
        return $this;
    }
    
    /**
     * @return bool Optional: Show net prices default instead of gross prices
     */
    public function getApplyNetPrice()
    {
        return $this->_applyNetPrice;
    }
}