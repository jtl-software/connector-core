<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * A config Item that is displayed in a config Group. Config item can reference to a specific productId to inherit price, name and description.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
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
     * @var integer Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("ignoreMultiplier")
     * @Serializer\Accessor(getter="getIgnoreMultiplier",setter="setIgnoreMultiplier")
     */
    protected $ignoreMultiplier = 0;
    
    /**
     * @var boolean Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("inheritProductName")
     * @Serializer\Accessor(getter="getInheritProductName",setter="setInheritProductName")
     */
    protected $inheritProductName = false;
    
    /**
     * @var boolean Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price.
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
     * @var boolean Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isPreSelected")
     * @Serializer\Accessor(getter="getIsPreSelected",setter="setIsPreSelected")
     */
    protected $isPreSelected = false;
    
    /**
     * @var boolean Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted.
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
     * @var boolean Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("showDiscount")
     * @Serializer\Accessor(getter="getShowDiscount",setter="setShowDiscount")
     */
    protected $showDiscount = false;
    
    /**
     * @var boolean Optional: Show surcharge compared to productId price.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("showSurcharge")
     * @Serializer\Accessor(getter="getShowSurcharge",setter="setShowSurcharge")
     */
    protected $showSurcharge = false;
    
    /**
     * @var integer Optional sort order number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = 0;
    
    /**
     * @var integer Config item type. 0: Product, 1: Special
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("type")
     * @Serializer\Accessor(getter="getType",setter="setType")
     */
    protected $type = 0;
    
    /**
     * @var ConfigItemI18n[]
     * @Serializer\Type("array<jtl\Connector\Model\ConfigItemI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];
    
    /**
     * @var ConfigItemPrice[]
     * @Serializer\Type("array<jtl\Connector\Model\ConfigItemPrice>")
     * @Serializer\SerializedName("prices")
     * @Serializer\AccessType("reflection")
     */
    protected $prices = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->configGroupId = new Identity();
        $this->productId = new Identity();
    }
    
    /**
     * @param Identity $configGroupId Reference to configGroup
     * @return ConfigItem
     */
    public function setConfigGroupId(Identity $configGroupId): ConfigItem
    {
        $this->configGroupId = $configGroupId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to configGroup
     */
    public function getConfigGroupId(): Identity
    {
        return $this->configGroupId;
    }
    
    /**
     * @param Identity $id Unique configItem id
     * @return ConfigItem
     */
    public function setId(Identity $id): ConfigItem
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique configItem id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param Identity $productId Optional reference to product
     * @return ConfigItem
     */
    public function setProductId(Identity $productId): ConfigItem
    {
        $this->productId = $productId;
        
        return $this;
    }
    
    /**
     * @return Identity Optional reference to product
     */
    public function getProductId(): Identity
    {
        return $this->productId;
    }
    
    /**
     * @param integer $ignoreMultiplier Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     * @return ConfigItem
     */
    public function setIgnoreMultiplier(int $ignoreMultiplier): ConfigItem
    {
        $this->ignoreMultiplier = $ignoreMultiplier;
        
        return $this;
    }
    
    /**
     * @return integer Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     */
    public function getIgnoreMultiplier(): int
    {
        return $this->ignoreMultiplier;
    }
    
    /**
     * @param boolean $inheritProductName Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored.
     * @return ConfigItem
     */
    public function setInheritProductName(bool $inheritProductName): ConfigItem
    {
        $this->inheritProductName = $inheritProductName;
        
        return $this;
    }
    
    /**
     * @return boolean Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored.
     */
    public function getInheritProductName(): bool
    {
        return $this->inheritProductName;
    }
    
    /**
     * @param boolean $inheritProductPrice Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price.
     * @return ConfigItem
     */
    public function setInheritProductPrice(bool $inheritProductPrice): ConfigItem
    {
        $this->inheritProductPrice = $inheritProductPrice;
        
        return $this;
    }
    
    /**
     * @return boolean Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price.
     */
    public function getInheritProductPrice(): bool
    {
        return $this->inheritProductPrice;
    }
    
    /**
     * @param double $initialQuantity Optional initial / predefined quantity. Default is one (1) quantity piece.
     * @return ConfigItem
     */
    public function setInitialQuantity(float $initialQuantity): ConfigItem
    {
        $this->initialQuantity = $initialQuantity;
        
        return $this;
    }
    
    /**
     * @return double Optional initial / predefined quantity. Default is one (1) quantity piece.
     */
    public function getInitialQuantity(): float
    {
        return $this->initialQuantity;
    }
    
    /**
     * @param boolean $isPreSelected Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     * @return ConfigItem
     */
    public function setIsPreSelected(bool $isPreSelected): ConfigItem
    {
        $this->isPreSelected = $isPreSelected;
        
        return $this;
    }
    
    /**
     * @return boolean Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     */
    public function getIsPreSelected(): bool
    {
        return $this->isPreSelected;
    }
    
    /**
     * @param boolean $isRecommended Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted.
     * @return ConfigItem
     */
    public function setIsRecommended(bool $isRecommended): ConfigItem
    {
        $this->isRecommended = $isRecommended;
        
        return $this;
    }
    
    /**
     * @return boolean Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted.
     */
    public function getIsRecommended(): bool
    {
        return $this->isRecommended;
    }
    
    /**
     * @param double $maxQuantity Maximum allowed quantity. Default 0 for no maximum limit.
     * @return ConfigItem
     */
    public function setMaxQuantity(float $maxQuantity): ConfigItem
    {
        $this->maxQuantity = $maxQuantity;
        
        return $this;
    }
    
    /**
     * @return double Maximum allowed quantity. Default 0 for no maximum limit.
     */
    public function getMaxQuantity(): float
    {
        return $this->maxQuantity;
    }
    
    /**
     * @param double $minQuantity Optional minimum quantity required to add configItem. Default 0 for no minimum quantity.
     * @return ConfigItem
     */
    public function setMinQuantity(float $minQuantity): ConfigItem
    {
        $this->minQuantity = $minQuantity;
        
        return $this;
    }
    
    /**
     * @return double Optional minimum quantity required to add configItem. Default 0 for no minimum quantity.
     */
    public function getMinQuantity(): float
    {
        return $this->minQuantity;
    }
    
    /**
     * @param boolean $showDiscount Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     * @return ConfigItem
     */
    public function setShowDiscount(bool $showDiscount): ConfigItem
    {
        $this->showDiscount = $showDiscount;
        
        return $this;
    }
    
    /**
     * @return boolean Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     */
    public function getShowDiscount(): bool
    {
        return $this->showDiscount;
    }
    
    /**
     * @param boolean $showSurcharge Optional: Show surcharge compared to productId price.
     * @return ConfigItem
     */
    public function setShowSurcharge(bool $showSurcharge): ConfigItem
    {
        $this->showSurcharge = $showSurcharge;
        
        return $this;
    }
    
    /**
     * @return boolean Optional: Show surcharge compared to productId price.
     */
    public function getShowSurcharge(): bool
    {
        return $this->showSurcharge;
    }
    
    /**
     * @param integer $sort Optional sort order number
     * @return ConfigItem
     */
    public function setSort(int $sort): ConfigItem
    {
        $this->sort = $sort;
        
        return $this;
    }
    
    /**
     * @return integer Optional sort order number
     */
    public function getSort(): int
    {
        return $this->sort;
    }
    
    /**
     * @param integer $type Config item type. 0: Product, 1: Special
     * @return ConfigItem
     */
    public function setType(int $type): ConfigItem
    {
        $this->type = $type;
        
        return $this;
    }
    
    /**
     * @return integer Config item type. 0: Product, 1: Special
     */
    public function getType(): int
    {
        return $this->type;
    }
    
    /**
     * @param ConfigItemI18n $i18n
     * @return ConfigItem
     */
    public function addI18n(ConfigItemI18n $i18n): ConfigItem
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }
    
    /**
     * @param ConfigItemI18n ...$i18ns
     * @return ConfigItem
     */
    public function setI18ns(ConfigItemI18n ...$i18ns): ConfigItem
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return ConfigItemI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }
    
    /**
     * @return ConfigItem
     */
    public function clearI18ns(): ConfigItem
    {
        $this->i18ns = [];
        
        return $this;
    }
    
    /**
     * @param ConfigItemPrice $price
     * @return ConfigItem
     */
    public function addPrice(ConfigItemPrice $price): ConfigItem
    {
        $this->prices[] = $price;
        
        return $this;
    }
    
    /**
     * @param ConfigItemPrice ...$prices
     * @return ConfigItem
     */
    public function setPrices(ConfigItemPrice ...$prices): ConfigItem
    {
        $this->prices = $prices;
        
        return $this;
    }
    
    /**
     * @return ConfigItemPrice[]
     */
    public function getPrices(): array
    {
        return $this->prices;
    }
    
    /**
     * @return ConfigItem
     */
    public function clearPrices(): ConfigItem
    {
        $this->prices = [];
        
        return $this;
    }
}
