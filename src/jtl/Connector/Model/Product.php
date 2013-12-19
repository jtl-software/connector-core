<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Product Model
 * Product model
 *
 * @access public
 */
class Product extends DataModel
{
    /**
     * @var string - Unique product id
     */
    protected $_id = "0";
    
    /**
     * @var string - Reference to master product
     */
    protected $_masterProductId = "0";
    
    /**
     * @var string - Reference to manufacturer
     */
    protected $_manufacturerId = "0";
    
    /**
     * @var string - Reference to (current) deliveryStatus
     */
    protected $_deliveryStatusId = "0";
    
    /**
     * @var string - Reference to unit
     */
    protected $_unitId = "0";
    
    /**
     * @var string - Reference to basePriceUnit
     */
    protected $_basePriceUnitId = "0";
    
    /**
     * @var string - Reference to shippingClass
     */
    protected $_shippingClassId = "0";
    
    /**
     * @var string - Stock keeping unit identifier
     */
    protected $_sku = '';
    
    /**
     * @var string - Internal product note
     */
    protected $_note = '';
    
    /**
     * @var double - Stock (level)
     */
    protected $_stockLevel = 0;
    
    /**
     * @var double - Value added tax
     */
    protected $_vat = 0.0;
    
    /**
     * @var double - minimum quantity needed to purchase product
     */
    protected $_minimumOrderQuantity = 0.0;
    
    /**
     * @var string - European Article Number (EAN)
     */
    protected $_ean = '';
    
    /**
     * @var bool - Flag top product
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
     * @var bool - Flag new product
     */
    protected $_isNew = false;
    
    /**
     * @var double - Recommended retail price (gross) 
     */
    protected $_recommendedRetailPrice = 0.0;
    
    /**
     * @var bool - Consider stock level?
     */
    protected $_considerStock = false;
    
    /**
     * @var bool - Permit negative stock / allow overselling
     */
    protected $_permitNegativeStock = false;
    
    /**
     * @var bool - consider stock levels of productVariations
     */
    protected $_considerVariationStock = false;
    
    /**
     * @var bool - Set to true to allow non-integer quantites for purchase
     */
    protected $_isDivisible = false;
    
    /**
     * @var bool - Set to true to display base price / unit pricing measure
     */
    protected $_considerBasePrice = false;
    
    /**
     * @var double - Base price divisor. Calculate basePriceDivisor by dividing product filling quantity through unit pricing base measure. E.g. 75ml / 100ml = 0.75
     */
    protected $_basePriceDivisor = 0.0;
    
    /**
     * @var string - Internal keywords and synonyms for product
     */
    protected $_keywords = '';
    
    /**
     * @var int - Sort number
     */
    protected $_sort = 0;
    
    /**
     * @var string - Creation date
     */
    protected $_created = "0000-00-00";
    
    /**
     * @var string - Available from date
     */
    protected $_availableFrom = "0000-00-00";
    
    /**
     * @var string - Manufacturer number
     */
    protected $_manufacturerNumber = '';
    
    /**
     * @var string - Serial number
     */
    protected $_serialNumber = '';
    
    /**
     * @var string - International Standard Book Number
     */
    protected $_isbn = '';
    
    /**
     * @var string - Amazon Standard Identification Number
     */
    protected $_asin = '';
    
    /**
     * @var string - UN number, used to define hazardous properties
     */
    protected $_unNumber = '';
    
    /**
     * @var string - Hazard identifier, encodes general hazard class und subdivision
     */
    protected $_hazardIdNumber = '';
    
    /**
     * @var string - TARIC (Tarif IntÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Â ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â©grÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Â ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â© des CommunautÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Â ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â©s EuropÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Â ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â©ennes)
     */
    protected $_taric = '';
    
    /**
     * @var bool - Flag if product is master product
     */
    protected $_isMasterProduct = false;
    
    /**
     * @var double - Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     */
    protected $_takeOffQuantity = 0.0;
    
    /**
     * @var string - Reference to setArticle
     */
    protected $_setArticleId = "0";
    
    /**
     * @var string - Universal Product Code
     */
    protected $_upc = '';
    
    /**
     * @var string - Origin country
     */
    protected $_originCountry = '';
    
    /**
     * @var string - Ebay product ID
     */
    protected $_epid = '';
    
    /**
     * @var string - Reference to productType
     */
    protected $_productTypeId = "0";
    
    /**
     * @var double - expected inflow quantity
     */
    protected $_inflowQuantity = 0.0;
    
    /**
     * @var string - expected inflow date
     */
    protected $_inflowDate = '';
    
    /**
     * @var double - Supplier stock level for product
     */
    protected $_supplierStockLevel = 0.0;
    
    /**
     * @var double - Average supplier delivery time in days
     */
    protected $_supplierDeliveryTime = 0.0;
    
    /**
     * @var string - Best before date
     */
    protected $_bestBefore = '';
    
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