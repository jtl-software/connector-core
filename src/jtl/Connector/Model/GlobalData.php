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
     * @type HashSet`1 
     */
    protected $companies = null;

    /**
     * @type HashSet`1 
     */
    protected $configGroups = null;

    /**
     * @type HashSet`1 
     */
    protected $configItems = null;

    /**
     * @type HashSet`1 
     */
    protected $crossSellingGroups = null;

    /**
     * @type HashSet`1 
     */
    protected $crossSellings = null;

    /**
     * @type HashSet`1 
     */
    protected $currencies = null;

    /**
     * @type HashSet`1 
     */
    protected $languages = null;

    /**
     * @type HashSet`1 
     */
    protected $setArticles = null;

    /**
     * @type HashSet`1 
     */
    protected $shipments = null;

    /**
     * @type HashSet`1 
     */
    protected $shippingClasss = null;

    /**
     * @type HashSet`1 
     */
    protected $specialPrices = null;

    /**
     * @type HashSet`1 
     */
    protected $taxClasss = null;

    /**
     * @type HashSet`1 
     */
    protected $taxRates = null;

    /**
     * @type HashSet`1 
     */
    protected $taxZones = null;

    /**
     * @type HashSet`1 
     */
    protected $units = null;

    /**
     * @type HashSet`1 
     */
    protected $warehouses = null;


    /**
     * @type array list of identities
     */
    protected $identities = array(
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->navigations;
    }

    /**
     * @param  HashSet`1 $companies 
     * @return \jtl\Connector\Model\GlobalData
     * @throws InvalidArgumentException if the provided argument is not of type 'HashSet`1'.
     */
    public function setCompanies(HashSet`1 $companies)
    {
        return $this->setProperty('companies', $companies, 'HashSet`1');
    }
    
    /**
     * @return HashSet`1 
     */
    public function getCompanies()
    {
        return $this->companies;
    }

    /**
     * @param  HashSet`1 $currencies 
     * @return \jtl\Connector\Model\GlobalData
     * @throws InvalidArgumentException if the provided argument is not of type 'HashSet`1'.
     */
    public function setCurrencies(HashSet`1 $currencies)
    {
        return $this->setProperty('currencies', $currencies, 'HashSet`1');
    }
    
    /**
     * @return HashSet`1 
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }

    /**
     * @param  HashSet`1 $languages 
     * @return \jtl\Connector\Model\GlobalData
     * @throws InvalidArgumentException if the provided argument is not of type 'HashSet`1'.
     */
    public function setLanguages(HashSet`1 $languages)
    {
        return $this->setProperty('languages', $languages, 'HashSet`1');
    }
    
    /**
     * @return HashSet`1 
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param  HashSet`1 $setArticles 
     * @return \jtl\Connector\Model\GlobalData
     * @throws InvalidArgumentException if the provided argument is not of type 'HashSet`1'.
     */
    public function setSetArticles(HashSet`1 $setArticles)
    {
        return $this->setProperty('setArticles', $setArticles, 'HashSet`1');
    }
    
    /**
     * @return HashSet`1 
     */
    public function getSetArticles()
    {
        return $this->setArticles;
    }

    /**
     * @param  HashSet`1 $shipments 
     * @return \jtl\Connector\Model\GlobalData
     * @throws InvalidArgumentException if the provided argument is not of type 'HashSet`1'.
     */
    public function setShipments(HashSet`1 $shipments)
    {
        return $this->setProperty('shipments', $shipments, 'HashSet`1');
    }
    
    /**
     * @return HashSet`1 
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * @param  HashSet`1 $shippingClasss 
     * @return \jtl\Connector\Model\GlobalData
     * @throws InvalidArgumentException if the provided argument is not of type 'HashSet`1'.
     */
    public function setShippingClasss(HashSet`1 $shippingClasss)
    {
        return $this->setProperty('shippingClasss', $shippingClasss, 'HashSet`1');
    }
    
    /**
     * @return HashSet`1 
     */
    public function getShippingClasss()
    {
        return $this->shippingClasss;
    }

    /**
     * @param  HashSet`1 $specialPrices 
     * @return \jtl\Connector\Model\GlobalData
     * @throws InvalidArgumentException if the provided argument is not of type 'HashSet`1'.
     */
    public function setSpecialPrices(HashSet`1 $specialPrices)
    {
        return $this->setProperty('specialPrices', $specialPrices, 'HashSet`1');
    }
    
    /**
     * @return HashSet`1 
     */
    public function getSpecialPrices()
    {
        return $this->specialPrices;
    }

    /**
     * @param  HashSet`1 $taxClasss 
     * @return \jtl\Connector\Model\GlobalData
     * @throws InvalidArgumentException if the provided argument is not of type 'HashSet`1'.
     */
    public function setTaxClasss(HashSet`1 $taxClasss)
    {
        return $this->setProperty('taxClasss', $taxClasss, 'HashSet`1');
    }
    
    /**
     * @return HashSet`1 
     */
    public function getTaxClasss()
    {
        return $this->taxClasss;
    }

    /**
     * @param  HashSet`1 $taxRates 
     * @return \jtl\Connector\Model\GlobalData
     * @throws InvalidArgumentException if the provided argument is not of type 'HashSet`1'.
     */
    public function setTaxRates(HashSet`1 $taxRates)
    {
        return $this->setProperty('taxRates', $taxRates, 'HashSet`1');
    }
    
    /**
     * @return HashSet`1 
     */
    public function getTaxRates()
    {
        return $this->taxRates;
    }

    /**
     * @param  HashSet`1 $taxZones 
     * @return \jtl\Connector\Model\GlobalData
     * @throws InvalidArgumentException if the provided argument is not of type 'HashSet`1'.
     */
    public function setTaxZones(HashSet`1 $taxZones)
    {
        return $this->setProperty('taxZones', $taxZones, 'HashSet`1');
    }
    
    /**
     * @return HashSet`1 
     */
    public function getTaxZones()
    {
        return $this->taxZones;
    }

    /**
     * @param  HashSet`1 $units 
     * @return \jtl\Connector\Model\GlobalData
     * @throws InvalidArgumentException if the provided argument is not of type 'HashSet`1'.
     */
    public function setUnits(HashSet`1 $units)
    {
        return $this->setProperty('units', $units, 'HashSet`1');
    }
    
    /**
     * @return HashSet`1 
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @param  HashSet`1 $warehouses 
     * @return \jtl\Connector\Model\GlobalData
     * @throws InvalidArgumentException if the provided argument is not of type 'HashSet`1'.
     */
    public function setWarehouses(HashSet`1 $warehouses)
    {
        return $this->setProperty('warehouses', $warehouses, 'HashSet`1');
    }
    
    /**
     * @return HashSet`1 
     */
    public function getWarehouses()
    {
        return $this->warehouses;
    }

    /**
     * @param  HashSet`1 $crossSellings 
     * @return \jtl\Connector\Model\GlobalData
     * @throws InvalidArgumentException if the provided argument is not of type 'HashSet`1'.
     */
    public function setCrossSellings(HashSet`1 $crossSellings)
    {
        return $this->setProperty('crossSellings', $crossSellings, 'HashSet`1');
    }
    
    /**
     * @return HashSet`1 
     */
    public function getCrossSellings()
    {
        return $this->crossSellings;
    }

    /**
     * @param  HashSet`1 $crossSellingGroups 
     * @return \jtl\Connector\Model\GlobalData
     * @throws InvalidArgumentException if the provided argument is not of type 'HashSet`1'.
     */
    public function setCrossSellingGroups(HashSet`1 $crossSellingGroups)
    {
        return $this->setProperty('crossSellingGroups', $crossSellingGroups, 'HashSet`1');
    }
    
    /**
     * @return HashSet`1 
     */
    public function getCrossSellingGroups()
    {
        return $this->crossSellingGroups;
    }

    /**
     * @param  HashSet`1 $configGroups 
     * @return \jtl\Connector\Model\GlobalData
     * @throws InvalidArgumentException if the provided argument is not of type 'HashSet`1'.
     */
    public function setConfigGroups(HashSet`1 $configGroups)
    {
        return $this->setProperty('configGroups', $configGroups, 'HashSet`1');
    }
    
    /**
     * @return HashSet`1 
     */
    public function getConfigGroups()
    {
        return $this->configGroups;
    }

    /**
     * @param  HashSet`1 $configItems 
     * @return \jtl\Connector\Model\GlobalData
     * @throws InvalidArgumentException if the provided argument is not of type 'HashSet`1'.
     */
    public function setConfigItems(HashSet`1 $configItems)
    {
        return $this->setProperty('configItems', $configItems, 'HashSet`1');
    }
    
    /**
     * @return HashSet`1 
     */
    public function getConfigItems()
    {
        return $this->configItems;
    }
}

