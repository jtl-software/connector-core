<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Product Model
 * Product properties.
 *
 * @access public
 */
class Product extends DataModel
{
    /**
     * @var string - Unique product id
     */
    protected $_id = '';
    
    /**
     * @var string - Reference to master product
     */
    protected $_masterProductId = '';
    
    /**
     * @var string - Reference to manufacturer
     */
    protected $_manufacturerId = '';
    
    /**
     * @var string - Reference to (current) deliveryStatus
     */
    protected $_deliveryStatusId = '';
    
    /**
     * @var string - Reference to unit
     */
    protected $_unitId = '';
    
    /**
     * @var string - Optional reference to basePriceUnit
     */
    protected $_basePriceUnitId = '';
    
    /**
     * @var string - Reference to shippingClass
     */
    protected $_shippingClassId = '';
    
    /**
     * @var string - Optional stock keeping unit identifier
     */
    protected $_sku = '';
    
    /**
     * @var string - Optional internal product note
     */
    protected $_note = '';
    
    /**
     * @var double - Optional stock (level)
     */
    protected $_stockLevel = 0;
    
    /**
     * @var double - Value added tax
     */
    protected $_vat = 0.0;
    
    /**
     * @var double - Optional minimum quantity needed to purchase product
     */
    protected $_minimumOrderQuantity = 0;
    
    /**
     * @var string - Optional European Article Number (EAN)
     */
    protected $_ean = '';
    
    /**
     * @var bool - Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     */
    protected $_isTopProduct = false;
    
    /**
     * @var double - Productweight exclusive packaging
     */
    protected $_productWeight = 0;
    
    /**
     * @var double - Productweight inclusive packaging
     */
    protected $_shippingWeight = 0;
    
    /**
     * @var bool - Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     */
    protected $_isNew = false;
    
    /**
     * @var double - Optional recommended retail price (gross) 
     */
    protected $_recommendedRetailPrice = 0.0;
    
    /**
     * @var bool - Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     */
    protected $_considerStock = false;
    
    /**
     * @var bool - Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true. 
     */
    protected $_permitNegativeStock = false;
    
    /**
     * @var bool - Optional: Consider stock levels of productVariations. Same as considerStock but for variations. 
     */
    protected $_considerVariationStock = false;
    
    /**
     * @var bool - Optional: Set to true to allow non-integer quantites for purchase
     */
    protected $_isDivisible = false;
    
    /**
     * @var bool - Optional: Set to true to display base price / unit pricing measure
     */
    protected $_considerBasePrice = false;
    
    /**
     * @var double - Optional base price divisor. Calculate basePriceDivisor by dividing product filling quantity through unit pricing base measure. E.g. 75ml / 100ml = 0.75
     */
    protected $_basePriceDivisor = 0.0;
    
    /**
     * @var string - Optional internal keywords and synonyms for product
     */
    protected $_keywords = '';
    
    /**
     * @var int - Optional sort number for product sorting in lists
     */
    protected $_sort = 0;
    
    /**
     * @var string - Creation date
     */
    protected $_created = '0000-00-00';
    
    /**
     * @var string - Optional available from date. Specify a date, upon when product can be purchased. 
     */
    protected $_availableFrom = '0000-00-00';
    
    /**
     * @var string - Optional manufacturer number
     */
    protected $_manufacturerNumber = '';
    
    /**
     * @var string - Optional serial number
     */
    protected $_serialNumber = '';
    
    /**
     * @var string - Optional International Standard Book Number
     */
    protected $_isbn = '';
    
    /**
     * @var string - Optional Amazon Standard Identification Number
     */
    protected $_asin = '';
    
    /**
     * @var string - Optional UN number, used to define hazardous properties
     */
    protected $_unNumber = '';
    
    /**
     * @var string - Optional Hazard identifier, encodes general hazard class und subdivision
     */
    protected $_hazardIdNumber = '';
    
    /**
     * @var string - Optional TARIC
     */
    protected $_taric = '';
    
    /**
     * @var bool - Optional flag if product is master product
     */
    protected $_isMasterProduct = false;
    
    /**
     * @var double - Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     */
    protected $_takeOffQuantity = 0.0;
    
    /**
     * @var string - Optional reference to setArticle
     */
    protected $_setArticleId = '';
    
    /**
     * @var string - Optional Universal Product Code
     */
    protected $_upc = '';
    
    /**
     * @var string - Optional Origin country
     */
    protected $_originCountry = '';
    
    /**
     * @var string - Optional Ebay product ID
     */
    protected $_epid = '';
    
    /**
     * @var string - Optional reference to productType
     */
    protected $_productTypeId = '';
    
    /**
     * @var double - Optional expected inflow quantity
     */
    protected $_inflowQuantity = 0.0;
    
    /**
     * @var string - Optional expected inflow date
     */
    protected $_inflowDate = '';
    
    /**
     * @var double - Optional supplier stock level for product
     */
    protected $_supplierStockLevel = 0;
    
    /**
     * @var double - Optional average supplier delivery time in days. Default 0 if no average delivery time is present. 
     */
    protected $_supplierDeliveryTime = 0;
    
    /**
     * @var string - Optional best before date. Default 0000-00-00 if product has no best-before-date.
     */
    protected $_bestBefore = '0000-00-00';
    
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
                case "_deliveryStatusId":
                case "_unitId":
                case "_basePriceUnitId":
                case "_shippingClassId":
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
                case "_setArticleId":
                case "_upc":
                case "_originCountry":
                case "_epid":
                case "_productTypeId":
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
     * @param string $id
     * @return \jtl\Connector\Model\Product
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $masterProductId
     * @return \jtl\Connector\Model\Product
     */
    public function setMasterProductId($masterProductId)
    {
        $this->_masterProductId = (string)$masterProductId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMasterProductId()
    {
        return $this->_masterProductId;
    }
    
    /**
     * @param string $manufacturerId
     * @return \jtl\Connector\Model\Product
     */
    public function setManufacturerId($manufacturerId)
    {
        $this->_manufacturerId = (string)$manufacturerId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getManufacturerId()
    {
        return $this->_manufacturerId;
    }
    
    /**
     * @param string $deliveryStatusId
     * @return \jtl\Connector\Model\Product
     */
    public function setDeliveryStatusId($deliveryStatusId)
    {
        $this->_deliveryStatusId = (string)$deliveryStatusId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDeliveryStatusId()
    {
        return $this->_deliveryStatusId;
    }
    
    /**
     * @param string $unitId
     * @return \jtl\Connector\Model\Product
     */
    public function setUnitId($unitId)
    {
        $this->_unitId = (string)$unitId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getUnitId()
    {
        return $this->_unitId;
    }
    
    /**
     * @param string $basePriceUnitId
     * @return \jtl\Connector\Model\Product
     */
    public function setBasePriceUnitId($basePriceUnitId)
    {
        $this->_basePriceUnitId = (string)$basePriceUnitId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBasePriceUnitId()
    {
        return $this->_basePriceUnitId;
    }
    
    /**
     * @param string $shippingClassId
     * @return \jtl\Connector\Model\Product
     */
    public function setShippingClassId($shippingClassId)
    {
        $this->_shippingClassId = (string)$shippingClassId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getShippingClassId()
    {
        return $this->_shippingClassId;
    }
    
    /**
     * @param string $sku
     * @return \jtl\Connector\Model\Product
     */
    public function setSku($sku)
    {
        $this->_sku = (string)$sku;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSku()
    {
        return $this->_sku;
    }
    
    /**
     * @param string $note
     * @return \jtl\Connector\Model\Product
     */
    public function setNote($note)
    {
        $this->_note = (string)$note;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getNote()
    {
        return $this->_note;
    }
    
    /**
     * @param double $stockLevel
     * @return \jtl\Connector\Model\Product
     */
    public function setStockLevel($stockLevel)
    {
        $this->_stockLevel = (double)$stockLevel;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getStockLevel()
    {
        return $this->_stockLevel;
    }
    
    /**
     * @param double $vat
     * @return \jtl\Connector\Model\Product
     */
    public function setVat($vat)
    {
        $this->_vat = (double)$vat;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getVat()
    {
        return $this->_vat;
    }
    
    /**
     * @param double $minimumOrderQuantity
     * @return \jtl\Connector\Model\Product
     */
    public function setMinimumOrderQuantity($minimumOrderQuantity)
    {
        $this->_minimumOrderQuantity = (double)$minimumOrderQuantity;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getMinimumOrderQuantity()
    {
        return $this->_minimumOrderQuantity;
    }
    
    /**
     * @param string $ean
     * @return \jtl\Connector\Model\Product
     */
    public function setEan($ean)
    {
        $this->_ean = (string)$ean;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getEan()
    {
        return $this->_ean;
    }
    
    /**
     * @param bool $isTopProduct
     * @return \jtl\Connector\Model\Product
     */
    public function setIsTopProduct($isTopProduct)
    {
        $this->_isTopProduct = (bool)$isTopProduct;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsTopProduct()
    {
        return $this->_isTopProduct;
    }
    
    /**
     * @param double $productWeight
     * @return \jtl\Connector\Model\Product
     */
    public function setProductWeight($productWeight)
    {
        $this->_productWeight = (double)$productWeight;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getProductWeight()
    {
        return $this->_productWeight;
    }
    
    /**
     * @param double $shippingWeight
     * @return \jtl\Connector\Model\Product
     */
    public function setShippingWeight($shippingWeight)
    {
        $this->_shippingWeight = (double)$shippingWeight;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getShippingWeight()
    {
        return $this->_shippingWeight;
    }
    
    /**
     * @param bool $isNew
     * @return \jtl\Connector\Model\Product
     */
    public function setIsNew($isNew)
    {
        $this->_isNew = (bool)$isNew;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsNew()
    {
        return $this->_isNew;
    }
    
    /**
     * @param double $recommendedRetailPrice
     * @return \jtl\Connector\Model\Product
     */
    public function setRecommendedRetailPrice($recommendedRetailPrice)
    {
        $this->_recommendedRetailPrice = (double)$recommendedRetailPrice;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getRecommendedRetailPrice()
    {
        return $this->_recommendedRetailPrice;
    }
    
    /**
     * @param bool $considerStock
     * @return \jtl\Connector\Model\Product
     */
    public function setConsiderStock($considerStock)
    {
        $this->_considerStock = (bool)$considerStock;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getConsiderStock()
    {
        return $this->_considerStock;
    }
    
    /**
     * @param bool $permitNegativeStock
     * @return \jtl\Connector\Model\Product
     */
    public function setPermitNegativeStock($permitNegativeStock)
    {
        $this->_permitNegativeStock = (bool)$permitNegativeStock;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getPermitNegativeStock()
    {
        return $this->_permitNegativeStock;
    }
    
    /**
     * @param bool $considerVariationStock
     * @return \jtl\Connector\Model\Product
     */
    public function setConsiderVariationStock($considerVariationStock)
    {
        $this->_considerVariationStock = (bool)$considerVariationStock;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getConsiderVariationStock()
    {
        return $this->_considerVariationStock;
    }
    
    /**
     * @param bool $isDivisible
     * @return \jtl\Connector\Model\Product
     */
    public function setIsDivisible($isDivisible)
    {
        $this->_isDivisible = (bool)$isDivisible;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsDivisible()
    {
        return $this->_isDivisible;
    }
    
    /**
     * @param bool $considerBasePrice
     * @return \jtl\Connector\Model\Product
     */
    public function setConsiderBasePrice($considerBasePrice)
    {
        $this->_considerBasePrice = (bool)$considerBasePrice;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getConsiderBasePrice()
    {
        return $this->_considerBasePrice;
    }
    
    /**
     * @param double $basePriceDivisor
     * @return \jtl\Connector\Model\Product
     */
    public function setBasePriceDivisor($basePriceDivisor)
    {
        $this->_basePriceDivisor = (double)$basePriceDivisor;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getBasePriceDivisor()
    {
        return $this->_basePriceDivisor;
    }
    
    /**
     * @param string $keywords
     * @return \jtl\Connector\Model\Product
     */
    public function setKeywords($keywords)
    {
        $this->_keywords = (string)$keywords;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->_keywords;
    }
    
    /**
     * @param int $sort
     * @return \jtl\Connector\Model\Product
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getSort()
    {
        return $this->_sort;
    }
    
    /**
     * @param string $created
     * @return \jtl\Connector\Model\Product
     */
    public function setCreated($created)
    {
        $this->_created = (string)$created;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->_created;
    }
    
    /**
     * @param string $availableFrom
     * @return \jtl\Connector\Model\Product
     */
    public function setAvailableFrom($availableFrom)
    {
        $this->_availableFrom = (string)$availableFrom;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getAvailableFrom()
    {
        return $this->_availableFrom;
    }
    
    /**
     * @param string $manufacturerNumber
     * @return \jtl\Connector\Model\Product
     */
    public function setManufacturerNumber($manufacturerNumber)
    {
        $this->_manufacturerNumber = (string)$manufacturerNumber;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getManufacturerNumber()
    {
        return $this->_manufacturerNumber;
    }
    
    /**
     * @param string $serialNumber
     * @return \jtl\Connector\Model\Product
     */
    public function setSerialNumber($serialNumber)
    {
        $this->_serialNumber = (string)$serialNumber;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSerialNumber()
    {
        return $this->_serialNumber;
    }
    
    /**
     * @param string $isbn
     * @return \jtl\Connector\Model\Product
     */
    public function setIsbn($isbn)
    {
        $this->_isbn = (string)$isbn;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIsbn()
    {
        return $this->_isbn;
    }
    
    /**
     * @param string $asin
     * @return \jtl\Connector\Model\Product
     */
    public function setAsin($asin)
    {
        $this->_asin = (string)$asin;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getAsin()
    {
        return $this->_asin;
    }
    
    /**
     * @param string $unNumber
     * @return \jtl\Connector\Model\Product
     */
    public function setUnNumber($unNumber)
    {
        $this->_unNumber = (string)$unNumber;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getUnNumber()
    {
        return $this->_unNumber;
    }
    
    /**
     * @param string $hazardIdNumber
     * @return \jtl\Connector\Model\Product
     */
    public function setHazardIdNumber($hazardIdNumber)
    {
        $this->_hazardIdNumber = (string)$hazardIdNumber;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getHazardIdNumber()
    {
        return $this->_hazardIdNumber;
    }
    
    /**
     * @param string $taric
     * @return \jtl\Connector\Model\Product
     */
    public function setTaric($taric)
    {
        $this->_taric = (string)$taric;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTaric()
    {
        return $this->_taric;
    }
    
    /**
     * @param bool $isMasterProduct
     * @return \jtl\Connector\Model\Product
     */
    public function setIsMasterProduct($isMasterProduct)
    {
        $this->_isMasterProduct = (bool)$isMasterProduct;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsMasterProduct()
    {
        return $this->_isMasterProduct;
    }
    
    /**
     * @param double $takeOffQuantity
     * @return \jtl\Connector\Model\Product
     */
    public function setTakeOffQuantity($takeOffQuantity)
    {
        $this->_takeOffQuantity = (double)$takeOffQuantity;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getTakeOffQuantity()
    {
        return $this->_takeOffQuantity;
    }
    
    /**
     * @param string $setArticleId
     * @return \jtl\Connector\Model\Product
     */
    public function setSetArticleId($setArticleId)
    {
        $this->_setArticleId = (string)$setArticleId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSetArticleId()
    {
        return $this->_setArticleId;
    }
    
    /**
     * @param string $upc
     * @return \jtl\Connector\Model\Product
     */
    public function setUpc($upc)
    {
        $this->_upc = (string)$upc;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getUpc()
    {
        return $this->_upc;
    }
    
    /**
     * @param string $originCountry
     * @return \jtl\Connector\Model\Product
     */
    public function setOriginCountry($originCountry)
    {
        $this->_originCountry = (string)$originCountry;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getOriginCountry()
    {
        return $this->_originCountry;
    }
    
    /**
     * @param string $epid
     * @return \jtl\Connector\Model\Product
     */
    public function setEpid($epid)
    {
        $this->_epid = (string)$epid;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getEpid()
    {
        return $this->_epid;
    }
    
    /**
     * @param string $productTypeId
     * @return \jtl\Connector\Model\Product
     */
    public function setProductTypeId($productTypeId)
    {
        $this->_productTypeId = (string)$productTypeId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductTypeId()
    {
        return $this->_productTypeId;
    }
    
    /**
     * @param double $inflowQuantity
     * @return \jtl\Connector\Model\Product
     */
    public function setInflowQuantity($inflowQuantity)
    {
        $this->_inflowQuantity = (double)$inflowQuantity;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getInflowQuantity()
    {
        return $this->_inflowQuantity;
    }
    
    /**
     * @param string $inflowDate
     * @return \jtl\Connector\Model\Product
     */
    public function setInflowDate($inflowDate)
    {
        $this->_inflowDate = (string)$inflowDate;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getInflowDate()
    {
        return $this->_inflowDate;
    }
    
    /**
     * @param double $supplierStockLevel
     * @return \jtl\Connector\Model\Product
     */
    public function setSupplierStockLevel($supplierStockLevel)
    {
        $this->_supplierStockLevel = (double)$supplierStockLevel;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getSupplierStockLevel()
    {
        return $this->_supplierStockLevel;
    }
    
    /**
     * @param double $supplierDeliveryTime
     * @return \jtl\Connector\Model\Product
     */
    public function setSupplierDeliveryTime($supplierDeliveryTime)
    {
        $this->_supplierDeliveryTime = (double)$supplierDeliveryTime;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getSupplierDeliveryTime()
    {
        return $this->_supplierDeliveryTime;
    }
    
    /**
     * @param string $bestBefore
     * @return \jtl\Connector\Model\Product
     */
    public function setBestBefore($bestBefore)
    {
        $this->_bestBefore = (string)$bestBefore;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBestBefore()
    {
        return $this->_bestBefore;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}