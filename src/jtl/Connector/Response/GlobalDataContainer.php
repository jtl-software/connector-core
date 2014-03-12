<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Response
 */

namespace jtl\Connector\Response;

/**
 * GlobalData Response Container Class
 * @access public
 */
class GlobalDataContainer
{
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $companies;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $languages;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $currencies;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $customerGroups;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $customerGroupI18ns;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $customerGroupAttrs;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $deliveryStatuses;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $crossSellingGroups;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $units;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $taxZones;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $taxZoneCountries;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $taxClasses;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $taxRates;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $shippingClasses;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $warehouses;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $warehouseI18ns;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productTypes;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $configGroups;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $configGroupI18ns;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $configItems;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $configItemI18ns;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $configItemPrices;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $fileDownloads;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $fileDownloadI18ns;
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCompanies()
    {
        return $this->companies;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCompany(Response $response)
    {
        if ($this->companies === null) {
            $this->companies = array();
        }
        
        $this->companies[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getLanguages()
    {
        return $this->languages;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addLanguage(Response $response)
    {
        if ($this->languages === null) {
            $this->languages = array();
        }
        
        $this->languages[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCurrency(Response $response)
    {
        if ($this->currencies === null) {
            $this->currencies = array();
        }
        
        $this->currencies[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCustomerGroups()
    {
        return $this->customerGroups;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCustomerGroup(Response $response)
    {
        if ($this->customerGroups === null) {
            $this->customerGroups = array();
        }
        
        $this->customerGroups[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCustomerGroupI18ns()
    {
        return $this->customerGroupI18ns;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCustomerGroupI18n(Response $response)
    {
        if ($this->customerGroupI18ns === null) {
            $this->customerGroupI18ns = array();
        }
        
        $this->customerGroupI18ns[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCustomerGroupAttrs()
    {
        return $this->customerGroupAttrs;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCustomerGroupAttr(Response $response)
    {
        if ($this->customerGroupAttrs === null) {
            $this->customerGroupAttrs = array();
        }
        
        $this->customerGroupAttrs[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getDeliveryStatuses()
    {
        return $this->deliveryStatuses;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addDeliveryStatus(Response $response)
    {
        if ($this->deliveryStatuses === null) {
            $this->deliveryStatuses = array();
        }
        
        $this->deliveryStatuses[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCrossSellingGroups()
    {
        return $this->crossSellingGroups;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCrossSellingGroup(Response $response)
    {
        if ($this->crossSellingGroups === null) {
            $this->crossSellingGroups = array();
        }
        
        $this->crossSellingGroups[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getUnits()
    {
        return $this->units;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addUnit(Response $response)
    {
        if ($this->units === null) {
            $this->units = array();
        }
        
        $this->units[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getTaxZones()
    {
        return $this->taxZones;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addTaxZone(Response $response)
    {
        if ($this->taxZones === null) {
            $this->taxZones = array();
        }
        
        $this->taxZones[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getTaxZoneCountries()
    {
        return $this->taxZoneCountries;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addTaxZoneCountry(Response $response)
    {
        if ($this->taxZoneCountries === null) {
            $this->taxZoneCountries = array();
        }
        
        $this->taxZoneCountries[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getTaxClasses()
    {
        return $this->taxClasses;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addTaxClass(Response $response)
    {
        if ($this->taxClasses === null) {
            $this->taxClasses = array();
        }
        
        $this->taxClasses[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getTaxRates()
    {
        return $this->taxRates;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addTaxRate(Response $response)
    {
        if ($this->taxRates === null) {
            $this->taxRates = array();
        }
        
        $this->taxRates[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getShippingClasses()
    {
        return $this->shippingClasses;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addShippingClass(Response $response)
    {
        if ($this->shippingClasses === null) {
            $this->shippingClasses = array();
        }
        
        $this->shippingClasses[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getWarehouses()
    {
        return $this->warehouses;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addWarehouse(Response $response)
    {
        if ($this->warehouses === null) {
            $this->warehouses = array();
        }
        
        $this->warehouses[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getWarehouseI18ns()
    {
        return $this->warehouseI18ns;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addWarehouseI18n(Response $response)
    {
        if ($this->warehouseI18ns === null) {
            $this->warehouseI18ns = array();
        }
        
        $this->warehouseI18ns[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductTypes()
    {
        return $this->productTypes;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductType(Response $response)
    {
        if ($this->productTypes === null) {
            $this->productTypes = array();
        }
        
        $this->productTypes[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getConfigGroups()
    {
        return $this->configGroups;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addConfigGroup(Response $response)
    {
        if ($this->configGroups === null) {
            $this->configGroups = array();
        }
        
        $this->configGroups[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getConfigGroupI18ns()
    {
        return $this->configGroupI18ns;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addConfigGroupI18n(Response $response)
    {
        if ($this->configGroupI18ns === null) {
            $this->configGroupI18ns = array();
        }
        
        $this->configGroupI18ns[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getConfigItems()
    {
        return $this->configItems;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addConfigItem(Response $response)
    {
        if ($this->configItems === null) {
            $this->configItems = array();
        }
        
        $this->configItems[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getConfigItemI18ns()
    {
        return $this->configItemI18ns;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addConfigItemI18n(Response $response)
    {
        if ($this->configItemI18ns === null) {
            $this->configItemI18ns = array();
        }
        
        $this->configItemI18ns[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getConfigItemPrices()
    {
        return $this->configItemPrices;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addConfigItemPrice(Response $response)
    {
        if ($this->configItemPrices === null) {
            $this->configItemPrices = array();
        }
        
        $this->configItemPrices[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getFileDownloads()
    {
        return $this->fileDownloads;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addFileDownload(Response $response)
    {
        if ($this->fileDownloads === null) {
            $this->fileDownloads = array();
        }
        
        $this->fileDownloads[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getFileDownloadI18ns()
    {
        return $this->fileDownloadI18ns;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addFileDownloadI18n(Response $response)
    {
        if ($this->fileDownloadI18ns === null) {
            $this->fileDownloadI18ns = array();
        }
        
        $this->fileDownloadI18ns[] = $response;
    }
    
}