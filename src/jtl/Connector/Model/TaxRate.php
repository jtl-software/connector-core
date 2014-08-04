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
     * @type int Optional priority number. Higher value means higher priority
     */
    protected $priority = 0;

    /**
     * @type double Tax rate value e.g. 19.00
     */
    protected $rate = 0.0;

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'id',
        'taxClassId',
        'taxZoneId',
    );

    /**
     * @param  Identity $id Unique taxRate id
     * @return \jtl\Connector\Model\TaxRate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique taxRate id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $taxClassId Reference to taxClass
     * @return \jtl\Connector\Model\TaxRate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTaxClassId(Identity $taxClassId)
    {
        return $this->setProperty('TaxClassId', $taxClassId, 'Identity');
    }

    /**
     * @return Identity Reference to taxClass
     */
    public function getTaxClassId()
    {
        return $this->taxClassId;
    }

    /**
     * @param  Identity $taxZoneId Reference to taxZone
     * @return \jtl\Connector\Model\TaxRate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTaxZoneId(Identity $taxZoneId)
    {
        return $this->setProperty('TaxZoneId', $taxZoneId, 'Identity');
    }

    /**
     * @return Identity Reference to taxZone
     */
    public function getTaxZoneId()
    {
        return $this->taxZoneId;
    }

    /**
     * @param  int $priority Optional priority number. Higher value means higher priority
     * @return \jtl\Connector\Model\TaxRate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPriority(Identity $priority)
    {
        return $this->setProperty('Priority', $priority, 'int');
    }

    /**
     * @return int Optional priority number. Higher value means higher priority
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param  double $rate Tax rate value e.g. 19.00
     * @return \jtl\Connector\Model\TaxRate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setRate(Identity $rate)
    {
        return $this->setProperty('Rate', $rate, 'double');
    }

    /**
     * @return double Tax rate value e.g. 19.00
     */
    public function getRate()
    {
        return $this->rate;
    }

 
}
