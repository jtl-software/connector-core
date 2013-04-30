<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\ValidationException;
use \jtl\Core\Exception\SchemaException;
use \jtl\Core\Validator\Schema;

/**
 * Product Model
 * @access public
 */
abstract class Product extends Model
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_masterProductId;
    
    /**
     * @var int
     */
    protected $_manufacturerId;
    
    /**
     * @var int
     */
    protected $_deliveryStatusId;
    
    /**
     * @var int
     */
    protected $_unitId;
    
    /**
     * @var int
     */
    protected $_basePriceUnitId;
    
    /**
     * @var int
     */
    protected $_taxClassId;
    
    /**
     * @var int
     */
    protected $_shippingClassId;
    
    /**
     * @var string
     */
    protected $_sku;
    
    /**
     * @var string
     */
    protected $_note;
    
    /**
     * @var double
     */
    protected $_stockLevel;
    
    /**
     * @var double
     */
    protected $_vat;
    
    /**
     * @var double
     */
    protected $_minimumOrderQuantity;
    
    /**
     * @var string
     */
    protected $_ean;
    
    /**
     * @var string
     */
    protected $_isTopProduct;
    
    /**
     * @var double
     */
    protected $_productWeight;
    
    /**
     * @var double
     */
    protected $_shippingWeight;
    
    /**
     * @var string
     */
    protected $_isNew;
    
    /**
     * @var double
     */
    protected $_recommendedRetailPrice;
    
    /**
     * @var string
     */
    protected $_considerStock;
    
    /**
     * @var string
     */
    protected $_permitNegativeStock;
    
    /**
     * @var string
     */
    protected $_considerVariationStock;
    
    /**
     * @var string
     */
    protected $_isDivisible;
    
    /**
     * @var double
     */
    protected $_packagingUnit;
    
    /**
     * @var double
     */
    protected $_price;
    
    /**
     * @var string
     */
    protected $_considerBasePrice;
    
    /**
     * @var double
     */
    protected $_basePriceValue;
    
    /**
     * @var string
     */
    protected $_keywords;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * @var string
     */
    protected $_availableFrom;
    
    /**
     * @var string
     */
    protected $_manufacturerNumber;
    
    /**
     * @var string
     */
    protected $_serialNumber;
    
    /**
     * @var string
     */
    protected $_isbn;
    
    /**
     * @var string
     */
    protected $_asin;
    
    /**
     * @var string
     */
    protected $_unNumber;
    
    /**
     * @var string
     */
    protected $_hazardIdNumber;
    
    /**
     * @var string
     */
    protected $_taric;
    
    /**
     * @var int
     */
    protected $_isMasterProduct;
    
    /**
     * @var double
     */
    protected $_takeOffQuantity;
    
    /**
     * @var int
     */
    protected $_setArticleId;
    
    /**
     * @var string
     */
    protected $_upc;
    
    /**
     * @var string
     */
    protected $_originCountry;
    
    /**
     * @var string
     */
    protected $_epid;
    
    /**
     * @var int
     */
    protected $_productTypeId;
    
    /**
     * @var double
     */
    protected $_inflowQuantity;
    
    /**
     * @var string
     */
    protected $_inflowDate;
    
    /**
     * @var double
     */
    protected $_supplierStockLevel;
    
    /**
     * @var int
     */
    protected $_supplierDeliveryTime;
    
    /**
     * @var string
     */
    protected $_bestBefore;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\Product
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param int $masterProductId
     * @return \jtl\Connector\Model\Product
     */
    public function setMasterProductId($masterProductId)
    {
        $this->_masterProductId = (int)$masterProductId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getMasterProductId()
    {
        return $this->_masterProductId;
    }
    
    /**
     * @param int $manufacturerId
     * @return \jtl\Connector\Model\Product
     */
    public function setManufacturerId($manufacturerId)
    {
        $this->_manufacturerId = (int)$manufacturerId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getManufacturerId()
    {
        return $this->_manufacturerId;
    }
    
    /**
     * @param int $deliveryStatusId
     * @return \jtl\Connector\Model\Product
     */
    public function setDeliveryStatusId($deliveryStatusId)
    {
        $this->_deliveryStatusId = (int)$deliveryStatusId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getDeliveryStatusId()
    {
        return $this->_deliveryStatusId;
    }
    
    /**
     * @param int $unitId
     * @return \jtl\Connector\Model\Product
     */
    public function setUnitId($unitId)
    {
        $this->_unitId = (int)$unitId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getUnitId()
    {
        return $this->_unitId;
    }
    
    /**
     * @param int $basePriceUnitId
     * @return \jtl\Connector\Model\Product
     */
    public function setBasePriceUnitId($basePriceUnitId)
    {
        $this->_basePriceUnitId = (int)$basePriceUnitId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getBasePriceUnitId()
    {
        return $this->_basePriceUnitId;
    }
    
    /**
     * @param int $taxClassId
     * @return \jtl\Connector\Model\Product
     */
    public function setTaxClassId($taxClassId)
    {
        $this->_taxClassId = (int)$taxClassId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getTaxClassId()
    {
        return $this->_taxClassId;
    }
    
    /**
     * @param int $shippingClassId
     * @return \jtl\Connector\Model\Product
     */
    public function setShippingClassId($shippingClassId)
    {
        $this->_shippingClassId = (int)$shippingClassId;
        return $this;
    }
    
    /**
     * @return int
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
     * @param string $isTopProduct
     * @return \jtl\Connector\Model\Product
     */
    public function setIsTopProduct($isTopProduct)
    {
        $this->_isTopProduct = (string)$isTopProduct;
        return $this;
    }
    
    /**
     * @return string
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
     * @param string $isNew
     * @return \jtl\Connector\Model\Product
     */
    public function setIsNew($isNew)
    {
        $this->_isNew = (string)$isNew;
        return $this;
    }
    
    /**
     * @return string
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
     * @param string $considerStock
     * @return \jtl\Connector\Model\Product
     */
    public function setConsiderStock($considerStock)
    {
        $this->_considerStock = (string)$considerStock;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getConsiderStock()
    {
        return $this->_considerStock;
    }
    
    /**
     * @param string $permitNegativeStock
     * @return \jtl\Connector\Model\Product
     */
    public function setPermitNegativeStock($permitNegativeStock)
    {
        $this->_permitNegativeStock = (string)$permitNegativeStock;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPermitNegativeStock()
    {
        return $this->_permitNegativeStock;
    }
    
    /**
     * @param string $considerVariationStock
     * @return \jtl\Connector\Model\Product
     */
    public function setConsiderVariationStock($considerVariationStock)
    {
        $this->_considerVariationStock = (string)$considerVariationStock;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getConsiderVariationStock()
    {
        return $this->_considerVariationStock;
    }
    
    /**
     * @param string $isDivisible
     * @return \jtl\Connector\Model\Product
     */
    public function setIsDivisible($isDivisible)
    {
        $this->_isDivisible = (string)$isDivisible;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIsDivisible()
    {
        return $this->_isDivisible;
    }
    
    /**
     * @param double $packagingUnit
     * @return \jtl\Connector\Model\Product
     */
    public function setPackagingUnit($packagingUnit)
    {
        $this->_packagingUnit = (double)$packagingUnit;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getPackagingUnit()
    {
        return $this->_packagingUnit;
    }
    
    /**
     * @param double $price
     * @return \jtl\Connector\Model\Product
     */
    public function setPrice($price)
    {
        $this->_price = (double)$price;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getPrice()
    {
        return $this->_price;
    }
    
    /**
     * @param string $considerBasePrice
     * @return \jtl\Connector\Model\Product
     */
    public function setConsiderBasePrice($considerBasePrice)
    {
        $this->_considerBasePrice = (string)$considerBasePrice;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getConsiderBasePrice()
    {
        return $this->_considerBasePrice;
    }
    
    /**
     * @param double $basePriceValue
     * @return \jtl\Connector\Model\Product
     */
    public function setBasePriceValue($basePriceValue)
    {
        $this->_basePriceValue = (double)$basePriceValue;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getBasePriceValue()
    {
        return $this->_basePriceValue;
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
     * @param int $isMasterProduct
     * @return \jtl\Connector\Model\Product
     */
    public function setIsMasterProduct($isMasterProduct)
    {
        $this->_isMasterProduct = (int)$isMasterProduct;
        return $this;
    }
    
    /**
     * @return int
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
     * @param int $setArticleId
     * @return \jtl\Connector\Model\Product
     */
    public function setSetArticleId($setArticleId)
    {
        $this->_setArticleId = (int)$setArticleId;
        return $this;
    }
    
    /**
     * @return int
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
     * @param int $productTypeId
     * @return \jtl\Connector\Model\Product
     */
    public function setProductTypeId($productTypeId)
    {
        $this->_productTypeId = (int)$productTypeId;
        return $this;
    }
    
    /**
     * @return int
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
     * @param int $supplierDeliveryTime
     * @return \jtl\Connector\Model\Product
     */
    public function setSupplierDeliveryTime($supplierDeliveryTime)
    {
        $this->_supplierDeliveryTime = (int)$supplierDeliveryTime;
        return $this;
    }
    
    /**
     * @return int
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
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        try {
            Schema::validateAction(CONNECTOR_DIR . "schema/product/product.json", $this->getPublic(array()));
        }
        catch (ValidationException $exc) {
            throw new SchemaException($exc->getMessage());
        }
    }
}
?>