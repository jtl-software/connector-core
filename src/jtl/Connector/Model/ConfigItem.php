<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * A config Item that is displayed in a config Group. Config item can reference to a specific productId to inherit price, name and description. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ConfigItem extends DataModel
{
    /**
     * @type Identity Reference to configGroup
     */
    protected $configGroupId = null;

    /**
     * @type Identity Optional reference to product
     */
    protected $productId = null;

    /**
     * @type float|null 
     */
    protected $fStandardpreis = 0.0;

    /**
     * @type integer Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     */
    protected $ignoreMultiplier = 0;

    /**
     * @type integer|null Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
     */
    protected $inheritProductName = 0;

    /**
     * @type integer|null Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
     */
    protected $inheritProductPrice = 0;

    /**
     * @type float|null Optional initial / predefined quantity. Default is one (1) quantity piece. 
     */
    protected $initialQuantity = 0.0;

    /**
     * @type integer|null Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     */
    protected $isPreSelected = 0;

    /**
     * @type integer|null Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
     */
    protected $isRecommended = 0;

    /**
     * @type float|null Maximum allowed quantity. Default 0 for no maximum limit. 
     */
    protected $maxQuantity = 0.0;

    /**
     * @type float|null Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
     */
    protected $minQuantity = 0.0;

    /**
     * @type integer|null Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     */
    protected $showDiscount = 0;

    /**
     * @type integer|null Optional: Show surcharge compared to productId price.
     */
    protected $showSurcharge = 0;

    /**
     * @type integer|null Optional sort order number
     */
    protected $sort = 0;

    /**
     * @type integer|null Config item type. 0: Product, 1: Special
     */
    protected $type = 0;

    /**
     * Nav [ConfigItem » One]
     *
     * @type \jtl\Connector\Model\ConfigItemPrice[]
     */
    protected $prices = array();

    /**
     * Nav [ConfigItem » One]
     *
     * @type \jtl\Connector\Model\ConfigItemI18n[]
     */
    protected $i18n = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'configGroupId',
        'productId',
    );

    /**
     * @type array list of propertyInfo
     */
    protected $propertyInfos = array(
        'type' => 'integer',
        'isPreSelected' => 'integer',
        'isRecommended' => 'integer',
        'inheritProductName' => 'integer',
        'inheritProductPrice' => 'integer',
        'sort' => 'integer',
        'showDiscount' => 'integer',
        'showSurcharge' => 'integer',
        'minQuantity' => 'float',
        'maxQuantity' => 'float',
        'initialQuantity' => 'float',
        'fStandardpreis' => 'float',
        'ignoreMultiplier' => 'integer',
        'configGroupId' => '\jtl\Connector\Model\Identity',
        'productId' => '\jtl\Connector\Model\Identity',
        'prices' => '\jtl\Connector\Model\ConfigItemPrice',
        'i18n' => '\jtl\Connector\Model\ConfigItemI18n',
    );


    /**
     * @param  integer $type Config item type. 0: Product, 1: Special
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setType($type)
    {
        return $this->setProperty('type', $type, 'integer');
    }
    
    /**
     * @return integer Config item type. 0: Product, 1: Special
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param  integer $isPreSelected Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setIsPreSelected($isPreSelected)
    {
        return $this->setProperty('isPreSelected', $isPreSelected, 'integer');
    }
    
    /**
     * @return integer Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     */
    public function getIsPreSelected()
    {
        return $this->isPreSelected;
    }

    /**
     * @param  integer $isRecommended Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setIsRecommended($isRecommended)
    {
        return $this->setProperty('isRecommended', $isRecommended, 'integer');
    }
    
    /**
     * @return integer Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
     */
    public function getIsRecommended()
    {
        return $this->isRecommended;
    }

    /**
     * @param  integer $inheritProductName Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setInheritProductName($inheritProductName)
    {
        return $this->setProperty('inheritProductName', $inheritProductName, 'integer');
    }
    
    /**
     * @return integer Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
     */
    public function getInheritProductName()
    {
        return $this->inheritProductName;
    }

    /**
     * @param  integer $inheritProductPrice Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setInheritProductPrice($inheritProductPrice)
    {
        return $this->setProperty('inheritProductPrice', $inheritProductPrice, 'integer');
    }
    
    /**
     * @return integer Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
     */
    public function getInheritProductPrice()
    {
        return $this->inheritProductPrice;
    }

    /**
     * @param  integer $sort Optional sort order number
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort order number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  integer $showDiscount Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setShowDiscount($showDiscount)
    {
        return $this->setProperty('showDiscount', $showDiscount, 'integer');
    }
    
    /**
     * @return integer Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     */
    public function getShowDiscount()
    {
        return $this->showDiscount;
    }

    /**
     * @param  integer $showSurcharge Optional: Show surcharge compared to productId price.
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setShowSurcharge($showSurcharge)
    {
        return $this->setProperty('showSurcharge', $showSurcharge, 'integer');
    }
    
    /**
     * @return integer Optional: Show surcharge compared to productId price.
     */
    public function getShowSurcharge()
    {
        return $this->showSurcharge;
    }

    /**
     * @param  float $minQuantity Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setMinQuantity($minQuantity)
    {
        return $this->setProperty('minQuantity', $minQuantity, 'float');
    }
    
    /**
     * @return float Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
     */
    public function getMinQuantity()
    {
        return $this->minQuantity;
    }

    /**
     * @param  float $maxQuantity Maximum allowed quantity. Default 0 for no maximum limit. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setMaxQuantity($maxQuantity)
    {
        return $this->setProperty('maxQuantity', $maxQuantity, 'float');
    }
    
    /**
     * @return float Maximum allowed quantity. Default 0 for no maximum limit. 
     */
    public function getMaxQuantity()
    {
        return $this->maxQuantity;
    }

    /**
     * @param  float $initialQuantity Optional initial / predefined quantity. Default is one (1) quantity piece. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setInitialQuantity($initialQuantity)
    {
        return $this->setProperty('initialQuantity', $initialQuantity, 'float');
    }
    
    /**
     * @return float Optional initial / predefined quantity. Default is one (1) quantity piece. 
     */
    public function getInitialQuantity()
    {
        return $this->initialQuantity;
    }

    /**
     * @param  float $fStandardpreis 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setFStandardpreis($fStandardpreis)
    {
        return $this->setProperty('fStandardpreis', $fStandardpreis, 'float');
    }
    
    /**
     * @return float 
     */
    public function getFStandardpreis()
    {
        return $this->fStandardpreis;
    }

    /**
     * @param  integer $ignoreMultiplier Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setIgnoreMultiplier($ignoreMultiplier)
    {
        return $this->setProperty('ignoreMultiplier', $ignoreMultiplier, 'integer');
    }
    
    /**
     * @return integer Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     */
    public function getIgnoreMultiplier()
    {
        return $this->ignoreMultiplier;
    }

    /**
     * @param  Identity $configGroupId Reference to configGroup
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigGroupId(Identity $configGroupId)
    {
        return $this->setProperty('configGroupId', $configGroupId, 'Identity');
    }
    
    /**
     * @return Identity Reference to configGroup
     */
    public function getConfigGroupId()
    {
        return $this->configGroupId;
    }

    /**
     * @param  Identity $productId Optional reference to product
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity Optional reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  \jtl\Connector\Model\ConfigItemPrice $price
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function addPrice(\jtl\Connector\Model\ConfigItemPrice $price)
    {
        $this->prices[] = $price;
        return $this;
    }
    
    /**
     * @return ConfigItemPrice
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function clearPrices()
    {
        $this->prices = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ConfigItemI18n $i18n
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function addI18n(\jtl\Connector\Model\ConfigItemI18n $i18n)
    {
        $this->i18n[] = $i18n;
        return $this;
    }
    
    /**
     * @return ConfigItemI18n
     */
    public function getI18n()
    {
        return $this->i18n;
    }

    /**
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function clearI18n()
    {
        $this->i18n = array();
        return $this;
    }
}

