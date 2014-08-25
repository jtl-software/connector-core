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
 * Tax rate model (set in JTL-Wawi ERP)..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 * 
 * @Serializer\AccessType("public_method")
 */
class TaxRate extends DataModel
{
    /**
     * @var Identity Unique taxRate id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var Identity Reference to taxClass
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("taxClassId")
     * @Serializer\Accessor(getter="getTaxClassId",setter="setTaxClassId")
     */
    protected $taxClassId = null;

    /**
     * @var Identity Reference to taxZone
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("taxZoneId")
     * @Serializer\Accessor(getter="getTaxZoneId",setter="setTaxZoneId")
     */
    protected $taxZoneId = null;

    /**
     * @var int Optional priority number. Higher value means higher priority
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("priority")
     * @Serializer\Accessor(getter="getPriority",setter="setPriority")
     */
    protected $priority = 0;

    /**
     * @var double Tax rate value e.g. 19.00
     * @Serializer\Type("double")
     * @Serializer\SerializedName("rate")
     * @Serializer\Accessor(getter="getRate",setter="setRate")
     */
    protected $rate = 0.0;


    public function __construct()
    {
        $this->id = new Identity;
        $this->taxClassId = new Identity;
        $this->taxZoneId = new Identity;
    }

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
