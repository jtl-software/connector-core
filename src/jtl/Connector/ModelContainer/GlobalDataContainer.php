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
     * @var \jtl\Connector\Model\Company[]
     */
    protected $_companies;
    
    /**
     * @var \jtl\Connector\Model\Language[]
     */
    protected $_languages;
    
    /**
     * @var \jtl\Connector\Model\Currency[]
     */
    protected $_currencies;
    
    /**
     * @var \jtl\Connector\Model\CustomerGroup[]
     */
    protected $_customerGroups;
    
    /**
     * @var \jtl\Connector\Model\CustomerGroupI18n[]
     */
    protected $_customerGroupI18ns;
    
    /**
     * @var \jtl\Connector\Model\CustomerGroupAttr[]
     */
    protected $_customerGroupAttrs;
    
    /**
     * @var \jtl\Connector\Model\DeliveryStatus[]
     */
    protected $_deliveryStatuss;
    
    /**
     * @var \jtl\Connector\Model\CrossSellingGroup[]
     */
    protected $_crossSellingGroups;
    
    /**
     * @var \jtl\Connector\Model\Unit[]
     */
    protected $_units;
    
    /**
     * @var \jtl\Connector\Model\TaxZone[]
     */
    protected $_taxZones;
    
    /**
     * @var \jtl\Connector\Model\TaxClass[]
     */
    protected $_taxClasss;
    
    /**
     * @var \jtl\Connector\Model\TaxRate[]
     */
    protected $_taxRates;
    
    /**
     * @var \jtl\Connector\Model\ShippingClass[]
     */
    protected $_shippingClasss;
    
    /**
     * @var \jtl\Connector\Model\Warehouse[]
     */
    protected $_warehouses;
    
    /**
     * @var \jtl\Connector\Model\WarehouseI18n[]
     */
    protected $_warehouseI18ns;
    
    /**
     * @var \jtl\Connector\Model\ProductType[]
     */
    protected $_productTypes;
    
    /**
     * @var \jtl\Connector\Model\Manufacturer[]
     */
    protected $_manufacturers;
    
    /**
     * @var \jtl\Connector\Model\ManufacturerI18n[]
     */
    protected $_manufacturerI18ns;
    
    /**
     * @var \jtl\Connector\Model\Specific[]
     */
    protected $_specifics;
    
    /**
     * @var \jtl\Connector\Model\SpecificI18n[]
     */
    protected $_specificI18ns;
    
    /**
     * @var \jtl\Connector\Model\SpecificValue[]
     */
    protected $_specificValues;
    
    /**
     * @var \jtl\Connector\Model\SpecificValueI18n[]
     */
    protected $_specificValueI18ns;
    
    /**
     * @var \jtl\Connector\Model\ConfigGroup[]
     */
    protected $_configGroups;
    
    /**
     * @var \jtl\Connector\Model\ConfigGroupI18n[]
     */
    protected $_configGroupI18ns;
    
    /**
     * @var \jtl\Connector\Model\ConfigItem[]
     */
    protected $_configItems;
    
    /**
     * @var \jtl\Connector\Model\ConfigItemI18n[]
     */
    protected $_configItemI18ns;
    
    /**
     * @var \jtl\Connector\Model\ConfigItemPrice[]
     */
    protected $_configItemPrices;
    
    /**
     * @var \jtl\Connector\Model\FileDownloadI18n[]
     */
    protected $_fileDownloadI18ns;
    
    /**
     * @var \jtl\Connector\Model\FileDownloadHistory[]
     */
    protected $_fileDownloadHistories;
        
    /**
     * @return array \jtl\Connector\Model\Company
     */
    public function getCompanies()
    {
        return $this->_companies;
    }
        
    /**
     * @return array \jtl\Connector\Model\Language
     */
    public function getLanguages()
    {
        return $this->_languages;
    }
        
    /**
     * @return array \jtl\Connector\Model\Currency
     */
    public function getCurrencies()
    {
        return $this->_currencies;
    }
        
    /**
     * @return array \jtl\Connector\Model\CustomerGroup
     */
    public function getCustomerGroups()
    {
        return $this->_customerGroups;
    }
        
    /**
     * @return array \jtl\Connector\Model\CustomerGroupI18n
     */
    public function getCustomerGroupI18ns()
    {
        return $this->_customerGroupI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\CustomerGroupAttr
     */
    public function getCustomerGroupAttrs()
    {
        return $this->_customerGroupAttrs;
    }
        
    /**
     * @return array \jtl\Connector\Model\DeliveryStatus
     */
    public function getDeliveryStatuss()
    {
        return $this->_deliveryStatuss;
    }
        
    /**
     * @return array \jtl\Connector\Model\CrossSellingGroup
     */
    public function getCrossSellingGroups()
    {
        return $this->_crossSellingGroups;
    }
        
    /**
     * @return array \jtl\Connector\Model\Unit
     */
    public function getUnits()
    {
        return $this->_units;
    }
        
    /**
     * @return array \jtl\Connector\Model\TaxZone
     */
    public function getTaxZones()
    {
        return $this->_taxZones;
    }
        
    /**
     * @return array \jtl\Connector\Model\TaxClass
     */
    public function getTaxClasss()
    {
        return $this->_taxClasss;
    }
        
    /**
     * @return array \jtl\Connector\Model\TaxRate
     */
    public function getTaxRates()
    {
        return $this->_taxRates;
    }
        
    /**
     * @return array \jtl\Connector\Model\ShippingClass
     */
    public function getShippingClasss()
    {
        return $this->_shippingClasss;
    }
        
    /**
     * @return array \jtl\Connector\Model\Warehouse
     */
    public function getWarehouses()
    {
        return $this->_warehouses;
    }
        
    /**
     * @return array \jtl\Connector\Model\WarehouseI18n
     */
    public function getWarehouseI18ns()
    {
        return $this->_warehouseI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductType
     */
    public function getProductTypes()
    {
        return $this->_productTypes;
    }
        
    /**
     * @return array \jtl\Connector\Model\Manufacturer
     */
    public function getManufacturers()
    {
        return $this->_manufacturers;
    }
        
    /**
     * @return array \jtl\Connector\Model\ManufacturerI18n
     */
    public function getManufacturerI18ns()
    {
        return $this->_manufacturerI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\Specific
     */
    public function getSpecifics()
    {
        return $this->_specifics;
    }
        
    /**
     * @return array \jtl\Connector\Model\SpecificI18n
     */
    public function getSpecificI18ns()
    {
        return $this->_specificI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\SpecificValue
     */
    public function getSpecificValues()
    {
        return $this->_specificValues;
    }
        
    /**
     * @return array \jtl\Connector\Model\SpecificValueI18n
     */
    public function getSpecificValueI18ns()
    {
        return $this->_specificValueI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\ConfigGroup
     */
    public function getConfigGroups()
    {
        return $this->_configGroups;
    }
        
    /**
     * @return array \jtl\Connector\Model\ConfigGroupI18n
     */
    public function getConfigGroupI18ns()
    {
        return $this->_configGroupI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\ConfigItem
     */
    public function getConfigItems()
    {
        return $this->_configItems;
    }
        
    /**
     * @return array \jtl\Connector\Model\ConfigItemI18n
     */
    public function getConfigItemI18ns()
    {
        return $this->_configItemI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\ConfigItemPrice
     */
    public function getConfigItemPrices()
    {
        return $this->_configItemPrices;
    }
        
    /**
     * @return array \jtl\Connector\Model\FileDownloadI18n
     */
    public function getFileDownloadI18ns()
    {
        return $this->_fileDownloadI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\FileDownloadHistory
     */
    public function getFileDownloadHistories()
    {
        return $this->_fileDownloadHistories;
    }
        
    public $items = array(
        "company" => array("Company", "Companies"),
        "language" => array("Language", "Languages"),
        "currency" => array("Currency", "Currencies"),
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
        "filedownloadhistory" => array("FileDownloadHistory", "FileDownloadHistories")
    );
}
?>