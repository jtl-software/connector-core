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
     * @type Identity Unique configItem id
     */
    protected $id = null;

    /**
     * @type Identity Optional reference to product
     */
    protected $productId = null;

    /**
     * @type bool Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     */
    protected $ignoreMultiplier = false;

    /**
     * @type bool Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
     */
    protected $inheritProductName = false;

    /**
     * @type bool Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
     */
    protected $inheritProductPrice = false;

    /**
     * @type double Optional initial / predefined quantity. Default is one (1) quantity piece. 
     */
    protected $initialQuantity = 0.0;

    /**
     * @type bool Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     */
    protected $isPreSelected = false;

    /**
     * @type bool Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
     */
    protected $isRecommended = false;

    /**
     * @type double Maximum allowed quantity. Default 0 for no maximum limit. 
     */
    protected $maxQuantity = 0.0;

    /**
     * @type double Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
     */
    protected $minQuantity = 0.0;

    /**
     * @type bool Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     */
    protected $showDiscount = false;

    /**
     * @type bool Optional: Show surcharge compared to productId price.
     */
    protected $showSurcharge = false;

    /**
     * @type int Optional sort order number
     */
    protected $sort = 0;

    /**
     * @type int Config item type. 0: Product, 1: Special
     */
    protected $type = 0;

    /**
     * @type double Value added tax
     */
    protected $vat = 0.0;

    /**
     * @type \jtl\Connector\Model\ConfigItemPrice[]
     */
    protected $prices = array();

    /**
     * @type \jtl\Connector\Model\ConfigItemI18n[]
     */
    protected $i18n = array();

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'configGroupId',
        'id',
        'productId',
    );

    /**
     * @param  Identity $configGroupId Reference to configGroup
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigGroupId(Identity $configGroupId)
    {
        return $this->setProperty('ConfigGroupId', $configGroupId, 'Identity');
    }

    /**
     * @return Identity Reference to configGroup
     */
    public function getConfigGroupId()
    {
        return $this->configGroupId;
    }

    /**
     * @param  Identity $id Unique configItem id
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique configItem id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $productId Optional reference to product
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('ProductId', $productId, 'Identity');
    }

    /**
     * @return Identity Optional reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  bool $ignoreMultiplier Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIgnoreMultiplier(Identity $ignoreMultiplier)
    {
        return $this->setProperty('IgnoreMultiplier', $ignoreMultiplier, 'bool');
    }

    /**
     * @return bool Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     */
    public function getIgnoreMultiplier()
    {
        return $this->ignoreMultiplier;
    }

    /**
     * @param  bool $inheritProductName Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setInheritProductName(Identity $inheritProductName)
    {
        return $this->setProperty('InheritProductName', $inheritProductName, 'bool');
    }

    /**
     * @return bool Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
     */
    public function getInheritProductName()
    {
        return $this->inheritProductName;
    }

    /**
     * @param  bool $inheritProductPrice Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setInheritProductPrice(Identity $inheritProductPrice)
    {
        return $this->setProperty('InheritProductPrice', $inheritProductPrice, 'bool');
    }

    /**
     * @return bool Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
     */
    public function getInheritProductPrice()
    {
        return $this->inheritProductPrice;
    }

    /**
     * @param  double $initialQuantity Optional initial / predefined quantity. Default is one (1) quantity piece. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setInitialQuantity(Identity $initialQuantity)
    {
        return $this->setProperty('InitialQuantity', $initialQuantity, 'double');
    }

    /**
     * @return double Optional initial / predefined quantity. Default is one (1) quantity piece. 
     */
    public function getInitialQuantity()
    {
        return $this->initialQuantity;
    }

    /**
     * @param  bool $isPreSelected Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsPreSelected(Identity $isPreSelected)
    {
        return $this->setProperty('IsPreSelected', $isPreSelected, 'bool');
    }

    /**
     * @return bool Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     */
    public function getIsPreSelected()
    {
        return $this->isPreSelected;
    }

    /**
     * @param  bool $isRecommended Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsRecommended(Identity $isRecommended)
    {
        return $this->setProperty('IsRecommended', $isRecommended, 'bool');
    }

    /**
     * @return bool Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
     */
    public function getIsRecommended()
    {
        return $this->isRecommended;
    }

    /**
     * @param  double $maxQuantity Maximum allowed quantity. Default 0 for no maximum limit. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMaxQuantity(Identity $maxQuantity)
    {
        return $this->setProperty('MaxQuantity', $maxQuantity, 'double');
    }

    /**
     * @return double Maximum allowed quantity. Default 0 for no maximum limit. 
     */
    public function getMaxQuantity()
    {
        return $this->maxQuantity;
    }

    /**
     * @param  double $minQuantity Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMinQuantity(Identity $minQuantity)
    {
        return $this->setProperty('MinQuantity', $minQuantity, 'double');
    }

    /**
     * @return double Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
     */
    public function getMinQuantity()
    {
        return $this->minQuantity;
    }

    /**
     * @param  bool $showDiscount Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShowDiscount(Identity $showDiscount)
    {
        return $this->setProperty('ShowDiscount', $showDiscount, 'bool');
    }

    /**
     * @return bool Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     */
    public function getShowDiscount()
    {
        return $this->showDiscount;
    }

    /**
     * @param  bool $showSurcharge Optional: Show surcharge compared to productId price.
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShowSurcharge(Identity $showSurcharge)
    {
        return $this->setProperty('ShowSurcharge', $showSurcharge, 'bool');
    }

    /**
     * @return bool Optional: Show surcharge compared to productId price.
     */
    public function getShowSurcharge()
    {
        return $this->showSurcharge;
    }

    /**
     * @param  int $sort Optional sort order number
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSort(Identity $sort)
    {
        return $this->setProperty('Sort', $sort, 'int');
    }

    /**
     * @return int Optional sort order number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  int $type Config item type. 0: Product, 1: Special
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setType(Identity $type)
    {
        return $this->setProperty('Type', $type, 'int');
    }

    /**
     * @return int Config item type. 0: Product, 1: Special
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param  double $vat Value added tax
     * @return \jtl\Connector\Model\ConfigItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setVat(Identity $vat)
    {
        return $this->setProperty('Vat', $vat, 'double');
    }

    /**
     * @return double Value added tax
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @param  \jtl\Connector\Model\ConfigItemPrice $prices
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function addPrice(\jtl\Connector\Model\ConfigItemPrice $price)
    {
        $this->prices[] = $price;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ConfigItemPrice[]
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
     * @return \jtl\Connector\Model\ConfigItemI18n[]
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
