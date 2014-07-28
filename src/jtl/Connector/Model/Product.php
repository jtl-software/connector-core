<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Product properties..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Product extends DataModel
{
    /**
     * @type Identity Unique product id
     */
    public $_id = null;

    /**
     * @type Identity 
     */
    public $_manufacturerId = null;

    /**
     * @type Identity Reference to master product
     */
    public $_masterProductId = null;

    /**
     * @type Identity Optional reference to productType
     */
    public $_productTypeId = null;

    /**
     * @type Identity Optional reference to setArticle
     */
    public $_setArticleId = null;

    /**
     * @type Identity Reference to shippingClass
     */
    public $_shippingClassId = null;

    /**
     * @type Identity 
     */
    public $_taxClassId = null;

    /**
     * @type Identity 
     */
    public $_varCombinationId = null;

    /**
     * @type string Optional Amazon Standard Identification Number
     */
    public $_asin = '';

    /**
     * @type DateTime|null Optional available from date. Specify a date, upon when product can be purchased. 
     */
    public $_availableFrom = null;

    /**
     * @type float|null 
     */
    public $_basePriceValue = 0.0;

    /**
     * @type string 
     */
    public $_cBeschreibung = '';

    /**
     * @type string 
     */
    public $_cKurzBeschreibung = '';

    /**
     * @type string 
     */
    public $_cName = '';

    /**
     * @type boolean Optional: Set to true to display base price / unit pricing measure
     */
    public $_considerBasePrice = false;

    /**
     * @type boolean Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     */
    public $_considerStock = false;

    /**
     * @type boolean Optional: Consider stock levels of productVariations. Same as considerStock but for variations. 
     */
    public $_considerVariationStock = false;

    /**
     * @type DateTime|null Creation date
     */
    public $_created = null;

    /**
     * @type string 
     */
    public $_cSeo = '';

    /**
     * @type string Optional European Article Number (EAN)
     */
    public $_ean = '';

    /**
     * @type string Optional Ebay product ID
     */
    public $_epId = '';

    /**
     * @type float|null 
     */
    public $_fBreite = 0.0;

    /**
     * @type float|null 
     */
    public $_fGrundpreisMenge = 0.0;

    /**
     * @type float|null 
     */
    public $_fHoehe = 0.0;

    /**
     * @type float|null 
     */
    public $_fLaenge = 0.0;

    /**
     * @type boolean 
     */
    public $_flagDelete = false;

    /**
     * @type boolean 
     */
    public $_flagUpdate = false;

    /**
     * @type float|null 
     */
    public $_fMassMenge = 0.0;

    /**
     * @type float 
     */
    public $_grossPrice = 0.0;

    /**
     * @type boolean 
     */
    public $_hasBestBefore = false;

    /**
     * @type string Optional Hazard identifier, encodes general hazard class und subdivision
     */
    public $_hazardIdNumber = '';

    /**
     * @type boolean 
     */
    public $_isActive = false;

    /**
     * @type string Optional International Standard Book Number
     */
    public $_isbn = '';

    /**
     * @type boolean Optional: Set to true to allow non-integer quantites for purchase
     */
    public $_isDivisible = false;

    /**
     * @type boolean Optional flag if product is master product
     */
    public $_isMasterProduct = false;

    /**
     * @type boolean Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     */
    public $_isNew = false;

    /**
     * @type boolean Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     */
    public $_isTopProduct = false;

    /**
     * @type integer|null 
     */
    public $_kGrundPreisEinheit = 0;

    /**
     * @type integer|null 
     */
    public $_kMassEinheit = 0;

    /**
     * @type integer|null 
     */
    public $_kVerkaufsEinheit = 0;

    /**
     * @type integer|null 
     */
    public $_kVPEEinheit = 0;

    /**
     * @type string 
     */
    public $_manufacturerName = '';

    /**
     * @type string Optional manufacturer number
     */
    public $_manufacturerNumber = '';

    /**
     * @type float|null Optional minimum quantity needed to purchase product
     */
    public $_minimumOrderQuantity = 0.0;

    /**
     * @type float 
     */
    public $_netPrice = 0.0;

    /**
     * @type integer|null 
     */
    public $_nLiefertageWennAusverkauft = 0;

    /**
     * @type string Optional internal product note
     */
    public $_note = '';

    /**
     * @type string Optional Origin country
     */
    public $_originCountry = '';

    /**
     * @type boolean Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true. 
     */
    public $_permitNegativeStock = false;

    /**
     * @type float|null Productweight exclusive packaging
     */
    public $_productWeight = 0.0;

    /**
     * @type float|null Optional recommended retail price (gross) 
     */
    public $_recommendedRetailPrice = 0.0;

    /**
     * @type string Optional serial number
     */
    public $_serialNumber = '';

    /**
     * @type float|null Productweight inclusive packaging
     */
    public $_shippingWeight = 0.0;

    /**
     * @type string Optional stock keeping unit identifier
     */
    public $_sku = '';

    /**
     * @type integer|null Optional sort number for product sorting in lists
     */
    public $_sort = 0;

    /**
     * @type float|null Optional stock (level)
     */
    public $_stockLevel = 0.0;

    /**
     * @type float|null Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     */
    public $_takeOffQuantity = 0.0;

    /**
     * @type string Optional TARIC
     */
    public $_taric = '';

    /**
     * @type string Optional UN number, used to define hazardous properties
     */
    public $_unNumber = '';

    /**
     * @type string Optional Universal Product Code
     */
    public $_upc = '';

    /**
     * @type float|null Value added tax
     */
    public $_vat = 0.0;

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\ProductPriceOld[]
     */
    public $_prices = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\ProductSpecialPrice[]
     */
    public $_specialPrices = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\ProductFileDownload[]
     */
    public $_fileDownloads = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\Product2Category[]
     */
    public $_categories = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\MediaFile[]
     */
    public $_mediaFiles = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\ProductConfigGroup[]
     */
    public $_configGroups = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\ProductInvisibility[]
     */
    public $_invisibilities = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\CrossSelling[]
     */
    public $_crossSellings = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\SetArticle[]
     */
    public $_setArticles = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\ProductVariation[]
     */
    public $_variations = array();

    /**
     * Nav [Product » One]
     *
     * @type \jtl\Connector\Model\ProductI18n[]
     */
    public $_i18ns = array();


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_manufacturerId',
        '_id',
        '_taxClassId',
        '_shippingClassId',
        '_varCombinationId',
        '_masterProductId',
        '_setArticleId',
        '_productTypeId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
        '_prices' => '\jtl\Connector\Model\ProductPriceOld',
        '_specialPrices' => '\jtl\Connector\Model\ProductSpecialPrice',
        '_fileDownloads' => '\jtl\Connector\Model\ProductFileDownload',
        '_categories' => '\jtl\Connector\Model\Product2Category',
        '_mediaFiles' => '\jtl\Connector\Model\MediaFile',
        '_configGroups' => '\jtl\Connector\Model\ProductConfigGroup',
        '_invisibilities' => '\jtl\Connector\Model\ProductInvisibility',
        '_crossSellings' => '\jtl\Connector\Model\CrossSelling',
        '_setArticles' => '\jtl\Connector\Model\SetArticle',
        '_variations' => '\jtl\Connector\Model\ProductVariation',
        '_i18ns' => '\jtl\Connector\Model\ProductI18n',
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  Identity $manufacturerId 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setManufacturerId(Identity $manufacturerId)
    {
        return $this->setProperty('_manufacturerId', $manufacturerId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getManufacturerId()
    {
        return $this->_manufacturerId;
    }

    /**
     * @param  string $sku Optional stock keeping unit identifier
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setSku($sku)
    {
        return $this->setProperty('_sku', $sku, 'string');
    }
    
    /**
     * @return string Optional stock keeping unit identifier
     */
    public function getSku()
    {
        return $this->_sku;
    }

    /**
     * @param  float $recommendedRetailPrice Optional recommended retail price (gross) 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setRecommendedRetailPrice($recommendedRetailPrice)
    {
        return $this->setProperty('_recommendedRetailPrice', $recommendedRetailPrice, 'float');
    }
    
    /**
     * @return float Optional recommended retail price (gross) 
     */
    public function getRecommendedRetailPrice()
    {
        return $this->_recommendedRetailPrice;
    }

    /**
     * @param  string $note Optional internal product note
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setNote($note)
    {
        return $this->setProperty('_note', $note, 'string');
    }
    
    /**
     * @return string Optional internal product note
     */
    public function getNote()
    {
        return $this->_note;
    }

    /**
     * @param  float $stockLevel Optional stock (level)
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setStockLevel($stockLevel)
    {
        return $this->setProperty('_stockLevel', $stockLevel, 'float');
    }
    
    /**
     * @return float Optional stock (level)
     */
    public function getStockLevel()
    {
        return $this->_stockLevel;
    }

    /**
     * @param  float $vat Value added tax
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setVat($vat)
    {
        return $this->setProperty('_vat', $vat, 'float');
    }
    
    /**
     * @return float Value added tax
     */
    public function getVat()
    {
        return $this->_vat;
    }

    /**
     * @param  float $minimumOrderQuantity Optional minimum quantity needed to purchase product
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setMinimumOrderQuantity($minimumOrderQuantity)
    {
        return $this->setProperty('_minimumOrderQuantity', $minimumOrderQuantity, 'float');
    }
    
    /**
     * @return float Optional minimum quantity needed to purchase product
     */
    public function getMinimumOrderQuantity()
    {
        return $this->_minimumOrderQuantity;
    }

    /**
     * @param  string $ean Optional European Article Number (EAN)
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setEan($ean)
    {
        return $this->setProperty('_ean', $ean, 'string');
    }
    
    /**
     * @return string Optional European Article Number (EAN)
     */
    public function getEan()
    {
        return $this->_ean;
    }

    /**
     * @param  float $shippingWeight Productweight inclusive packaging
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setShippingWeight($shippingWeight)
    {
        return $this->setProperty('_shippingWeight', $shippingWeight, 'float');
    }
    
    /**
     * @return float Productweight inclusive packaging
     */
    public function getShippingWeight()
    {
        return $this->_shippingWeight;
    }

    /**
     * @param  string $manufacturerName 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setManufacturerName($manufacturerName)
    {
        return $this->setProperty('_manufacturerName', $manufacturerName, 'string');
    }
    
    /**
     * @return string 
     */
    public function getManufacturerName()
    {
        return $this->_manufacturerName;
    }

    /**
     * @param  float $basePriceValue 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setBasePriceValue($basePriceValue)
    {
        return $this->setProperty('_basePriceValue', $basePriceValue, 'float');
    }
    
    /**
     * @return float 
     */
    public function getBasePriceValue()
    {
        return $this->_basePriceValue;
    }

    /**
     * @param  string $taric Optional TARIC
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setTaric($taric)
    {
        return $this->setProperty('_taric', $taric, 'string');
    }
    
    /**
     * @return string Optional TARIC
     */
    public function getTaric()
    {
        return $this->_taric;
    }

    /**
     * @param  string $originCountry Optional Origin country
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setOriginCountry($originCountry)
    {
        return $this->setProperty('_originCountry', $originCountry, 'string');
    }
    
    /**
     * @return string Optional Origin country
     */
    public function getOriginCountry()
    {
        return $this->_originCountry;
    }

    /**
     * @param  DateTime $created Creation date
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreated(DateTime $created)
    {
        return $this->setProperty('_created', $created, 'DateTime');
    }
    
    /**
     * @return DateTime Creation date
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * @param  DateTime $availableFrom Optional available from date. Specify a date, upon when product can be purchased. 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setAvailableFrom(DateTime $availableFrom)
    {
        return $this->setProperty('_availableFrom', $availableFrom, 'DateTime');
    }
    
    /**
     * @return DateTime Optional available from date. Specify a date, upon when product can be purchased. 
     */
    public function getAvailableFrom()
    {
        return $this->_availableFrom;
    }

    /**
     * @param  integer $sort Optional sort number for product sorting in lists
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('_sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort number for product sorting in lists
     */
    public function getSort()
    {
        return $this->_sort;
    }

    /**
     * @param  float $productWeight Productweight exclusive packaging
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setProductWeight($productWeight)
    {
        return $this->setProperty('_productWeight', $productWeight, 'float');
    }
    
    /**
     * @return float Productweight exclusive packaging
     */
    public function getProductWeight()
    {
        return $this->_productWeight;
    }

    /**
     * @param  string $manufacturerNumber Optional manufacturer number
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setManufacturerNumber($manufacturerNumber)
    {
        return $this->setProperty('_manufacturerNumber', $manufacturerNumber, 'string');
    }
    
    /**
     * @return string Optional manufacturer number
     */
    public function getManufacturerNumber()
    {
        return $this->_manufacturerNumber;
    }

    /**
     * @param  string $serialNumber Optional serial number
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setSerialNumber($serialNumber)
    {
        return $this->setProperty('_serialNumber', $serialNumber, 'string');
    }
    
    /**
     * @return string Optional serial number
     */
    public function getSerialNumber()
    {
        return $this->_serialNumber;
    }

    /**
     * @param  string $isbn Optional International Standard Book Number
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setIsbn($isbn)
    {
        return $this->setProperty('_isbn', $isbn, 'string');
    }
    
    /**
     * @return string Optional International Standard Book Number
     */
    public function getIsbn()
    {
        return $this->_isbn;
    }

    /**
     * @param  string $unNumber Optional UN number, used to define hazardous properties
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUnNumber($unNumber)
    {
        return $this->setProperty('_unNumber', $unNumber, 'string');
    }
    
    /**
     * @return string Optional UN number, used to define hazardous properties
     */
    public function getUnNumber()
    {
        return $this->_unNumber;
    }

    /**
     * @param  string $hazardIdNumber Optional Hazard identifier, encodes general hazard class und subdivision
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setHazardIdNumber($hazardIdNumber)
    {
        return $this->setProperty('_hazardIdNumber', $hazardIdNumber, 'string');
    }
    
    /**
     * @return string Optional Hazard identifier, encodes general hazard class und subdivision
     */
    public function getHazardIdNumber()
    {
        return $this->_hazardIdNumber;
    }

    /**
     * @param  string $asin Optional Amazon Standard Identification Number
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setAsin($asin)
    {
        return $this->setProperty('_asin', $asin, 'string');
    }
    
    /**
     * @return string Optional Amazon Standard Identification Number
     */
    public function getAsin()
    {
        return $this->_asin;
    }

    /**
     * @param  float $takeOffQuantity Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setTakeOffQuantity($takeOffQuantity)
    {
        return $this->setProperty('_takeOffQuantity', $takeOffQuantity, 'float');
    }
    
    /**
     * @return float Optional: Product can only be purchased in multiples of takeOffQuantity e.g. 5,10,15...
     */
    public function getTakeOffQuantity()
    {
        return $this->_takeOffQuantity;
    }

    /**
     * @param  string $upc Optional Universal Product Code
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUpc($upc)
    {
        return $this->setProperty('_upc', $upc, 'string');
    }
    
    /**
     * @return string Optional Universal Product Code
     */
    public function getUpc()
    {
        return $this->_upc;
    }

    /**
     * @param  string $epId Optional Ebay product ID
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setEpId($epId)
    {
        return $this->setProperty('_epId', $epId, 'string');
    }
    
    /**
     * @return string Optional Ebay product ID
     */
    public function getEpId()
    {
        return $this->_epId;
    }

    /**
     * @param  integer $kMassEinheit 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKMassEinheit($kMassEinheit)
    {
        return $this->setProperty('_kMassEinheit', $kMassEinheit, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKMassEinheit()
    {
        return $this->_kMassEinheit;
    }

    /**
     * @param  float $fMassMenge 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setFMassMenge($fMassMenge)
    {
        return $this->setProperty('_fMassMenge', $fMassMenge, 'float');
    }
    
    /**
     * @return float 
     */
    public function getFMassMenge()
    {
        return $this->_fMassMenge;
    }

    /**
     * @param  integer $kGrundPreisEinheit 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKGrundPreisEinheit($kGrundPreisEinheit)
    {
        return $this->setProperty('_kGrundPreisEinheit', $kGrundPreisEinheit, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKGrundPreisEinheit()
    {
        return $this->_kGrundPreisEinheit;
    }

    /**
     * @param  float $fGrundpreisMenge 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setFGrundpreisMenge($fGrundpreisMenge)
    {
        return $this->setProperty('_fGrundpreisMenge', $fGrundpreisMenge, 'float');
    }
    
    /**
     * @return float 
     */
    public function getFGrundpreisMenge()
    {
        return $this->_fGrundpreisMenge;
    }

    /**
     * @param  float $fBreite 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setFBreite($fBreite)
    {
        return $this->setProperty('_fBreite', $fBreite, 'float');
    }
    
    /**
     * @return float 
     */
    public function getFBreite()
    {
        return $this->_fBreite;
    }

    /**
     * @param  float $fHoehe 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setFHoehe($fHoehe)
    {
        return $this->setProperty('_fHoehe', $fHoehe, 'float');
    }
    
    /**
     * @return float 
     */
    public function getFHoehe()
    {
        return $this->_fHoehe;
    }

    /**
     * @param  float $fLaenge 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setFLaenge($fLaenge)
    {
        return $this->setProperty('_fLaenge', $fLaenge, 'float');
    }
    
    /**
     * @return float 
     */
    public function getFLaenge()
    {
        return $this->_fLaenge;
    }

    /**
     * @param  integer $nLiefertageWennAusverkauft 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNLiefertageWennAusverkauft($nLiefertageWennAusverkauft)
    {
        return $this->setProperty('_nLiefertageWennAusverkauft', $nLiefertageWennAusverkauft, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNLiefertageWennAusverkauft()
    {
        return $this->_nLiefertageWennAusverkauft;
    }

    /**
     * @param  integer $kVPEEinheit 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKVPEEinheit($kVPEEinheit)
    {
        return $this->setProperty('_kVPEEinheit', $kVPEEinheit, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKVPEEinheit()
    {
        return $this->_kVPEEinheit;
    }

    /**
     * @param  string $cName 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCName($cName)
    {
        return $this->setProperty('_cName', $cName, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCName()
    {
        return $this->_cName;
    }

    /**
     * @param  string $cBeschreibung 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCBeschreibung($cBeschreibung)
    {
        return $this->setProperty('_cBeschreibung', $cBeschreibung, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCBeschreibung()
    {
        return $this->_cBeschreibung;
    }

    /**
     * @param  string $cKurzBeschreibung 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCKurzBeschreibung($cKurzBeschreibung)
    {
        return $this->setProperty('_cKurzBeschreibung', $cKurzBeschreibung, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCKurzBeschreibung()
    {
        return $this->_cKurzBeschreibung;
    }

    /**
     * @param  string $cSeo 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCSeo($cSeo)
    {
        return $this->setProperty('_cSeo', $cSeo, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCSeo()
    {
        return $this->_cSeo;
    }

    /**
     * @param  integer $kVerkaufsEinheit 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKVerkaufsEinheit($kVerkaufsEinheit)
    {
        return $this->setProperty('_kVerkaufsEinheit', $kVerkaufsEinheit, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKVerkaufsEinheit()
    {
        return $this->_kVerkaufsEinheit;
    }

    /**
     * @param  Identity $id Unique product id
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique product id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  float $grossPrice 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setGrossPrice($grossPrice)
    {
        return $this->setProperty('_grossPrice', $grossPrice, 'float');
    }
    
    /**
     * @return float 
     */
    public function getGrossPrice()
    {
        return $this->_grossPrice;
    }

    /**
     * @param  float $netPrice 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPrice($netPrice)
    {
        return $this->setProperty('_netPrice', $netPrice, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPrice()
    {
        return $this->_netPrice;
    }

    /**
     * @param  boolean $isActive 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('_isActive', $isActive, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->_isActive;
    }

    /**
     * @param  boolean $isTopProduct Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsTopProduct($isTopProduct)
    {
        return $this->setProperty('_isTopProduct', $isTopProduct, 'boolean');
    }
    
    /**
     * @return boolean Optional flag top product. If true, product will be highlighted as top product (e.g. in product lists or in special boxes)
     */
    public function getIsTopProduct()
    {
        return $this->_isTopProduct;
    }

    /**
     * @param  boolean $flagUpdate 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setFlagUpdate($flagUpdate)
    {
        return $this->setProperty('_flagUpdate', $flagUpdate, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getFlagUpdate()
    {
        return $this->_flagUpdate;
    }

    /**
     * @param  boolean $flagDelete 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setFlagDelete($flagDelete)
    {
        return $this->setProperty('_flagDelete', $flagDelete, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getFlagDelete()
    {
        return $this->_flagDelete;
    }

    /**
     * @param  boolean $isNew Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsNew($isNew)
    {
        return $this->setProperty('_isNew', $isNew, 'boolean');
    }
    
    /**
     * @return boolean Optional flag new product. If true, product will be highlighted as new (creation date may also be considered)
     */
    public function getIsNew()
    {
        return $this->_isNew;
    }

    /**
     * @param  boolean $considerStock Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setConsiderStock($considerStock)
    {
        return $this->setProperty('_considerStock', $considerStock, 'boolean');
    }
    
    /**
     * @return boolean Consider stock level? If true, product can only be purchased with a positive stockLevel or when permitNegativeStock is set to true
     */
    public function getConsiderStock()
    {
        return $this->_considerStock;
    }

    /**
     * @param  boolean $isDivisible Optional: Set to true to allow non-integer quantites for purchase
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsDivisible($isDivisible)
    {
        return $this->setProperty('_isDivisible', $isDivisible, 'boolean');
    }
    
    /**
     * @return boolean Optional: Set to true to allow non-integer quantites for purchase
     */
    public function getIsDivisible()
    {
        return $this->_isDivisible;
    }

    /**
     * @param  boolean $permitNegativeStock Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true. 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setPermitNegativeStock($permitNegativeStock)
    {
        return $this->setProperty('_permitNegativeStock', $permitNegativeStock, 'boolean');
    }
    
    /**
     * @return boolean Optional Permit negative stock / allow overselling. If true, product can be purchased even if stockLevel is less or equal 0 and considerStock is true. 
     */
    public function getPermitNegativeStock()
    {
        return $this->_permitNegativeStock;
    }

    /**
     * @param  boolean $considerVariationStock Optional: Consider stock levels of productVariations. Same as considerStock but for variations. 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setConsiderVariationStock($considerVariationStock)
    {
        return $this->setProperty('_considerVariationStock', $considerVariationStock, 'boolean');
    }
    
    /**
     * @return boolean Optional: Consider stock levels of productVariations. Same as considerStock but for variations. 
     */
    public function getConsiderVariationStock()
    {
        return $this->_considerVariationStock;
    }

    /**
     * @param  boolean $considerBasePrice Optional: Set to true to display base price / unit pricing measure
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setConsiderBasePrice($considerBasePrice)
    {
        return $this->setProperty('_considerBasePrice', $considerBasePrice, 'boolean');
    }
    
    /**
     * @return boolean Optional: Set to true to display base price / unit pricing measure
     */
    public function getConsiderBasePrice()
    {
        return $this->_considerBasePrice;
    }

    /**
     * @param  Identity $taxClassId 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTaxClassId(Identity $taxClassId)
    {
        return $this->setProperty('_taxClassId', $taxClassId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getTaxClassId()
    {
        return $this->_taxClassId;
    }

    /**
     * @param  Identity $shippingClassId Reference to shippingClass
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingClassId(Identity $shippingClassId)
    {
        return $this->setProperty('_shippingClassId', $shippingClassId, 'Identity');
    }
    
    /**
     * @return Identity Reference to shippingClass
     */
    public function getShippingClassId()
    {
        return $this->_shippingClassId;
    }

    /**
     * @param  Identity $varCombinationId 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setVarCombinationId(Identity $varCombinationId)
    {
        return $this->setProperty('_varCombinationId', $varCombinationId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getVarCombinationId()
    {
        return $this->_varCombinationId;
    }

    /**
     * @param  Identity $masterProductId Reference to master product
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMasterProductId(Identity $masterProductId)
    {
        return $this->setProperty('_masterProductId', $masterProductId, 'Identity');
    }
    
    /**
     * @return Identity Reference to master product
     */
    public function getMasterProductId()
    {
        return $this->_masterProductId;
    }

    /**
     * @param  boolean $isMasterProduct Optional flag if product is master product
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsMasterProduct($isMasterProduct)
    {
        return $this->setProperty('_isMasterProduct', $isMasterProduct, 'boolean');
    }
    
    /**
     * @return boolean Optional flag if product is master product
     */
    public function getIsMasterProduct()
    {
        return $this->_isMasterProduct;
    }

    /**
     * @param  Identity $setArticleId Optional reference to setArticle
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSetArticleId(Identity $setArticleId)
    {
        return $this->setProperty('_setArticleId', $setArticleId, 'Identity');
    }
    
    /**
     * @return Identity Optional reference to setArticle
     */
    public function getSetArticleId()
    {
        return $this->_setArticleId;
    }

    /**
     * @param  Identity $productTypeId Optional reference to productType
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductTypeId(Identity $productTypeId)
    {
        return $this->setProperty('_productTypeId', $productTypeId, 'Identity');
    }
    
    /**
     * @return Identity Optional reference to productType
     */
    public function getProductTypeId()
    {
        return $this->_productTypeId;
    }

    /**
     * @param  boolean $hasBestBefore 
     * @return \jtl\Connector\Model\Product
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setHasBestBefore($hasBestBefore)
    {
        return $this->setProperty('_hasBestBefore', $hasBestBefore, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getHasBestBefore()
    {
        return $this->_hasBestBefore;
    }

    /**
     * @param  \jtl\Connector\Model\ProductPriceOld $price
     * @return \jtl\Connector\Model\Product
     */
    public function addPrice(\jtl\Connector\Model\ProductPriceOld $price)
    {
        $this->_prices[] = $price;
        return $this;
    }
    
    /**
     * @return ProductPriceOld
     */
    public function getPrices()
    {
        return $this->_prices;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearPrices()
    {
        $this->_prices = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductSpecialPrice $specialPrice
     * @return \jtl\Connector\Model\Product
     */
    public function addSpecialPrice(\jtl\Connector\Model\ProductSpecialPrice $specialPrice)
    {
        $this->_specialPrices[] = $specialPrice;
        return $this;
    }
    
    /**
     * @return ProductSpecialPrice
     */
    public function getSpecialPrices()
    {
        return $this->_specialPrices;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearSpecialPrices()
    {
        $this->_specialPrices = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductFileDownload $fileDownload
     * @return \jtl\Connector\Model\Product
     */
    public function addFileDownload(\jtl\Connector\Model\ProductFileDownload $fileDownload)
    {
        $this->_fileDownloads[] = $fileDownload;
        return $this;
    }
    
    /**
     * @return ProductFileDownload
     */
    public function getFileDownloads()
    {
        return $this->_fileDownloads;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearFileDownloads()
    {
        $this->_fileDownloads = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\Product2Category $category
     * @return \jtl\Connector\Model\Product
     */
    public function addCategory(\jtl\Connector\Model\Product2Category $category)
    {
        $this->_categories[] = $category;
        return $this;
    }
    
    /**
     * @return Product2Category
     */
    public function getCategories()
    {
        return $this->_categories;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearCategories()
    {
        $this->_categories = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\MediaFile $mediaFile
     * @return \jtl\Connector\Model\Product
     */
    public function addMediaFile(\jtl\Connector\Model\MediaFile $mediaFile)
    {
        $this->_mediaFiles[] = $mediaFile;
        return $this;
    }
    
    /**
     * @return MediaFile
     */
    public function getMediaFiles()
    {
        return $this->_mediaFiles;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearMediaFiles()
    {
        $this->_mediaFiles = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductConfigGroup $configGroup
     * @return \jtl\Connector\Model\Product
     */
    public function addConfigGroup(\jtl\Connector\Model\ProductConfigGroup $configGroup)
    {
        $this->_configGroups[] = $configGroup;
        return $this;
    }
    
    /**
     * @return ProductConfigGroup
     */
    public function getConfigGroups()
    {
        return $this->_configGroups;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearConfigGroups()
    {
        $this->_configGroups = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductInvisibility $invisibility
     * @return \jtl\Connector\Model\Product
     */
    public function addInvisibility(\jtl\Connector\Model\ProductInvisibility $invisibility)
    {
        $this->_invisibilities[] = $invisibility;
        return $this;
    }
    
    /**
     * @return ProductInvisibility
     */
    public function getInvisibilities()
    {
        return $this->_invisibilities;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearInvisibilities()
    {
        $this->_invisibilities = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CrossSelling $crossSelling
     * @return \jtl\Connector\Model\Product
     */
    public function addCrossSelling(\jtl\Connector\Model\CrossSelling $crossSelling)
    {
        $this->_crossSellings[] = $crossSelling;
        return $this;
    }
    
    /**
     * @return CrossSelling
     */
    public function getCrossSellings()
    {
        return $this->_crossSellings;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearCrossSellings()
    {
        $this->_crossSellings = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\SetArticle $setArticle
     * @return \jtl\Connector\Model\Product
     */
    public function addSetArticle(\jtl\Connector\Model\SetArticle $setArticle)
    {
        $this->_setArticles[] = $setArticle;
        return $this;
    }
    
    /**
     * @return SetArticle
     */
    public function getSetArticles()
    {
        return $this->_setArticles;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearSetArticles()
    {
        $this->_setArticles = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariation $variation
     * @return \jtl\Connector\Model\Product
     */
    public function addVariation(\jtl\Connector\Model\ProductVariation $variation)
    {
        $this->_variations[] = $variation;
        return $this;
    }
    
    /**
     * @return ProductVariation
     */
    public function getVariations()
    {
        return $this->_variations;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearVariations()
    {
        $this->_variations = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductI18n $i18ns
     * @return \jtl\Connector\Model\Product
     */
    public function addI18ns(\jtl\Connector\Model\ProductI18n $i18ns)
    {
        $this->_i18ns[] = $i18ns;
        return $this;
    }
    
    /**
     * @return ProductI18n
     */
    public function getI18ns()
    {
        return $this->_i18ns;
    }

    /**
     * @return \jtl\Connector\Model\Product
     */
    public function clearI18ns()
    {
        $this->_i18ns = array();
        return $this;
    }
}

