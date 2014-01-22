<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerGroup Model
 * Customer group model.
 *
 * @access public
 */
class CustomerGroup extends DataModel
{
    /**
     * @var string - Unique customerGroup id
     */
    protected $_id = '';
    
    /**
     * @var double - Optional percentual discount on all products. Negative Value means surcharge. 
     */
    protected $_discount = 0;
    
    /**
     * @var bool - Optional: Flag default customer group
     */
    protected $_isDefault = false;
    
    /**
     * @var bool - Optional: Show net prices default instead of gross prices
     */
    protected $_applyNetPrice = false;
    
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
                
                    $this->$name = (string)$value;
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
     * @param string $id
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param double $discount
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setDiscount($discount)
    {
        $this->_discount = (double)$discount;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getDiscount()
    {
        return $this->_discount;
    }
    
    /**
     * @param bool $isDefault
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setIsDefault($isDefault)
    {
        $this->_isDefault = (bool)$isDefault;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsDefault()
    {
        return $this->_isDefault;
    }
    
    /**
     * @param bool $applyNetPrice
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function setApplyNetPrice($applyNetPrice)
    {
        $this->_applyNetPrice = (bool)$applyNetPrice;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getApplyNetPrice()
    {
        return $this->_applyNetPrice;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}