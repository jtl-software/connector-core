<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * Product Model
 * @access public
 */
abstract class Product extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_masterProductId;
    
    /**
     * @var 
     */
    protected $_manufacturerId;
    
    /**
     * @var string
     */
    protected $_deliveryStatusId;
    
    /**
     * @var 
     */
    protected $_unitId;
    
    /**
     * @var 
     */
    protected $_basePriceUnitId;
    
    /**
     * @var 
     */
    protected $_taxClassId;
    
    /**
     * @var 
     */
    protected $_shippingClassId;
    
    /**
     * @var 
     */
    protected $_sku;
    
    /**
     * @var int
     */
    protected $_note;
    
    /**
     * @var 
     */
    protected $_stockLevel;
    
    /**
     * @var 
     */
    protected $_vat;
    
    /**
     * @var 
     */
    protected $_minimumOrderQuantity;
    
    /**
     * @var 
     */
    protected $_ean;
    
    /**
     * @var 
     */
    protected $_isTopProduct;
    
    /**
     * @var 
     */
    protected $_productWeight;
    
    /**
     * @var 
     */
    protected $_shippingWeight;
    
    /**
     * @var 
     */
    protected $_isNew;
    
    /**
     * @var 
     */
    protected $_recommendedRetailPrice;
    
    /**
     * @var string
     */
    protected $_considerStock;
    
    /**
     * @var 
     */
    protected $_permitNegativeStock;
    
    /**
     * @var string
     */
    protected $_considerVariationStock;
    
    /**
     * @var 
     */
    protected $_isDivisible;
    
    /**
     * @var 
     */
    protected $_packagingUnit;
    
    /**
     * @var string
     */
    protected $_considerBasePrice;
    
    /**
     * @var 
     */
    protected $_basePriceValue;
    
    /**
     * @var int
     */
    protected $_keywords;
    
    /**
     * @var 
     */
    protected $_sort;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * @var 
     */
    protected $_manufacturerNumber;
    
    /**
     * @var 
     */
    protected $_serialNumber;
    
    /**
     * @var 
     */
    protected $_isbn;
    
    /**
     * @var 
     */
    protected $_asin;
    
    /**
     * @var 
     */
    protected $_unNumber;
    
    /**
     * @var 
     */
    protected $_hazardIdNumber;
    
    /**
     * @var 
     */
    protected $_taric;
    
    /**
     * @var 
     */
    protected $_isMasterProduct;
    
    /**
     * @var 
     */
    protected $_takeOffQuantity;
    
    /**
     * @var 
     */
    protected $_setArticleId;
    
    /**
     * @var 
     */
    protected $_upc;
    
    /**
     * @var 
     */
    protected $_originCountry;
    
    /**
     * @var 
     */
    protected $_epid;
    
    /**
     * @var 
     */
    protected $_productTypeId;
    
    /**
     * @var 
     */
    protected $_inflowQuantity;
    
    /**
     * @var 
     */
    protected $_inflowDate;
    
    /**
     * @var 
     */
    protected $_supplierStockLevel;
    
    /**
     * @var 
     */
    protected $_supplierDeliveryTime;
    
    /**
     * @var 
     */
    protected $_bestBefore;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\Product
     */
    public function setId($id)
    {
        $this->_id = ()$id;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param  $masterProductId
     * @return \jtl\Connector\Model\Product
     */
    public function setMasterProductId($masterProductId)
    {
        $this->_masterProductId = ()$masterProductId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getMasterProductId()
    {
        return $this->_masterProductId;
    }
    
    /**
     * @param  $manufacturerId
     * @return \jtl\Connector\Model\Product
     */
    public function setManufacturerId($manufacturerId)
    {
        $this->_manufacturerId = ()$manufacturerId;
        return $this;
    }
    
    /**
     * @return 
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
     * @param  $unitId
     * @return \jtl\Connector\Model\Product
     */
    public function setUnitId($unitId)
    {
        $this->_unitId = ()$unitId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getUnitId()
    {
        return $this->_unitId;
    }
    
    /**
     * @param  $basePriceUnitId
     * @return \jtl\Connector\Model\Product
     */
    public function setBasePriceUnitId($basePriceUnitId)
    {
        $this->_basePriceUnitId = ()$basePriceUnitId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getBasePriceUnitId()
    {
        return $this->_basePriceUnitId;
    }
    
    /**
     * @param  $taxClassId
     * @return \jtl\Connector\Model\Product
     */
    public function setTaxClassId($taxClassId)
    {
        $this->_taxClassId = ()$taxClassId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getTaxClassId()
    {
        return $this->_taxClassId;
    }
    
    /**
     * @param  $shippingClassId
     * @return \jtl\Connector\Model\Product
     */
    public function setShippingClassId($shippingClassId)
    {
        $this->_shippingClassId = ()$shippingClassId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getShippingClassId()
    {
        return $this->_shippingClassId;
    }
    
    /**
     * @param  $sku
     * @return \jtl\Connector\Model\Product
     */
    public function setSku($sku)
    {
        $this->_sku = ()$sku;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSku()
    {
        return $this->_sku;
    }
    
    /**
     * @param int $note
     * @return \jtl\Connector\Model\Product
     */
    public function setNote($note)
    {
        $this->_note = (int)$note;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getNote()
    {
        return $this->_note;
    }
    
    /**
     * @param  $stockLevel
     * @return \jtl\Connector\Model\Product
     */
    public function setStockLevel($stockLevel)
    {
        $this->_stockLevel = ()$stockLevel;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getStockLevel()
    {
        return $this->_stockLevel;
    }
    
    /**
     * @param  $vat
     * @return \jtl\Connector\Model\Product
     */
    public function setVat($vat)
    {
        $this->_vat = ()$vat;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getVat()
    {
        return $this->_vat;
    }
    
    /**
     * @param  $minimumOrderQuantity
     * @return \jtl\Connector\Model\Product
     */
    public function setMinimumOrderQuantity($minimumOrderQuantity)
    {
        $this->_minimumOrderQuantity = ()$minimumOrderQuantity;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getMinimumOrderQuantity()
    {
        return $this->_minimumOrderQuantity;
    }
    
    /**
     * @param  $ean
     * @return \jtl\Connector\Model\Product
     */
    public function setEan($ean)
    {
        $this->_ean = ()$ean;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getEan()
    {
        return $this->_ean;
    }
    
    /**
     * @param  $isTopProduct
     * @return \jtl\Connector\Model\Product
     */
    public function setIsTopProduct($isTopProduct)
    {
        $this->_isTopProduct = ()$isTopProduct;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIsTopProduct()
    {
        return $this->_isTopProduct;
    }
    
    /**
     * @param  $productWeight
     * @return \jtl\Connector\Model\Product
     */
    public function setProductWeight($productWeight)
    {
        $this->_productWeight = ()$productWeight;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductWeight()
    {
        return $this->_productWeight;
    }
    
    /**
     * @param  $shippingWeight
     * @return \jtl\Connector\Model\Product
     */
    public function setShippingWeight($shippingWeight)
    {
        $this->_shippingWeight = ()$shippingWeight;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getShippingWeight()
    {
        return $this->_shippingWeight;
    }
    
    /**
     * @param  $isNew
     * @return \jtl\Connector\Model\Product
     */
    public function setIsNew($isNew)
    {
        $this->_isNew = ()$isNew;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIsNew()
    {
        return $this->_isNew;
    }
    
    /**
     * @param  $recommendedRetailPrice
     * @return \jtl\Connector\Model\Product
     */
    public function setRecommendedRetailPrice($recommendedRetailPrice)
    {
        $this->_recommendedRetailPrice = ()$recommendedRetailPrice;
        return $this;
    }
    
    /**
     * @return 
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
     * @param  $permitNegativeStock
     * @return \jtl\Connector\Model\Product
     */
    public function setPermitNegativeStock($permitNegativeStock)
    {
        $this->_permitNegativeStock = ()$permitNegativeStock;
        return $this;
    }
    
    /**
     * @return 
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
     * @param  $isDivisible
     * @return \jtl\Connector\Model\Product
     */
    public function setIsDivisible($isDivisible)
    {
        $this->_isDivisible = ()$isDivisible;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIsDivisible()
    {
        return $this->_isDivisible;
    }
    
    /**
     * @param  $packagingUnit
     * @return \jtl\Connector\Model\Product
     */
    public function setPackagingUnit($packagingUnit)
    {
        $this->_packagingUnit = ()$packagingUnit;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getPackagingUnit()
    {
        return $this->_packagingUnit;
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
     * @param  $basePriceValue
     * @return \jtl\Connector\Model\Product
     */
    public function setBasePriceValue($basePriceValue)
    {
        $this->_basePriceValue = ()$basePriceValue;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getBasePriceValue()
    {
        return $this->_basePriceValue;
    }
    
    /**
     * @param int $keywords
     * @return \jtl\Connector\Model\Product
     */
    public function setKeywords($keywords)
    {
        $this->_keywords = (int)$keywords;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getKeywords()
    {
        return $this->_keywords;
    }
    
    /**
     * @param  $sort
     * @return \jtl\Connector\Model\Product
     */
    public function setSort($sort)
    {
        $this->_sort = ()$sort;
        return $this;
    }
    
    /**
     * @return 
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
     * @param  $manufacturerNumber
     * @return \jtl\Connector\Model\Product
     */
    public function setManufacturerNumber($manufacturerNumber)
    {
        $this->_manufacturerNumber = ()$manufacturerNumber;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getManufacturerNumber()
    {
        return $this->_manufacturerNumber;
    }
    
    /**
     * @param  $serialNumber
     * @return \jtl\Connector\Model\Product
     */
    public function setSerialNumber($serialNumber)
    {
        $this->_serialNumber = ()$serialNumber;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSerialNumber()
    {
        return $this->_serialNumber;
    }
    
    /**
     * @param  $isbn
     * @return \jtl\Connector\Model\Product
     */
    public function setIsbn($isbn)
    {
        $this->_isbn = ()$isbn;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIsbn()
    {
        return $this->_isbn;
    }
    
    /**
     * @param  $asin
     * @return \jtl\Connector\Model\Product
     */
    public function setAsin($asin)
    {
        $this->_asin = ()$asin;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getAsin()
    {
        return $this->_asin;
    }
    
    /**
     * @param  $unNumber
     * @return \jtl\Connector\Model\Product
     */
    public function setUnNumber($unNumber)
    {
        $this->_unNumber = ()$unNumber;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getUnNumber()
    {
        return $this->_unNumber;
    }
    
    /**
     * @param  $hazardIdNumber
     * @return \jtl\Connector\Model\Product
     */
    public function setHazardIdNumber($hazardIdNumber)
    {
        $this->_hazardIdNumber = ()$hazardIdNumber;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getHazardIdNumber()
    {
        return $this->_hazardIdNumber;
    }
    
    /**
     * @param  $taric
     * @return \jtl\Connector\Model\Product
     */
    public function setTaric($taric)
    {
        $this->_taric = ()$taric;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getTaric()
    {
        return $this->_taric;
    }
    
    /**
     * @param  $isMasterProduct
     * @return \jtl\Connector\Model\Product
     */
    public function setIsMasterProduct($isMasterProduct)
    {
        $this->_isMasterProduct = ()$isMasterProduct;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIsMasterProduct()
    {
        return $this->_isMasterProduct;
    }
    
    /**
     * @param  $takeOffQuantity
     * @return \jtl\Connector\Model\Product
     */
    public function setTakeOffQuantity($takeOffQuantity)
    {
        $this->_takeOffQuantity = ()$takeOffQuantity;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getTakeOffQuantity()
    {
        return $this->_takeOffQuantity;
    }
    
    /**
     * @param  $setArticleId
     * @return \jtl\Connector\Model\Product
     */
    public function setSetArticleId($setArticleId)
    {
        $this->_setArticleId = ()$setArticleId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSetArticleId()
    {
        return $this->_setArticleId;
    }
    
    /**
     * @param  $upc
     * @return \jtl\Connector\Model\Product
     */
    public function setUpc($upc)
    {
        $this->_upc = ()$upc;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getUpc()
    {
        return $this->_upc;
    }
    
    /**
     * @param  $originCountry
     * @return \jtl\Connector\Model\Product
     */
    public function setOriginCountry($originCountry)
    {
        $this->_originCountry = ()$originCountry;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getOriginCountry()
    {
        return $this->_originCountry;
    }
    
    /**
     * @param  $epid
     * @return \jtl\Connector\Model\Product
     */
    public function setEpid($epid)
    {
        $this->_epid = ()$epid;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getEpid()
    {
        return $this->_epid;
    }
    
    /**
     * @param  $productTypeId
     * @return \jtl\Connector\Model\Product
     */
    public function setProductTypeId($productTypeId)
    {
        $this->_productTypeId = ()$productTypeId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductTypeId()
    {
        return $this->_productTypeId;
    }
    
    /**
     * @param  $inflowQuantity
     * @return \jtl\Connector\Model\Product
     */
    public function setInflowQuantity($inflowQuantity)
    {
        $this->_inflowQuantity = ()$inflowQuantity;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getInflowQuantity()
    {
        return $this->_inflowQuantity;
    }
    
    /**
     * @param  $inflowDate
     * @return \jtl\Connector\Model\Product
     */
    public function setInflowDate($inflowDate)
    {
        $this->_inflowDate = ()$inflowDate;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getInflowDate()
    {
        return $this->_inflowDate;
    }
    
    /**
     * @param  $supplierStockLevel
     * @return \jtl\Connector\Model\Product
     */
    public function setSupplierStockLevel($supplierStockLevel)
    {
        $this->_supplierStockLevel = ()$supplierStockLevel;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSupplierStockLevel()
    {
        return $this->_supplierStockLevel;
    }
    
    /**
     * @param  $supplierDeliveryTime
     * @return \jtl\Connector\Model\Product
     */
    public function setSupplierDeliveryTime($supplierDeliveryTime)
    {
        $this->_supplierDeliveryTime = ()$supplierDeliveryTime;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSupplierDeliveryTime()
    {
        return $this->_supplierDeliveryTime;
    }
    
    /**
     * @param  $bestBefore
     * @return \jtl\Connector\Model\Product
     */
    public function setBestBefore($bestBefore)
    {
        $this->_bestBefore = ()$bestBefore;
        return $this;
    }
    
    /**
     * @return 
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
        Schema::validateModel(CONNECTOR_DIR . "schema/Product/Product.json", $this->getPublic(array()));
    }
}
?>