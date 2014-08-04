<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Tax rate model (set in JTL-Wawi ERP)..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class TaxRate extends DataModel
{
    /**
     * @var Identity Unique taxRate id
     */
    protected $id = null;

    /**
     * @var Identity Reference to taxClass
     */
    protected $taxClassId = null;

    /**
     * @var Identity Reference to taxZone
     */
    protected $taxZoneId = null;

    /**
     * @var int Optional priority number. Higher value means higher priority
     */
    protected $priority = 0;

    /**
     * @var double Tax rate value e.g. 19.00
     */
    protected $rate = 0.0;

    /**
     * @param  Identity $id Unique taxRate id
     * @return \jtl\Connector\Model\TaxRate
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  Identity $taxClassId Reference to taxClass
     * @return \jtl\Connector\Model\TaxRate
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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

    /**
     * @param  Identity $taxZoneId Reference to taxZone
     * @return \jtl\Connector\Model\TaxRate
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  int $priority Optional priority number. Higher value means higher priority
     * @return \jtl\Connector\Model\TaxRate
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setPriority($priority)
    {
        return $this->setProperty('priority', $priority, 'int');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setRate($rate)
    {
        return $this->setProperty('rate', $rate, 'double');
    }

    /**
     * @return double Tax rate value e.g. 19.00
     */
    public function getRate()
    {
        return $this->rate;
    }

 
}
