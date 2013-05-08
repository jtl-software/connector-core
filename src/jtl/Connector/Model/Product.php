<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Product Model
 * @access public
 */
abstract class Product extends DataModel
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
     * @var double
     */
    protected $_supplierDeliveryTime;
    
    /**
     * @var string
     */
    protected $_bestBefore;
    
    /**
     * Product Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_masterProductId":
            case "_manufacturerId":
            case "_deliveryStatusId":
            case "_unitId":
            case "_basePriceUnitId":
            case "_taxClassId":
            case "_shippingClassId":
            case "_sort":
            case "_isMasterProduct":
            case "_setArticleId":
            case "_productTypeId":
            
                $this->$name = (int)$value;
                break;
        
            case "_sku":
            case "_note":
            case "_ean":
            case "_isTopProduct":
            case "_isNew":
            case "_considerStock":
            case "_permitNegativeStock":
            case "_considerVariationStock":
            case "_isDivisible":
            case "_considerBasePrice":
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
            case "_packagingUnit":
            case "_basePriceValue":
            case "_takeOffQuantity":
            case "_inflowQuantity":
            case "_supplierStockLevel":
            case "_supplierDeliveryTime":
            
                $this->$name = (double)$value;
                break;
        
        }
    }
    
    /**
     * Product Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>