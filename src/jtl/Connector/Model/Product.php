<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

/**
 * Product properties.
 *
 * @access public
 * @subpackage Product
 */
class Product extends DataModel
{
    /**
     * @var Identity Unique product id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to master product
     */
    protected $_masterProductId = null;
    
    /**
     * @var Identity Reference to manufacturer
     */
    protected $_manufacturerId = null;
    
    /**
     * @var string Reference to (current) deliveryStatus
     */
    protected $_deliveryStatusId = '';
    
    /**
     * @var Identity Reference to unit
     */
    protected $_unitId = null;
    
    /**
     * @var Identity Optional reference to basePriceUnit
     */
    protected $_basePriceUnitId = null;
    
    /**
     * @var Identity Reference to shippingClass
     */
    protected $_shippingClassId = null;
    
    /**
     * @var string Optional stock keeping unit identifier
     */
    protected $_sku = '';
    
    /**
     * @var string Optional internal product note
     */
    protected $_note = '';
    
    /**
     * @var double Optional stock (level)
     */
    protected $_stockLevel = 0;
    
    /**
     * @var double Value added tax
     */
    protected $_vat = 0.0;
    
    /**
     * @var double Optional minimum quantity needed to purchase product
     */
    protected $_minimumOrderQuantity = 0;
    
    /**
     * @var string Optional European Article Number (EAN)
     */
    protected $_ean = '';
    
    /**
     * @var bool Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     */
    protected $_isTopProduct = false;
    
    /**
     * @var double Productweight exclusive packaging
     */
    protected $_productWeight = 0;
    
    /**
     * @var double Productweight inclusive packaging
     */
    protected $_shippingWeight = 0;
    
    /**
     * @var bool Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     */
    protected $_isNew = false;
    
    /**
     * @var double Optional recommended retail price (gross) 
     */
    protected $_recommendedRetailPrice = 0.0;
    
    /**
     * @var bool Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     */
    protected $_considerStock = false;
    
    /**
     * @var bool Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true. 
     */
    protected $_permitNegativeStock = false;
    
    /**
     * @var bool Optional: Consider stock levels of productVariations. Same as considerStock but for variations. 
     */
    protected $_considerVariationStock = false;
    
    /**
     * @var bool Optional: Set to true to allow non-integer quantites for purchase
     */
    protected $_isDivisible = false;
    
    /**
     * @var bool Optional: Set to true to display base price / unit pricing measure
     */
    protected $_considerBasePrice = false;
    
    /**
     * @var double Optional base price divisor. Calculate basePriceDivisor by dividing product filling quantity through unit pricing base measure. E.g. 75ml / 100ml = 0.75
     */
    protected $_basePriceDivisor = 0.0;
    
    /**
     * @var string Optional internal keywords and synonyms for product
     */
    protected $_keywords = '';
    
    /**
     * @var int Optional sort number for product sorting in lists
     */
    protected $_sort = 0;
    
    /**
     * @var string Creation date
     */
    protected $_created = null;
    
    /**
     * @var string Optional available from date. Specify a date, upon when product can be purchased. 
     */
    protected $_availableFrom = null;
    
    /**
     * @var string Optional manufacturer number
     */
    protected $_manufacturerNumber = '';
    
    /**
     * @var string Optional serial number
     */
    protected $_serialNumber = '';
    
    /**
     * @var string Optional International Standard Book Number
     */
    protected $_isbn = '';
    
    /**
     * @var string Optional Amazon Standard Identification Number
     */
    protected $_asin = '';
    
    /**
     * @var string Optional UN number, used to define hazardous properties
     */
    protected $_unNumber = '';
    
    /**
     * @var string Optional Hazard identifier, encodes general hazard class und subdivision
     */
    protected $_hazardIdNumber = '';
    
    /**
     * @var string Optional TARIC
     */
    protected $_taric = '';
    
    /**
     * @var bool Optional flag if product is master product
     */
    protected $_isMasterProduct = false;
    
    /**
     * @var double Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     */
    protected $_takeOffQuantity = 0.0;
    
    /**
     * @var Identity Optional reference to setArticle
     */
    protected $_setArticleId = null;
    
    /**
     * @var string Optional Universal Product Code
     */
    protected $_upc = '';
    
    /**
     * @var string Optional Origin country
     */
    protected $_originCountry = '';
    
    /**
     * @var string Optional Ebay product ID
     */
    protected $_epid = '';
    
    /**
     * @var Identity Optional reference to productType
     */
    protected $_productTypeId = null;
    
    /**
     * @var double Optional expected inflow quantity
     */
    protected $_inflowQuantity = 0.0;
    
    /**
     * @var string Optional expected inflow date
     */
    protected $_inflowDate = null;
    
    /**
     * @var double Optional supplier stock level for product
     */
    protected $_supplierStockLevel = 0;
    
    /**
     * @var double Optional average supplier delivery time in days. Default 0 if no average delivery time is present. 
     */
    protected $_supplierDeliveryTime = 0;
    
    /**
     * @var string Optional best before date. Default 0000-00-00 if product has no best-before-date.
     */
    protected $_bestBefore = null;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id',
        '_masterProductId',
        '_manufacturerId',
        '_unitId',
        '_basePriceUnitId',
        '_shippingClassId',
        '_setArticleId',
        '_productTypeId'
    );
    
    /**
     * Product Setter
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
                case "_masterProductId":
                case "_manufacturerId":
                case "_unitId":
                case "_basePriceUnitId":
                case "_shippingClassId":
                case "_setArticleId":
                case "_productTypeId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_deliveryStatusId":
                case "_sku":
                case "_note":
                case "_ean":
                case "_keywords":
                case "_created":
                case "_availableFrom":
                case "_manufacturerNumber":
                case "_serialNumber":
                case "_isbn":
                case "_asin":
                case "_unNumber":
                case "_hazardIdNumber":
                case "_taric":
                case "_upc":
                case "_originCountry":
                case "_epid":
                case "_inflowDate":
                case "_bestBefore":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_stockLevel":
                case "_vat":
                case "_minimumOrderQuantity":
                case "_productWeight":
                case "_shippingWeight":
                case "_recommendedRetailPrice":
                case "_basePriceDivisor":
                case "_takeOffQuantity":
                case "_inflowQuantity":
                case "_supplierStockLevel":
                case "_supplierDeliveryTime":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_isTopProduct":
                case "_isNew":
                case "_considerStock":
                case "_permitNegativeStock":
                case "_considerVariationStock":
                case "_isDivisible":
                case "_considerBasePrice":
                case "_isMasterProduct":
                
                    $this->$name = (bool)$value;
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique product id
     * @return \jtl\Connector\Model\Product
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
     * @param Identity $masterProductId Reference to master product
     * @return \jtl\Connector\Model\Product
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
     * @param Identity $manufacturerId Reference to manufacturer
     * @return \jtl\Connector\Model\Product
     */
    public function setManufacturerId(Identity $manufacturerId)
    {
        $this->_manufacturerId = $manufacturerId;
        return $this;
    }
    
    /**
     * @return Identity Reference to manufacturer
     */
    public function getManufacturerId()
    {
        return $this->_manufacturerId;
    }
    /**
     * @param string $deliveryStatusId Reference to (current) deliveryStatus
     * @return \jtl\Connector\Model\Product
     */
    public function setDeliveryStatusId($deliveryStatusId)
    {
        $this->_deliveryStatusId = (string)$deliveryStatusId;
        return $this;
    }
    
    /**
     * @return string Reference to (current) deliveryStatus
     */
    public function getDeliveryStatusId()
    {
        return $this->_deliveryStatusId;
    }
    /**
     * @param Identity $unitId Reference to unit
     * @return \jtl\Connector\Model\Product
     */
    public function setUnitId(Identity $unitId)
    {
        $this->_unitId = $unitId;
        return $this;
    }
    
    /**
     * @return Identity Reference to unit
     */
    public function getUnitId()
    {
        return $this->_unitId;
    }
    /**
     * @param Identity $basePriceUnitId Optional reference to basePriceUnit
     * @return \jtl\Connector\Model\Product
     */
    public function setBasePriceUnitId(Identity $basePriceUnitId)
    {
        $this->_basePriceUnitId = $basePriceUnitId;
        return $this;
    }
    
    /**
     * @return Identity Optional reference to basePriceUnit
     */
    public function getBasePriceUnitId()
    {
        return $this->_basePriceUnitId;
    }
    /**
     * @param Identity $shippingClassId Reference to shippingClass
     * @return \jtl\Connector\Model\Product
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
     * @param string $sku Optional stock keeping unit identifier
     * @return \jtl\Connector\Model\Product
     */
    public function setSku($sku)
    {
        $this->_sku = (string)$sku;
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
     * @param string $note Optional internal product note
     * @return \jtl\Connector\Model\Product
     */
    public function setNote($note)
    {
        $this->_note = (string)$note;
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
     * @param double $stockLevel Optional stock (level)
     * @return \jtl\Connector\Model\Product
     */
    public function setStockLevel($stockLevel)
    {
        $this->_stockLevel = (double)$stockLevel;
        return $this;
    }
    
    /**
     * @return double Optional stock (level)
     */
    public function getStockLevel()
    {
        return $this->_stockLevel;
    }
    /**
     * @param double $vat Value added tax
     * @return \jtl\Connector\Model\Product
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
    /**
     * @param double $minimumOrderQuantity Optional minimum quantity needed to purchase product
     * @return \jtl\Connector\Model\Product
     */
    public function setMinimumOrderQuantity($minimumOrderQuantity)
    {
        $this->_minimumOrderQuantity = (double)$minimumOrderQuantity;
        return $this;
    }
    
    /**
     * @return double Optional minimum quantity needed to purchase product
     */
    public function getMinimumOrderQuantity()
    {
        return $this->_minimumOrderQuantity;
    }
    /**
     * @param string $ean Optional European Article Number (EAN)
     * @return \jtl\Connector\Model\Product
     */
    public function setEan($ean)
    {
        $this->_ean = (string)$ean;
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
     * @param bool $isTopProduct Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     * @return \jtl\Connector\Model\Product
     */
    public function setIsTopProduct($isTopProduct)
    {
        $this->_isTopProduct = (bool)$isTopProduct;
        return $this;
    }
    
    /**
     * @return bool Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     */
    public function getIsTopProduct()
    {
        return $this->_isTopProduct;
    }
    /**
     * @param double $productWeight Productweight exclusive packaging
     * @return \jtl\Connector\Model\Product
     */
    public function setProductWeight($productWeight)
    {
        $this->_productWeight = (double)$productWeight;
        return $this;
    }
    
    /**
     * @return double Productweight exclusive packaging
     */
    public function getProductWeight()
    {
        return $this->_productWeight;
    }
    /**
     * @param double $shippingWeight Productweight inclusive packaging
     * @return \jtl\Connector\Model\Product
     */
    public function setShippingWeight($shippingWeight)
    {
        $this->_shippingWeight = (double)$shippingWeight;
        return $this;
    }
    
    /**
     * @return double Productweight inclusive packaging
     */
    public function getShippingWeight()
    {
        return $this->_shippingWeight;
    }
    /**
     * @param bool $isNew Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     * @return \jtl\Connector\Model\Product
     */
    public function setIsNew($isNew)
    {
        $this->_isNew = (bool)$isNew;
        return $this;
    }
    
    /**
     * @return bool Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     */
    public function getIsNew()
    {
        return $this->_isNew;
    }
    /**
     * @param double $recommendedRetailPrice Optional recommended retail price (gross) 
     * @return \jtl\Connector\Model\Product
     */
    public function setRecommendedRetailPrice($recommendedRetailPrice)
    {
        $this->_recommendedRetailPrice = (double)$recommendedRetailPrice;
        return $this;
    }
    
    /**
     * @return double Optional recommended retail price (gross) 
     */
    public function getRecommendedRetailPrice()
    {
        return $this->_recommendedRetailPrice;
    }
    /**
     * @param bool $considerStock Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     * @return \jtl\Connector\Model\Product
     */
    public function setConsiderStock($considerStock)
    {
        $this->_considerStock = (bool)$considerStock;
        return $this;
    }
    
    /**
     * @return bool Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     */
    public function getConsiderStock()
    {
        return $this->_considerStock;
    }
    /**
     * @param bool $permitNegativeStock Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true. 
     * @return \jtl\Connector\Model\Product
     */
    public function setPermitNegativeStock($permitNegativeStock)
    {
        $this->_permitNegativeStock = (bool)$permitNegativeStock;
        return $this;
    }
    
    /**
     * @return bool Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true. 
     */
    public function getPermitNegativeStock()
    {
        return $this->_permitNegativeStock;
    }
    /**
     * @param bool $considerVariationStock Optional: Consider stock levels of productVariations. Same as considerStock but for variations. 
     * @return \jtl\Connector\Model\Product
     */
    public function setConsiderVariationStock($considerVariationStock)
    {
        $this->_considerVariationStock = (bool)$considerVariationStock;
        return $this;
    }
    
    /**
     * @return bool Optional: Consider stock levels of productVariations. Same as considerStock but for variations. 
     */
    public function getConsiderVariationStock()
    {
        return $this->_considerVariationStock;
    }
    /**
     * @param bool $isDivisible Optional: Set to true to allow non-integer quantites for purchase
     * @return \jtl\Connector\Model\Product
     */
    public function setIsDivisible($isDivisible)
    {
        $this->_isDivisible = (bool)$isDivisible;
        return $this;
    }
    
    /**
     * @return bool Optional: Set to true to allow non-integer quantites for purchase
     */
    public function getIsDivisible()
    {
        return $this->_isDivisible;
    }
    /**
     * @param bool $considerBasePrice Optional: Set to true to display base price / unit pricing measure
     * @return \jtl\Connector\Model\Product
     */
    public function setConsiderBasePrice($considerBasePrice)
    {
        $this->_considerBasePrice = (bool)$considerBasePrice;
        return $this;
    }
    
    /**
     * @return bool Optional: Set to true to display base price / unit pricing measure
     */
    public function getConsiderBasePrice()
    {
        return $this->_considerBasePrice;
    }
    /**
     * @param double $basePriceDivisor Optional base price divisor. Calculate basePriceDivisor by dividing product filling quantity through unit pricing base measure. E.g. 75ml / 100ml = 0.75
     * @return \jtl\Connector\Model\Product
     */
    public function setBasePriceDivisor($basePriceDivisor)
    {
        $this->_basePriceDivisor = (double)$basePriceDivisor;
        return $this;
    }
    
    /**
     * @return double Optional base price divisor. Calculate basePriceDivisor by dividing product filling quantity through unit pricing base measure. E.g. 75ml / 100ml = 0.75
     */
    public function getBasePriceDivisor()
    {
        return $this->_basePriceDivisor;
    }
    /**
     * @param string $keywords Optional internal keywords and synonyms for product
     * @return \jtl\Connector\Model\Product
     */
    public function setKeywords($keywords)
    {
        $this->_keywords = (string)$keywords;
        return $this;
    }
    
    /**
     * @return string Optional internal keywords and synonyms for product
     */
    public function getKeywords()
    {
        return $this->_keywords;
    }
    /**
     * @param int $sort Optional sort number for product sorting in lists
     * @return \jtl\Connector\Model\Product
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int Optional sort number for product sorting in lists
     */
    public function getSort()
    {
        return $this->_sort;
    }
    /**
     * @param string $created Creation date
     * @return \jtl\Connector\Model\Product
     */
    public function setCreated($created)
    {
        $this->_created = (string)$created;
        return $this;
    }
    
    /**
     * @return string Creation date
     */
    public function getCreated()
    {
        return $this->_created;
    }
    /**
     * @param string $availableFrom Optional available from date. Specify a date, upon when product can be purchased. 
     * @return \jtl\Connector\Model\Product
     */
    public function setAvailableFrom($availableFrom)
    {
        $this->_availableFrom = (string)$availableFrom;
        return $this;
    }
    
    /**
     * @return string Optional available from date. Specify a date, upon when product can be purchased. 
     */
    public function getAvailableFrom()
    {
        return $this->_availableFrom;
    }
    /**
     * @param string $manufacturerNumber Optional manufacturer number
     * @return \jtl\Connector\Model\Product
     */
    public function setManufacturerNumber($manufacturerNumber)
    {
        $this->_manufacturerNumber = (string)$manufacturerNumber;
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
     * @param string $serialNumber Optional serial number
     * @return \jtl\Connector\Model\Product
     */
    public function setSerialNumber($serialNumber)
    {
        $this->_serialNumber = (string)$serialNumber;
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
     * @param string $isbn Optional International Standard Book Number
     * @return \jtl\Connector\Model\Product
     */
    public function setIsbn($isbn)
    {
        $this->_isbn = (string)$isbn;
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
     * @param string $asin Optional Amazon Standard Identification Number
     * @return \jtl\Connector\Model\Product
     */
    public function setAsin($asin)
    {
        $this->_asin = (string)$asin;
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
     * @param string $unNumber Optional UN number, used to define hazardous properties
     * @return \jtl\Connector\Model\Product
     */
    public function setUnNumber($unNumber)
    {
        $this->_unNumber = (string)$unNumber;
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
     * @param string $hazardIdNumber Optional Hazard identifier, encodes general hazard class und subdivision
     * @return \jtl\Connector\Model\Product
     */
    public function setHazardIdNumber($hazardIdNumber)
    {
        $this->_hazardIdNumber = (string)$hazardIdNumber;
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
     * @param string $taric Optional TARIC
     * @return \jtl\Connector\Model\Product
     */
    public function setTaric($taric)
    {
        $this->_taric = (string)$taric;
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
     * @param bool $isMasterProduct Optional flag if product is master product
     * @return \jtl\Connector\Model\Product
     */
    public function setIsMasterProduct($isMasterProduct)
    {
        $this->_isMasterProduct = (bool)$isMasterProduct;
        return $this;
    }
    
    /**
     * @return bool Optional flag if product is master product
     */
    public function getIsMasterProduct()
    {
        return $this->_isMasterProduct;
    }
    /**
     * @param double $takeOffQuantity Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     * @return \jtl\Connector\Model\Product
     */
    public function setTakeOffQuantity($takeOffQuantity)
    {
        $this->_takeOffQuantity = (double)$takeOffQuantity;
        return $this;
    }
    
    /**
     * @return double Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     */
    public function getTakeOffQuantity()
    {
        return $this->_takeOffQuantity;
    }
    /**
     * @param Identity $setArticleId Optional reference to setArticle
     * @return \jtl\Connector\Model\Product
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
     * @param string $upc Optional Universal Product Code
     * @return \jtl\Connector\Model\Product
     */
    public function setUpc($upc)
    {
        $this->_upc = (string)$upc;
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
     * @param string $originCountry Optional Origin country
     * @return \jtl\Connector\Model\Product
     */
    public function setOriginCountry($originCountry)
    {
        $this->_originCountry = (string)$originCountry;
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
     * @param string $epid Optional Ebay product ID
     * @return \jtl\Connector\Model\Product
     */
    public function setEpid($epid)
    {
        $this->_epid = (string)$epid;
        return $this;
    }
    
    /**
     * @return string Optional Ebay product ID
     */
    public function getEpid()
    {
        return $this->_epid;
    }
    /**
     * @param Identity $productTypeId Optional reference to productType
     * @return \jtl\Connector\Model\Product
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
     * @param double $inflowQuantity Optional expected inflow quantity
     * @return \jtl\Connector\Model\Product
     */
    public function setInflowQuantity($inflowQuantity)
    {
        $this->_inflowQuantity = (double)$inflowQuantity;
        return $this;
    }
    
    /**
     * @return double Optional expected inflow quantity
     */
    public function getInflowQuantity()
    {
        return $this->_inflowQuantity;
    }
    /**
     * @param string $inflowDate Optional expected inflow date
     * @return \jtl\Connector\Model\Product
     */
    public function setInflowDate($inflowDate)
    {
        $this->_inflowDate = (string)$inflowDate;
        return $this;
    }
    
    /**
     * @return string Optional expected inflow date
     */
    public function getInflowDate()
    {
        return $this->_inflowDate;
    }
    /**
     * @param double $supplierStockLevel Optional supplier stock level for product
     * @return \jtl\Connector\Model\Product
     */
    public function setSupplierStockLevel($supplierStockLevel)
    {
        $this->_supplierStockLevel = (double)$supplierStockLevel;
        return $this;
    }
    
    /**
     * @return double Optional supplier stock level for product
     */
    public function getSupplierStockLevel()
    {
        return $this->_supplierStockLevel;
    }
    /**
     * @param double $supplierDeliveryTime Optional average supplier delivery time in days. Default 0 if no average delivery time is present. 
     * @return \jtl\Connector\Model\Product
     */
    public function setSupplierDeliveryTime($supplierDeliveryTime)
    {
        $this->_supplierDeliveryTime = (double)$supplierDeliveryTime;
        return $this;
    }
    
    /**
     * @return double Optional average supplier delivery time in days. Default 0 if no average delivery time is present. 
     */
    public function getSupplierDeliveryTime()
    {
        return $this->_supplierDeliveryTime;
    }
    /**
     * @param string $bestBefore Optional best before date. Default 0000-00-00 if product has no best-before-date.
     * @return \jtl\Connector\Model\Product
     */
    public function setBestBefore($bestBefore)
    {
        $this->_bestBefore = (string)$bestBefore;
        return $this;
    }
    
    /**
     * @return string Optional best before date. Default 0000-00-00 if product has no best-before-date.
     */
    public function getBestBefore()
    {
        return $this->_bestBefore;
    }
}