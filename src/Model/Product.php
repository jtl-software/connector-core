<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use DateTime;
use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;
use stdClass;

/**
 * Product properties.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class Product extends AbstractDataModel
{
    /**
     * @var Identity Optional reference to basePriceUnit
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("basePriceUnitId")
     * @Serializer\Accessor(getter="getBasePriceUnitId",setter="setBasePriceUnitId")
     */
    protected $basePriceUnitId = null;
    
    /**
     * @var Identity Unique product id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var Identity Reference to manufacturer
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("manufacturerId")
     * @Serializer\Accessor(getter="getManufacturerId",setter="setManufacturerId")
     */
    protected $manufacturerId = null;
    
    /**
     * @var Identity Reference to master product
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("masterProductId")
     * @Serializer\Accessor(getter="getMasterProductId",setter="setMasterProductId")
     */
    protected $masterProductId = null;
    
    /**
     * @var Identity Optional reference to measurement unit id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("measurementUnitId")
     * @Serializer\Accessor(getter="getMeasurementUnitId",setter="setMeasurementUnitId")
     */
    protected $measurementUnitId = null;
    
    /**
     * @var Identity Optional reference to partsList
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("partsListId")
     * @Serializer\Accessor(getter="getPartsListId",setter="setPartsListId")
     */
    protected $partsListId = null;
    
    /**
     * @var Identity Optional reference to productType
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("productTypeId")
     * @Serializer\Accessor(getter="getProductTypeId",setter="setProductTypeId")
     */
    protected $productTypeId = null;
    
    /**
     * @var Identity Reference to shippingClass
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("shippingClassId")
     * @Serializer\Accessor(getter="getShippingClassId",setter="setShippingClassId")
     */
    protected $shippingClassId = null;
    
    /**
     * @var Identity Reference to unit
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("unitId")
     * @Serializer\Accessor(getter="getUnitId",setter="setUnitId")
     */
    protected $unitId = null;
    
    /**
     * @var string Optional Amazon Standard Identification Number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("asin")
     * @Serializer\Accessor(getter="getAsin",setter="setAsin")
     */
    protected $asin = '';
    
    /**
     * @var DateTime Optional available from date. Specify a date, upon when product can be purchased.
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("availableFrom")
     * @Serializer\Accessor(getter="getAvailableFrom",setter="setAvailableFrom")
     */
    protected $availableFrom = null;
    
    /**
     * @var double Optional base price divisor. Calculate basePriceDivisor by dividing product filling quantity through unit pricing base measure. E.g. 75ml / 100ml = 0.75
     * @Serializer\Type("double")
     * @Serializer\SerializedName("basePriceDivisor")
     * @Serializer\Accessor(getter="getBasePriceDivisor",setter="setBasePriceDivisor")
     */
    protected $basePriceDivisor = 0.0;
    
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("basePriceFactor")
     * @Serializer\Accessor(getter="getBasePriceFactor",setter="setBasePriceFactor")
     */
    protected $basePriceFactor = 0.0;
    
    /**
     * @var double Optional base price quantity
     * @Serializer\Type("double")
     * @Serializer\SerializedName("basePriceQuantity")
     * @Serializer\Accessor(getter="getBasePriceQuantity",setter="setBasePriceQuantity")
     */
    protected $basePriceQuantity = 0.0;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("basePriceUnitCode")
     * @Serializer\Accessor(getter="getBasePriceUnitCode",setter="setBasePriceUnitCode")
     */
    protected $basePriceUnitCode = '';
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("basePriceUnitName")
     * @Serializer\Accessor(getter="getBasePriceUnitName",setter="setBasePriceUnitName")
     */
    protected $basePriceUnitName = '';
    
    /**
     * @var boolean Optional: Set to true to display base price / unit pricing measure
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("considerBasePrice")
     * @Serializer\Accessor(getter="getConsiderBasePrice",setter="setConsiderBasePrice")
     */
    protected $considerBasePrice = false;
    
    /**
     * @var boolean Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("considerStock")
     * @Serializer\Accessor(getter="getConsiderStock",setter="setConsiderStock")
     */
    protected $considerStock = false;
    
    /**
     * @var boolean Optional: Consider stock levels of productVariations. Same as considerStock but for variations.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("considerVariationStock")
     * @Serializer\Accessor(getter="getConsiderVariationStock",setter="setConsiderVariationStock")
     */
    protected $considerVariationStock = false;
    
    /**
     * @var DateTime Creation date
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("creationDate")
     * @Serializer\Accessor(getter="getCreationDate",setter="setCreationDate")
     */
    protected $creationDate = null;
    
    /**
     * @var string Optional European Article Number (EAN)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ean")
     * @Serializer\Accessor(getter="getEan",setter="setEan")
     */
    protected $ean = '';
    
    /**
     * @var string Optional Ebay product ID
     * @Serializer\Type("string")
     * @Serializer\SerializedName("epid")
     * @Serializer\Accessor(getter="getEpid",setter="setEpid")
     */
    protected $epid = '';
    
    /**
     * @var string Optional Hazard identifier, encodes general hazard class und subdivision
     * @Serializer\Type("string")
     * @Serializer\SerializedName("hazardIdNumber")
     * @Serializer\Accessor(getter="getHazardIdNumber",setter="setHazardIdNumber")
     */
    protected $hazardIdNumber = '';
    
    /**
     * @var double Optional product height
     * @Serializer\Type("double")
     * @Serializer\SerializedName("height")
     * @Serializer\Accessor(getter="getHeight",setter="setHeight")
     */
    protected $height = 0.0;
    
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isActive")
     * @Serializer\Accessor(getter="getIsActive",setter="setIsActive")
     */
    protected $isActive = false;
    
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isBatch")
     * @Serializer\Accessor(getter="getIsBatch",setter="setIsBatch")
     */
    protected $isBatch = false;
    
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isBestBefore")
     * @Serializer\Accessor(getter="getIsBestBefore",setter="setIsBestBefore")
     */
    protected $isBestBefore = false;
    
    /**
     * @var string Optional International Standard Book Number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("isbn")
     * @Serializer\Accessor(getter="getIsbn",setter="setIsbn")
     */
    protected $isbn = '';
    
    /**
     * @var boolean Optional: Set to true to allow non-integer quantites for purchase
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isDivisible")
     * @Serializer\Accessor(getter="getIsDivisible",setter="setIsDivisible")
     */
    protected $isDivisible = false;
    
    /**
     * @var boolean Optional flag if product is master product
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isMasterProduct")
     * @Serializer\Accessor(getter="getIsMasterProduct",setter="setIsMasterProduct")
     */
    protected $isMasterProduct = false;
    
    /**
     * @var boolean Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isNewProduct")
     * @Serializer\Accessor(getter="getIsNewProduct",setter="setIsNewProduct")
     */
    protected $isNewProduct = false;
    
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isSerialNumber")
     * @Serializer\Accessor(getter="getIsSerialNumber",setter="setIsSerialNumber")
     */
    protected $isSerialNumber = false;
    
    /**
     * @var boolean Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isTopProduct")
     * @Serializer\Accessor(getter="getIsTopProduct",setter="setIsTopProduct")
     */
    protected $isTopProduct = false;
    
    /**
     * @var string Optional internal keywords and synonyms for product
     * @Serializer\Type("string")
     * @Serializer\SerializedName("keywords")
     * @Serializer\Accessor(getter="getKeywords",setter="setKeywords")
     */
    protected $keywords = '';
    
    /**
     * @var double Optional product length
     * @Serializer\Type("double")
     * @Serializer\SerializedName("length")
     * @Serializer\Accessor(getter="getLength",setter="setLength")
     */
    protected $length = 0.0;
    
    /**
     * @var string Optional manufacturer number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("manufacturerNumber")
     * @Serializer\Accessor(getter="getManufacturerNumber",setter="setManufacturerNumber")
     */
    protected $manufacturerNumber = '';
    
    /**
     * @var Manufacturer
     * @Serializer\Type("Jtl\Connector\Core\Model\Manufacturer")
     * @Serializer\SerializedName("manufacturer")
     * @Serializer\Accessor(getter="getManufacturer",setter="setManufacturer")
     */
    protected $manufacturer = null;
    
    /**
     * @var double Optional measurement quantity
     * @Serializer\Type("double")
     * @Serializer\SerializedName("measurementQuantity")
     * @Serializer\Accessor(getter="getMeasurementQuantity",setter="setMeasurementQuantity")
     */
    protected $measurementQuantity = 0.0;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("measurementUnitCode")
     * @Serializer\Accessor(getter="getMeasurementUnitCode",setter="setMeasurementUnitCode")
     */
    protected $measurementUnitCode = '';
    
    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("minBestBeforeDate")
     * @Serializer\Accessor(getter="getMinBestBeforeDate",setter="setMinBestBeforeDate")
     */
    protected $minBestBeforeDate = null;
    
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("minimumOrderQuantity")
     * @Serializer\Accessor(getter="getMinimumOrderQuantity",setter="setMinimumOrderQuantity")
     */
    protected $minimumOrderQuantity = 0.0;
    
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("minimumQuantity")
     * @Serializer\Accessor(getter="getMinimumQuantity",setter="setMinimumQuantity")
     */
    protected $minimumQuantity = 0.0;
    
    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("modified")
     * @Serializer\Accessor(getter="getModified",setter="setModified")
     */
    protected $modified = null;
    
    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("newReleaseDate")
     * @Serializer\Accessor(getter="getNewReleaseDate",setter="setNewReleaseDate")
     */
    protected $newReleaseDate = null;
    
    /**
     * @var DateTime Contains the date of the next available inflow.
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("nextAvailableInflowDate")
     * @Serializer\Accessor(getter="getNextAvailableInflowDate",setter="setNextAvailableInflowDate")
     */
    protected $nextAvailableInflowDate = null;
    
    /**
     * @var double Contains the quantity of the next available inflow.
     * @Serializer\Type("double")
     * @Serializer\SerializedName("nextAvailableInflowQuantity")
     * @Serializer\Accessor(getter="getNextAvailableInflowQuantity",setter="setNextAvailableInflowQuantity")
     */
    protected $nextAvailableInflowQuantity = 0.0;
    
    /**
     * @var string Optional internal product note
     * @Serializer\Type("string")
     * @Serializer\SerializedName("note")
     * @Serializer\Accessor(getter="getNote",setter="setNote")
     */
    protected $note = '';
    
    /**
     * @var string Optional Origin country
     * @Serializer\Type("string")
     * @Serializer\SerializedName("originCountry")
     * @Serializer\Accessor(getter="getOriginCountry",setter="setOriginCountry")
     */
    protected $originCountry = '';
    
    /**
     * @var double Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     * @Serializer\Type("double")
     * @Serializer\SerializedName("packagingQuantity")
     * @Serializer\Accessor(getter="getPackagingQuantity",setter="setPackagingQuantity")
     */
    protected $packagingQuantity = 0.0;
    
    /**
     * @var boolean Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("permitNegativeStock")
     * @Serializer\Accessor(getter="getPermitNegativeStock",setter="setPermitNegativeStock")
     */
    protected $permitNegativeStock = false;
    
    /**
     * @var double Productweight exclusive packaging
     * @Serializer\Type("double")
     * @Serializer\SerializedName("productWeight")
     * @Serializer\Accessor(getter="getProductWeight",setter="setProductWeight")
     */
    protected $productWeight = 0.0;
    
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("purchasePrice")
     * @Serializer\Accessor(getter="getPurchasePrice",setter="setPurchasePrice")
     */
    protected $purchasePrice = 0.0;
    
    /**
     * @var double Optional recommended retail price (gross)
     * @Serializer\Type("double")
     * @Serializer\SerializedName("recommendedRetailPrice")
     * @Serializer\Accessor(getter="getRecommendedRetailPrice",setter="setRecommendedRetailPrice")
     */
    protected $recommendedRetailPrice = 0.0;
    
    /**
     * @var string Optional serial number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("serialNumber")
     * @Serializer\Accessor(getter="getSerialNumber",setter="setSerialNumber")
     */
    protected $serialNumber = '';
    
    /**
     * @var double Productweight inclusive packaging
     * @Serializer\Type("double")
     * @Serializer\SerializedName("shippingWeight")
     * @Serializer\Accessor(getter="getShippingWeight",setter="setShippingWeight")
     */
    protected $shippingWeight = 0.0;
    
    /**
     * @var string Optional stock keeping unit identifier
     * @Serializer\Type("string")
     * @Serializer\SerializedName("sku")
     * @Serializer\Accessor(getter="getSku",setter="setSku")
     */
    protected $sku = '';
    
    /**
     * @var integer Optional sort number for product sorting in lists
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = 0;
    
    /**
     * @var ProductStockLevel
     * @Serializer\Type("Jtl\Connector\Core\Model\ProductStockLevel")
     * @Serializer\SerializedName("stockLevel")
     * @Serializer\Accessor(getter="getStockLevel",setter="setStockLevel")
     */
    protected $stockLevel = null;
    
    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("supplierDeliveryTime")
     * @Serializer\Accessor(getter="getSupplierDeliveryTime",setter="setSupplierDeliveryTime")
     */
    protected $supplierDeliveryTime = 0;
    
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("supplierStockLevel")
     * @Serializer\Accessor(getter="getSupplierStockLevel",setter="setSupplierStockLevel")
     */
    protected $supplierStockLevel = 0.0;
    
    /**
     * @var string Optional TARIC
     * @Serializer\Type("string")
     * @Serializer\SerializedName("taric")
     * @Serializer\Accessor(getter="getTaric",setter="setTaric")
     */
    protected $taric = '';
    
    /**
     * @var string Optional UN number, used to define hazardous properties
     * @Serializer\Type("string")
     * @Serializer\SerializedName("unNumber")
     * @Serializer\Accessor(getter="getUnNumber",setter="setUnNumber")
     */
    protected $unNumber = '';
    
    /**
     * @var string Optional Universal Product Code
     * @Serializer\Type("string")
     * @Serializer\SerializedName("upc")
     * @Serializer\Accessor(getter="getUpc",setter="setUpc")
     */
    protected $upc = '';
    
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("vat")
     * @Serializer\Accessor(getter="getVat",setter="setVat")
     */
    protected $vat = 0.0;
    
    /**
     * @var double Optional product width
     * @Serializer\Type("double")
     * @Serializer\SerializedName("width")
     * @Serializer\Accessor(getter="getWidth",setter="setWidth")
     */
    protected $width = 0.0;
    
    /**
     * @var TranslatableAttribute[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\TranslatableAttribute>")
     * @Serializer\SerializedName("attributes")
     * @Serializer\AccessType("reflection")
     */
    protected $attributes = [];
    
    /**
     * @var Product2Category[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\Product2Category>")
     * @Serializer\SerializedName("categories")
     * @Serializer\AccessType("reflection")
     */
    protected $categories = [];
    
    /**
     * @var ProductChecksum[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductChecksum>")
     * @Serializer\SerializedName("checksums")
     * @Serializer\AccessType("reflection")
     */
    protected $checksums = [];
    
    /**
     * @var ProductConfigGroup[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductConfigGroup>")
     * @Serializer\SerializedName("configGroups")
     * @Serializer\AccessType("reflection")
     */
    protected $configGroups = [];
    
    /**
     * @var CustomerGroupPackagingQuantity[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CustomerGroupPackagingQuantity>")
     * @Serializer\SerializedName("customerGroupPackagingQuantities")
     * @Serializer\AccessType("reflection")
     */
    protected $customerGroupPackagingQuantities = [];
    
    /**
     * @var ProductFileDownload[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductFileDownload>")
     * @Serializer\SerializedName("fileDownloads")
     * @Serializer\AccessType("reflection")
     */
    protected $fileDownloads = [];
    
    /**
     * @var ProductI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];
    
    /**
     * @var ProductInvisibility[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductInvisibility>")
     * @Serializer\SerializedName("invisibilities")
     * @Serializer\AccessType("reflection")
     */
    protected $invisibilities = [];
    
    /**
     * @var ProductMediaFile[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductMediaFile>")
     * @Serializer\SerializedName("mediaFiles")
     * @Serializer\AccessType("reflection")
     */
    protected $mediaFiles = [];
    
    /**
     * @var ProductPartsList[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductPartsList>")
     * @Serializer\SerializedName("partsLists")
     * @Serializer\AccessType("reflection")
     */
    protected $partsLists = [];
    
    /**
     * @var ProductPrice[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductPrice>")
     * @Serializer\SerializedName("prices")
     * @Serializer\AccessType("reflection")
     */
    protected $prices = [];
    
    /**
     * @var ProductSpecialPrice[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductSpecialPrice>")
     * @Serializer\SerializedName("specialPrices")
     * @Serializer\AccessType("reflection")
     */
    protected $specialPrices = [];
    
    /**
     * @var ProductSpecific[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductSpecific>")
     * @Serializer\SerializedName("specifics")
     * @Serializer\AccessType("reflection")
     */
    protected $specifics = [];
    
    /**
     * @var ProductVarCombination[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductVarCombination>")
     * @Serializer\SerializedName("varCombinations")
     * @Serializer\AccessType("reflection")
     */
    protected $varCombinations = [];
    
    /**
     * @var ProductVariation[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductVariation>")
     * @Serializer\SerializedName("variations")
     * @Serializer\AccessType("reflection")
     */
    protected $variations = [];
    
    /**
     * @var ProductWarehouseInfo[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductWarehouseInfo>")
     * @Serializer\SerializedName("warehouseInfo")
     * @Serializer\AccessType("reflection")
     */
    protected $warehouseInfo = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->shippingClassId = new Identity();
        $this->masterProductId = new Identity();
        $this->partsListId = new Identity();
        $this->productTypeId = new Identity();
        $this->manufacturerId = new Identity();
        $this->measurementUnitId = new Identity();
        $this->basePriceUnitId = new Identity();
        $this->unitId = new Identity();
    }
    
    /**
     * @param Identity $basePriceUnitId Optional reference to basePriceUnit
     * @return Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBasePriceUnitId(Identity $basePriceUnitId): Product
    {
        $this->basePriceUnitId = $basePriceUnitId;
        
        return $this;
    }
    
    /**
     * @return Identity Optional reference to basePriceUnit
     */
    public function getBasePriceUnitId(): Identity
    {
        return $this->basePriceUnitId;
    }
    
    /**
     * @param Identity $id Unique product id
     * @return Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): Product
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique product id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param Identity $manufacturerId Reference to manufacturer
     * @return Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setManufacturerId(Identity $manufacturerId): Product
    {
        $this->manufacturerId = $manufacturerId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to manufacturer
     */
    public function getManufacturerId(): Identity
    {
        return $this->manufacturerId;
    }
    
    /**
     * @param Identity $masterProductId Reference to master product
     * @return Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMasterProductId(Identity $masterProductId): Product
    {
        $this->masterProductId = $masterProductId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to master product
     */
    public function getMasterProductId(): Identity
    {
        return $this->masterProductId;
    }
    
    /**
     * @param Identity $measurementUnitId Optional reference to measurement unit id
     * @return Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMeasurementUnitId(Identity $measurementUnitId): Product
    {
        $this->measurementUnitId = $measurementUnitId;
        
        return $this;
    }
    
    /**
     * @return Identity Optional reference to measurement unit id
     */
    public function getMeasurementUnitId(): Identity
    {
        return $this->measurementUnitId;
    }
    
    /**
     * @param Identity $partsListId Optional reference to partsList
     * @return Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPartsListId(Identity $partsListId): Product
    {
        $this->partsListId = $partsListId;
        
        return $this;
    }
    
    /**
     * @return Identity Optional reference to partsList
     */
    public function getPartsListId(): Identity
    {
        return $this->partsListId;
    }
    
    /**
     * @param Identity $productTypeId Optional reference to productType
     * @return Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductTypeId(Identity $productTypeId): Product
    {
        $this->productTypeId = $productTypeId;
        
        return $this;
    }
    
    /**
     * @return Identity Optional reference to productType
     */
    public function getProductTypeId(): Identity
    {
        return $this->productTypeId;
    }
    
    /**
     * @param Identity $shippingClassId Reference to shippingClass
     * @return Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingClassId(Identity $shippingClassId): Product
    {
        $this->shippingClassId = $shippingClassId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to shippingClass
     */
    public function getShippingClassId(): Identity
    {
        return $this->shippingClassId;
    }
    
    /**
     * @param Identity $unitId Reference to unit
     * @return Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setUnitId(Identity $unitId): Product
    {
        $this->unitId = $unitId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to unit
     */
    public function getUnitId(): Identity
    {
        return $this->unitId;
    }
    
    /**
     * @param string $asin Optional Amazon Standard Identification Number
     * @return Product
     */
    public function setAsin(string $asin): Product
    {
        $this->asin = $asin;
        
        return $this;
    }
    
    /**
     * @return string Optional Amazon Standard Identification Number
     */
    public function getAsin(): string
    {
        return $this->asin;
    }
    
    /**
     * @param \DateTimeInterface $availableFrom Optional available from date. Specify a date, upon when product can be purchased.
     * @return Product
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setAvailableFrom(\DateTimeInterface $availableFrom = null): Product
    {
        $this->availableFrom = $availableFrom;
        
        return $this;
    }
    
    /**
     * @return DateTime Optional available from date. Specify a date, upon when product can be purchased.
     */
    public function getAvailableFrom(): ?\DateTimeInterface
    {
        return $this->availableFrom;
    }
    
    /**
     * @param double $basePriceDivisor Optional base price divisor. Calculate basePriceDivisor by dividing product filling quantity through unit pricing base measure. E.g. 75ml / 100ml = 0.75
     * @return Product
     */
    public function setBasePriceDivisor(float $basePriceDivisor): Product
    {
        $this->basePriceDivisor = $basePriceDivisor;
        
        return $this;
    }
    
    /**
     * @return double Optional base price divisor. Calculate basePriceDivisor by dividing product filling quantity through unit pricing base measure. E.g. 75ml / 100ml = 0.75
     */
    public function getBasePriceDivisor(): float
    {
        return $this->basePriceDivisor;
    }
    
    /**
     * @param double $basePriceFactor
     * @return Product
     */
    public function setBasePriceFactor(float $basePriceFactor): Product
    {
        $this->basePriceFactor = $basePriceFactor;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getBasePriceFactor(): float
    {
        return $this->basePriceFactor;
    }
    
    /**
     * @param double $basePriceQuantity Optional base price quantity
     * @return Product
     */
    public function setBasePriceQuantity(float $basePriceQuantity): Product
    {
        $this->basePriceQuantity = $basePriceQuantity;
        
        return $this;
    }
    
    /**
     * @return double Optional base price quantity
     */
    public function getBasePriceQuantity(): float
    {
        return $this->basePriceQuantity;
    }
    
    /**
     * @param string $basePriceUnitCode
     * @return Product
     */
    public function setBasePriceUnitCode(string $basePriceUnitCode): Product
    {
        $this->basePriceUnitCode = $basePriceUnitCode;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBasePriceUnitCode(): string
    {
        return $this->basePriceUnitCode;
    }
    
    /**
     * @param string $basePriceUnitName
     * @return Product
     */
    public function setBasePriceUnitName(string $basePriceUnitName): Product
    {
        $this->basePriceUnitName = $basePriceUnitName;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBasePriceUnitName(): string
    {
        return $this->basePriceUnitName;
    }
    
    /**
     * @param boolean $considerBasePrice Optional: Set to true to display base price / unit pricing measure
     * @return Product
     */
    public function setConsiderBasePrice(bool $considerBasePrice): Product
    {
        $this->considerBasePrice = $considerBasePrice;
        
        return $this;
    }
    
    /**
     * @return boolean Optional: Set to true to display base price / unit pricing measure
     */
    public function getConsiderBasePrice(): bool
    {
        return $this->considerBasePrice;
    }
    
    /**
     * @param boolean $considerStock Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     * @return Product
     */
    public function setConsiderStock(bool $considerStock): Product
    {
        $this->considerStock = $considerStock;
        
        return $this;
    }
    
    /**
     * @return boolean Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     */
    public function getConsiderStock(): bool
    {
        return $this->considerStock;
    }
    
    /**
     * @param boolean $considerVariationStock Optional: Consider stock levels of productVariations. Same as considerStock but for variations.
     * @return Product
     */
    public function setConsiderVariationStock(bool $considerVariationStock): Product
    {
        $this->considerVariationStock = $considerVariationStock;
        
        return $this;
    }
    
    /**
     * @return boolean Optional: Consider stock levels of productVariations. Same as considerStock but for variations.
     */
    public function getConsiderVariationStock(): bool
    {
        return $this->considerVariationStock;
    }
    
    /**
     * @param \DateTimeInterface $creationDate Creation date
     * @return Product
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreationDate(\DateTimeInterface $creationDate = null): Product
    {
        $this->creationDate = $creationDate;
        
        return $this;
    }
    
    /**
     * @return DateTime Creation date
     */
    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }
    
    /**
     * @param string $ean Optional European Article Number (EAN)
     * @return Product
     */
    public function setEan(string $ean): Product
    {
        $this->ean = $ean;
        
        return $this;
    }
    
    /**
     * @return string Optional European Article Number (EAN)
     */
    public function getEan(): string
    {
        return $this->ean;
    }
    
    /**
     * @param string $epid Optional Ebay product ID
     * @return Product
     */
    public function setEpid(string $epid): Product
    {
        $this->epid = $epid;
        
        return $this;
    }
    
    /**
     * @return Identity Optional Ebay product ID
     */
    public function getEpId(): string
    {
        return $this->epid;
    }
    
    /**
     * @param string $hazardIdNumber Optional Hazard identifier, encodes general hazard class und subdivision
     * @return Product
     */
    public function setHazardIdNumber(string $hazardIdNumber): Product
    {
        $this->hazardIdNumber = $hazardIdNumber;
        
        return $this;
    }
    
    /**
     * @return string Optional Hazard identifier, encodes general hazard class und subdivision
     */
    public function getHazardIdNumber(): string
    {
        return $this->hazardIdNumber;
    }
    
    /**
     * @param double $height Optional product height
     * @return Product
     */
    public function setHeight(float $height): Product
    {
        $this->height = $height;
        
        return $this;
    }
    
    /**
     * @return double Optional product height
     */
    public function getHeight(): float
    {
        return $this->height;
    }
    
    /**
     * @param boolean $isActive
     * @return Product
     */
    public function setIsActive(bool $isActive): Product
    {
        $this->isActive = $isActive;
        
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function getIsActive(): bool
    {
        return $this->isActive;
    }
    
    /**
     * @param boolean $isBatch
     * @return Product
     */
    public function setIsBatch(bool $isBatch): Product
    {
        $this->isBatch = $isBatch;
        
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function getIsBatch(): bool
    {
        return $this->isBatch;
    }
    
    /**
     * @param boolean $isBestBefore
     * @return Product
     */
    public function setIsBestBefore(bool $isBestBefore): Product
    {
        $this->isBestBefore = $isBestBefore;
        
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function getIsBestBefore(): bool
    {
        return $this->isBestBefore;
    }
    
    /**
     * @param string $isbn Optional International Standard Book Number
     * @return Product
     */
    public function setIsbn(string $isbn): Product
    {
        $this->isbn = $isbn;
        
        return $this;
    }
    
    /**
     * @return string Optional International Standard Book Number
     */
    public function getIsbn(): string
    {
        return $this->isbn;
    }
    
    /**
     * @param boolean $isDivisible Optional: Set to true to allow non-integer quantites for purchase
     * @return Product
     */
    public function setIsDivisible(bool $isDivisible): Product
    {
        $this->isDivisible = $isDivisible;
        
        return $this;
    }
    
    /**
     * @return boolean Optional: Set to true to allow non-integer quantites for purchase
     */
    public function getIsDivisible(): bool
    {
        return $this->isDivisible;
    }
    
    /**
     * @param boolean $isMasterProduct Optional flag if product is master product
     * @return Product
     */
    public function setIsMasterProduct(bool $isMasterProduct): Product
    {
        $this->isMasterProduct = $isMasterProduct;
        
        return $this;
    }
    
    /**
     * @return boolean Optional flag if product is master product
     */
    public function getIsMasterProduct(): bool
    {
        return $this->isMasterProduct;
    }
    
    /**
     * @param boolean $isNewProduct Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     * @return Product
     */
    public function setIsNewProduct(bool $isNewProduct): Product
    {
        $this->isNewProduct = $isNewProduct;
        
        return $this;
    }
    
    /**
     * @return boolean Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     */
    public function getIsNewProduct(): bool
    {
        return $this->isNewProduct;
    }
    
    /**
     * @param boolean $isSerialNumber
     * @return Product
     */
    public function setIsSerialNumber(bool $isSerialNumber): Product
    {
        $this->isSerialNumber = $isSerialNumber;
        
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function getIsSerialNumber(): bool
    {
        return $this->isSerialNumber;
    }
    
    /**
     * @param boolean $isTopProduct Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     * @return Product
     */
    public function setIsTopProduct(bool $isTopProduct): Product
    {
        $this->isTopProduct = $isTopProduct;
        
        return $this;
    }
    
    /**
     * @return boolean Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     */
    public function getIsTopProduct(): bool
    {
        return $this->isTopProduct;
    }
    
    /**
     * @param string $keywords Optional internal keywords and synonyms for product
     * @return Product
     */
    public function setKeywords(string $keywords): Product
    {
        $this->keywords = $keywords;
        
        return $this;
    }
    
    /**
     * @return string Optional internal keywords and synonyms for product
     */
    public function getKeywords(): string
    {
        return $this->keywords;
    }
    
    /**
     * @param double $length Optional product length
     * @return Product
     */
    public function setLength(float $length): Product
    {
        $this->length = $length;
        
        return $this;
    }
    
    /**
     * @return double Optional product length
     */
    public function getLength(): float
    {
        return $this->length;
    }
    
    /**
     * @param string $manufacturerNumber Optional manufacturer number
     * @return Product
     */
    public function setManufacturerNumber(string $manufacturerNumber): Product
    {
        $this->manufacturerNumber = $manufacturerNumber;
        
        return $this;
    }
    
    /**
     * @return string Optional manufacturer number
     */
    public function getManufacturerNumber(): string
    {
        return $this->manufacturerNumber;
    }
    
    /**
     * @param Manufacturer $manufacturer Optional manufacturer
     * @return Product
     */
    public function setManufacturer(Manufacturer $manufacturer = null): Product
    {
        $this->manufacturer = $manufacturer;
        
        return $this;
    }
    
    /**
     * @return Manufacturer|null Optional manufacturer
     */
    public function getManufacturer(): ?Manufacturer
    {
        return $this->manufacturer;
    }
    
    /**
     * @param double $measurementQuantity Optional measurement quantity
     * @return Product
     */
    public function setMeasurementQuantity(float $measurementQuantity): Product
    {
        $this->measurementQuantity = $measurementQuantity;
        
        return $this;
    }
    
    /**
     * @return double Optional measurement quantity
     */
    public function getMeasurementQuantity(): float
    {
        return $this->measurementQuantity;
    }
    
    /**
     * @param string $measurementUnitCode
     * @return Product
     */
    public function setMeasurementUnitCode(string $measurementUnitCode): Product
    {
        $this->measurementUnitCode = $measurementUnitCode;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMeasurementUnitCode(): string
    {
        return $this->measurementUnitCode;
    }
    
    /**
     * @param \DateTimeInterface $minBestBeforeDate
     * @return Product
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setMinBestBeforeDate(\DateTimeInterface $minBestBeforeDate = null): Product
    {
        $this->minBestBeforeDate = $minBestBeforeDate;
        
        return $this;
    }
    
    /**
     * @return DateTime
     */
    public function getMinBestBeforeDate(): ?\DateTimeInterface
    {
        return $this->minBestBeforeDate;
    }
    
    /**
     * @param double $minimumOrderQuantity
     * @return Product
     */
    public function setMinimumOrderQuantity(float $minimumOrderQuantity): Product
    {
        $this->minimumOrderQuantity = $minimumOrderQuantity;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getMinimumOrderQuantity(): float
    {
        return $this->minimumOrderQuantity;
    }
    
    /**
     * @param double $minimumQuantity
     * @return Product
     */
    public function setMinimumQuantity(float $minimumQuantity): Product
    {
        $this->minimumQuantity = $minimumQuantity;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getMinimumQuantity(): float
    {
        return $this->minimumQuantity;
    }
    
    /**
     * @param \DateTimeInterface $modified
     * @return Product
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setModified(\DateTimeInterface $modified = null): Product
    {
        $this->modified = $modified;
        
        return $this;
    }
    
    /**
     * @return DateTime
     */
    public function getModified(): ?\DateTimeInterface
    {
        return $this->modified;
    }
    
    /**
     * @param \DateTimeInterface $newReleaseDate
     * @return Product
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setNewReleaseDate(\DateTimeInterface $newReleaseDate = null): Product
    {
        $this->newReleaseDate = $newReleaseDate;
        
        return $this;
    }
    
    /**
     * @return DateTime
     */
    public function getNewReleaseDate(): ?\DateTimeInterface
    {
        return $this->newReleaseDate;
    }
    
    /**
     * @param \DateTimeInterface $nextAvailableInflowDate Contains the date of the next available inflow.
     * @return Product
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setNextAvailableInflowDate(\DateTimeInterface $nextAvailableInflowDate = null): Product
    {
        $this->nextAvailableInflowDate = $nextAvailableInflowDate;
        
        return $this;
    }
    
    /**
     * @return DateTime Contains the date of the next available inflow.
     */
    public function getNextAvailableInflowDate(): ?\DateTimeInterface
    {
        return $this->nextAvailableInflowDate;
    }
    
    /**
     * @param double $nextAvailableInflowQuantity Contains the quantity of the next available inflow.
     * @return Product
     */
    public function setNextAvailableInflowQuantity(float $nextAvailableInflowQuantity): Product
    {
        $this->nextAvailableInflowQuantity = $nextAvailableInflowQuantity;
        
        return $this;
    }
    
    /**
     * @return double Contains the quantity of the next available inflow.
     */
    public function getNextAvailableInflowQuantity(): float
    {
        return $this->nextAvailableInflowQuantity;
    }
    
    /**
     * @param string $note Optional internal product note
     * @return Product
     */
    public function setNote(string $note): Product
    {
        $this->note = $note;
        
        return $this;
    }
    
    /**
     * @return string Optional internal product note
     */
    public function getNote(): string
    {
        return $this->note;
    }
    
    /**
     * @param string $originCountry Optional Origin country
     * @return Product
     */
    public function setOriginCountry(string $originCountry): Product
    {
        $this->originCountry = $originCountry;
        
        return $this;
    }
    
    /**
     * @return string Optional Origin country
     */
    public function getOriginCountry(): string
    {
        return $this->originCountry;
    }
    
    /**
     * @param double $packagingQuantity Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     * @return Product
     */
    public function setPackagingQuantity(float $packagingQuantity): Product
    {
        $this->packagingQuantity = $packagingQuantity;
        
        return $this;
    }
    
    /**
     * @return double Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     */
    public function getPackagingQuantity(): float
    {
        return $this->packagingQuantity;
    }
    
    /**
     * @param boolean $permitNegativeStock Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true.
     * @return Product
     */
    public function setPermitNegativeStock(bool $permitNegativeStock): Product
    {
        $this->permitNegativeStock = $permitNegativeStock;
        
        return $this;
    }
    
    /**
     * @return boolean Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true.
     */
    public function getPermitNegativeStock(): bool
    {
        return $this->permitNegativeStock;
    }
    
    /**
     * @param double $productWeight Productweight exclusive packaging
     * @return Product
     */
    public function setProductWeight(float $productWeight): Product
    {
        $this->productWeight = $productWeight;
        
        return $this;
    }
    
    /**
     * @return double Productweight exclusive packaging
     */
    public function getProductWeight(): float
    {
        return $this->productWeight;
    }
    
    /**
     * @param double $purchasePrice
     * @return Product
     */
    public function setPurchasePrice(float $purchasePrice): Product
    {
        $this->purchasePrice = $purchasePrice;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getPurchasePrice(): float
    {
        return $this->purchasePrice;
    }
    
    /**
     * @param double $recommendedRetailPrice Optional recommended retail price (gross)
     * @return Product
     */
    public function setRecommendedRetailPrice(float $recommendedRetailPrice): Product
    {
        $this->recommendedRetailPrice = $recommendedRetailPrice;
        
        return $this;
    }
    
    /**
     * @return double Optional recommended retail price (gross)
     */
    public function getRecommendedRetailPrice(): float
    {
        return $this->recommendedRetailPrice;
    }
    
    /**
     * @param string $serialNumber Optional serial number
     * @return Product
     */
    public function setSerialNumber(string $serialNumber): Product
    {
        $this->serialNumber = $serialNumber;
        
        return $this;
    }
    
    /**
     * @return string Optional serial number
     */
    public function getSerialNumber(): string
    {
        return $this->serialNumber;
    }
    
    /**
     * @param double $shippingWeight Productweight inclusive packaging
     * @return Product
     */
    public function setShippingWeight(float $shippingWeight): Product
    {
        $this->shippingWeight = $shippingWeight;
        
        return $this;
    }
    
    /**
     * @return double Productweight inclusive packaging
     */
    public function getShippingWeight(): float
    {
        return $this->shippingWeight;
    }
    
    /**
     * @param string $sku Optional stock keeping unit identifier
     * @return Product
     */
    public function setSku(string $sku): Product
    {
        $this->sku = $sku;
        
        return $this;
    }
    
    /**
     * @return string Optional stock keeping unit identifier
     */
    public function getSku(): string
    {
        return $this->sku;
    }
    
    /**
     * @param integer $sort Optional sort number for product sorting in lists
     * @return Product
     */
    public function setSort(int $sort): Product
    {
        $this->sort = $sort;
        
        return $this;
    }
    
    /**
     * @return integer Optional sort number for product sorting in lists
     */
    public function getSort(): int
    {
        return $this->sort;
    }
    
    /**
     * @param ProductStockLevel $stockLevel
     * @return Product
     * @throws InvalidArgumentException if the provided argument is not of type 'ProductStockLevel'.
     */
    public function setStockLevel(ProductStockLevel $stockLevel = null): Product
    {
        $this->stockLevel = $stockLevel;
        
        return $this;
    }
    
    /**
     * @return ProductStockLevel
     */
    public function getStockLevel(): ?ProductStockLevel
    {
        return $this->stockLevel;
    }
    
    /**
     * @param integer $supplierDeliveryTime
     * @return Product
     */
    public function setSupplierDeliveryTime(int $supplierDeliveryTime): Product
    {
        $this->supplierDeliveryTime = $supplierDeliveryTime;
        
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getSupplierDeliveryTime(): int
    {
        return $this->supplierDeliveryTime;
    }
    
    /**
     * @param double $supplierStockLevel
     * @return Product
     */
    public function setSupplierStockLevel(float $supplierStockLevel): Product
    {
        $this->supplierStockLevel = $supplierStockLevel;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getSupplierStockLevel(): float
    {
        return $this->supplierStockLevel;
    }
    
    /**
     * @param string $taric Optional TARIC
     * @return Product
     */
    public function setTaric(string $taric): Product
    {
        $this->taric = $taric;
        
        return $this;
    }
    
    /**
     * @return string Optional TARIC
     */
    public function getTaric(): string
    {
        return $this->taric;
    }
    
    /**
     * @param string $unNumber Optional UN number, used to define hazardous properties
     * @return Product
     */
    public function setUnNumber(string $unNumber): Product
    {
        $this->unNumber = $unNumber;
        
        return $this;
    }
    
    /**
     * @return string Optional UN number, used to define hazardous properties
     */
    public function getUnNumber(): string
    {
        return $this->unNumber;
    }
    
    /**
     * @param string $upc Optional Universal Product Code
     * @return Product
     */
    public function setUpc(string $upc): Product
    {
        $this->upc = $upc;
        
        return $this;
    }
    
    /**
     * @return string Optional Universal Product Code
     */
    public function getUpc(): string
    {
        return $this->upc;
    }
    
    /**
     * @param double $vat
     * @return Product
     */
    public function setVat(float $vat): Product
    {
        $this->vat = $vat;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getVat(): string
    {
        return $this->vat;
    }
    
    /**
     * @param double $width Optional product width
     * @return Product
     */
    public function setWidth(float $width): Product
    {
        $this->width = $width;
        
        return $this;
    }
    
    /**
     * @return double Optional product width
     */
    public function getWidth(): float
    {
        return $this->width;
    }
    
    /**
     * @param TranslatableAttribute $attribute
     * @return Product
     */
    public function addAttribute(TranslatableAttribute $attribute): Product
    {
        $this->attributes[] = $attribute;
        
        return $this;
    }

    /**
     * @param TranslatableAttribute ...$attributes
     * @return Product
     */
    public function setAttributes(TranslatableAttribute ...$attributes): Product
    {
        $this->attributes = $attributes;
        
        return $this;
    }
    
    /**
     * @return TranslatableAttribute[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
    
    /**
     * @return Product
     */
    public function clearAttributes(): Product
    {
        $this->attributes = [];
        
        return $this;
    }
    
    /**
     * @param Product2Category $category
     * @return Product
     */
    public function addCategory(Product2Category $category): Product
    {
        $this->categories[] = $category;
        
        return $this;
    }

    /**
     * @param Product2Category ...$categories
     * @return Product
     */
    public function setCategories(Product2Category ...$categories): Product
    {
        $this->categories = $categories;
        
        return $this;
    }
    
    /**
     * @return Product2Category[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }
    
    /**
     * @return Product
     */
    public function clearCategories(): Product
    {
        $this->categories = [];
        
        return $this;
    }
    
    /**
     * @param ProductChecksum $checksum
     * @return Product
     */
    public function addChecksum(ProductChecksum $checksum): Product
    {
        $this->checksums[] = $checksum;
        
        return $this;
    }

    /**
     * @param ProductChecksum ...$checksums
     * @return Product
     */
    public function setChecksums(ProductChecksum ...$checksums): Product
    {
        $this->checksums = $checksums;
        
        return $this;
    }
    
    /**
     * @return ProductChecksum[]
     */
    public function getChecksums(): array
    {
        return $this->checksums;
    }
    
    /**
     * @return Product
     */
    public function clearChecksums(): Product
    {
        $this->checksums = [];
        
        return $this;
    }
    
    /**
     * @param ProductConfigGroup $configGroup
     * @return Product
     */
    public function addConfigGroup(ProductConfigGroup $configGroup): Product
    {
        $this->configGroups[] = $configGroup;
        
        return $this;
    }

    /**
     * @param ProductConfigGroup ...$configGroups
     * @return Product
     */
    public function setConfigGroups(ProductConfigGroup ...$configGroups): Product
    {
        $this->configGroups = $configGroups;
        
        return $this;
    }
    
    /**
     * @return ProductConfigGroup[]
     */
    public function getConfigGroups(): array
    {
        return $this->configGroups;
    }
    
    /**
     * @return Product
     */
    public function clearConfigGroups(): Product
    {
        $this->configGroups = [];
        
        return $this;
    }
    
    /**
     * @param CustomerGroupPackagingQuantity $customerGroupPackagingQuantity
     * @return Product
     */
    public function addCustomerGroupPackagingQuantity(
        CustomerGroupPackagingQuantity $customerGroupPackagingQuantity
    ) {
        $this->customerGroupPackagingQuantities[] = $customerGroupPackagingQuantity;
        
        return $this;
    }
    
    /**
     * @param array $customerGroupPackagingQuantities
     * @return Product
     */
    public function setCustomerGroupPackagingQuantities(
        CustomerGroupPackagingQuantity ...$customerGroupPackagingQuantities
    ): Product {
        $this->customerGroupPackagingQuantities = $customerGroupPackagingQuantities;
        
        return $this;
    }
    
    /**
     * @return CustomerGroupPackagingQuantity[]
     */
    public function getCustomerGroupPackagingQuantities(): array
    {
        return $this->customerGroupPackagingQuantities;
    }
    
    /**
     * @return Product
     */
    public function clearCustomerGroupPackagingQuantities(): Product
    {
        $this->customerGroupPackagingQuantities = [];
        
        return $this;
    }
    
    /**
     * @param ProductFileDownload $fileDownload
     * @return Product
     */
    public function addFileDownload(ProductFileDownload $fileDownload): Product
    {
        $this->fileDownloads[] = $fileDownload;
        
        return $this;
    }

    /**
     * @param ProductFileDownload ...$fileDownloads
     * @return Product
     */
    public function setFileDownloads(ProductFileDownload ...$fileDownloads): Product
    {
        $this->fileDownloads = $fileDownloads;
        
        return $this;
    }
    
    /**
     * @return ProductFileDownload[]
     */
    public function getFileDownloads(): array
    {
        return $this->fileDownloads;
    }
    
    /**
     * @return Product
     */
    public function clearFileDownloads(): Product
    {
        $this->fileDownloads = [];
        
        return $this;
    }
    
    /**
     * @param ProductI18n $i18n
     * @return Product
     */
    public function addI18n(ProductI18n $i18n): Product
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }

    /**
     * @param ProductI18n ...$i18ns
     * @return Product
     */
    public function setI18ns(ProductI18n ...$i18ns): Product
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return ProductI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }
    
    /**
     * @return Product
     */
    public function clearI18ns(): Product
    {
        $this->i18ns = [];
        
        return $this;
    }
    
    /**
     * @param ProductInvisibility $invisibility
     * @return Product
     */
    public function addInvisibility(ProductInvisibility $invisibility): Product
    {
        $this->invisibilities[] = $invisibility;
        
        return $this;
    }

    /**
     * @param ProductInvisibility ...$invisibilities
     * @return Product
     */
    public function setInvisibilities(ProductInvisibility ...$invisibilities): Product
    {
        $this->invisibilities = $invisibilities;
        
        return $this;
    }
    
    /**
     * @return ProductInvisibility[]
     */
    public function getInvisibilities(): array
    {
        return $this->invisibilities;
    }
    
    /**
     * @return Product
     */
    public function clearInvisibilities(): Product
    {
        $this->invisibilities = [];
        
        return $this;
    }
    
    /**
     * @param ProductMediaFile $mediaFile
     * @return Product
     */
    public function addMediaFile(ProductMediaFile $mediaFile): Product
    {
        $this->mediaFiles[] = $mediaFile;
        
        return $this;
    }

    /**
     * @param ProductMediaFile ...$mediaFiles
     * @return Product
     */
    public function setMediaFiles(ProductMediaFile ...$mediaFiles): Product
    {
        $this->mediaFiles = $mediaFiles;
        
        return $this;
    }
    
    /**
     * @return ProductMediaFile[]
     */
    public function getMediaFiles(): array
    {
        return $this->mediaFiles;
    }
    
    /**
     * @return Product
     */
    public function clearMediaFiles(): Product
    {
        $this->mediaFiles = [];
        
        return $this;
    }
    
    /**
     * @param ProductPartsList $partsList
     * @return Product
     */
    public function addPartsList(ProductPartsList $partsList): Product
    {
        $this->partsLists[] = $partsList;
        
        return $this;
    }

    /**
     * @param ProductPartsList ...$partsLists
     * @return Product
     */
    public function setPartsLists(ProductPartsList ...$partsLists): Product
    {
        $this->partsLists = $partsLists;
        
        return $this;
    }
    
    /**
     * @return ProductPartsList[]
     */
    public function getPartsLists(): array
    {
        return $this->partsLists;
    }
    
    /**
     * @return Product
     */
    public function clearPartsLists(): Product
    {
        $this->partsLists = [];
        
        return $this;
    }
    
    /**
     * @param ProductPrice $price
     * @return Product
     */
    public function addPrice(ProductPrice $price): Product
    {
        $this->prices[] = $price;
        
        return $this;
    }

    /**
     * @param ProductPrice ...$prices
     * @return Product
     */
    public function setPrices(ProductPrice ...$prices): Product
    {
        $this->prices = $prices;
        
        return $this;
    }
    
    /**
     * @return ProductPrice[]
     */
    public function getPrices(): array
    {
        return $this->prices;
    }
    
    /**
     * @return Product
     */
    public function clearPrices(): Product
    {
        $this->prices = [];
        
        return $this;
    }
    
    /**
     * @param ProductSpecialPrice $specialPrice
     * @return Product
     */
    public function addSpecialPrice(ProductSpecialPrice $specialPrice): Product
    {
        $this->specialPrices[] = $specialPrice;
        
        return $this;
    }

    /**
     * @param ProductSpecialPrice ...$specialPrices
     * @return Product
     */
    public function setSpecialPrices(ProductSpecialPrice ...$specialPrices): Product
    {
        $this->specialPrices = $specialPrices;
        
        return $this;
    }
    
    /**
     * @return ProductSpecialPrice[]
     */
    public function getSpecialPrices(): array
    {
        return $this->specialPrices;
    }
    
    /**
     * @return Product
     */
    public function clearSpecialPrices(): Product
    {
        $this->specialPrices = [];
        
        return $this;
    }
    
    /**
     * @param ProductSpecific $specific
     * @return Product
     */
    public function addSpecific(ProductSpecific $specific): Product
    {
        $this->specifics[] = $specific;
        
        return $this;
    }

    /**
     * @param ProductSpecific ...$specifics
     * @return Product
     */
    public function setSpecifics(ProductSpecific ...$specifics): Product
    {
        $this->specifics = $specifics;
        
        return $this;
    }
    
    /**
     * @return ProductSpecific[]
     */
    public function getSpecifics(): array
    {
        return $this->specifics;
    }
    
    /**
     * @return Product
     */
    public function clearSpecifics(): Product
    {
        $this->specifics = [];
        
        return $this;
    }
    
    /**
     * @param ProductVarCombination $varCombination
     * @return Product
     */
    public function addVarCombination(ProductVarCombination $varCombination): Product
    {
        $this->varCombinations[] = $varCombination;
        
        return $this;
    }

    /**
     * @param ProductVarCombination ...$varCombinations
     * @return Product
     */
    public function setVarCombinations(ProductVarCombination ...$varCombinations): Product
    {
        $this->varCombinations = $varCombinations;
        
        return $this;
    }
    
    /**
     * @return ProductVarCombination[]
     */
    public function getVarCombinations(): array
    {
        return $this->varCombinations;
    }
    
    /**
     * @return Product
     */
    public function clearVarCombinations(): Product
    {
        $this->varCombinations = [];
        
        return $this;
    }
    
    /**
     * @param ProductVariation $variation
     * @return Product
     */
    public function addVariation(ProductVariation $variation): Product
    {
        $this->variations[] = $variation;
        
        return $this;
    }

    /**
     * @param ProductVariation ...$variations
     * @return Product
     */
    public function setVariations(ProductVariation ...$variations): Product
    {
        $this->variations = $variations;
        
        return $this;
    }
    
    /**
     * @return ProductVariation[]
     */
    public function getVariations(): array
    {
        return $this->variations;
    }
    
    /**
     * @return Product
     */
    public function clearVariations(): Product
    {
        $this->variations = [];
        
        return $this;
    }
    
    /**
     * @param ProductWarehouseInfo $warehouseInfo
     * @return Product
     */
    public function addWarehouseInfo(ProductWarehouseInfo $warehouseInfo): Product
    {
        $this->warehouseInfo[] = $warehouseInfo;
        
        return $this;
    }

    /**
     * @param ProductWarehouseInfo ...$warehouseInfo
     * @return Product
     */
    public function setWarehouseInfo(ProductWarehouseInfo ...$warehouseInfo): Product
    {
        $this->warehouseInfo = $warehouseInfo;
        
        return $this;
    }
    
    /**
     * @return ProductWarehouseInfo[]
     */
    public function getWarehouseInfo(): array
    {
        return $this->warehouseInfo;
    }
    
    /**
     * @return Product
     */
    public function clearWarehouseInfo(): Product
    {
        $this->warehouseInfo = [];
        
        return $this;
    }

    /**
     * @param array $publics
     * @return stdClass
     */
    public function getPublic(array $publics = ['fields', 'isEncrypted', 'identities', 'type']): stdClass
    {
        $return = parent::getPublic($publics);

        foreach ($this->getAttributes() as $i=> $attribute) {
            foreach ($attribute->getI18ns() as $j=> $i18nAttribute) {
                $return->attributes[$i]->i18ns[$j]->productAttrId = $attribute->getId()->toArray();
            }
        }

        return $return;
    }
}
