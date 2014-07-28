<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * A config Item that is displayed in a config Group. Config item can reference to a specific productId to inherit price, name and description. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ConfigItem extends DataModel
{
    /**
     * @type Identity Reference to configGroup
     */
    public $_configGroupId = null;

    /**
     * @type Identity Optional reference to product
     */
    public $_productId = null;

    /**
     * @type float|null 
     */
    public $_fStandardpreis = 0.0;

    /**
     * @type integer Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     */
    public $_ignoreMultiplier = 0;

    /**
     * @type integer|null Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
     */
    public $_inheritProductName = 0;

    /**
     * @type integer|null Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
     */
    public $_inheritProductPrice = 0;

    /**
     * @type float|null Optional initial / predefined quantity. Default is one (1) quantity piece. 
     */
    public $_initialQuantity = 0.0;

    /**
     * @type integer|null Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     */
    public $_isPreSelected = 0;

    /**
     * @type integer|null Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
     */
    public $_isRecommended = 0;

    /**
     * @type float|null Maximum allowed quantity. Default 0 for no maximum limit. 
     */
    public $_maxQuantity = 0.0;

    /**
     * @type float|null Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
     */
    public $_minQuantity = 0.0;

    /**
     * @type integer|null Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     */
    public $_showDiscount = 0;

    /**
     * @type integer|null Optional: Show surcharge compared to productId price.
     */
    public $_showSurcharge = 0;

    /**
     * @type integer|null Optional sort order number
     */
    public $_sort = 0;

    /**
     * @type integer|null Config item type. 0: Product, 1: Special
     */
    public $_type = 0;

    /**
     * Nav [ConfigItem » One]
     *
     * @type \jtl\Connector\Model\ConfigItemPrice[]
     */
    public $_prices = array();

    /**
     * Nav [ConfigItem » One]
     *
     * @type \jtl\Connector\Model\ConfigItemI18n[]
     */
    public $_i18n = array();


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_configGroupId',
        '_productId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
        '_prices' => '\jtl\Connector\Model\ConfigItemPrice',
        '_i18n' => '\jtl\Connector\Model\ConfigItemI18n',
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  integer $type Config item type. 0: Product, 1: Special
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setType($type)
    {
        return $this->setProperty('_type', $type, 'integer');
    }
    
    /**
     * @return integer Config item type. 0: Product, 1: Special
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param  integer $isPreSelected Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setIsPreSelected($isPreSelected)
    {
        return $this->setProperty('_isPreSelected', $isPreSelected, 'integer');
    }
    
    /**
     * @return integer Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     */
    public function getIsPreSelected()
    {
        return $this->_isPreSelected;
    }

    /**
     * @param  integer $isRecommended Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setIsRecommended($isRecommended)
    {
        return $this->setProperty('_isRecommended', $isRecommended, 'integer');
    }
    
    /**
     * @return integer Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
     */
    public function getIsRecommended()
    {
        return $this->_isRecommended;
    }

    /**
     * @param  integer $inheritProductName Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setInheritProductName($inheritProductName)
    {
        return $this->setProperty('_inheritProductName', $inheritProductName, 'integer');
    }
    
    /**
     * @return integer Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
     */
    public function getInheritProductName()
    {
        return $this->_inheritProductName;
    }

    /**
     * @param  integer $inheritProductPrice Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setInheritProductPrice($inheritProductPrice)
    {
        return $this->setProperty('_inheritProductPrice', $inheritProductPrice, 'integer');
    }
    
    /**
     * @return integer Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
     */
    public function getInheritProductPrice()
    {
        return $this->_inheritProductPrice;
    }

    /**
     * @param  integer $sort Optional sort order number
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('_sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort order number
     */
    public function getSort()
    {
        return $this->_sort;
    }

    /**
     * @param  integer $showDiscount Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setShowDiscount($showDiscount)
    {
        return $this->setProperty('_showDiscount', $showDiscount, 'integer');
    }
    
    /**
     * @return integer Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     */
    public function getShowDiscount()
    {
        return $this->_showDiscount;
    }

    /**
     * @param  integer $showSurcharge Optional: Show surcharge compared to productId price.
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setShowSurcharge($showSurcharge)
    {
        return $this->setProperty('_showSurcharge', $showSurcharge, 'integer');
    }
    
    /**
     * @return integer Optional: Show surcharge compared to productId price.
     */
    public function getShowSurcharge()
    {
        return $this->_showSurcharge;
    }

    /**
     * @param  float $minQuantity Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setMinQuantity($minQuantity)
    {
        return $this->setProperty('_minQuantity', $minQuantity, 'float');
    }
    
    /**
     * @return float Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
     */
    public function getMinQuantity()
    {
        return $this->_minQuantity;
    }

    /**
     * @param  float $maxQuantity Maximum allowed quantity. Default 0 for no maximum limit. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setMaxQuantity($maxQuantity)
    {
        return $this->setProperty('_maxQuantity', $maxQuantity, 'float');
    }
    
    /**
     * @return float Maximum allowed quantity. Default 0 for no maximum limit. 
     */
    public function getMaxQuantity()
    {
        return $this->_maxQuantity;
    }

    /**
     * @param  float $initialQuantity Optional initial / predefined quantity. Default is one (1) quantity piece. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setInitialQuantity($initialQuantity)
    {
        return $this->setProperty('_initialQuantity', $initialQuantity, 'float');
    }
    
    /**
     * @return float Optional initial / predefined quantity. Default is one (1) quantity piece. 
     */
    public function getInitialQuantity()
    {
        return $this->_initialQuantity;
    }

    /**
     * @param  float $fStandardpreis 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setFStandardpreis($fStandardpreis)
    {
        return $this->setProperty('_fStandardpreis', $fStandardpreis, 'float');
    }
    
    /**
     * @return float 
     */
    public function getFStandardpreis()
    {
        return $this->_fStandardpreis;
    }

    /**
     * @param  integer $ignoreMultiplier Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setIgnoreMultiplier($ignoreMultiplier)
    {
        return $this->setProperty('_ignoreMultiplier', $ignoreMultiplier, 'integer');
    }
    
    /**
     * @return integer Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     */
    public function getIgnoreMultiplier()
    {
        return $this->_ignoreMultiplier;
    }

    /**
     * @param  Identity $configGroupId Reference to configGroup
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigGroupId(Identity $configGroupId)
    {
        return $this->setProperty('_configGroupId', $configGroupId, 'Identity');
    }
    
    /**
     * @return Identity Reference to configGroup
     */
    public function getConfigGroupId()
    {
        return $this->_configGroupId;
    }

    /**
     * @param  Identity $productId Optional reference to product
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('_productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity Optional reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }

    /**
     * @param  \jtl\Connector\Model\ConfigItemPrice $price
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function addPrice(\jtl\Connector\Model\ConfigItemPrice $price)
    {
        $this->_prices[] = $price;
        return $this;
    }
    
    /**
     * @return ConfigItemPrice
     */
    public function getPrices()
    {
        return $this->_prices;
    }

    /**
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function clearPrices()
    {
        $this->_prices = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ConfigItemI18n $i18n
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function addI18n(\jtl\Connector\Model\ConfigItemI18n $i18n)
    {
        $this->_i18n[] = $i18n;
        return $this;
    }
    
    /**
     * @return ConfigItemI18n
     */
    public function getI18n()
    {
        return $this->_i18n;
    }

    /**
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function clearI18n()
    {
        $this->_i18n = array();
        return $this;
    }
}

