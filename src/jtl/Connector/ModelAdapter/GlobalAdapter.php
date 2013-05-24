<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelAdapter
 */

namespace jtl\Connector\ModelAdapter;

use \jtl\Core\ModelAdapter\IModelAdapter;
use \jtl\Connector\Model;

/**
 * Global Adapter Class
 * @access public
 */
class GlobalAdapter implements IModelAdapter
{
    /**
     * @var \jtl\Connector\Model\company
     */
    protected $_company;
    
    /**
     * @var \jtl\Connector\Model\language
     */
    protected $_language;
    
    /**
     * @var \jtl\Connector\Model\currency
     */
    protected $_currency;
    
    /**
     * @var \jtl\Connector\Model\customerGroup
     */
    protected $_customerGroup;
    
    /**
     * @var \jtl\Connector\Model\customerGroupI18n
     */
    protected $_customerGroupI18n;
    
    /**
     * @var \jtl\Connector\Model\customerGroupAttr
     */
    protected $_customerGroupAttr;
    
    /**
     * @var \jtl\Connector\Model\deliveryStatus
     */
    protected $_deliveryStatus;
    
    /**
     * @var \jtl\Connector\Model\crossSellingGroup
     */
    protected $_crossSellingGroup;
    
    /**
     * @var \jtl\Connector\Model\unit
     */
    protected $_unit;
    
    /**
     * @var \jtl\Connector\Model\taxZone
     */
    protected $_taxZone;
    
    /**
     * @var \jtl\Connector\Model\taxClass
     */
    protected $_taxClass;
    
    /**
     * @var \jtl\Connector\Model\taxRate
     */
    protected $_taxRate;
    
    /**
     * @var \jtl\Connector\Model\shippingClass
     */
    protected $_shippingClass;
    
    /**
     * @var \jtl\Connector\Model\warehouse
     */
    protected $_warehouse;
    
    /**
     * @var \jtl\Connector\Model\warehouseI18n
     */
    protected $_warehouseI18n;
    
    /**
     * @var \jtl\Connector\Model\productType
     */
    protected $_productType;
    
    /**
     * @var \jtl\Connector\Model\manufacturer
     */
    protected $_manufacturer;
    
    /**
     * @var \jtl\Connector\Model\manufacturerI18n
     */
    protected $_manufacturerI18n;
    
    /**
     * @var \jtl\Connector\Model\specific
     */
    protected $_specific;
    
    /**
     * @var \jtl\Connector\Model\specificI18n
     */
    protected $_specificI18n;
    
    /**
     * @var \jtl\Connector\Model\specificValue
     */
    protected $_specificValue;
    
    /**
     * @var \jtl\Connector\Model\specificValueI18n
     */
    protected $_specificValueI18n;
    
    /**
     * @var \jtl\Connector\Model\configGroup
     */
    protected $_configGroup;
    
    /**
     * @var \jtl\Connector\Model\configGroupI18n
     */
    protected $_configGroupI18n;
    
    /**
     * @var \jtl\Connector\Model\configItem
     */
    protected $_configItem;
    
    /**
     * @var \jtl\Connector\Model\configItemI18n
     */
    protected $_configItemI18n;
    
    /**
     * @var \jtl\Connector\Model\configItemPrice
     */
    protected $_configItemPrice;
    
    /**
     * @var \jtl\Connector\Model\fileDownloadI18n
     */
    protected $_fileDownloadI18n;
    
    /**
     * @var \jtl\Connector\Model\fileDownloadHistory
     */
    protected $_fileDownloadHistory;
        
    /**
     * @return \jtl\Connector\Model\company
     */
    public function getCompany()
    {
        return $this->_company;
    }    
    /**
     * @return \jtl\Connector\Model\language
     */
    public function getLanguage()
    {
        return $this->_language;
    }    
    /**
     * @return \jtl\Connector\Model\currency
     */
    public function getCurrency()
    {
        return $this->_currency;
    }    
    /**
     * @return \jtl\Connector\Model\customerGroup
     */
    public function getCustomerGroup()
    {
        return $this->_customerGroup;
    }    
    /**
     * @return \jtl\Connector\Model\customerGroupI18n
     */
    public function getCustomerGroupI18n()
    {
        return $this->_customerGroupI18n;
    }    
    /**
     * @return \jtl\Connector\Model\customerGroupAttr
     */
    public function getCustomerGroupAttr()
    {
        return $this->_customerGroupAttr;
    }    
    /**
     * @return \jtl\Connector\Model\deliveryStatus
     */
    public function getDeliveryStatus()
    {
        return $this->_deliveryStatus;
    }    
    /**
     * @return \jtl\Connector\Model\crossSellingGroup
     */
    public function getCrossSellingGroup()
    {
        return $this->_crossSellingGroup;
    }    
    /**
     * @return \jtl\Connector\Model\unit
     */
    public function getUnit()
    {
        return $this->_unit;
    }    
    /**
     * @return \jtl\Connector\Model\taxZone
     */
    public function getTaxZone()
    {
        return $this->_taxZone;
    }    
    /**
     * @return \jtl\Connector\Model\taxClass
     */
    public function getTaxClass()
    {
        return $this->_taxClass;
    }    
    /**
     * @return \jtl\Connector\Model\taxRate
     */
    public function getTaxRate()
    {
        return $this->_taxRate;
    }    
    /**
     * @return \jtl\Connector\Model\shippingClass
     */
    public function getShippingClass()
    {
        return $this->_shippingClass;
    }    
    /**
     * @return \jtl\Connector\Model\warehouse
     */
    public function getWarehouse()
    {
        return $this->_warehouse;
    }    
    /**
     * @return \jtl\Connector\Model\warehouseI18n
     */
    public function getWarehouseI18n()
    {
        return $this->_warehouseI18n;
    }    
    /**
     * @return \jtl\Connector\Model\productType
     */
    public function getProductType()
    {
        return $this->_productType;
    }    
    /**
     * @return \jtl\Connector\Model\manufacturer
     */
    public function getManufacturer()
    {
        return $this->_manufacturer;
    }    
    /**
     * @return \jtl\Connector\Model\manufacturerI18n
     */
    public function getManufacturerI18n()
    {
        return $this->_manufacturerI18n;
    }    
    /**
     * @return \jtl\Connector\Model\specific
     */
    public function getSpecific()
    {
        return $this->_specific;
    }    
    /**
     * @return \jtl\Connector\Model\specificI18n
     */
    public function getSpecificI18n()
    {
        return $this->_specificI18n;
    }    
    /**
     * @return \jtl\Connector\Model\specificValue
     */
    public function getSpecificValue()
    {
        return $this->_specificValue;
    }    
    /**
     * @return \jtl\Connector\Model\specificValueI18n
     */
    public function getSpecificValueI18n()
    {
        return $this->_specificValueI18n;
    }    
    /**
     * @return \jtl\Connector\Model\configGroup
     */
    public function getConfigGroup()
    {
        return $this->_configGroup;
    }    
    /**
     * @return \jtl\Connector\Model\configGroupI18n
     */
    public function getConfigGroupI18n()
    {
        return $this->_configGroupI18n;
    }    
    /**
     * @return \jtl\Connector\Model\configItem
     */
    public function getConfigItem()
    {
        return $this->_configItem;
    }    
    /**
     * @return \jtl\Connector\Model\configItemI18n
     */
    public function getConfigItemI18n()
    {
        return $this->_configItemI18n;
    }    
    /**
     * @return \jtl\Connector\Model\configItemPrice
     */
    public function getConfigItemPrice()
    {
        return $this->_configItemPrice;
    }    
    /**
     * @return \jtl\Connector\Model\fileDownloadI18n
     */
    public function getFileDownloadI18n()
    {
        return $this->_fileDownloadI18n;
    }    
    /**
     * @return \jtl\Connector\Model\fileDownloadHistory
     */
    public function getFileDownloadHistory()
    {
        return $this->_fileDownloadHistory;
    }
    
    public $items = array(
        "company" => "Company",
        "language" => "Language",
        "currency" => "Currency",
        "customergroup" => "CustomerGroup",
        "customergroupi18n" => "CustomerGroupI18n",
        "customergroupattr" => "CustomerGroupAttr",
        "deliverystatus" => "DeliveryStatus",
        "crosssellinggroup" => "CrossSellingGroup",
        "unit" => "Unit",
        "taxzone" => "TaxZone",
        "taxclass" => "TaxClass",
        "taxrate" => "TaxRate",
        "shippingclass" => "ShippingClass",
        "warehouse" => "Warehouse",
        "warehousei18n" => "WarehouseI18n",
        "producttype" => "ProductType",
        "manufacturer" => "Manufacturer",
        "manufactureri18n" => "ManufacturerI18n",
        "specific" => "Specific",
        "specifici18n" => "SpecificI18n",
        "specificvalue" => "SpecificValue",
        "specificvaluei18n" => "SpecificValueI18n",
        "configgroup" => "ConfigGroup",
        "configgroupi18n" => "ConfigGroupI18n",
        "configitem" => "ConfigItem",
        "configitemi18n" => "ConfigItemI18n",
        "configitemprice" => "ConfigItemPrice",
        "filedownloadi18n" => "FileDownloadI18n",
        "filedownloadhistory" => "FileDownloadHistory"
    );
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\ModelAdapter\IModelAdapter::add()
     */
    public function add($type, $object)
    {
        $type = strtolower($type);
        if (isset($this->items[$type])) {
            $type = $this->items[$type];
            $class = "\\jtl\\Connector\\Model\\{$type}";
            if (class_exists($class)) {
                $model = new $type();
                $model->setOptions($object);
                $setter = "_" . lcfirst($type);

                $this->$setter = $model;
                
                return true;
            }
        }

        return false;
    }
}
?>