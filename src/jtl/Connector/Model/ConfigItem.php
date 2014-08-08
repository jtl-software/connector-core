<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * A config Item that is displayed in a config Group. Config item can reference to a specific productId to inherit price, name and description. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 * 
 * @Serializer\AccessType("public_method")
 */
class ConfigItem extends DataModel
{
    /**
     * @var Identity Reference to configGroup
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("configGroupId")
     * @Serializer\Accessor(getter="getConfigGroupId",setter="setConfigGroupId")
     */
    protected $configGroupId = null;

    /**
     * @var Identity Unique configItem id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var Identity Optional reference to product
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;

    /**
     * @var bool Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("ignoreMultiplier")
     * @Serializer\Accessor(getter="getIgnoreMultiplier",setter="setIgnoreMultiplier")
     */
    protected $ignoreMultiplier = false;

    /**
     * @var bool Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("inheritProductName")
     * @Serializer\Accessor(getter="getInheritProductName",setter="setInheritProductName")
     */
    protected $inheritProductName = false;

    /**
     * @var bool Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("inheritProductPrice")
     * @Serializer\Accessor(getter="getInheritProductPrice",setter="setInheritProductPrice")
     */
    protected $inheritProductPrice = false;

    /**
     * @var double Optional initial / predefined quantity. Default is one (1) quantity piece. 
     * @Serializer\Type("double")
     * @Serializer\SerializedName("initialQuantity")
     * @Serializer\Accessor(getter="getInitialQuantity",setter="setInitialQuantity")
     */
    protected $initialQuantity = 0.0;

    /**
     * @var bool Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isPreSelected")
     * @Serializer\Accessor(getter="getIsPreSelected",setter="setIsPreSelected")
     */
    protected $isPreSelected = false;

    /**
     * @var bool Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isRecommended")
     * @Serializer\Accessor(getter="getIsRecommended",setter="setIsRecommended")
     */
    protected $isRecommended = false;

    /**
     * @var double Maximum allowed quantity. Default 0 for no maximum limit. 
     * @Serializer\Type("double")
     * @Serializer\SerializedName("maxQuantity")
     * @Serializer\Accessor(getter="getMaxQuantity",setter="setMaxQuantity")
     */
    protected $maxQuantity = 0.0;

    /**
     * @var double Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
     * @Serializer\Type("double")
     * @Serializer\SerializedName("minQuantity")
     * @Serializer\Accessor(getter="getMinQuantity",setter="setMinQuantity")
     */
    protected $minQuantity = 0.0;

    /**
     * @var bool Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("showDiscount")
     * @Serializer\Accessor(getter="getShowDiscount",setter="setShowDiscount")
     */
    protected $showDiscount = false;

    /**
     * @var bool Optional: Show surcharge compared to productId price.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("showSurcharge")
     * @Serializer\Accessor(getter="getShowSurcharge",setter="setShowSurcharge")
     */
    protected $showSurcharge = false;

    /**
     * @var int Optional sort order number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = 0;

    /**
     * @var int Config item type. 0: Product, 1: Special
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("type")
     * @Serializer\Accessor(getter="getType",setter="setType")
     */
    protected $type = 0;

    /**
     * @var double Value added tax
     * @Serializer\Type("double")
     * @Serializer\SerializedName("vat")
     * @Serializer\Accessor(getter="getVat",setter="setVat")
     */
    protected $vat = 0.0;

    /**
     * @var \jtl\Connector\Model\ConfigItemPrice[]
     * @Serializer\Type("array<jtl\Connector\Model\ConfigItemPrice>")
     * @Serializer\SerializedName("prices")
     * @Serializer\AccessType("reflection")
     */
    protected $prices = array();

    /**
     * @var \jtl\Connector\Model\ConfigItemI18n[]
     * @Serializer\Type("array<jtl\Connector\Model\ConfigItemI18n>")
     * @Serializer\SerializedName("i18n")
     * @Serializer\AccessType("reflection")
     */
    protected $i18n = array();


    public function __construct()
    {
        $this->configGroupId = new Identity;
        $this->id = new Identity;
        $this->productId = new Identity;
    }

    /**
     * @param  Identity $configGroupId Reference to configGroup
     * @return \jtl\Connector\Model\ConfigItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  Identity $id Unique configItem id
     * @return \jtl\Connector\Model\ConfigItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  bool $ignoreMultiplier Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     * @return \jtl\Connector\Model\ConfigItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIgnoreMultiplier($ignoreMultiplier)
    {
        return $this->setProperty('ignoreMultiplier', $ignoreMultiplier, 'bool');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setInheritProductName($inheritProductName)
    {
        return $this->setProperty('inheritProductName', $inheritProductName, 'bool');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setInheritProductPrice($inheritProductPrice)
    {
        return $this->setProperty('inheritProductPrice', $inheritProductPrice, 'bool');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setInitialQuantity($initialQuantity)
    {
        return $this->setProperty('initialQuantity', $initialQuantity, 'double');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsPreSelected($isPreSelected)
    {
        return $this->setProperty('isPreSelected', $isPreSelected, 'bool');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsRecommended($isRecommended)
    {
        return $this->setProperty('isRecommended', $isRecommended, 'bool');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setMaxQuantity($maxQuantity)
    {
        return $this->setProperty('maxQuantity', $maxQuantity, 'double');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setMinQuantity($minQuantity)
    {
        return $this->setProperty('minQuantity', $minQuantity, 'double');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setShowDiscount($showDiscount)
    {
        return $this->setProperty('showDiscount', $showDiscount, 'bool');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setShowSurcharge($showSurcharge)
    {
        return $this->setProperty('showSurcharge', $showSurcharge, 'bool');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'int');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setType($type)
    {
        return $this->setProperty('type', $type, 'int');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setVat($vat)
    {
        return $this->setProperty('vat', $vat, 'double');
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
