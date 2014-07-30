<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Product properties..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Product extends DataModel
{
    /**
     * @type Identity Unique product id
     */
    protected $id = null;

    /**
     * @type Identity 
     */
    protected $manufacturerId = null;

    /**
     * @type Identity Reference to master product
     */
    protected $masterProductId = null;

    /**
     * @type Identity 
     */
    protected $measurementUnitId = null;

    /**
     * @type Identity Optional reference to productType
     */
    protected $productTypeId = null;

    /**
     * @type Identity Optional reference to setArticle
     */
    protected $setArticleId = null;

    /**
     * @type Identity Reference to shippingClass
     */
    protected $shippingClassId = null;

    /**
     * @type Identity 
     */
    protected $taxClassId = null;

    /**
     * @type Identity 
     */
    protected $varCombinationId = null;

    /**
     * @type string Optional Amazon Standard Identification Number
     */
    protected $asin = '';

    /**
     * @type DateTime|null Optional available from date. Specify a date, upon when product can be purchased. 
     */
    protected $availableFrom = null;

    /**
     * @type float|null 
     */
    protected $basePriceQuantity = 0.0;

    /**
     * @type float|null 
     */
    protected $basePriceValue = 0.0;

    /**
     * @type boolean Optional: Set to true to display base price / unit pricing measure
     */
    protected $considerBasePrice = false;

    /**
     * @type boolean Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     */
    protected $considerStock = false;

    /**
     * @type boolean Optional: Consider stock levels of productVariations. Same as considerStock but for variations. 
     */
    protected $considerVariationStock = false;

    /**
     * @type DateTime|null Creation date
     */
    protected $created = null;

    /**
     * @type string Optional European Article Number (EAN)
     */
    protected $ean = '';

    /**
     * @type string Optional Ebay product ID
     */
    protected $epId = '';

    /**
     * @type boolean 
     */
    protected $flagDelete = false;

    /**
     * @type boolean 
     */
    protected $flagUpdate = false;

    /**
     * @type float 
     */
    protected $grossPrice = 0.0;

    /**
     * @type boolean 
     */
    protected $hasBestBefore = false;

    /**
     * @type string Optional Hazard identifier, encodes general hazard class und subdivision
     */
    protected $hazardIdNumber = '';

    /**
     * @type float|null 
     */
    protected $height = 0.0;

    /**
     * @type boolean 
     */
    protected $isActive = false;

    /**
     * @type string Optional International Standard Book Number
     */
    protected $isbn = '';

    /**
     * @type boolean Optional: Set to true to allow non-integer quantites for purchase
     */
    protected $isDivisible = false;

    /**
     * @type boolean Optional flag if product is master product
     */
    protected $isMasterProduct = false;

    /**
     * @type boolean Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     */
    protected $isNew = false;

    /**
     * @type boolean Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     */
    protected $isTopProduct = false;

    /**
     * @type float|null 
     */
    protected $length = 0.0;

    /**
     * @type string 
     */
    protected $manufacturerName = '';

    /**
     * @type string Optional manufacturer number
     */
    protected $manufacturerNumber = '';

    /**
     * @type float|null 
     */
    protected $measurementQuantity = 0.0;

    /**
     * @type float|null Optional minimum quantity needed to purchase product
     */
    protected $minimumOrderQuantity = 0.0;

    /**
     * @type float 
     */
    protected $netPrice = 0.0;

    /**
     * @type string Optional internal product note
     */
    protected $note = '';

    /**
     * @type string Optional Origin country
     */
    protected $originCountry = '';

    /**
     * @type boolean Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true. 
     */
    protected $permitNegativeStock = false;

    /**
     * @type float|null Productweight exclusive packaging
     */
    protected $productWeight = 0.0;

    /**
     * @type float|null Optional recommended retail price (gross) 
     */
    protected $recommendedRetailPrice = 0.0;

    /**
     * @type string Optional serial number
     */
    protected $serialNumber = '';

    /**
     * @type float|null Productweight inclusive packaging
     */
    protected $shippingWeight = 0.0;

    /**
     * @type string Optional stock keeping unit identifier
     */
    protected $sku = '';

    /**
     * @type integer|null Optional sort number for product sorting in lists
     */
    protected $sort = 0;

    /**
     * @type float|null Optional stock (level)
     */
    protected $stockLevel = 0.0;

    /**
     * @type float|null Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     */
    protected $takeOffQuantity = 0.0;

    /**
     * @type string Optional TARIC
     */
    protected $taric = '';

    /**
     * @type string Optional UN number, used to define hazardous properties
     */
    protected $unNumber = '';

    /**
     * @type string Optional Universal Product Code
     */
    protected $upc = '';

    /**
     * @type float|null Value added tax
     */
    protected $vat = 0.0;

    /**
     * @type float|null 
     */
    protected $width = 0.0;

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\ProductPriceOld[]
     */
    protected $prices = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\ProductSpecialPrice[]
     */
    protected $specialPrices = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\ProductFileDownload[]
     */
    protected $fileDownloads = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\Product2Category[]
     */
    protected $categories = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\MediaFile[]
     */
    protected $mediaFiles = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\ProductConfigGroup[]
     */
    protected $configGroups = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\ProductInvisibility[]
     */
    protected $invisibilities = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\CrossSelling[]
     */
    protected $crossSellings = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\SetArticle[]
     */
    protected $setArticles = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\ProductVariation[]
     */
    protected $variations = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\ProductI18n[]
     */
    protected $i18ns = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'manufacturerId',
        'id',
        'taxClassId',
        'shippingClassId',
        'varCombinationId',
        'masterProductId',
        'setArticleId',
        'productTypeId',
        'measurementUnitId',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
        'prices' => '\jtl\Connector\Model\ProductPriceOld',
        'specialPrices' => '\jtl\Connector\Model\ProductSpecialPrice',
        'fileDownloads' => '\jtl\Connector\Model\ProductFileDownload',
        'categories' => '\jtl\Connector\Model\Product2Category',
        'mediaFiles' => '\jtl\Connector\Model\MediaFile',
        'configGroups' => '\jtl\Connector\Model\ProductConfigGroup',
        'invisibilities' => '\jtl\Connector\Model\ProductInvisibility',
        'crossSellings' => '\jtl\Connector\Model\CrossSelling',
        'setArticles' => '\jtl\Connector\Model\SetArticle',
        'variations' => '\jtl\Connector\Model\ProductVariation',
        'i18ns' => '\jtl\Connector\Model\ProductI18n',
    );


    /**
     * @param  Identity $manufacturerId 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setManufacturerId(Identity $manufacturerId)
    {
        return $this->setProperty('manufacturerId', $manufacturerId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getManufacturerId()
    {
        return $this->manufacturerId;
    }

    /**
     * @param  string $sku Optional stock keeping unit identifier
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setSku($sku)
    {
        return $this->setProperty('sku', $sku, 'string');
    }
    
    /**
     * @return string Optional stock keeping unit identifier
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param  float $recommendedRetailPrice Optional recommended retail price (gross) 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setRecommendedRetailPrice($recommendedRetailPrice)
    {
        return $this->setProperty('recommendedRetailPrice', $recommendedRetailPrice, 'float');
    }
    
    /**
     * @return float Optional recommended retail price (gross) 
     */
    public function getRecommendedRetailPrice()
    {
        return $this->recommendedRetailPrice;
    }

    /**
     * @param  string $note Optional internal product note
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setNote($note)
    {
        return $this->setProperty('note', $note, 'string');
    }
    
    /**
     * @return string Optional internal product note
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param  float $stockLevel Optional stock (level)
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setStockLevel($stockLevel)
    {
        return $this->setProperty('stockLevel', $stockLevel, 'float');
    }
    
    /**
     * @return float Optional stock (level)
     */
    public function getStockLevel()
    {
        return $this->stockLevel;
    }

    /**
     * @param  float $vat Value added tax
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setVat($vat)
    {
        return $this->setProperty('vat', $vat, 'float');
    }
    
    /**
     * @return float Value added tax
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @param  float $minimumOrderQuantity Optional minimum quantity needed to purchase product
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setMinimumOrderQuantity($minimumOrderQuantity)
    {
        return $this->setProperty('minimumOrderQuantity', $minimumOrderQuantity, 'float');
    }
    
    /**
     * @return float Optional minimum quantity needed to purchase product
     */
    public function getMinimumOrderQuantity()
    {
        return $this->minimumOrderQuantity;
    }

    /**
     * @param  string $ean Optional European Article Number (EAN)
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setEan($ean)
    {
        return $this->setProperty('ean', $ean, 'string');
    }
    
    /**
     * @return string Optional European Article Number (EAN)
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param  float $shippingWeight Productweight inclusive packaging
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setShippingWeight($shippingWeight)
    {
        return $this->setProperty('shippingWeight', $shippingWeight, 'float');
    }
    
    /**
     * @return float Productweight inclusive packaging
     */
    public function getShippingWeight()
    {
        return $this->shippingWeight;
    }

    /**
     * @param  string $manufacturerName 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setManufacturerName($manufacturerName)
    {
        return $this->setProperty('manufacturerName', $manufacturerName, 'string');
    }
    
    /**
     * @return string 
     */
    public function getManufacturerName()
    {
        return $this->manufacturerName;
    }

    /**
     * @param  float $basePriceValue 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setBasePriceValue($basePriceValue)
    {
        return $this->setProperty('basePriceValue', $basePriceValue, 'float');
    }
    
    /**
     * @return float 
     */
    public function getBasePriceValue()
    {
        return $this->basePriceValue;
    }

    /**
     * @param  string $taric Optional TARIC
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setTaric($taric)
    {
        return $this->setProperty('taric', $taric, 'string');
    }
    
    /**
     * @return string Optional TARIC
     */
    public function getTaric()
    {
        return $this->taric;
    }

    /**
     * @param  string $originCountry Optional Origin country
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setOriginCountry($originCountry)
    {
        return $this->setProperty('originCountry', $originCountry, 'string');
    }
    
    /**
     * @return string Optional Origin country
     */
    public function getOriginCountry()
    {
        return $this->originCountry;
    }

    /**
     * @param  DateTime $created Creation date
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreated(DateTime $created)
    {
        return $this->setProperty('created', $created, 'DateTime');
    }
    
    /**
     * @return DateTime Creation date
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param  DateTime $availableFrom Optional available from date. Specify a date, upon when product can be purchased. 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setAvailableFrom(DateTime $availableFrom)
    {
        return $this->setProperty('availableFrom', $availableFrom, 'DateTime');
    }
    
    /**
     * @return DateTime Optional available from date. Specify a date, upon when product can be purchased. 
     */
    public function getAvailableFrom()
    {
        return $this->availableFrom;
    }

    /**
     * @param  integer $sort Optional sort number for product sorting in lists
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort number for product sorting in lists
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  float $productWeight Productweight exclusive packaging
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setProductWeight($productWeight)
    {
        return $this->setProperty('productWeight', $productWeight, 'float');
    }
    
    /**
     * @return float Productweight exclusive packaging
     */
    public function getProductWeight()
    {
        return $this->productWeight;
    }

    /**
     * @param  string $manufacturerNumber Optional manufacturer number
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setManufacturerNumber($manufacturerNumber)
    {
        return $this->setProperty('manufacturerNumber', $manufacturerNumber, 'string');
    }
    
    /**
     * @return string Optional manufacturer number
     */
    public function getManufacturerNumber()
    {
        return $this->manufacturerNumber;
    }

    /**
     * @param  string $serialNumber Optional serial number
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setSerialNumber($serialNumber)
    {
        return $this->setProperty('serialNumber', $serialNumber, 'string');
    }
    
    /**
     * @return string Optional serial number
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * @param  string $isbn Optional International Standard Book Number
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setIsbn($isbn)
    {
        return $this->setProperty('isbn', $isbn, 'string');
    }
    
    /**
     * @return string Optional International Standard Book Number
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param  string $unNumber Optional UN number, used to define hazardous properties
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUnNumber($unNumber)
    {
        return $this->setProperty('unNumber', $unNumber, 'string');
    }
    
    /**
     * @return string Optional UN number, used to define hazardous properties
     */
    public function getUnNumber()
    {
        return $this->unNumber;
    }

    /**
     * @param  string $hazardIdNumber Optional Hazard identifier, encodes general hazard class und subdivision
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setHazardIdNumber($hazardIdNumber)
    {
        return $this->setProperty('hazardIdNumber', $hazardIdNumber, 'string');
    }
    
    /**
     * @return string Optional Hazard identifier, encodes general hazard class und subdivision
     */
    public function getHazardIdNumber()
    {
        return $this->hazardIdNumber;
    }

    /**
     * @param  string $asin Optional Amazon Standard Identification Number
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setAsin($asin)
    {
        return $this->setProperty('asin', $asin, 'string');
    }
    
    /**
     * @return string Optional Amazon Standard Identification Number
     */
    public function getAsin()
    {
        return $this->asin;
    }

    /**
     * @param  float $takeOffQuantity Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setTakeOffQuantity($takeOffQuantity)
    {
        return $this->setProperty('takeOffQuantity', $takeOffQuantity, 'float');
    }
    
    /**
     * @return float Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     */
    public function getTakeOffQuantity()
    {
        return $this->takeOffQuantity;
    }

    /**
     * @param  string $upc Optional Universal Product Code
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUpc($upc)
    {
        return $this->setProperty('upc', $upc, 'string');
    }
    
    /**
     * @return string Optional Universal Product Code
     */
    public function getUpc()
    {
        return $this->upc;
    }

    /**
     * @param  string $epId Optional Ebay product ID
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setEpId($epId)
    {
        return $this->setProperty('epId', $epId, 'string');
    }
    
    /**
     * @return string Optional Ebay product ID
     */
    public function getEpId()
    {
        return $this->epId;
    }

    /**
     * @param  float $measurementQuantity 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setMeasurementQuantity($measurementQuantity)
    {
        return $this->setProperty('measurementQuantity', $measurementQuantity, 'float');
    }
    
    /**
     * @return float 
     */
    public function getMeasurementQuantity()
    {
        return $this->measurementQuantity;
    }

    /**
     * @param  float $basePriceQuantity 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setBasePriceQuantity($basePriceQuantity)
    {
        return $this->setProperty('basePriceQuantity', $basePriceQuantity, 'float');
    }
    
    /**
     * @return float 
     */
    public function getBasePriceQuantity()
    {
        return $this->basePriceQuantity;
    }

    /**
     * @param  float $width 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setWidth($width)
    {
        return $this->setProperty('width', $width, 'float');
    }
    
    /**
     * @return float 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param  float $height 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setHeight($height)
    {
        return $this->setProperty('height', $height, 'float');
    }
    
    /**
     * @return float 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param  float $length 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setLength($length)
    {
        return $this->setProperty('length', $length, 'float');
    }
    
    /**
     * @return float 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param  Identity $id Unique product id
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique product id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  float $grossPrice 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setGrossPrice($grossPrice)
    {
        return $this->setProperty('grossPrice', $grossPrice, 'float');
    }
    
    /**
     * @return float 
     */
    public function getGrossPrice()
    {
        return $this->grossPrice;
    }

    /**
     * @param  float $netPrice 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPrice($netPrice)
    {
        return $this->setProperty('netPrice', $netPrice, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPrice()
    {
        return $this->netPrice;
    }

    /**
     * @param  boolean $isActive 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('isActive', $isActive, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param  boolean $isTopProduct Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsTopProduct($isTopProduct)
    {
        return $this->setProperty('isTopProduct', $isTopProduct, 'boolean');
    }
    
    /**
     * @return boolean Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     */
    public function getIsTopProduct()
    {
        return $this->isTopProduct;
    }

    /**
     * @param  boolean $flagUpdate 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setFlagUpdate($flagUpdate)
    {
        return $this->setProperty('flagUpdate', $flagUpdate, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getFlagUpdate()
    {
        return $this->flagUpdate;
    }

    /**
     * @param  boolean $flagDelete 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setFlagDelete($flagDelete)
    {
        return $this->setProperty('flagDelete', $flagDelete, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getFlagDelete()
    {
        return $this->flagDelete;
    }

    /**
     * @param  boolean $isNew Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsNew($isNew)
    {
        return $this->setProperty('isNew', $isNew, 'boolean');
    }
    
    /**
     * @return boolean Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     */
    public function getIsNew()
    {
        return $this->isNew;
    }

    /**
     * @param  boolean $considerStock Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setConsiderStock($considerStock)
    {
        return $this->setProperty('considerStock', $considerStock, 'boolean');
    }
    
    /**
     * @return boolean Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     */
    public function getConsiderStock()
    {
        return $this->considerStock;
    }

    /**
     * @param  boolean $isDivisible Optional: Set to true to allow non-integer quantites for purchase
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsDivisible($isDivisible)
    {
        return $this->setProperty('isDivisible', $isDivisible, 'boolean');
    }
    
    /**
     * @return boolean Optional: Set to true to allow non-integer quantites for purchase
     */
    public function getIsDivisible()
    {
        return $this->isDivisible;
    }

    /**
     * @param  boolean $permitNegativeStock Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true. 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setPermitNegativeStock($permitNegativeStock)
    {
        return $this->setProperty('permitNegativeStock', $permitNegativeStock, 'boolean');
    }
    
    /**
     * @return boolean Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true. 
     */
    public function getPermitNegativeStock()
    {
        return $this->permitNegativeStock;
    }

    /**
     * @param  boolean $considerVariationStock Optional: Consider stock levels of productVariations. Same as considerStock but for variations. 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setConsiderVariationStock($considerVariationStock)
    {
        return $this->setProperty('considerVariationStock', $considerVariationStock, 'boolean');
    }
    
    /**
     * @return boolean Optional: Consider stock levels of productVariations. Same as considerStock but for variations. 
     */
    public function getConsiderVariationStock()
    {
        return $this->considerVariationStock;
    }

    /**
     * @param  boolean $considerBasePrice Optional: Set to true to display base price / unit pricing measure
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setConsiderBasePrice($considerBasePrice)
    {
        return $this->setProperty('considerBasePrice', $considerBasePrice, 'boolean');
    }
    
    /**
     * @return boolean Optional: Set to true to display base price / unit pricing measure
     */
    public function getConsiderBasePrice()
    {
        return $this->considerBasePrice;
    }

    /**
     * @param  Identity $taxClassId 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTaxClassId(Identity $taxClassId)
    {
        return $this->setProperty('taxClassId', $taxClassId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getTaxClassId()
    {
        return $this->taxClassId;
    }

    /**
     * @param  Identity $shippingClassId Reference to shippingClass
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingClassId(Identity $shippingClassId)
    {
        return $this->setProperty('shippingClassId', $shippingClassId, 'Identity');
    }
    
    /**
     * @return Identity Reference to shippingClass
     */
    public function getShippingClassId()
    {
        return $this->shippingClassId;
    }

    /**
     * @param  Identity $varCombinationId 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setVarCombinationId(Identity $varCombinationId)
    {
        return $this->setProperty('varCombinationId', $varCombinationId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getVarCombinationId()
    {
        return $this->varCombinationId;
    }

    /**
     * @param  Identity $masterProductId Reference to master product
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMasterProductId(Identity $masterProductId)
    {
        return $this->setProperty('masterProductId', $masterProductId, 'Identity');
    }
    
    /**
     * @return Identity Reference to master product
     */
    public function getMasterProductId()
    {
        return $this->masterProductId;
    }

    /**
     * @param  boolean $isMasterProduct Optional flag if product is master product
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsMasterProduct($isMasterProduct)
    {
        return $this->setProperty('isMasterProduct', $isMasterProduct, 'boolean');
    }
    
    /**
     * @return boolean Optional flag if product is master product
     */
    public function getIsMasterProduct()
    {
        return $this->isMasterProduct;
    }

    /**
     * @param  Identity $setArticleId Optional reference to setArticle
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSetArticleId(Identity $setArticleId)
    {
        return $this->setProperty('setArticleId', $setArticleId, 'Identity');
    }
    
    /**
     * @return Identity Optional reference to setArticle
     */
    public function getSetArticleId()
    {
        return $this->setArticleId;
    }

    /**
     * @param  Identity $productTypeId Optional reference to productType
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductTypeId(Identity $productTypeId)
    {
        return $this->setProperty('productTypeId', $productTypeId, 'Identity');
    }
    
    /**
     * @return Identity Optional reference to productType
     */
    public function getProductTypeId()
    {
        return $this->productTypeId;
    }

    /**
     * @param  boolean $hasBestBefore 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setHasBestBefore($hasBestBefore)
    {
        return $this->setProperty('hasBestBefore', $hasBestBefore, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getHasBestBefore()
    {
        return $this->hasBestBefore;
    }

    /**
     * @param  Identity $measurementUnitId 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMeasurementUnitId(Identity $measurementUnitId)
    {
        return $this->setProperty('measurementUnitId', $measurementUnitId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getMeasurementUnitId()
    {
        return $this->measurementUnitId;
    }

    /**
     * @param  \jtl\Connector\Model\ProductPriceOld $price
     * @return \jtl\Connector\Model\Product
     */
    public function addPrice(\jtl\Connector\Model\ProductPriceOld $price)
    {
        $this->prices[] = $price;
        return $this;
    }
    
    /**
     * @return ProductPriceOld
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearPrices()
    {
        $this->prices = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductSpecialPrice $specialPrice
     * @return \jtl\Connector\Model\Product
     */
    public function addSpecialPrice(\jtl\Connector\Model\ProductSpecialPrice $specialPrice)
    {
        $this->specialPrices[] = $specialPrice;
        return $this;
    }
    
    /**
     * @return ProductSpecialPrice
     */
    public function getSpecialPrices()
    {
        return $this->specialPrices;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearSpecialPrices()
    {
        $this->specialPrices = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductFileDownload $fileDownload
     * @return \jtl\Connector\Model\Product
     */
    public function addFileDownload(\jtl\Connector\Model\ProductFileDownload $fileDownload)
    {
        $this->fileDownloads[] = $fileDownload;
        return $this;
    }
    
    /**
     * @return ProductFileDownload
     */
    public function getFileDownloads()
    {
        return $this->fileDownloads;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearFileDownloads()
    {
        $this->fileDownloads = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\Product2Category $category
     * @return \jtl\Connector\Model\Product
     */
    public function addCategory(\jtl\Connector\Model\Product2Category $category)
    {
        $this->categories[] = $category;
        return $this;
    }
    
    /**
     * @return Product2Category
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearCategories()
    {
        $this->categories = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\MediaFile $mediaFile
     * @return \jtl\Connector\Model\Product
     */
    public function addMediaFile(\jtl\Connector\Model\MediaFile $mediaFile)
    {
        $this->mediaFiles[] = $mediaFile;
        return $this;
    }
    
    /**
     * @return MediaFile
     */
    public function getMediaFiles()
    {
        return $this->mediaFiles;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearMediaFiles()
    {
        $this->mediaFiles = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductConfigGroup $configGroup
     * @return \jtl\Connector\Model\Product
     */
    public function addConfigGroup(\jtl\Connector\Model\ProductConfigGroup $configGroup)
    {
        $this->configGroups[] = $configGroup;
        return $this;
    }
    
    /**
     * @return ProductConfigGroup
     */
    public function getConfigGroups()
    {
        return $this->configGroups;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearConfigGroups()
    {
        $this->configGroups = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductInvisibility $invisibility
     * @return \jtl\Connector\Model\Product
     */
    public function addInvisibility(\jtl\Connector\Model\ProductInvisibility $invisibility)
    {
        $this->invisibilities[] = $invisibility;
        return $this;
    }
    
    /**
     * @return ProductInvisibility
     */
    public function getInvisibilities()
    {
        return $this->invisibilities;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearInvisibilities()
    {
        $this->invisibilities = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CrossSelling $crossSelling
     * @return \jtl\Connector\Model\Product
     */
    public function addCrossSelling(\jtl\Connector\Model\CrossSelling $crossSelling)
    {
        $this->crossSellings[] = $crossSelling;
        return $this;
    }
    
    /**
     * @return CrossSelling
     */
    public function getCrossSellings()
    {
        return $this->crossSellings;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearCrossSellings()
    {
        $this->crossSellings = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\SetArticle $setArticle
     * @return \jtl\Connector\Model\Product
     */
    public function addSetArticle(\jtl\Connector\Model\SetArticle $setArticle)
    {
        $this->setArticles[] = $setArticle;
        return $this;
    }
    
    /**
     * @return SetArticle
     */
    public function getSetArticles()
    {
        return $this->setArticles;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearSetArticles()
    {
        $this->setArticles = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariation $variation
     * @return \jtl\Connector\Model\Product
     */
    public function addVariation(\jtl\Connector\Model\ProductVariation $variation)
    {
        $this->variations[] = $variation;
        return $this;
    }
    
    /**
     * @return ProductVariation
     */
    public function getVariations()
    {
        return $this->variations;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearVariations()
    {
        $this->variations = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductI18n $i18n
     * @return \jtl\Connector\Model\Product
     */
    public function addI18n(\jtl\Connector\Model\ProductI18n $i18n)
    {
        $this->i18ns[] = $i18n;
        return $this;
    }
    
    /**
     * @return ProductI18n
     */
    public function getI18ns()
    {
        return $this->i18ns;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearI18ns()
    {
        $this->i18ns = array();
        return $this;
    }
}

