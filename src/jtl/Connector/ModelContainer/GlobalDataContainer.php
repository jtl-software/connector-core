<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelContainer
 */

namespace jtl\Connector\ModelContainer;

/**
 * GlobalData Container Class
 * @access public
 */
class GlobalDataContainer extends CoreContainer
{
    /**
     * @var \jtl\Connector\Model\company[]
     */
    protected $_companies;
    
    /**
     * @var \jtl\Connector\Model\language[]
     */
    protected $_languages;
    
    /**
     * @var \jtl\Connector\Model\currency[]
     */
    protected $_currencies;
    
    /**
     * @var \jtl\Connector\Model\customerGroup[]
     */
    protected $_customerGroups;
    
    /**
     * @var \jtl\Connector\Model\customerGroupI18n[]
     */
    protected $_customerGroupI18ns;
    
    /**
     * @var \jtl\Connector\Model\customerGroupAttr[]
     */
    protected $_customerGroupAttrs;
    
    /**
     * @var \jtl\Connector\Model\deliveryStatus[]
     */
    protected $_deliveryStatuss;
    
    /**
     * @var \jtl\Connector\Model\crossSellingGroup[]
     */
    protected $_crossSellingGroups;
    
    /**
     * @var \jtl\Connector\Model\unit[]
     */
    protected $_units;
    
    /**
     * @var \jtl\Connector\Model\taxZone[]
     */
    protected $_taxZones;
    
    /**
     * @var \jtl\Connector\Model\taxClass[]
     */
    protected $_taxClasss;
    
    /**
     * @var \jtl\Connector\Model\taxRate[]
     */
    protected $_taxRates;
    
    /**
     * @var \jtl\Connector\Model\shippingClass[]
     */
    protected $_shippingClasss;
    
    /**
     * @var \jtl\Connector\Model\warehouse[]
     */
    protected $_warehouses;
    
    /**
     * @var \jtl\Connector\Model\warehouseI18n[]
     */
    protected $_warehouseI18ns;
    
    /**
     * @var \jtl\Connector\Model\productType[]
     */
    protected $_productTypes;
    
    /**
     * @var \jtl\Connector\Model\manufacturer[]
     */
    protected $_manufacturers;
    
    /**
     * @var \jtl\Connector\Model\manufacturerI18n[]
     */
    protected $_manufacturerI18ns;
    
    /**
     * @var \jtl\Connector\Model\specific[]
     */
    protected $_specifics;
    
    /**
     * @var \jtl\Connector\Model\specificI18n[]
     */
    protected $_specificI18ns;
    
    /**
     * @var \jtl\Connector\Model\specificValue[]
     */
    protected $_specificValues;
    
    /**
     * @var \jtl\Connector\Model\specificValueI18n[]
     */
    protected $_specificValueI18ns;
    
    /**
     * @var \jtl\Connector\Model\configGroup[]
     */
    protected $_configGroups;
    
    /**
     * @var \jtl\Connector\Model\configGroupI18n[]
     */
    protected $_configGroupI18ns;
    
    /**
     * @var \jtl\Connector\Model\configItem[]
     */
    protected $_configItems;
    
    /**
     * @var \jtl\Connector\Model\configItemI18n[]
     */
    protected $_configItemI18ns;
    
    /**
     * @var \jtl\Connector\Model\configItemPrice[]
     */
    protected $_configItemPrices;
    
    /**
     * @var \jtl\Connector\Model\fileDownloadI18n[]
     */
    protected $_fileDownloadI18ns;
    
    /**
     * @var \jtl\Connector\Model\fileDownloadHistory[]
     */
    protected $_fileDownloadHistories;
        
    /**
     * @return array \jtl\Connector\Model\company
     */
    public function getCompanies()
    {
        return $this->_companies;
    }
        
    /**
     * @return array \jtl\Connector\Model\language
     */
    public function getLanguages()
    {
        return $this->_languages;
    }
        
    /**
     * @return array \jtl\Connector\Model\currency
     */
    public function getCurrencies()
    {
        return $this->_currencies;
    }
        
    /**
     * @return array \jtl\Connector\Model\customerGroup
     */
    public function getCustomerGroups()
    {
        return $this->_customerGroups;
    }
        
    /**
     * @return array \jtl\Connector\Model\customerGroupI18n
     */
    public function getCustomerGroupI18ns()
    {
        return $this->_customerGroupI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\customerGroupAttr
     */
    public function getCustomerGroupAttrs()
    {
        return $this->_customerGroupAttrs;
    }
        
    /**
     * @return array \jtl\Connector\Model\deliveryStatus
     */
    public function getDeliveryStatuss()
    {
        return $this->_deliveryStatuss;
    }
        
    /**
     * @return array \jtl\Connector\Model\crossSellingGroup
     */
    public function getCrossSellingGroups()
    {
        return $this->_crossSellingGroups;
    }
        
    /**
     * @return array \jtl\Connector\Model\unit
     */
    public function getUnits()
    {
        return $this->_units;
    }
        
    /**
     * @return array \jtl\Connector\Model\taxZone
     */
    public function getTaxZones()
    {
        return $this->_taxZones;
    }
        
    /**
     * @return array \jtl\Connector\Model\taxClass
     */
    public function getTaxClasss()
    {
        return $this->_taxClasss;
    }
        
    /**
     * @return array \jtl\Connector\Model\taxRate
     */
    public function getTaxRates()
    {
        return $this->_taxRates;
    }
        
    /**
     * @return array \jtl\Connector\Model\shippingClass
     */
    public function getShippingClasss()
    {
        return $this->_shippingClasss;
    }
        
    /**
     * @return array \jtl\Connector\Model\warehouse
     */
    public function getWarehouses()
    {
        return $this->_warehouses;
    }
        
    /**
     * @return array \jtl\Connector\Model\warehouseI18n
     */
    public function getWarehouseI18ns()
    {
        return $this->_warehouseI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\productType
     */
    public function getProductTypes()
    {
        return $this->_productTypes;
    }
        
    /**
     * @return array \jtl\Connector\Model\manufacturer
     */
    public function getManufacturers()
    {
        return $this->_manufacturers;
    }
        
    /**
     * @return array \jtl\Connector\Model\manufacturerI18n
     */
    public function getManufacturerI18ns()
    {
        return $this->_manufacturerI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\specific
     */
    public function getSpecifics()
    {
        return $this->_specifics;
    }
        
    /**
     * @return array \jtl\Connector\Model\specificI18n
     */
    public function getSpecificI18ns()
    {
        return $this->_specificI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\specificValue
     */
    public function getSpecificValues()
    {
        return $this->_specificValues;
    }
        
    /**
     * @return array \jtl\Connector\Model\specificValueI18n
     */
    public function getSpecificValueI18ns()
    {
        return $this->_specificValueI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\configGroup
     */
    public function getConfigGroups()
    {
        return $this->_configGroups;
    }
        
    /**
     * @return array \jtl\Connector\Model\configGroupI18n
     */
    public function getConfigGroupI18ns()
    {
        return $this->_configGroupI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\configItem
     */
    public function getConfigItems()
    {
        return $this->_configItems;
    }
        
    /**
     * @return array \jtl\Connector\Model\configItemI18n
     */
    public function getConfigItemI18ns()
    {
        return $this->_configItemI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\configItemPrice
     */
    public function getConfigItemPrices()
    {
        return $this->_configItemPrices;
    }
        
    /**
     * @return array \jtl\Connector\Model\fileDownloadI18n
     */
    public function getFileDownloadI18ns()
    {
        return $this->_fileDownloadI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\fileDownloadHistory
     */
    public function getFileDownloadHistories()
    {
        return $this->_fileDownloadHistories;
    }
        
    public $items = array(
        "company" => array("Compani", "Companies"),
        "language" => array("Language", "Languages"),
        "currency" => array("Currenci", "Currencies"),
        "customergroup" => array("CustomerGroup", "CustomerGroups"),
        "customergroupi18n" => array("CustomerGroupI18n", "CustomerGroupI18ns"),
        "customergroupattr" => array("CustomerGroupAttr", "CustomerGroupAttrs"),
        "deliverystatus" => array("DeliveryStatus", "DeliveryStatuss"),
        "crosssellinggroup" => array("CrossSellingGroup", "CrossSellingGroups"),
        "unit" => array("Unit", "Units"),
        "taxzone" => array("TaxZone", "TaxZones"),
        "taxclass" => array("TaxClass", "TaxClasss"),
        "taxrate" => array("TaxRate", "TaxRates"),
        "shippingclass" => array("ShippingClass", "ShippingClasss"),
        "warehouse" => array("Warehouse", "Warehouses"),
        "warehousei18n" => array("WarehouseI18n", "WarehouseI18ns"),
        "producttype" => array("ProductType", "ProductTypes"),
        "manufacturer" => array("Manufacturer", "Manufacturers"),
        "manufactureri18n" => array("ManufacturerI18n", "ManufacturerI18ns"),
        "specific" => array("Specific", "Specifics"),
        "specifici18n" => array("SpecificI18n", "SpecificI18ns"),
        "specificvalue" => array("SpecificValue", "SpecificValues"),
        "specificvaluei18n" => array("SpecificValueI18n", "SpecificValueI18ns"),
        "configgroup" => array("ConfigGroup", "ConfigGroups"),
        "configgroupi18n" => array("ConfigGroupI18n", "ConfigGroupI18ns"),
        "configitem" => array("ConfigItem", "ConfigItems"),
        "configitemi18n" => array("ConfigItemI18n", "ConfigItemI18ns"),
        "configitemprice" => array("ConfigItemPrice", "ConfigItemPrices"),
        "filedownloadi18n" => array("FileDownloadI18n", "FileDownloadI18ns"),
        "filedownloadhistory" => array("FileDownloadHistori", "FileDownloadHistories")
    );
}
?>