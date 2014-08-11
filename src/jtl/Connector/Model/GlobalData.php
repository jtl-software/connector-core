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
     * @var Company[] 
     * @Serializer\Type("Company[]")
     * @Serializer\SerializedName("companies")
     * @Serializer\Accessor(getter="getCompanies",setter="setCompanies")
     */
    protected $companies = null;

    /**
     * @var ConfigGroup[] 
     * @Serializer\Type("ConfigGroup[]")
     * @Serializer\SerializedName("configGroups")
     * @Serializer\Accessor(getter="getConfigGroups",setter="setConfigGroups")
     */
    protected $configGroups = null;

    /**
     * @var ConfigItem[] 
     * @Serializer\Type("ConfigItem[]")
     * @Serializer\SerializedName("configItems")
     * @Serializer\Accessor(getter="getConfigItems",setter="setConfigItems")
     */
    protected $configItems = null;

    /**
     * @var CrossSellingGroup[] 
     * @Serializer\Type("CrossSellingGroup[]")
     * @Serializer\SerializedName("crossSellingGroups")
     * @Serializer\Accessor(getter="getCrossSellingGroups",setter="setCrossSellingGroups")
     */
    protected $crossSellingGroups = null;

    /**
     * @var CrossSelling[] 
     * @Serializer\Type("CrossSelling[]")
     * @Serializer\SerializedName("crossSellings")
     * @Serializer\Accessor(getter="getCrossSellings",setter="setCrossSellings")
     */
    protected $crossSellings = null;

    /**
     * @var Currency[] 
     * @Serializer\Type("Currency[]")
     * @Serializer\SerializedName("currencies")
     * @Serializer\Accessor(getter="getCurrencies",setter="setCurrencies")
     */
    protected $currencies = null;

    /**
     * @var CustomerGroup[] 
     * @Serializer\Type("CustomerGroup[]")
     * @Serializer\SerializedName("customerGroups")
     * @Serializer\Accessor(getter="getCustomerGroups",setter="setCustomerGroups")
     */
    protected $customerGroups = null;

    /**
     * @var Language[] 
     * @Serializer\Type("Language[]")
     * @Serializer\SerializedName("languages")
     * @Serializer\Accessor(getter="getLanguages",setter="setLanguages")
     */
    protected $languages = null;

    /**
     * @var SetArticle[] 
     * @Serializer\Type("SetArticle[]")
     * @Serializer\SerializedName("setArticles")
     * @Serializer\Accessor(getter="getSetArticles",setter="setSetArticles")
     */
    protected $setArticles = null;

    /**
     * @var Shipment[] 
     * @Serializer\Type("Shipment[]")
     * @Serializer\SerializedName("shipments")
     * @Serializer\Accessor(getter="getShipments",setter="setShipments")
     */
    protected $shipments = null;

    /**
     * @var ShippingClass[] 
     * @Serializer\Type("ShippingClass[]")
     * @Serializer\SerializedName("shippingClasses")
     * @Serializer\Accessor(getter="getShippingClasses",setter="setShippingClasses")
     */
    protected $shippingClasses = null;

    /**
     * @var SpecialPrice[] 
     * @Serializer\Type("SpecialPrice[]")
     * @Serializer\SerializedName("specialPrices")
     * @Serializer\Accessor(getter="getSpecialPrices",setter="setSpecialPrices")
     */
    protected $specialPrices = null;

    /**
     * @var TaxClass[] 
     * @Serializer\Type("TaxClass[]")
     * @Serializer\SerializedName("taxClasses")
     * @Serializer\Accessor(getter="getTaxClasses",setter="setTaxClasses")
     */
    protected $taxClasses = null;

    /**
     * @var TaxRate[] 
     * @Serializer\Type("TaxRate[]")
     * @Serializer\SerializedName("taxRates")
     * @Serializer\Accessor(getter="getTaxRates",setter="setTaxRates")
     */
    protected $taxRates = null;

    /**
     * @var TaxZone[] 
     * @Serializer\Type("TaxZone[]")
     * @Serializer\SerializedName("taxZones")
     * @Serializer\Accessor(getter="getTaxZones",setter="setTaxZones")
     */
    protected $taxZones = null;

    /**
     * @var Unit[] 
     * @Serializer\Type("Unit[]")
     * @Serializer\SerializedName("units")
     * @Serializer\Accessor(getter="getUnits",setter="setUnits")
     */
    protected $units = null;

    /**
     * @var Warehouse[] 
     * @Serializer\Type("Warehouse[]")
     * @Serializer\SerializedName("warehouses")
     * @Serializer\Accessor(getter="getWarehouses",setter="setWarehouses")
     */
    protected $warehouses = null;


    public function __construct()
    {
    }

    /**
     * @param  Company[] $companies 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'Company[]'.
     */
    public function setCompanies(array $companies)
    {
        return $this->setProperty('companies', $companies, 'Company[]');
    }

    /**
     * @return Company[] 
     */
    public function getCompanies()
    {
        return $this->companies;
    }

    /**
     * @param  ConfigGroup[] $configGroups 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'ConfigGroup[]'.
     */
    public function setConfigGroups(array $configGroups)
    {
        return $this->setProperty('configGroups', $configGroups, 'ConfigGroup[]');
    }

    /**
     * @return ConfigGroup[] 
     */
    public function getConfigGroups()
    {
        return $this->configGroups;
    }

    /**
     * @param  ConfigItem[] $configItems 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'ConfigItem[]'.
     */
    public function setConfigItems(array $configItems)
    {
        return $this->setProperty('configItems', $configItems, 'ConfigItem[]');
    }

    /**
     * @return ConfigItem[] 
     */
    public function getConfigItems()
    {
        return $this->configItems;
    }

    /**
     * @param  CrossSellingGroup[] $crossSellingGroups 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'CrossSellingGroup[]'.
     */
    public function setCrossSellingGroups(array $crossSellingGroups)
    {
        return $this->setProperty('crossSellingGroups', $crossSellingGroups, 'CrossSellingGroup[]');
    }

    /**
     * @return CrossSellingGroup[] 
     */
    public function getCrossSellingGroups()
    {
        return $this->crossSellingGroups;
    }

    /**
     * @param  CrossSelling[] $crossSellings 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'CrossSelling[]'.
     */
    public function setCrossSellings(array $crossSellings)
    {
        return $this->setProperty('crossSellings', $crossSellings, 'CrossSelling[]');
    }

    /**
     * @return CrossSelling[] 
     */
    public function getCrossSellings()
    {
        return $this->crossSellings;
    }

    /**
     * @param  Currency[] $currencies 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'Currency[]'.
     */
    public function setCurrencies(array $currencies)
    {
        return $this->setProperty('currencies', $currencies, 'Currency[]');
    }

    /**
     * @return Currency[] 
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }

    /**
     * @param  CustomerGroup[] $customerGroups 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'CustomerGroup[]'.
     */
    public function setCustomerGroups(array $customerGroups)
    {
        return $this->setProperty('customerGroups', $customerGroups, 'CustomerGroup[]');
    }

    /**
     * @return CustomerGroup[] 
     */
    public function getCustomerGroups()
    {
        return $this->customerGroups;
    }

    /**
     * @param  Language[] $languages 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'Language[]'.
     */
    public function setLanguages(array $languages)
    {
        return $this->setProperty('languages', $languages, 'Language[]');
    }

    /**
     * @return Language[] 
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param  SetArticle[] $setArticles 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'SetArticle[]'.
     */
    public function setSetArticles(array $setArticles)
    {
        return $this->setProperty('setArticles', $setArticles, 'SetArticle[]');
    }

    /**
     * @return SetArticle[] 
     */
    public function getSetArticles()
    {
        return $this->setArticles;
    }

    /**
     * @param  Shipment[] $shipments 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'Shipment[]'.
     */
    public function setShipments(array $shipments)
    {
        return $this->setProperty('shipments', $shipments, 'Shipment[]');
    }

    /**
     * @return Shipment[] 
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * @param  ShippingClass[] $shippingClasses 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'ShippingClass[]'.
     */
    public function setShippingClasses(array $shippingClasses)
    {
        return $this->setProperty('shippingClasses', $shippingClasses, 'ShippingClass[]');
    }

    /**
     * @return ShippingClass[] 
     */
    public function getShippingClasses()
    {
        return $this->shippingClasses;
    }

    /**
     * @param  SpecialPrice[] $specialPrices 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'SpecialPrice[]'.
     */
    public function setSpecialPrices(array $specialPrices)
    {
        return $this->setProperty('specialPrices', $specialPrices, 'SpecialPrice[]');
    }

    /**
     * @return SpecialPrice[] 
     */
    public function getSpecialPrices()
    {
        return $this->specialPrices;
    }

    /**
     * @param  TaxClass[] $taxClasses 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'TaxClass[]'.
     */
    public function setTaxClasses(array $taxClasses)
    {
        return $this->setProperty('taxClasses', $taxClasses, 'TaxClass[]');
    }

    /**
     * @return TaxClass[] 
     */
    public function getTaxClasses()
    {
        return $this->taxClasses;
    }

    /**
     * @param  TaxRate[] $taxRates 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'TaxRate[]'.
     */
    public function setTaxRates(array $taxRates)
    {
        return $this->setProperty('taxRates', $taxRates, 'TaxRate[]');
    }

    /**
     * @return TaxRate[] 
     */
    public function getTaxRates()
    {
        return $this->taxRates;
    }

    /**
     * @param  TaxZone[] $taxZones 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'TaxZone[]'.
     */
    public function setTaxZones(array $taxZones)
    {
        return $this->setProperty('taxZones', $taxZones, 'TaxZone[]');
    }

    /**
     * @return TaxZone[] 
     */
    public function getTaxZones()
    {
        return $this->taxZones;
    }

    /**
     * @param  Unit[] $units 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'Unit[]'.
     */
    public function setUnits(array $units)
    {
        return $this->setProperty('units', $units, 'Unit[]');
    }

    /**
     * @return Unit[] 
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @param  Warehouse[] $warehouses 
     * @return \jtl\Connector\Model\GlobalData
     * @throws \InvalidArgumentException if the provided argument is not of type 'Warehouse[]'.
     */
    public function setWarehouses(array $warehouses)
    {
        return $this->setProperty('warehouses', $warehouses, 'Warehouse[]');
    }

    /**
     * @return Warehouse[] 
     */
    public function getWarehouses()
    {
        return $this->warehouses;
    }

 
}
