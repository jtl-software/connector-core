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
     * @type Identity Optional reference to basePriceUnit
     */
    protected $basePriceUnitId = null;

    /**
     * @type Identity Reference to (current) deliveryStatus
     */
    protected $deliveryStatusId = null;

    /**
     * @type Identity Unique product id
     */
    protected $id = null;

    /**
     * @type Identity Reference to manufacturer
     */
    protected $manufacturerId = null;

    /**
     * @type Identity Reference to master product
     */
    protected $masterProductId = null;

    /**
     * @type Identity Optional reference to measurement unit id
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
     * @type Identity Reference to unit
     */
    protected $unitId = null;

    /**
     * @type string Optional Amazon Standard Identification Number
     */
    protected $asin = '';

    /**
     * @type string Optional available from date. Specify a date, upon when product can be purchased. 
     */
    protected $availableFrom = '';

    /**
     * @type double Optional base price divisor. Calculate basePriceDivisor by dividing product filling quantity through unit pricing base measure. E.g. 75ml / 100ml = 0.75
     */
    protected $basePriceDivisor = 0.0;

    /**
     * @type double Optional base price quantity
     */
    protected $basePriceQuantity = 0.0;

    /**
     * @type string Optional best before date. Default 0000-00-00 if product has no best-before-date.
     */
    protected $bestBefore = '';

    /**
     * @type bool Optional: Set to true to display base price / unit pricing measure
     */
    protected $considerBasePrice = false;

    /**
     * @type bool Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     */
    protected $considerStock = false;

    /**
     * @type bool Optional: Consider stock levels of productVariations. Same as considerStock but for variations. 
     */
    protected $considerVariationStock = false;

    /**
     * @type string Creation date
     */
    protected $created = '';

    /**
     * @type string Optional European Article Number (EAN)
     */
    protected $ean = '';

    /**
     * @type string Optional Ebay product ID
     */
    protected $epid = '';

    /**
     * @type string Optional Hazard identifier, encodes general hazard class und subdivision
     */
    protected $hazardIdNumber = '';

    /**
     * @type double Optional product height
     */
    protected $height = 0.0;

    /**
     * @type string Optional expected inflow date
     */
    protected $inflowDate = '';

    /**
     * @type double Optional expected inflow quantity
     */
    protected $inflowQuantity = 0.0;

    /**
     * @type string Optional International Standard Book Number
     */
    protected $isbn = '';

    /**
     * @type bool Optional: Set to true to allow non-integer quantites for purchase
     */
    protected $isDivisible = false;

    /**
     * @type bool Optional flag if product is master product
     */
    protected $isMasterProduct = false;

    /**
     * @type bool Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     */
    protected $isNew = false;

    /**
     * @type bool Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     */
    protected $isTopProduct = false;

    /**
     * @type string Optional internal keywords and synonyms for product
     */
    protected $keywords = '';

    /**
     * @type double Optional product length
     */
    protected $length = 0.0;

    /**
     * @type string Optional manufacturer number
     */
    protected $manufacturerNumber = '';

    /**
     * @type double Optional measurement quantity
     */
    protected $measurementQuantity = 0.0;

    /**
     * @type double Optional minimum quantity needed to purchase product
     */
    protected $minimumOrderQuantity = 0.0;

    /**
     * @type string Optional internal product note
     */
    protected $note = '';

    /**
     * @type string Optional Origin country
     */
    protected $originCountry = '';

    /**
     * @type bool Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true. 
     */
    protected $permitNegativeStock = false;

    /**
     * @type double Productweight exclusive packaging
     */
    protected $productWeight = 0.0;

    /**
     * @type double Optional recommended retail price (gross) 
     */
    protected $recommendedRetailPrice = 0.0;

    /**
     * @type string Optional serial number
     */
    protected $serialNumber = '';

    /**
     * @type double Productweight inclusive packaging
     */
    protected $shippingWeight = 0.0;

    /**
     * @type string Optional stock keeping unit identifier
     */
    protected $sku = '';

    /**
     * @type int Optional sort number for product sorting in lists
     */
    protected $sort = 0;

    /**
     * @type double Optional stock (level)
     */
    protected $stockLevel = 0.0;

    /**
     * @type double Optional average supplier delivery time in days. Default 0 if no average delivery time is present. 
     */
    protected $supplierDeliveryTime = 0.0;

    /**
     * @type double Optional supplier stock level for product
     */
    protected $supplierStockLevel = 0.0;

    /**
     * @type double Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
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
     * @type double Value added tax
     */
    protected $vat = 0.0;

    /**
     * @type double Optional product width
     */
    protected $width = 0.0;

    /**
     * @type \jtl\Connector\Model\ProductVariation[]
     */
    protected $variations = array();

    /**
     * @type \jtl\Connector\Model\ProductSpecialPrice[]
     */
    protected $specialPrices = array();

    /**
     * @type \jtl\Connector\Model\SetArticle[]
     */
    protected $setArticles = array();

    /**
     * @type \jtl\Connector\Model\ProductPrice[]
     */
    protected $prices = array();

    /**
     * @type \jtl\Connector\Model\MediaFile[]
     */
    protected $mediaFiles = array();

    /**
     * @type \jtl\Connector\Model\ProductInvisibility[]
     */
    protected $invisibilities = array();

    /**
     * @type \jtl\Connector\Model\ProductI18n[]
     */
    protected $i18ns = array();

    /**
     * @type \jtl\Connector\Model\ProductFileDownload[]
     */
    protected $fileDownloads = array();

    /**
     * @type \jtl\Connector\Model\CrossSelling[]
     */
    protected $crossSellings = array();

    /**
     * @type \jtl\Connector\Model\ProductConfigGroup[]
     */
    protected $configGroups = array();

    /**
     * @type \jtl\Connector\Model\Product2Category[]
     */
    protected $categories = array();

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'basePriceUnitId',
        'deliveryStatusId',
        'id',
        'manufacturerId',
        'masterProductId',
        'measurementUnitId',
        'productTypeId',
        'setArticleId',
        'shippingClassId',
        'unitId',
    );

    /**
     * @param  Identity $basePriceUnitId Optional reference to basePriceUnit
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBasePriceUnitId(Identity $basePriceUnitId)
    {
        return $this->setProperty('BasePriceUnitId', $basePriceUnitId, 'Identity');
    }

    /**
     * @return Identity Optional reference to basePriceUnit
     */
    public function getBasePriceUnitId()
    {
        return $this->basePriceUnitId;
    }

    /**
     * @param  Identity $deliveryStatusId Reference to (current) deliveryStatus
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDeliveryStatusId(Identity $deliveryStatusId)
    {
        return $this->setProperty('DeliveryStatusId', $deliveryStatusId, 'Identity');
    }

    /**
     * @return Identity Reference to (current) deliveryStatus
     */
    public function getDeliveryStatusId()
    {
        return $this->deliveryStatusId;
    }

    /**
     * @param  Identity $id Unique product id
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique product id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $manufacturerId Reference to manufacturer
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setManufacturerId(Identity $manufacturerId)
    {
        return $this->setProperty('ManufacturerId', $manufacturerId, 'Identity');
    }

    /**
     * @return Identity Reference to manufacturer
     */
    public function getManufacturerId()
    {
        return $this->manufacturerId;
    }

    /**
     * @param  Identity $masterProductId Reference to master product
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMasterProductId(Identity $masterProductId)
    {
        return $this->setProperty('MasterProductId', $masterProductId, 'Identity');
    }

    /**
     * @return Identity Reference to master product
     */
    public function getMasterProductId()
    {
        return $this->masterProductId;
    }

    /**
     * @param  Identity $measurementUnitId Optional reference to measurement unit id
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMeasurementUnitId(Identity $measurementUnitId)
    {
        return $this->setProperty('MeasurementUnitId', $measurementUnitId, 'Identity');
    }

    /**
     * @return Identity Optional reference to measurement unit id
     */
    public function getMeasurementUnitId()
    {
        return $this->measurementUnitId;
    }

    /**
     * @param  Identity $productTypeId Optional reference to productType
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductTypeId(Identity $productTypeId)
    {
        return $this->setProperty('ProductTypeId', $productTypeId, 'Identity');
    }

    /**
     * @return Identity Optional reference to productType
     */
    public function getProductTypeId()
    {
        return $this->productTypeId;
    }

    /**
     * @param  Identity $setArticleId Optional reference to setArticle
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSetArticleId(Identity $setArticleId)
    {
        return $this->setProperty('SetArticleId', $setArticleId, 'Identity');
    }

    /**
     * @return Identity Optional reference to setArticle
     */
    public function getSetArticleId()
    {
        return $this->setArticleId;
    }

    /**
     * @param  Identity $shippingClassId Reference to shippingClass
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingClassId(Identity $shippingClassId)
    {
        return $this->setProperty('ShippingClassId', $shippingClassId, 'Identity');
    }

    /**
     * @return Identity Reference to shippingClass
     */
    public function getShippingClassId()
    {
        return $this->shippingClassId;
    }

    /**
     * @param  Identity $unitId Reference to unit
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setUnitId(Identity $unitId)
    {
        return $this->setProperty('UnitId', $unitId, 'Identity');
    }

    /**
     * @return Identity Reference to unit
     */
    public function getUnitId()
    {
        return $this->unitId;
    }

    /**
     * @param  string $asin Optional Amazon Standard Identification Number
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setAsin(Identity $asin)
    {
        return $this->setProperty('Asin', $asin, 'string');
    }

    /**
     * @return string Optional Amazon Standard Identification Number
     */
    public function getAsin()
    {
        return $this->asin;
    }

    /**
     * @param  string $availableFrom Optional available from date. Specify a date, upon when product can be purchased. 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setAvailableFrom(Identity $availableFrom)
    {
        return $this->setProperty('AvailableFrom', $availableFrom, 'string');
    }

    /**
     * @return string Optional available from date. Specify a date, upon when product can be purchased. 
     */
    public function getAvailableFrom()
    {
        return $this->availableFrom;
    }

    /**
     * @param  double $basePriceDivisor Optional base price divisor. Calculate basePriceDivisor by dividing product filling quantity through unit pricing base measure. E.g. 75ml / 100ml = 0.75
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBasePriceDivisor(Identity $basePriceDivisor)
    {
        return $this->setProperty('BasePriceDivisor', $basePriceDivisor, 'double');
    }

    /**
     * @return double Optional base price divisor. Calculate basePriceDivisor by dividing product filling quantity through unit pricing base measure. E.g. 75ml / 100ml = 0.75
     */
    public function getBasePriceDivisor()
    {
        return $this->basePriceDivisor;
    }

    /**
     * @param  double $basePriceQuantity Optional base price quantity
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBasePriceQuantity(Identity $basePriceQuantity)
    {
        return $this->setProperty('BasePriceQuantity', $basePriceQuantity, 'double');
    }

    /**
     * @return double Optional base price quantity
     */
    public function getBasePriceQuantity()
    {
        return $this->basePriceQuantity;
    }

    /**
     * @param  string $bestBefore Optional best before date. Default 0000-00-00 if product has no best-before-date.
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBestBefore(Identity $bestBefore)
    {
        return $this->setProperty('BestBefore', $bestBefore, 'string');
    }

    /**
     * @return string Optional best before date. Default 0000-00-00 if product has no best-before-date.
     */
    public function getBestBefore()
    {
        return $this->bestBefore;
    }

    /**
     * @param  bool $considerBasePrice Optional: Set to true to display base price / unit pricing measure
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConsiderBasePrice(Identity $considerBasePrice)
    {
        return $this->setProperty('ConsiderBasePrice', $considerBasePrice, 'bool');
    }

    /**
     * @return bool Optional: Set to true to display base price / unit pricing measure
     */
    public function getConsiderBasePrice()
    {
        return $this->considerBasePrice;
    }

    /**
     * @param  bool $considerStock Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConsiderStock(Identity $considerStock)
    {
        return $this->setProperty('ConsiderStock', $considerStock, 'bool');
    }

    /**
     * @return bool Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     */
    public function getConsiderStock()
    {
        return $this->considerStock;
    }

    /**
     * @param  bool $considerVariationStock Optional: Consider stock levels of productVariations. Same as considerStock but for variations. 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConsiderVariationStock(Identity $considerVariationStock)
    {
        return $this->setProperty('ConsiderVariationStock', $considerVariationStock, 'bool');
    }

    /**
     * @return bool Optional: Consider stock levels of productVariations. Same as considerStock but for variations. 
     */
    public function getConsiderVariationStock()
    {
        return $this->considerVariationStock;
    }

    /**
     * @param  string $created Creation date
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCreated(Identity $created)
    {
        return $this->setProperty('Created', $created, 'string');
    }

    /**
     * @return string Creation date
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param  string $ean Optional European Article Number (EAN)
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setEan(Identity $ean)
    {
        return $this->setProperty('Ean', $ean, 'string');
    }

    /**
     * @return string Optional European Article Number (EAN)
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param  string $epid Optional Ebay product ID
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setEpid(Identity $epid)
    {
        return $this->setProperty('Epid', $epid, 'string');
    }

    /**
     * @return string Optional Ebay product ID
     */
    public function getEpid()
    {
        return $this->epid;
    }

    /**
     * @param  string $hazardIdNumber Optional Hazard identifier, encodes general hazard class und subdivision
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setHazardIdNumber(Identity $hazardIdNumber)
    {
        return $this->setProperty('HazardIdNumber', $hazardIdNumber, 'string');
    }

    /**
     * @return string Optional Hazard identifier, encodes general hazard class und subdivision
     */
    public function getHazardIdNumber()
    {
        return $this->hazardIdNumber;
    }

    /**
     * @param  double $height Optional product height
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setHeight(Identity $height)
    {
        return $this->setProperty('Height', $height, 'double');
    }

    /**
     * @return double Optional product height
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param  string $inflowDate Optional expected inflow date
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setInflowDate(Identity $inflowDate)
    {
        return $this->setProperty('InflowDate', $inflowDate, 'string');
    }

    /**
     * @return string Optional expected inflow date
     */
    public function getInflowDate()
    {
        return $this->inflowDate;
    }

    /**
     * @param  double $inflowQuantity Optional expected inflow quantity
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setInflowQuantity(Identity $inflowQuantity)
    {
        return $this->setProperty('InflowQuantity', $inflowQuantity, 'double');
    }

    /**
     * @return double Optional expected inflow quantity
     */
    public function getInflowQuantity()
    {
        return $this->inflowQuantity;
    }

    /**
     * @param  string $isbn Optional International Standard Book Number
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsbn(Identity $isbn)
    {
        return $this->setProperty('Isbn', $isbn, 'string');
    }

    /**
     * @return string Optional International Standard Book Number
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param  bool $isDivisible Optional: Set to true to allow non-integer quantites for purchase
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsDivisible(Identity $isDivisible)
    {
        return $this->setProperty('IsDivisible', $isDivisible, 'bool');
    }

    /**
     * @return bool Optional: Set to true to allow non-integer quantites for purchase
     */
    public function getIsDivisible()
    {
        return $this->isDivisible;
    }

    /**
     * @param  bool $isMasterProduct Optional flag if product is master product
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsMasterProduct(Identity $isMasterProduct)
    {
        return $this->setProperty('IsMasterProduct', $isMasterProduct, 'bool');
    }

    /**
     * @return bool Optional flag if product is master product
     */
    public function getIsMasterProduct()
    {
        return $this->isMasterProduct;
    }

    /**
     * @param  bool $isNew Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsNew(Identity $isNew)
    {
        return $this->setProperty('IsNew', $isNew, 'bool');
    }

    /**
     * @return bool Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     */
    public function getIsNew()
    {
        return $this->isNew;
    }

    /**
     * @param  bool $isTopProduct Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsTopProduct(Identity $isTopProduct)
    {
        return $this->setProperty('IsTopProduct', $isTopProduct, 'bool');
    }

    /**
     * @return bool Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     */
    public function getIsTopProduct()
    {
        return $this->isTopProduct;
    }

    /**
     * @param  string $keywords Optional internal keywords and synonyms for product
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setKeywords(Identity $keywords)
    {
        return $this->setProperty('Keywords', $keywords, 'string');
    }

    /**
     * @return string Optional internal keywords and synonyms for product
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param  double $length Optional product length
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLength(Identity $length)
    {
        return $this->setProperty('Length', $length, 'double');
    }

    /**
     * @return double Optional product length
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param  string $manufacturerNumber Optional manufacturer number
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setManufacturerNumber(Identity $manufacturerNumber)
    {
        return $this->setProperty('ManufacturerNumber', $manufacturerNumber, 'string');
    }

    /**
     * @return string Optional manufacturer number
     */
    public function getManufacturerNumber()
    {
        return $this->manufacturerNumber;
    }

    /**
     * @param  double $measurementQuantity Optional measurement quantity
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMeasurementQuantity(Identity $measurementQuantity)
    {
        return $this->setProperty('MeasurementQuantity', $measurementQuantity, 'double');
    }

    /**
     * @return double Optional measurement quantity
     */
    public function getMeasurementQuantity()
    {
        return $this->measurementQuantity;
    }

    /**
     * @param  double $minimumOrderQuantity Optional minimum quantity needed to purchase product
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMinimumOrderQuantity(Identity $minimumOrderQuantity)
    {
        return $this->setProperty('MinimumOrderQuantity', $minimumOrderQuantity, 'double');
    }

    /**
     * @return double Optional minimum quantity needed to purchase product
     */
    public function getMinimumOrderQuantity()
    {
        return $this->minimumOrderQuantity;
    }

    /**
     * @param  string $note Optional internal product note
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setNote(Identity $note)
    {
        return $this->setProperty('Note', $note, 'string');
    }

    /**
     * @return string Optional internal product note
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param  string $originCountry Optional Origin country
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setOriginCountry(Identity $originCountry)
    {
        return $this->setProperty('OriginCountry', $originCountry, 'string');
    }

    /**
     * @return string Optional Origin country
     */
    public function getOriginCountry()
    {
        return $this->originCountry;
    }

    /**
     * @param  bool $permitNegativeStock Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true. 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPermitNegativeStock(Identity $permitNegativeStock)
    {
        return $this->setProperty('PermitNegativeStock', $permitNegativeStock, 'bool');
    }

    /**
     * @return bool Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true. 
     */
    public function getPermitNegativeStock()
    {
        return $this->permitNegativeStock;
    }

    /**
     * @param  double $productWeight Productweight exclusive packaging
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductWeight(Identity $productWeight)
    {
        return $this->setProperty('ProductWeight', $productWeight, 'double');
    }

    /**
     * @return double Productweight exclusive packaging
     */
    public function getProductWeight()
    {
        return $this->productWeight;
    }

    /**
     * @param  double $recommendedRetailPrice Optional recommended retail price (gross) 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setRecommendedRetailPrice(Identity $recommendedRetailPrice)
    {
        return $this->setProperty('RecommendedRetailPrice', $recommendedRetailPrice, 'double');
    }

    /**
     * @return double Optional recommended retail price (gross) 
     */
    public function getRecommendedRetailPrice()
    {
        return $this->recommendedRetailPrice;
    }

    /**
     * @param  string $serialNumber Optional serial number
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSerialNumber(Identity $serialNumber)
    {
        return $this->setProperty('SerialNumber', $serialNumber, 'string');
    }

    /**
     * @return string Optional serial number
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * @param  double $shippingWeight Productweight inclusive packaging
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingWeight(Identity $shippingWeight)
    {
        return $this->setProperty('ShippingWeight', $shippingWeight, 'double');
    }

    /**
     * @return double Productweight inclusive packaging
     */
    public function getShippingWeight()
    {
        return $this->shippingWeight;
    }

    /**
     * @param  string $sku Optional stock keeping unit identifier
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSku(Identity $sku)
    {
        return $this->setProperty('Sku', $sku, 'string');
    }

    /**
     * @return string Optional stock keeping unit identifier
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param  int $sort Optional sort number for product sorting in lists
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSort(Identity $sort)
    {
        return $this->setProperty('Sort', $sort, 'int');
    }

    /**
     * @return int Optional sort number for product sorting in lists
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  double $stockLevel Optional stock (level)
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setStockLevel(Identity $stockLevel)
    {
        return $this->setProperty('StockLevel', $stockLevel, 'double');
    }

    /**
     * @return double Optional stock (level)
     */
    public function getStockLevel()
    {
        return $this->stockLevel;
    }

    /**
     * @param  double $supplierDeliveryTime Optional average supplier delivery time in days. Default 0 if no average delivery time is present. 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSupplierDeliveryTime(Identity $supplierDeliveryTime)
    {
        return $this->setProperty('SupplierDeliveryTime', $supplierDeliveryTime, 'double');
    }

    /**
     * @return double Optional average supplier delivery time in days. Default 0 if no average delivery time is present. 
     */
    public function getSupplierDeliveryTime()
    {
        return $this->supplierDeliveryTime;
    }

    /**
     * @param  double $supplierStockLevel Optional supplier stock level for product
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSupplierStockLevel(Identity $supplierStockLevel)
    {
        return $this->setProperty('SupplierStockLevel', $supplierStockLevel, 'double');
    }

    /**
     * @return double Optional supplier stock level for product
     */
    public function getSupplierStockLevel()
    {
        return $this->supplierStockLevel;
    }

    /**
     * @param  double $takeOffQuantity Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTakeOffQuantity(Identity $takeOffQuantity)
    {
        return $this->setProperty('TakeOffQuantity', $takeOffQuantity, 'double');
    }

    /**
     * @return double Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     */
    public function getTakeOffQuantity()
    {
        return $this->takeOffQuantity;
    }

    /**
     * @param  string $taric Optional TARIC
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTaric(Identity $taric)
    {
        return $this->setProperty('Taric', $taric, 'string');
    }

    /**
     * @return string Optional TARIC
     */
    public function getTaric()
    {
        return $this->taric;
    }

    /**
     * @param  string $unNumber Optional UN number, used to define hazardous properties
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setUnNumber(Identity $unNumber)
    {
        return $this->setProperty('UnNumber', $unNumber, 'string');
    }

    /**
     * @return string Optional UN number, used to define hazardous properties
     */
    public function getUnNumber()
    {
        return $this->unNumber;
    }

    /**
     * @param  string $upc Optional Universal Product Code
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setUpc(Identity $upc)
    {
        return $this->setProperty('Upc', $upc, 'string');
    }

    /**
     * @return string Optional Universal Product Code
     */
    public function getUpc()
    {
        return $this->upc;
    }

    /**
     * @param  double $vat Value added tax
     * @return \jtl\Connector\Model\Product
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
     * @param  double $width Optional product width
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setWidth(Identity $width)
    {
        return $this->setProperty('Width', $width, 'double');
    }

    /**
     * @return double Optional product width
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariation $variations
     * @return \jtl\Connector\Model\Product
     */
    public function addVariation(\jtl\Connector\Model\ProductVariation $variation)
    {
        $this->variations[] = $variation;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductVariation[]
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
     * @param  \jtl\Connector\Model\ProductSpecialPrice $specialPrices
     * @return \jtl\Connector\Model\Product
     */
    public function addSpecialPrice(\jtl\Connector\Model\ProductSpecialPrice $specialPrice)
    {
        $this->specialPrices[] = $specialPrice;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductSpecialPrice[]
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
     * @param  \jtl\Connector\Model\SetArticle $setArticles
     * @return \jtl\Connector\Model\Product
     */
    public function addSetArticle(\jtl\Connector\Model\SetArticle $setArticle)
    {
        $this->setArticles[] = $setArticle;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\SetArticle[]
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
     * @param  \jtl\Connector\Model\ProductPrice $prices
     * @return \jtl\Connector\Model\Product
     */
    public function addPrice(\jtl\Connector\Model\ProductPrice $price)
    {
        $this->prices[] = $price;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductPrice[]
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
     * @param  \jtl\Connector\Model\MediaFile $mediaFiles
     * @return \jtl\Connector\Model\Product
     */
    public function addMediaFile(\jtl\Connector\Model\MediaFile $mediaFile)
    {
        $this->mediaFiles[] = $mediaFile;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\MediaFile[]
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
     * @param  \jtl\Connector\Model\ProductInvisibility $invisibilities
     * @return \jtl\Connector\Model\Product
     */
    public function addInvisibility(\jtl\Connector\Model\ProductInvisibility $invisibility)
    {
        $this->invisibilities[] = $invisibility;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductInvisibility[]
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
     * @param  \jtl\Connector\Model\ProductI18n $i18ns
     * @return \jtl\Connector\Model\Product
     */
    public function addI18n(\jtl\Connector\Model\ProductI18n $i18n)
    {
        $this->i18ns[] = $i18ns;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductI18n[]
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
    /**
     * @param  \jtl\Connector\Model\ProductFileDownload $fileDownloads
     * @return \jtl\Connector\Model\Product
     */
    public function addFileDownload(\jtl\Connector\Model\ProductFileDownload $fileDownload)
    {
        $this->fileDownloads[] = $fileDownload;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductFileDownload[]
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
     * @param  \jtl\Connector\Model\CrossSelling $crossSellings
     * @return \jtl\Connector\Model\Product
     */
    public function addCrossSelling(\jtl\Connector\Model\CrossSelling $crossSelling)
    {
        $this->crossSellings[] = $crossSelling;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CrossSelling[]
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
     * @param  \jtl\Connector\Model\ProductConfigGroup $configGroups
     * @return \jtl\Connector\Model\Product
     */
    public function addConfigGroup(\jtl\Connector\Model\ProductConfigGroup $configGroup)
    {
        $this->configGroups[] = $configGroup;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductConfigGroup[]
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
     * @param  \jtl\Connector\Model\Product2Category $categories
     * @return \jtl\Connector\Model\Product
     */
    public function addCategory(\jtl\Connector\Model\Product2Category $category)
    {
        $this->categories[] = $category;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\Product2Category[]
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
 
}
