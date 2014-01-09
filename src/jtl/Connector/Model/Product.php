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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
?>