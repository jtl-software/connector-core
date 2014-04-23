<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * A config Item that is displayed in a config Group. Config item can reference to a specific productId to inherit price, name and description. 
 *
 * @access public
 * @subpackage GlobalData
 */
class ConfigItem extends DataModel
{
    /**
     * @var Identity Unique configItem id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to configGroup
     */
    protected $_configGroupId = null;
    
    /**
     * @var Identity Optional reference to product
     */
    protected $_productId = null;
    
    /**
     * @var int Config item type. 0: Product, 1: Special
     */
    protected $_type = 0;
    
    /**
     * @var bool Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     */
    protected $_isPreSelected = false;
    
    /**
     * @var bool Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
     */
    protected $_isRecommended = false;
    
    /**
     * @var bool Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
     */
    protected $_inheritProductName = false;
    
    /**
     * @var bool Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
     */
    protected $_inheritProductPrice = false;
    
    /**
     * @var bool Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     */
    protected $_showDiscount = True;
    
    /**
     * @var bool Optional: Show surcharge compared to productId price.
     */
    protected $_showSurcharge = False;
    
    /**
     * @var bool Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     */
    protected $_ignoreMultiplier = False;
    
    /**
     * @var double Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
     */
    protected $_minQuantity = 0;
    
    /**
     * @var double Maximum allowed quantity. Default 0 for no maximum limit. 
     */
    protected $_maxQuantity = 0;
    
    /**
     * @var double Optional initial / predefined quantity. Default is one (1) quantity piece. 
     */
    protected $_initialQuantity = 1;
    
    /**
     * @var int Optional sort order number
     */
    protected $_sort = 0;
    
    /**
     * @var double Value added tax
     */
    protected $_vat = 0.0;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        'id',
        'configGroupId',
        'productId'
    );
    
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
                
                    $this->$name = Identity::convert($value);
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
     * @param Identity $id Unique configItem id
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique configItem id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $configGroupId Reference to configGroup
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setConfigGroupId(Identity $configGroupId)
    {
        $this->_configGroupId = $configGroupId;
        return $this;
    }
    
    /**
     * @return Identity Reference to configGroup
     */
    public function getConfigGroupId()
    {
        return $this->_configGroupId;
    }
    /**
     * @param Identity $productId Optional reference to product
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setProductId(Identity $productId)
    {
        $this->_productId = $productId;
        return $this;
    }
    
    /**
     * @return Identity Optional reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    /**
     * @param int $type Config item type. 0: Product, 1: Special
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setType($type)
    {
        $this->_type = (int)$type;
        return $this;
    }
    
    /**
     * @return int Config item type. 0: Product, 1: Special
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @param bool $isPreSelected Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setIsPreSelected($isPreSelected)
    {
        $this->_isPreSelected = (bool)$isPreSelected;
        return $this;
    }
    
    /**
     * @return bool Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     */
    public function getIsPreSelected()
    {
        return $this->_isPreSelected;
    }
    /**
     * @param bool $isRecommended Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setIsRecommended($isRecommended)
    {
        $this->_isRecommended = (bool)$isRecommended;
        return $this;
    }
    
    /**
     * @return bool Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
     */
    public function getIsRecommended()
    {
        return $this->_isRecommended;
    }
    /**
     * @param bool $inheritProductName Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setInheritProductName($inheritProductName)
    {
        $this->_inheritProductName = (bool)$inheritProductName;
        return $this;
    }
    
    /**
     * @return bool Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
     */
    public function getInheritProductName()
    {
        return $this->_inheritProductName;
    }
    /**
     * @param bool $inheritProductPrice Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setInheritProductPrice($inheritProductPrice)
    {
        $this->_inheritProductPrice = (bool)$inheritProductPrice;
        return $this;
    }
    
    /**
     * @return bool Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
     */
    public function getInheritProductPrice()
    {
        return $this->_inheritProductPrice;
    }
    /**
     * @param bool $showDiscount Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setShowDiscount($showDiscount)
    {
        $this->_showDiscount = (bool)$showDiscount;
        return $this;
    }
    
    /**
     * @return bool Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     */
    public function getShowDiscount()
    {
        return $this->_showDiscount;
    }
    /**
     * @param bool $showSurcharge Optional: Show surcharge compared to productId price.
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setShowSurcharge($showSurcharge)
    {
        $this->_showSurcharge = (bool)$showSurcharge;
        return $this;
    }
    
    /**
     * @return bool Optional: Show surcharge compared to productId price.
     */
    public function getShowSurcharge()
    {
        return $this->_showSurcharge;
    }
    /**
     * @param bool $ignoreMultiplier Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setIgnoreMultiplier($ignoreMultiplier)
    {
        $this->_ignoreMultiplier = (bool)$ignoreMultiplier;
        return $this;
    }
    
    /**
     * @return bool Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     */
    public function getIgnoreMultiplier()
    {
        return $this->_ignoreMultiplier;
    }
    /**
     * @param double $minQuantity Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setMinQuantity($minQuantity)
    {
        $this->_minQuantity = (double)$minQuantity;
        return $this;
    }
    
    /**
     * @return double Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
     */
    public function getMinQuantity()
    {
        return $this->_minQuantity;
    }
    /**
     * @param double $maxQuantity Maximum allowed quantity. Default 0 for no maximum limit. 
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setMaxQuantity($maxQuantity)
    {
        $this->_maxQuantity = (double)$maxQuantity;
        return $this;
    }
    
    /**
     * @return double Maximum allowed quantity. Default 0 for no maximum limit. 
     */
    public function getMaxQuantity()
    {
        return $this->_maxQuantity;
    }
    /**
     * @param double $initialQuantity Optional initial / predefined quantity. Default is one (1) quantity piece. 
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setInitialQuantity($initialQuantity)
    {
        $this->_initialQuantity = (double)$initialQuantity;
        return $this;
    }
    
    /**
     * @return double Optional initial / predefined quantity. Default is one (1) quantity piece. 
     */
    public function getInitialQuantity()
    {
        return $this->_initialQuantity;
    }
    /**
     * @param int $sort Optional sort order number
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int Optional sort order number
     */
    public function getSort()
    {
        return $this->_sort;
    }
    /**
     * @param double $vat Value added tax
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setVat($vat)
    {
        $this->_vat = (double)$vat;
        return $this;
    }
    
    /**
     * @return double Value added tax
     */
    public function getVat()
    {
        return $this->_vat;
    }
}