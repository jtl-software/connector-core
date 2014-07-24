<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Product properties..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Product extends DataModel
{
    /**
     * @type Identity Unique product id
     */
    protected $_id = null;

    /**
     * @type Identity 
     */
    protected $_manufacturerId = null;

    /**
     * @type Identity Reference to master product
     */
    protected $_masterProductId = null;

    /**
     * @type Identity Optional reference to productType
     */
    protected $_productTypeId = null;

    /**
     * @type Identity Optional reference to setArticle
     */
    protected $_setArticleId = null;

    /**
     * @type Identity Reference to shippingClass
     */
    protected $_shippingClassId = null;

    /**
     * @type Identity 
     */
    protected $_taxClassId = null;

    /**
     * @type Identity 
     */
    protected $_varCombinationId = null;

    /**
     * @type string Optional Amazon Standard Identification Number
     */
    protected $_asin = '';

    /**
     * @type DateTime|null Optional available from date. Specify a date, upon when product can be purchased. 
     */
    protected $_availableFrom = null;

    /**
     * @type float|null 
     */
    protected $_basePriceValue = 0.0;

    /**
     * @type boolean Optional: Set to true to display base price / unit pricing measure
     */
    protected $_considerBasePrice = false;

    /**
     * @type boolean Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     */
    protected $_considerStock = false;

    /**
     * @type boolean Optional: Consider stock levels of productVariations. Same as considerStock but for variations. 
     */
    protected $_considerVariationStock = false;

    /**
     * @type DateTime|null Creation date
     */
    protected $_created = null;

    /**
     * @type string 
     */
    protected $_description = '';

    /**
     * @type string Optional European Article Number (EAN)
     */
    protected $_ean = '';

    /**
     * @type string Optional Ebay product ID
     */
    protected $_epId = '';

    /**
     * @type boolean 
     */
    protected $_flagDelete = false;

    /**
     * @type boolean 
     */
    protected $_flagUpdate = false;

    /**
     * @type float 
     */
    protected $_grossPrice = 0.0;

    /**
     * @type boolean 
     */
    protected $_hasBestBefore = false;

    /**
     * @type string Optional Hazard identifier, encodes general hazard class und subdivision
     */
    protected $_hazardIdNumber = '';

    /**
     * @type boolean 
     */
    protected $_isActive = false;

    /**
     * @type string Optional International Standard Book Number
     */
    protected $_isbn = '';

    /**
     * @type boolean Optional: Set to true to allow non-integer quantites for purchase
     */
    protected $_isDivisible = false;

    /**
     * @type boolean Optional flag if product is master product
     */
    protected $_isMasterProduct = false;

    /**
     * @type boolean Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     */
    protected $_isNew = false;

    /**
     * @type boolean Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     */
    protected $_isTopProduct = false;

    /**
     * @type string 
     */
    protected $_manufacturerName = '';

    /**
     * @type string Optional manufacturer number
     */
    protected $_manufacturerNumber = '';

    /**
     * @type float|null Optional minimum quantity needed to purchase product
     */
    protected $_minimumOrderQuantity = 0.0;

    /**
     * @type string 
     */
    protected $_name = '';

    /**
     * @type float 
     */
    protected $_netPrice = 0.0;

    /**
     * @type string Optional internal product note
     */
    protected $_note = '';

    /**
     * @type string Optional Origin country
     */
    protected $_originCountry = '';

    /**
     * @type boolean Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true. 
     */
    protected $_permitNegativeStock = false;

    /**
     * @type float|null Productweight exclusive packaging
     */
    protected $_productWeight = 0.0;

    /**
     * @type float|null Optional recommended retail price (gross) 
     */
    protected $_recommendedRetailPrice = 0.0;

    /**
     * @type string Optional serial number
     */
    protected $_serialNumber = '';

    /**
     * @type float|null Productweight inclusive packaging
     */
    protected $_shippingWeight = 0.0;

    /**
     * @type string 
     */
    protected $_shortDescription = '';

    /**
     * @type string Optional stock keeping unit identifier
     */
    protected $_sku = '';

    /**
     * @type integer|null Optional sort number for product sorting in lists
     */
    protected $_sort = 0;

    /**
     * @type float|null Optional stock (level)
     */
    protected $_stockLevel = 0.0;

    /**
     * @type float|null Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     */
    protected $_takeOffQuantity = 0.0;

    /**
     * @type string Optional TARIC
     */
    protected $_taric = '';

    /**
     * @type string Optional UN number, used to define hazardous properties
     */
    protected $_unNumber = '';

    /**
     * @type string Optional Universal Product Code
     */
    protected $_upc = '';

    /**
     * @type float|null Value added tax
     */
    protected $_vat = 0.0;

    /**
	 * Nav [Product » One]
	 *
     * @type \jtl\Connector\Model\ProductI18n[]
     */
    protected $_i18ns = array();

    /**
	 * Nav [Product » One]
	 *
     * @type \jtl\Connector\Model\ProductPriceOld[]
     */
    protected $_prices = array();

    /**
	 * Nav [Product » One]
	 *
     * @type \jtl\Connector\Model\ProductSpecialPrice[]
     */
    protected $_specialPrices = array();

    /**
	 * Nav [Product » One]
	 *
     * @type \jtl\Connector\Model\ProductFileDownload[]
     */
    protected $_fileDownloads = array();

    /**
	 * Nav [Product » One]
	 *
     * @type \jtl\Connector\Model\Product2Category[]
     */
    protected $_categories = array();

    /**
	 * Nav [Product » One]
	 *
     * @type \jtl\Connector\Model\MediaFile[]
     */
    protected $_mediaFiles = array();

    /**
	 * Nav [Product » One]
	 *
     * @type \jtl\Connector\Model\ProductFunctionAttr[]
     */
    protected $_functionAttrs = array();

    /**
	 * Nav [Product » One]
	 *
     * @type \jtl\Connector\Model\ProductAttr[]
     */
    protected $_attrs = array();

    /**
	 * Nav [Product » One]
	 *
     * @type \jtl\Connector\Model\ProductConfigGroup[]
     */
    protected $_configGroups = array();

    /**
	 * Nav [Product » One]
	 *
     * @type \jtl\Connector\Model\ProductInvisibility[]
     */
    protected $_invisibilities = array();

    /**
	 * Nav [Product » One]
	 *
     * @type \jtl\Connector\Model\CrossSelling[]
     */
    protected $_crossSellings = array();

    /**
	 * Nav [Product » One]
	 *
     * @type \jtl\Connector\Model\SetArticle[]
     */
    protected $_setArticles = array();

    /**
	 * Nav [Product » One]
	 *
     * @type \jtl\Connector\Model\ProductVariation[]
     */
    protected $_variations = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_manufacturerId',
		'_id',
		'_taxClassId',
		'_shippingClassId',
		'_varCombinationId',
		'_masterProductId',
		'_setArticleId',
		'_productTypeId',
	);

	/**
	 * @param  Identity $manufacturerId 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setManufacturerId(Identity $manufacturerId)
	{
		
		$this->_manufacturerId = $manufacturerId;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getManufacturerId()
	{
		return $this->_manufacturerId;
	}

	/**
	 * @param  string $sku Optional stock keeping unit identifier
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setSku($sku)
	{
		if (!is_string($sku))
			throw new InvalidArgumentException('string expected.');
		$this->_sku = $sku;
		return $this;
	}
	
	/**
	 * @return string Optional stock keeping unit identifier
	 */
	public function getSku()
	{
		return $this->_sku;
	}

	/**
	 * @param  string $name 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setName($name)
	{
		if (!is_string($name))
			throw new InvalidArgumentException('string expected.');
		$this->_name = $name;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  string $description 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setDescription($description)
	{
		if (!is_string($description))
			throw new InvalidArgumentException('string expected.');
		$this->_description = $description;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getDescription()
	{
		return $this->_description;
	}

	/**
	 * @param  float $recommendedRetailPrice Optional recommended retail price (gross) 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setRecommendedRetailPrice($recommendedRetailPrice)
	{
		if (!is_float($recommendedRetailPrice))
			throw new InvalidArgumentException('float expected.');
		$this->_recommendedRetailPrice = $recommendedRetailPrice;
		return $this;
	}
	
	/**
	 * @return float Optional recommended retail price (gross) 
	 */
	public function getRecommendedRetailPrice()
	{
		return $this->_recommendedRetailPrice;
	}

	/**
	 * @param  string $note Optional internal product note
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setNote($note)
	{
		if (!is_string($note))
			throw new InvalidArgumentException('string expected.');
		$this->_note = $note;
		return $this;
	}
	
	/**
	 * @return string Optional internal product note
	 */
	public function getNote()
	{
		return $this->_note;
	}

	/**
	 * @param  float $stockLevel Optional stock (level)
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setStockLevel($stockLevel)
	{
		if (!is_float($stockLevel))
			throw new InvalidArgumentException('float expected.');
		$this->_stockLevel = $stockLevel;
		return $this;
	}
	
	/**
	 * @return float Optional stock (level)
	 */
	public function getStockLevel()
	{
		return $this->_stockLevel;
	}

	/**
	 * @param  float $vat Value added tax
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setVat($vat)
	{
		if (!is_float($vat))
			throw new InvalidArgumentException('float expected.');
		$this->_vat = $vat;
		return $this;
	}
	
	/**
	 * @return float Value added tax
	 */
	public function getVat()
	{
		return $this->_vat;
	}

	/**
	 * @param  float $minimumOrderQuantity Optional minimum quantity needed to purchase product
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setMinimumOrderQuantity($minimumOrderQuantity)
	{
		if (!is_float($minimumOrderQuantity))
			throw new InvalidArgumentException('float expected.');
		$this->_minimumOrderQuantity = $minimumOrderQuantity;
		return $this;
	}
	
	/**
	 * @return float Optional minimum quantity needed to purchase product
	 */
	public function getMinimumOrderQuantity()
	{
		return $this->_minimumOrderQuantity;
	}

	/**
	 * @param  string $ean Optional European Article Number (EAN)
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setEan($ean)
	{
		if (!is_string($ean))
			throw new InvalidArgumentException('string expected.');
		$this->_ean = $ean;
		return $this;
	}
	
	/**
	 * @return string Optional European Article Number (EAN)
	 */
	public function getEan()
	{
		return $this->_ean;
	}

	/**
	 * @param  float $shippingWeight Productweight inclusive packaging
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setShippingWeight($shippingWeight)
	{
		if (!is_float($shippingWeight))
			throw new InvalidArgumentException('float expected.');
		$this->_shippingWeight = $shippingWeight;
		return $this;
	}
	
	/**
	 * @return float Productweight inclusive packaging
	 */
	public function getShippingWeight()
	{
		return $this->_shippingWeight;
	}

	/**
	 * @param  string $shortDescription 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setShortDescription($shortDescription)
	{
		if (!is_string($shortDescription))
			throw new InvalidArgumentException('string expected.');
		$this->_shortDescription = $shortDescription;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getShortDescription()
	{
		return $this->_shortDescription;
	}

	/**
	 * @param  string $manufacturerName 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setManufacturerName($manufacturerName)
	{
		if (!is_string($manufacturerName))
			throw new InvalidArgumentException('string expected.');
		$this->_manufacturerName = $manufacturerName;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getManufacturerName()
	{
		return $this->_manufacturerName;
	}

	/**
	 * @param  float $basePriceValue 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setBasePriceValue($basePriceValue)
	{
		if (!is_float($basePriceValue))
			throw new InvalidArgumentException('float expected.');
		$this->_basePriceValue = $basePriceValue;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getBasePriceValue()
	{
		return $this->_basePriceValue;
	}

	/**
	 * @param  string $taric Optional TARIC
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setTaric($taric)
	{
		if (!is_string($taric))
			throw new InvalidArgumentException('string expected.');
		$this->_taric = $taric;
		return $this;
	}
	
	/**
	 * @return string Optional TARIC
	 */
	public function getTaric()
	{
		return $this->_taric;
	}

	/**
	 * @param  string $originCountry Optional Origin country
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setOriginCountry($originCountry)
	{
		if (!is_string($originCountry))
			throw new InvalidArgumentException('string expected.');
		$this->_originCountry = $originCountry;
		return $this;
	}
	
	/**
	 * @return string Optional Origin country
	 */
	public function getOriginCountry()
	{
		return $this->_originCountry;
	}

	/**
	 * @param  DateTime $created Creation date
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
	 */
	public function setCreated(DateTime $created)
	{
		
		$this->_created = $created;
		return $this;
	}
	
	/**
	 * @return DateTime Creation date
	 */
	public function getCreated()
	{
		return $this->_created;
	}

	/**
	 * @param  DateTime $availableFrom Optional available from date. Specify a date, upon when product can be purchased. 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
	 */
	public function setAvailableFrom(DateTime $availableFrom)
	{
		
		$this->_availableFrom = $availableFrom;
		return $this;
	}
	
	/**
	 * @return DateTime Optional available from date. Specify a date, upon when product can be purchased. 
	 */
	public function getAvailableFrom()
	{
		return $this->_availableFrom;
	}

	/**
	 * @param  integer $sort Optional sort number for product sorting in lists
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setSort($sort)
	{
		if (!is_integer($sort))
			throw new InvalidArgumentException('integer expected.');
		$this->_sort = $sort;
		return $this;
	}
	
	/**
	 * @return integer Optional sort number for product sorting in lists
	 */
	public function getSort()
	{
		return $this->_sort;
	}

	/**
	 * @param  float $productWeight Productweight exclusive packaging
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setProductWeight($productWeight)
	{
		if (!is_float($productWeight))
			throw new InvalidArgumentException('float expected.');
		$this->_productWeight = $productWeight;
		return $this;
	}
	
	/**
	 * @return float Productweight exclusive packaging
	 */
	public function getProductWeight()
	{
		return $this->_productWeight;
	}

	/**
	 * @param  string $manufacturerNumber Optional manufacturer number
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setManufacturerNumber($manufacturerNumber)
	{
		if (!is_string($manufacturerNumber))
			throw new InvalidArgumentException('string expected.');
		$this->_manufacturerNumber = $manufacturerNumber;
		return $this;
	}
	
	/**
	 * @return string Optional manufacturer number
	 */
	public function getManufacturerNumber()
	{
		return $this->_manufacturerNumber;
	}

	/**
	 * @param  string $serialNumber Optional serial number
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setSerialNumber($serialNumber)
	{
		if (!is_string($serialNumber))
			throw new InvalidArgumentException('string expected.');
		$this->_serialNumber = $serialNumber;
		return $this;
	}
	
	/**
	 * @return string Optional serial number
	 */
	public function getSerialNumber()
	{
		return $this->_serialNumber;
	}

	/**
	 * @param  string $isbn Optional International Standard Book Number
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setIsbn($isbn)
	{
		if (!is_string($isbn))
			throw new InvalidArgumentException('string expected.');
		$this->_isbn = $isbn;
		return $this;
	}
	
	/**
	 * @return string Optional International Standard Book Number
	 */
	public function getIsbn()
	{
		return $this->_isbn;
	}

	/**
	 * @param  string $unNumber Optional UN number, used to define hazardous properties
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setUnNumber($unNumber)
	{
		if (!is_string($unNumber))
			throw new InvalidArgumentException('string expected.');
		$this->_unNumber = $unNumber;
		return $this;
	}
	
	/**
	 * @return string Optional UN number, used to define hazardous properties
	 */
	public function getUnNumber()
	{
		return $this->_unNumber;
	}

	/**
	 * @param  string $hazardIdNumber Optional Hazard identifier, encodes general hazard class und subdivision
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setHazardIdNumber($hazardIdNumber)
	{
		if (!is_string($hazardIdNumber))
			throw new InvalidArgumentException('string expected.');
		$this->_hazardIdNumber = $hazardIdNumber;
		return $this;
	}
	
	/**
	 * @return string Optional Hazard identifier, encodes general hazard class und subdivision
	 */
	public function getHazardIdNumber()
	{
		return $this->_hazardIdNumber;
	}

	/**
	 * @param  string $asin Optional Amazon Standard Identification Number
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setAsin($asin)
	{
		if (!is_string($asin))
			throw new InvalidArgumentException('string expected.');
		$this->_asin = $asin;
		return $this;
	}
	
	/**
	 * @return string Optional Amazon Standard Identification Number
	 */
	public function getAsin()
	{
		return $this->_asin;
	}

	/**
	 * @param  float $takeOffQuantity Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setTakeOffQuantity($takeOffQuantity)
	{
		if (!is_float($takeOffQuantity))
			throw new InvalidArgumentException('float expected.');
		$this->_takeOffQuantity = $takeOffQuantity;
		return $this;
	}
	
	/**
	 * @return float Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
	 */
	public function getTakeOffQuantity()
	{
		return $this->_takeOffQuantity;
	}

	/**
	 * @param  string $upc Optional Universal Product Code
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setUpc($upc)
	{
		if (!is_string($upc))
			throw new InvalidArgumentException('string expected.');
		$this->_upc = $upc;
		return $this;
	}
	
	/**
	 * @return string Optional Universal Product Code
	 */
	public function getUpc()
	{
		return $this->_upc;
	}

	/**
	 * @param  string $epId Optional Ebay product ID
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setEpId($epId)
	{
		if (!is_string($epId))
			throw new InvalidArgumentException('string expected.');
		$this->_epId = $epId;
		return $this;
	}
	
	/**
	 * @return string Optional Ebay product ID
	 */
	public function getEpId()
	{
		return $this->_epId;
	}

	/**
	 * @param  Identity $id Unique product id
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique product id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  float $grossPrice 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setGrossPrice($grossPrice)
	{
		if (!is_float($grossPrice))
			throw new InvalidArgumentException('float expected.');
		$this->_grossPrice = $grossPrice;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getGrossPrice()
	{
		return $this->_grossPrice;
	}

	/**
	 * @param  float $netPrice 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setNetPrice($netPrice)
	{
		if (!is_float($netPrice))
			throw new InvalidArgumentException('float expected.');
		$this->_netPrice = $netPrice;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getNetPrice()
	{
		return $this->_netPrice;
	}

	/**
	 * @param  boolean $isActive 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setIsActive($isActive)
	{
		if (!is_bool($isActive))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isActive = $isActive;
		return $this;
	}
	
	/**
	 * @return boolean 
	 */
	public function getIsActive()
	{
		return $this->_isActive;
	}

	/**
	 * @param  boolean $isTopProduct Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setIsTopProduct($isTopProduct)
	{
		if (!is_bool($isTopProduct))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isTopProduct = $isTopProduct;
		return $this;
	}
	
	/**
	 * @return boolean Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
	 */
	public function getIsTopProduct()
	{
		return $this->_isTopProduct;
	}

	/**
	 * @param  boolean $flagUpdate 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setFlagUpdate($flagUpdate)
	{
		if (!is_bool($flagUpdate))
			throw new InvalidArgumentException('boolean expected.');
		$this->_flagUpdate = $flagUpdate;
		return $this;
	}
	
	/**
	 * @return boolean 
	 */
	public function getFlagUpdate()
	{
		return $this->_flagUpdate;
	}

	/**
	 * @param  boolean $flagDelete 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setFlagDelete($flagDelete)
	{
		if (!is_bool($flagDelete))
			throw new InvalidArgumentException('boolean expected.');
		$this->_flagDelete = $flagDelete;
		return $this;
	}
	
	/**
	 * @return boolean 
	 */
	public function getFlagDelete()
	{
		return $this->_flagDelete;
	}

	/**
	 * @param  boolean $isNew Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setIsNew($isNew)
	{
		if (!is_bool($isNew))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isNew = $isNew;
		return $this;
	}
	
	/**
	 * @return boolean Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
	 */
	public function getIsNew()
	{
		return $this->_isNew;
	}

	/**
	 * @param  boolean $considerStock Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setConsiderStock($considerStock)
	{
		if (!is_bool($considerStock))
			throw new InvalidArgumentException('boolean expected.');
		$this->_considerStock = $considerStock;
		return $this;
	}
	
	/**
	 * @return boolean Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
	 */
	public function getConsiderStock()
	{
		return $this->_considerStock;
	}

	/**
	 * @param  boolean $isDivisible Optional: Set to true to allow non-integer quantites for purchase
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setIsDivisible($isDivisible)
	{
		if (!is_bool($isDivisible))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isDivisible = $isDivisible;
		return $this;
	}
	
	/**
	 * @return boolean Optional: Set to true to allow non-integer quantites for purchase
	 */
	public function getIsDivisible()
	{
		return $this->_isDivisible;
	}

	/**
	 * @param  boolean $permitNegativeStock Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true. 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setPermitNegativeStock($permitNegativeStock)
	{
		if (!is_bool($permitNegativeStock))
			throw new InvalidArgumentException('boolean expected.');
		$this->_permitNegativeStock = $permitNegativeStock;
		return $this;
	}
	
	/**
	 * @return boolean Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true. 
	 */
	public function getPermitNegativeStock()
	{
		return $this->_permitNegativeStock;
	}

	/**
	 * @param  boolean $considerVariationStock Optional: Consider stock levels of productVariations. Same as considerStock but for variations. 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setConsiderVariationStock($considerVariationStock)
	{
		if (!is_bool($considerVariationStock))
			throw new InvalidArgumentException('boolean expected.');
		$this->_considerVariationStock = $considerVariationStock;
		return $this;
	}
	
	/**
	 * @return boolean Optional: Consider stock levels of productVariations. Same as considerStock but for variations. 
	 */
	public function getConsiderVariationStock()
	{
		return $this->_considerVariationStock;
	}

	/**
	 * @param  boolean $considerBasePrice Optional: Set to true to display base price / unit pricing measure
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setConsiderBasePrice($considerBasePrice)
	{
		if (!is_bool($considerBasePrice))
			throw new InvalidArgumentException('boolean expected.');
		$this->_considerBasePrice = $considerBasePrice;
		return $this;
	}
	
	/**
	 * @return boolean Optional: Set to true to display base price / unit pricing measure
	 */
	public function getConsiderBasePrice()
	{
		return $this->_considerBasePrice;
	}

	/**
	 * @param  Identity $taxClassId 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setTaxClassId(Identity $taxClassId)
	{
		
		$this->_taxClassId = $taxClassId;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getTaxClassId()
	{
		return $this->_taxClassId;
	}

	/**
	 * @param  Identity $shippingClassId Reference to shippingClass
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setShippingClassId(Identity $shippingClassId)
	{
		
		$this->_shippingClassId = $shippingClassId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to shippingClass
	 */
	public function getShippingClassId()
	{
		return $this->_shippingClassId;
	}

	/**
	 * @param  Identity $varCombinationId 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setVarCombinationId(Identity $varCombinationId)
	{
		
		$this->_varCombinationId = $varCombinationId;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getVarCombinationId()
	{
		return $this->_varCombinationId;
	}

	/**
	 * @param  Identity $masterProductId Reference to master product
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setMasterProductId(Identity $masterProductId)
	{
		
		$this->_masterProductId = $masterProductId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to master product
	 */
	public function getMasterProductId()
	{
		return $this->_masterProductId;
	}

	/**
	 * @param  boolean $isMasterProduct Optional flag if product is master product
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setIsMasterProduct($isMasterProduct)
	{
		if (!is_bool($isMasterProduct))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isMasterProduct = $isMasterProduct;
		return $this;
	}
	
	/**
	 * @return boolean Optional flag if product is master product
	 */
	public function getIsMasterProduct()
	{
		return $this->_isMasterProduct;
	}

	/**
	 * @param  Identity $setArticleId Optional reference to setArticle
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setSetArticleId(Identity $setArticleId)
	{
		
		$this->_setArticleId = $setArticleId;
		return $this;
	}
	
	/**
	 * @return Identity Optional reference to setArticle
	 */
	public function getSetArticleId()
	{
		return $this->_setArticleId;
	}

	/**
	 * @param  Identity $productTypeId Optional reference to productType
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setProductTypeId(Identity $productTypeId)
	{
		
		$this->_productTypeId = $productTypeId;
		return $this;
	}
	
	/**
	 * @return Identity Optional reference to productType
	 */
	public function getProductTypeId()
	{
		return $this->_productTypeId;
	}

	/**
	 * @param  boolean $hasBestBefore 
	 * @return \jtl\Connector\Model\Product
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setHasBestBefore($hasBestBefore)
	{
		if (!is_bool($hasBestBefore))
			throw new InvalidArgumentException('boolean expected.');
		$this->_hasBestBefore = $hasBestBefore;
		return $this;
	}
	
	/**
	 * @return boolean 
	 */
	public function getHasBestBefore()
	{
		return $this->_hasBestBefore;
	}

	/**
	 * @param  \jtl\Connector\Model\ProductI18n $i18ns
	 * @return \jtl\Connector\Model\Product
	 */
	public function addI18ns(\jtl\Connector\Model\ProductI18n $i18ns)
	{
		$this->_i18ns[] = $i18ns;
		return $this;
	}
	
	/**
	 * @return ProductI18n
	 */
	public function getI18ns()
	{
		return $this->_i18ns;
	}

	/**
	 * @return \jtl\Connector\Model\Product
	 */
	public function clearI18ns()
	{
		$this->_i18ns = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\ProductPriceOld $price
	 * @return \jtl\Connector\Model\Product
	 */
	public function addPrice(\jtl\Connector\Model\ProductPriceOld $price)
	{
		$this->_prices[] = $price;
		return $this;
	}
	
	/**
	 * @return ProductPriceOld
	 */
	public function getPrices()
	{
		return $this->_prices;
	}

	/**
	 * @return \jtl\Connector\Model\Product
	 */
	public function clearPrices()
	{
		$this->_prices = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\ProductSpecialPrice $specialPrice
	 * @return \jtl\Connector\Model\Product
	 */
	public function addSpecialPrice(\jtl\Connector\Model\ProductSpecialPrice $specialPrice)
	{
		$this->_specialPrices[] = $specialPrice;
		return $this;
	}
	
	/**
	 * @return ProductSpecialPrice
	 */
	public function getSpecialPrices()
	{
		return $this->_specialPrices;
	}

	/**
	 * @return \jtl\Connector\Model\Product
	 */
	public function clearSpecialPrices()
	{
		$this->_specialPrices = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\ProductFileDownload $fileDownload
	 * @return \jtl\Connector\Model\Product
	 */
	public function addFileDownload(\jtl\Connector\Model\ProductFileDownload $fileDownload)
	{
		$this->_fileDownloads[] = $fileDownload;
		return $this;
	}
	
	/**
	 * @return ProductFileDownload
	 */
	public function getFileDownloads()
	{
		return $this->_fileDownloads;
	}

	/**
	 * @return \jtl\Connector\Model\Product
	 */
	public function clearFileDownloads()
	{
		$this->_fileDownloads = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\Product2Category $category
	 * @return \jtl\Connector\Model\Product
	 */
	public function addCategory(\jtl\Connector\Model\Product2Category $category)
	{
		$this->_categories[] = $category;
		return $this;
	}
	
	/**
	 * @return Product2Category
	 */
	public function getCategories()
	{
		return $this->_categories;
	}

	/**
	 * @return \jtl\Connector\Model\Product
	 */
	public function clearCategories()
	{
		$this->_categories = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\MediaFile $mediaFile
	 * @return \jtl\Connector\Model\Product
	 */
	public function addMediaFile(\jtl\Connector\Model\MediaFile $mediaFile)
	{
		$this->_mediaFiles[] = $mediaFile;
		return $this;
	}
	
	/**
	 * @return MediaFile
	 */
	public function getMediaFiles()
	{
		return $this->_mediaFiles;
	}

	/**
	 * @return \jtl\Connector\Model\Product
	 */
	public function clearMediaFiles()
	{
		$this->_mediaFiles = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\ProductFunctionAttr $functionAttr
	 * @return \jtl\Connector\Model\Product
	 */
	public function addFunctionAttr(\jtl\Connector\Model\ProductFunctionAttr $functionAttr)
	{
		$this->_functionAttrs[] = $functionAttr;
		return $this;
	}
	
	/**
	 * @return ProductFunctionAttr
	 */
	public function getFunctionAttrs()
	{
		return $this->_functionAttrs;
	}

	/**
	 * @return \jtl\Connector\Model\Product
	 */
	public function clearFunctionAttrs()
	{
		$this->_functionAttrs = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\ProductAttr $attr
	 * @return \jtl\Connector\Model\Product
	 */
	public function addAttr(\jtl\Connector\Model\ProductAttr $attr)
	{
		$this->_attrs[] = $attr;
		return $this;
	}
	
	/**
	 * @return ProductAttr
	 */
	public function getAttrs()
	{
		return $this->_attrs;
	}

	/**
	 * @return \jtl\Connector\Model\Product
	 */
	public function clearAttrs()
	{
		$this->_attrs = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\ProductConfigGroup $configGroup
	 * @return \jtl\Connector\Model\Product
	 */
	public function addConfigGroup(\jtl\Connector\Model\ProductConfigGroup $configGroup)
	{
		$this->_configGroups[] = $configGroup;
		return $this;
	}
	
	/**
	 * @return ProductConfigGroup
	 */
	public function getConfigGroups()
	{
		return $this->_configGroups;
	}

	/**
	 * @return \jtl\Connector\Model\Product
	 */
	public function clearConfigGroups()
	{
		$this->_configGroups = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\ProductInvisibility $invisibility
	 * @return \jtl\Connector\Model\Product
	 */
	public function addInvisibility(\jtl\Connector\Model\ProductInvisibility $invisibility)
	{
		$this->_invisibilities[] = $invisibility;
		return $this;
	}
	
	/**
	 * @return ProductInvisibility
	 */
	public function getInvisibilities()
	{
		return $this->_invisibilities;
	}

	/**
	 * @return \jtl\Connector\Model\Product
	 */
	public function clearInvisibilities()
	{
		$this->_invisibilities = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\CrossSelling $crossSelling
	 * @return \jtl\Connector\Model\Product
	 */
	public function addCrossSelling(\jtl\Connector\Model\CrossSelling $crossSelling)
	{
		$this->_crossSellings[] = $crossSelling;
		return $this;
	}
	
	/**
	 * @return CrossSelling
	 */
	public function getCrossSellings()
	{
		return $this->_crossSellings;
	}

	/**
	 * @return \jtl\Connector\Model\Product
	 */
	public function clearCrossSellings()
	{
		$this->_crossSellings = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\SetArticle $setArticle
	 * @return \jtl\Connector\Model\Product
	 */
	public function addSetArticle(\jtl\Connector\Model\SetArticle $setArticle)
	{
		$this->_setArticles[] = $setArticle;
		return $this;
	}
	
	/**
	 * @return SetArticle
	 */
	public function getSetArticles()
	{
		return $this->_setArticles;
	}

	/**
	 * @return \jtl\Connector\Model\Product
	 */
	public function clearSetArticles()
	{
		$this->_setArticles = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\ProductVariation $variation
	 * @return \jtl\Connector\Model\Product
	 */
	public function addVariation(\jtl\Connector\Model\ProductVariation $variation)
	{
		$this->_variations[] = $variation;
		return $this;
	}
	
	/**
	 * @return ProductVariation
	 */
	public function getVariations()
	{
		return $this->_variations;
	}

	/**
	 * @return \jtl\Connector\Model\Product
	 */
	public function clearVariations()
	{
		$this->_variations = array();
		return $this;
	}
}

