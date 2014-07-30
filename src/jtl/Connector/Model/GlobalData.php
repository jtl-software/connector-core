<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Global properties.
 *
 * @access public
 * @package jtl\Connector\Model
 */
class GlobalData extends DataModel
{
    /**
     * 
     *
     * @type \jtl\Connector\Model\Company[]
     */
    protected $companies = array();

    /**
     * 
     *
     * @type \jtl\Connector\Model\Currency[]
     */
    protected $currencies = array();

    /**
     * 
     *
     * @type \jtl\Connector\Model\Language[]
     */
    protected $languages = array();

    /**
     * 
     *
     * @type \jtl\Connector\Model\SetArticle[]
     */
    protected $setArticles = array();

    /**
     * 
     *
     * @type \jtl\Connector\Model\Shipment[]
     */
    protected $shipments = array();

    /**
     * 
     *
     * @type \jtl\Connector\Model\ShippingClass[]
     */
    protected $shippingClasss = array();

    /**
     * 
     *
     * @type \jtl\Connector\Model\SpecialPrice[]
     */
    protected $specialPrices = array();

    /**
     * 
     *
     * @type \jtl\Connector\Model\TaxClass[]
     */
    protected $taxClasss = array();

    /**
     * 
     *
     * @type \jtl\Connector\Model\Company[]
     */
    protected $taxRates = array();

    /**
     * 
     *
     * @type \jtl\Connector\Model\TaxZone[]
     */
    protected $taxZones = array();

    /**
     * 
     *
     * @type \jtl\Connector\Model\Unit[]
     */
    protected $units = array();

    /**
     * 
     *
     * @type \jtl\Connector\Model\Unit[]
     */
    protected $warehouses = array();

    /**
     * 
     *
     * @type \jtl\Connector\Model\CrossSelling[]
     */
    protected $crossSellings = array();

    /**
     * 
     *
     * @type \jtl\Connector\Model\CrossSellingGroup[]
     */
    protected $crossSellingGroups = array();

    /**
     * 
     *
     * @type \jtl\Connector\Model\ConfigGroup[]
     */
    protected $configGroups = array();

    /**
     * 
     *
     * @type \jtl\Connector\Model\ConfigItem[]
     */
    protected $configItems = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
        'companies' => '\jtl\Connector\Model\Company',
        'currencies' => '\jtl\Connector\Model\Currency',
        'languages' => '\jtl\Connector\Model\Language',
        'setArticles' => '\jtl\Connector\Model\SetArticle',
        'shipments' => '\jtl\Connector\Model\Shipment',
        'shippingClasss' => '\jtl\Connector\Model\ShippingClass',
        'specialPrices' => '\jtl\Connector\Model\SpecialPrice',
        'taxClasss' => '\jtl\Connector\Model\TaxClass',
        'taxRates' => '\jtl\Connector\Model\Company',
        'taxZones' => '\jtl\Connector\Model\TaxZone',
        'units' => '\jtl\Connector\Model\Unit',
        'warehouses' => '\jtl\Connector\Model\Unit',
        'crossSellings' => '\jtl\Connector\Model\CrossSelling',
        'crossSellingGroups' => '\jtl\Connector\Model\CrossSellingGroup',
        'configGroups' => '\jtl\Connector\Model\ConfigGroup',
        'configItems' => '\jtl\Connector\Model\ConfigItem',
    );


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
     * @return Company
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
     * @return Currency
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
     * @param  \jtl\Connector\Model\Language $language
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addLanguage(\jtl\Connector\Model\Language $language)
    {
        $this->languages[] = $language;
        return $this;
    }
    
    /**
     * @return Language
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
     * @param  \jtl\Connector\Model\SetArticle $setArticle
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addSetArticle(\jtl\Connector\Model\SetArticle $setArticle)
    {
        $this->setArticles[] = $setArticle;
        return $this;
    }
    
    /**
     * @return SetArticle
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
     * @param  \jtl\Connector\Model\Shipment $shipment
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addShipment(\jtl\Connector\Model\Shipment $shipment)
    {
        $this->shipments[] = $shipment;
        return $this;
    }
    
    /**
     * @return Shipment
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
     * @param  \jtl\Connector\Model\ShippingClass $shippingClasss
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addShippingClasss(\jtl\Connector\Model\ShippingClass $shippingClasss)
    {
        $this->shippingClasss[] = $shippingClasss;
        return $this;
    }
    
    /**
     * @return ShippingClass
     */
    public function getShippingClasss()
    {
        return $this->shippingClasss;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearShippingClasss()
    {
        $this->shippingClasss = array();
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
     * @return SpecialPrice
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
     * @param  \jtl\Connector\Model\TaxClass $taxClasss
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addTaxClasss(\jtl\Connector\Model\TaxClass $taxClasss)
    {
        $this->taxClasss[] = $taxClasss;
        return $this;
    }
    
    /**
     * @return TaxClass
     */
    public function getTaxClasss()
    {
        return $this->taxClasss;
    }

    /**
     * @return \jtl\Connector\Model\GlobalData
     */
    public function clearTaxClasss()
    {
        $this->taxClasss = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\Company $taxRate
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addTaxRate(\jtl\Connector\Model\Company $taxRate)
    {
        $this->taxRates[] = $taxRate;
        return $this;
    }
    
    /**
     * @return Company
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
     * @param  \jtl\Connector\Model\TaxZone $taxZone
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addTaxZone(\jtl\Connector\Model\TaxZone $taxZone)
    {
        $this->taxZones[] = $taxZone;
        return $this;
    }
    
    /**
     * @return TaxZone
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
     * @param  \jtl\Connector\Model\Unit $unit
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addUnit(\jtl\Connector\Model\Unit $unit)
    {
        $this->units[] = $unit;
        return $this;
    }
    
    /**
     * @return Unit
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
     * @param  \jtl\Connector\Model\Unit $warehouse
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addWarehouse(\jtl\Connector\Model\Unit $warehouse)
    {
        $this->warehouses[] = $warehouse;
        return $this;
    }
    
    /**
     * @return Unit
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
     * @param  \jtl\Connector\Model\CrossSelling $crossSelling
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addCrossSelling(\jtl\Connector\Model\CrossSelling $crossSelling)
    {
        $this->crossSellings[] = $crossSelling;
        return $this;
    }
    
    /**
     * @return CrossSelling
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
     * @return CrossSellingGroup
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
     * @param  \jtl\Connector\Model\ConfigGroup $configGroup
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addConfigGroup(\jtl\Connector\Model\ConfigGroup $configGroup)
    {
        $this->configGroups[] = $configGroup;
        return $this;
    }
    
    /**
     * @return ConfigGroup
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
     * @param  \jtl\Connector\Model\ConfigItem $configItem
     * @return \jtl\Connector\Model\GlobalData
     */
    public function addConfigItem(\jtl\Connector\Model\ConfigItem $configItem)
    {
        $this->configItems[] = $configItem;
        return $this;
    }
    
    /**
     * @return ConfigItem
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
}

