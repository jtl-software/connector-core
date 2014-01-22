<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ConfigItem Model
 * A config Item that is displayed in a config Group. Config item can reference to a specific productId to inherit price, name and description. 
 *
 * @access public
 */
class ConfigItem extends DataModel
{
    /**
     * @var string - Unique configItem id
     */
    protected $_id = '';
    
    /**
     * @var string - Reference to configGroup
     */
    protected $_configGroupId = '';
    
    /**
     * @var string - Optional reference to product
     */
    protected $_productId = '';
    
    /**
     * @var int - Config item type. 0: Product, 1: Special
     */
    protected $_type = 0;
    
    /**
     * @var bool - Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     */
    protected $_isPreSelected = false;
    
    /**
     * @var bool - Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
     */
    protected $_isRecommended = false;
    
    /**
     * @var bool - Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
     */
    protected $_inheritProductName = false;
    
    /**
     * @var bool - Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
     */
    protected $_inheritProductPrice = false;
    
    /**
     * @var bool - Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     */
    protected $_showDiscount = True;
    
    /**
     * @var bool - Optional: Show surcharge compared to productId price.
     */
    protected $_showSurcharge = False;
    
    /**
     * @var bool - Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     */
    protected $_ignoreMultiplier = False;
    
    /**
     * @var double - Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
     */
    protected $_minQuantity = 0;
    
    /**
     * @var double - Maximum allowed quantity. Default 0 for no maximum limit. 
     */
    protected $_maxQuantity = 0;
    
    /**
     * @var double - Optional initial / predefined quantity. Default is one (1) quantity piece. 
     */
    protected $_initialQuantity = 1;
    
    /**
     * @var int - Optional sort order number
     */
    protected $_sort = 0;
    
    /**
     * @var double - Value added tax
     */
    protected $_vat = 0.0;
    
    /**
     * ConfigItem Setter
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
                case "_configGroupId":
                case "_productId":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_type":
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
                case "_isPreSelected":
                case "_isRecommended":
                case "_inheritProductName":
                case "_inheritProductPrice":
                case "_showDiscount":
                case "_showSurcharge":
                case "_ignoreMultiplier":
                
                    $this->$name = (bool)$value;
                    break;
            
                case "_minQuantity":
                case "_maxQuantity":
                case "_initialQuantity":
                case "_vat":
                
                    $this->$name = (double)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id
     * @return \jtl\Connector\Model\ConfigItem
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
     * @param string $configGroupId
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setConfigGroupId($configGroupId)
    {
        $this->_configGroupId = (string)$configGroupId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getConfigGroupId()
    {
        return $this->_configGroupId;
    }
    
    /**
     * @param string $productId
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setProductId($productId)
    {
        $this->_productId = (string)$productId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    
    /**
     * @param int $type
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setType($type)
    {
        $this->_type = (int)$type;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getType()
    {
        return $this->_type;
    }
    
    /**
     * @param bool $isPreSelected
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setIsPreSelected($isPreSelected)
    {
        $this->_isPreSelected = (bool)$isPreSelected;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsPreSelected()
    {
        return $this->_isPreSelected;
    }
    
    /**
     * @param bool $isRecommended
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setIsRecommended($isRecommended)
    {
        $this->_isRecommended = (bool)$isRecommended;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsRecommended()
    {
        return $this->_isRecommended;
    }
    
    /**
     * @param bool $inheritProductName
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setInheritProductName($inheritProductName)
    {
        $this->_inheritProductName = (bool)$inheritProductName;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getInheritProductName()
    {
        return $this->_inheritProductName;
    }
    
    /**
     * @param bool $inheritProductPrice
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setInheritProductPrice($inheritProductPrice)
    {
        $this->_inheritProductPrice = (bool)$inheritProductPrice;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getInheritProductPrice()
    {
        return $this->_inheritProductPrice;
    }
    
    /**
     * @param bool $showDiscount
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setShowDiscount($showDiscount)
    {
        $this->_showDiscount = (bool)$showDiscount;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getShowDiscount()
    {
        return $this->_showDiscount;
    }
    
    /**
     * @param bool $showSurcharge
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setShowSurcharge($showSurcharge)
    {
        $this->_showSurcharge = (bool)$showSurcharge;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getShowSurcharge()
    {
        return $this->_showSurcharge;
    }
    
    /**
     * @param bool $ignoreMultiplier
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setIgnoreMultiplier($ignoreMultiplier)
    {
        $this->_ignoreMultiplier = (bool)$ignoreMultiplier;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIgnoreMultiplier()
    {
        return $this->_ignoreMultiplier;
    }
    
    /**
     * @param double $minQuantity
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setMinQuantity($minQuantity)
    {
        $this->_minQuantity = (double)$minQuantity;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getMinQuantity()
    {
        return $this->_minQuantity;
    }
    
    /**
     * @param double $maxQuantity
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setMaxQuantity($maxQuantity)
    {
        $this->_maxQuantity = (double)$maxQuantity;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getMaxQuantity()
    {
        return $this->_maxQuantity;
    }
    
    /**
     * @param double $initialQuantity
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setInitialQuantity($initialQuantity)
    {
        $this->_initialQuantity = (double)$initialQuantity;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getInitialQuantity()
    {
        return $this->_initialQuantity;
    }
    
    /**
     * @param int $sort
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getSort()
    {
        return $this->_sort;
    }
    
    /**
     * @param double $vat
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setVat($vat)
    {
        $this->_vat = (double)$vat;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getVat()
    {
        return $this->_vat;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}