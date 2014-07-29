<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Tax rate model (set in JTL-Wawi ERP)..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class TaxRate extends DataModel
{
    /**
     * @type Identity Unique taxRate id
     */
    protected $id = null;

    /**
     * @type Identity Reference to taxClass
     */
    protected $taxClassId = null;

    /**
     * @type Identity Reference to taxZone
     */
    protected $taxZoneId = null;

    /**
     * @type integer|null Optional priority number. Higher value means higher priority
     */
    protected $priority = 0;

    /**
     * @type float|null Tax rate value e.g. 19.00
     */
    protected $rate = 0.0;


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'taxZoneId',
        'taxClassId',
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
     * @param  float $rate Tax rate value e.g. 19.00
     * @return \jtl\Connector\Model\TaxRate
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setRate($rate)
    {
        return $this->setProperty('rate', $rate, 'float');
    }
    
    /**
     * @return float Tax rate value e.g. 19.00
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param  integer $priority Optional priority number. Higher value means higher priority
     * @return \jtl\Connector\Model\TaxRate
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setPriority($priority)
    {
        return $this->setProperty('priority', $priority, 'integer');
    }
    
    /**
     * @return integer Optional priority number. Higher value means higher priority
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param  Identity $id Unique taxRate id
     * @return \jtl\Connector\Model\TaxRate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique taxRate id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $taxZoneId Reference to taxZone
     * @return \jtl\Connector\Model\TaxRate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTaxZoneId(Identity $taxZoneId)
    {
        return $this->setProperty('taxZoneId', $taxZoneId, 'Identity');
    }
    
    /**
     * @return Identity Reference to taxZone
     */
    public function getTaxZoneId()
    {
        return $this->taxZoneId;
    }

    /**
     * @param  Identity $taxClassId Reference to taxClass
     * @return \jtl\Connector\Model\TaxRate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTaxClassId(Identity $taxClassId)
    {
        return $this->setProperty('taxClassId', $taxClassId, 'Identity');
    }
    
    /**
     * @return Identity Reference to taxClass
     */
    public function getTaxClassId()
    {
        return $this->taxClassId;
    }
}

