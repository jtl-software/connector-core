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
class Product extends DataModel
{
    /**
     * @var int Unique id
     */
    protected $_id = 0;
    
    /**
     * @var int Master product id
     */
    protected $_masterProductId = 0;
    
    /**
     * @var int Manufacturer id
     */
    protected $_manufacturerId = 0;
    
    /**
     * @var int Delivery status id
     */
    protected $_deliveryStatusId = 0;
    
    /**
     * @var int Unit id
     */
    protected $_unitId = 0;
    
    /**
     * @var int Unit id for base price
     */
    protected $_basePriceUnitId = 0;
    
    /**
     * @var int Tax class id 
     */
    protected $_taxClassId = 0;
    
    /**
     * @var int Shipping class id
     */
    protected $_shippingClassId = 0;
    
    /**
     * @var string Stock keeping unit
     */
    protected $_sku = '';
    
    /**
     * @var string Internal note
     */
    protected $_note = '';
    
    /**
     * @var double Stock level
     */
    protected $_stockLevel = 0;
    
    /**
     * @var double Tax on the purchase Price / Value added tax (VAT)
     */
    protected $_vat = 0.0;
    
    /**
     * @var double Minimum order quantity
     */
    protected $_minimumOrderQuantity = 0.0;
    
    /**
     * @var string European article number (EAN)
     */
    protected $_ean = '';
    
    /**
     * @var bool Flag for top product
     */
    protected $_isTopProduct = false;
    
    /**
     * @var double Product weight
     */
    protected $_productWeight = 0;
    
    /**
     * @var double Shipping weight
     */
    protected $_shippingWeight = 0;
    
    /**
     * @var bool Flag for new products
     */
    protected $_isNew = false;
    
    /**
     * @var double Recommended retail price
     */
    protected $_recommendedRetailPrice = 0.0;
    
    /**
     * @var bool Consider stock level
     */
    protected $_considerStock = false;
    
    /**
     * @var bool Permit oversale when stockLevel is 0 and product considers stock
     */
    protected $_permitNegativeStock = false;
    
    /**
     * @var bool Consider stock level in variations
     */
    protected $_considerVariationStock = false;
    
    /**
     * @var bool Flag divisible product. Set to true to allow non-integer quantities for product-purchase. Set to false to only allow integer quantities. 
     */
    protected $_isDivisible = false;
    
    /**
     * @var bool Consider base price. Base price is only considered and displayed if value is true. 
     */
    protected $_considerBasePrice = false;
    
    /**
     * @var double Base price value. Calculate Base price value by dividing total filling quantity by base price filling quantity. E.g.: 250g / 100g = 2.5. 
     */
    protected $_basePriceValue = 0.0;
    
    /**
     * @var string Keywords (not multilingual). Use keywords for international names and synonyms.
     */
    protected $_keywords = '';
    
    /**
     * @var int Sort order number
     */
    protected $_sort = 0;
    
    /**
     * @var string Date created
     */
    protected $_created = "0000-00-00";
    
    /**
     * @var string publication date, when product becomes available
     */
    protected $_availableFrom = "0000-00-00";
    
    /**
     * @var string Manufacturer number (HAN)
     */
    protected $_manufacturerNumber = '';
    
    /**
     * @var string Serial Number
     */
    protected $_serialNumber = '';
    
    /**
     * @var string International Standard Book Number (ISBN)
     */
    protected $_isbn = '';
    
    /**
     * @var string Amazon Standard Identification Number (ASIN)
     */
    protected $_asin = '';
    
    /**
     * @var string UN number / UN ID (four digit number to identify hazardous substances)
     */
    protected $_unNumber = '';
    
    /**
     * @var string Hazard identification number
     * @link http://de.wikipedia.org/wiki/Liste_der_Nummern_zur_Kennzeichnung_der_Gefahr
     */
    protected $_hazardIdNumber = '';
    
    /**
     * @var string TARIC code
     * @link http://en.wikipedia.org/wiki/TARIC_code
     */
    protected $_taric = '';
    
    /**
     * @var bool Flag whether or not other products reference this product by masterProductId
     */
    protected $_isMasterProduct = false;
    
    /**
     * @var double Take off quantity. Product can only be purchased in quantities that are divisible by the specified takeOffQuantity. 
     */
    protected $_takeOffQuantity = 0.0;
    
    /**
     * @var int Set article id / bill of materials id 
     */
    protected $_setArticleId = 0;
    
    /**
     * @var string Universal Product Code (UPC)
     */
    protected $_upc = '';
    
    /**
     * @var string Country of origin
     */
    protected $_originCountry = '';
    
    /**
     * @var string Ebay Item Part Number (ePID)
     */
    protected $_epid = '';
    
    /**
     * @var int Product type id
     */
    protected $_productTypeId = 0;
    
    /**
     * @var double Inflow quantity. The inflow quantity that will arrive on $inflowDate.
     */
    protected $_inflowQuantity = 0.0;
    
    /**
     * @var string Estimated inflow date
     */
    protected $_inflowDate = '';
    
    /**
     * @var double Stock level of main supplier
     */
    protected $_supplierStockLevel = 0.0;
    
    /**
     * @var double Delivery time of main supplier
     */
    protected $_supplierDeliveryTime = 0.0;
    
    /**
     * @var string Best-before date
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
            case "_taxClassId":
            case "_shippingClassId":
            case "_sort":
            case "_setArticleId":
            case "_productTypeId":
            
                $this->$name = (int)$value;
                break;
        
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
            case "_basePriceValue":
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