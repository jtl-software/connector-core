<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Global data..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 * 
 * @Serializer\AccessType("public_method")
 */
class GlobalData extends DataModel
{
    /**
     * @var \jtl\Connector\Model\Warehouse[]
     * @Serializer\Type("array<jtl\Connector\Model\Warehouse>")
     * @Serializer\SerializedName("warehouses")
     * @Serializer\AccessType("reflection")
     */
    protected $warehouses = array();

    /**
     * @var \jtl\Connector\Model\Unit[]
     * @Serializer\Type("array<jtl\Connector\Model\Unit>")
     * @Serializer\SerializedName("units")
     * @Serializer\AccessType("reflection")
     */
    protected $units = array();

    /**
     * @var \jtl\Connector\Model\TaxZone[]
     * @Serializer\Type("array<jtl\Connector\Model\TaxZone>")
     * @Serializer\SerializedName("taxZones")
     * @Serializer\AccessType("reflection")
     */
    protected $taxZones = array();

    /**
     * @var \jtl\Connector\Model\TaxRate[]
     * @Serializer\Type("array<jtl\Connector\Model\TaxRate>")
     * @Serializer\SerializedName("taxRates")
     * @Serializer\AccessType("reflection")
     */
    protected $taxRates = array();

    /**
     * @var \jtl\Connector\Model\TaxClass[]
     * @Serializer\Type("array<jtl\Connector\Model\TaxClass>")
     * @Serializer\SerializedName("taxClasses")
     * @Serializer\AccessType("reflection")
     */
    protected $taxClasses = array();

    /**
     * @var \jtl\Connector\Model\SpecialPrice[]
     * @Serializer\Type("array<jtl\Connector\Model\SpecialPrice>")
     * @Serializer\SerializedName("specialPrices")
     * @Serializer\AccessType("reflection")
     */
    protected $specialPrices = array();

    /**
     * @var \jtl\Connector\Model\ShippingClass[]
     * @Serializer\Type("array<jtl\Connector\Model\ShippingClass>")
     * @Serializer\SerializedName("shippingClasses")
     * @Serializer\AccessType("reflection")
     */
    protected $shippingClasses = array();

    /**
     * @var \jtl\Connector\Model\Shipment[]
     * @Serializer\Type("array<jtl\Connector\Model\Shipment>")
     * @Serializer\SerializedName("shipments")
     * @Serializer\AccessType("reflection")
     */
    protected $shipments = array();

    /**
     * @var \jtl\Connector\Model\SetArticle[]
     * @Serializer\Type("array<jtl\Connector\Model\SetArticle>")
     * @Serializer\SerializedName("setArticles")
     * @Serializer\AccessType("reflection")
     */
    protected $setArticles = array();

    /**
     * @var \jtl\Connector\Model\Language[]
     * @Serializer\Type("array<jtl\Connector\Model\Language>")
     * @Serializer\SerializedName("languages")
     * @Serializer\AccessType("reflection")
     */
    protected $languages = array();

    /**
     * @var \jtl\Connector\Model\CustomerGroup[]
     * @Serializer\Type("array<jtl\Connector\Model\CustomerGroup>")
     * @Serializer\SerializedName("customerGroups")
     * @Serializer\AccessType("reflection")
     */
    protected $customerGroups = array();

    /**
     * @var \jtl\Connector\Model\Currency[]
     * @Serializer\Type("array<jtl\Connector\Model\Currency>")
     * @Serializer\SerializedName("currencies")
     * @Serializer\AccessType("reflection")
     */
    protected $currencies = array();

    /**
     * @var \jtl\Connector\Model\CrossSelling[]
     * @Serializer\Type("array<jtl\Connector\Model\CrossSelling>")
     * @Serializer\SerializedName("crossSellings")
     * @Serializer\AccessType("reflection")
     */
    protected $crossSellings = array();

    /**
     * @var \jtl\Connector\Model\CrossSellingGroup[]
     * @Serializer\Type("array<jtl\Connector\Model\CrossSellingGroup>")
     * @Serializer\SerializedName("crossSellingGroups")
     * @Serializer\AccessType("reflection")
     */
    protected $crossSellingGroups = array();

    /**
     * @var \jtl\Connector\Model\ConfigItem[]
     * @Serializer\Type("array<jtl\Connector\Model\ConfigItem>")
     * @Serializer\SerializedName("configItems")
     * @Serializer\AccessType("reflection")
     */
    protected $configItems = array();

    /**
     * @var \jtl\Connector\Model\ConfigGroup[]
     * @Serializer\Type("array<jtl\Connector\Model\ConfigGroup>")
     * @Serializer\SerializedName("configGroups")
     * @Serializer\AccessType("reflection")
     */
    protected $configGroups = array();

    /**
     * @var \jtl\Connector\Model\Company[]
     * @Serializer\Type("array<jtl\Connector\Model\Company>")
     * @Serializer\SerializedName("companies")
     * @Serializer\AccessType("reflection")
     */
    protected $companies = array();


    public function __construct()
    {
    }

    /**
     * @param  \jtl\Connector\Model\Warehouse $warehouse
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addWarehouse(\jtl\Connector\Model\Warehouse $warehouse)
    {
        $this->warehouses[] = $warehouse;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\Warehouse[]
     */
    public function getWarehouses()
    {
        return $this->warehouses;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearWarehouses()
    {
        $this->warehouses = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\Unit $unit
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addUnit(\jtl\Connector\Model\Unit $unit)
    {
        $this->units[] = $unit;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\Unit[]
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearUnits()
    {
        $this->units = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\TaxZone $taxZone
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addTaxZone(\jtl\Connector\Model\TaxZone $taxZone)
    {
        $this->taxZones[] = $taxZone;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\TaxZone[]
     */
    public function getTaxZones()
    {
        return $this->taxZones;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearTaxZones()
    {
        $this->taxZones = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\TaxRate $taxRate
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addTaxRate(\jtl\Connector\Model\TaxRate $taxRate)
    {
        $this->taxRates[] = $taxRate;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\TaxRate[]
     */
    public function getTaxRates()
    {
        return $this->taxRates;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearTaxRates()
    {
        $this->taxRates = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\TaxClass $taxClass
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addTaxClass(\jtl\Connector\Model\TaxClass $taxClass)
    {
        $this->taxClasses[] = $taxClass;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\TaxClass[]
     */
    public function getTaxClasses()
    {
        return $this->taxClasses;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearTaxClasses()
    {
        $this->taxClasses = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\SpecialPrice $specialPrice
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addSpecialPrice(\jtl\Connector\Model\SpecialPrice $specialPrice)
    {
        $this->specialPrices[] = $specialPrice;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\SpecialPrice[]
     */
    public function getSpecialPrices()
    {
        return $this->specialPrices;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearSpecialPrices()
    {
        $this->specialPrices = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ShippingClass $shippingClass
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addShippingClass(\jtl\Connector\Model\ShippingClass $shippingClass)
    {
        $this->shippingClasses[] = $shippingClass;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ShippingClass[]
     */
    public function getShippingClasses()
    {
        return $this->shippingClasses;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearShippingClasses()
    {
        $this->shippingClasses = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\Shipment $shipment
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addShipment(\jtl\Connector\Model\Shipment $shipment)
    {
        $this->shipments[] = $shipment;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\Shipment[]
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearShipments()
    {
        $this->shipments = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\SetArticle $setArticle
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addSetArticle(\jtl\Connector\Model\SetArticle $setArticle)
    {
        $this->setArticles[] = $setArticle;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\SetArticle[]
     */
    public function getSetArticles()
    {
        return $this->setArticles;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearSetArticles()
    {
        $this->setArticles = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\Language $language
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addLanguage(\jtl\Connector\Model\Language $language)
    {
        $this->languages[] = $language;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\Language[]
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearLanguages()
    {
        $this->languages = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerGroup $customerGroup
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addCustomerGroup(\jtl\Connector\Model\CustomerGroup $customerGroup)
    {
        $this->customerGroups[] = $customerGroup;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CustomerGroup[]
     */
    public function getCustomerGroups()
    {
        return $this->customerGroups;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearCustomerGroups()
    {
        $this->customerGroups = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\Currency $currency
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addCurrency(\jtl\Connector\Model\Currency $currency)
    {
        $this->currencies[] = $currency;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\Currency[]
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearCurrencies()
    {
        $this->currencies = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CrossSelling $crossSelling
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addCrossSelling(\jtl\Connector\Model\CrossSelling $crossSelling)
    {
        $this->crossSellings[] = $crossSelling;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CrossSelling[]
     */
    public function getCrossSellings()
    {
        return $this->crossSellings;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearCrossSellings()
    {
        $this->crossSellings = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CrossSellingGroup $crossSellingGroup
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addCrossSellingGroup(\jtl\Connector\Model\CrossSellingGroup $crossSellingGroup)
    {
        $this->crossSellingGroups[] = $crossSellingGroup;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CrossSellingGroup[]
     */
    public function getCrossSellingGroups()
    {
        return $this->crossSellingGroups;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearCrossSellingGroups()
    {
        $this->crossSellingGroups = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ConfigItem $configItem
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addConfigItem(\jtl\Connector\Model\ConfigItem $configItem)
    {
        $this->configItems[] = $configItem;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ConfigItem[]
     */
    public function getConfigItems()
    {
        return $this->configItems;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearConfigItems()
    {
        $this->configItems = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ConfigGroup $configGroup
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addConfigGroup(\jtl\Connector\Model\ConfigGroup $configGroup)
    {
        $this->configGroups[] = $configGroup;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ConfigGroup[]
     */
    public function getConfigGroups()
    {
        return $this->configGroups;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearConfigGroups()
    {
        $this->configGroups = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\Company $company
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addCompany(\jtl\Connector\Model\Company $company)
    {
        $this->companies[] = $company;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\Company[]
     */
    public function getCompanies()
    {
        return $this->companies;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearCompanies()
    {
        $this->companies = array();
        return $this;
    }

 
}
