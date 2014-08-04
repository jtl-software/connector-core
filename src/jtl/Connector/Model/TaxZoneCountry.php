<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * TaxZone to Country Allocation (set in JTL-Wawi ERP)..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class TaxZoneCountry extends DataModel
{
    /**
     * @var Identity Unique taxZoneCountry id
     */
    protected $id = null;

    /**
     * @var Identity Reference to taxZone
     */
    protected $taxZoneId = null;

    /**
     * @var string Country ISO 3166-2 (2 letter Uppercase)
     */
    protected $countryIso = '';

    /**
     * @param  Identity $id Unique taxZoneCountry id
     * @return \jtl\Connector\Model\TaxZoneCountry
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique taxZoneCountry id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $taxZoneId Reference to taxZone
     * @return \jtl\Connector\Model\TaxZoneCountry
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
     * @param  string $countryIso Country ISO 3166-2 (2 letter Uppercase)
     * @return \jtl\Connector\Model\TaxZoneCountry
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCountryIso($countryIso)
    {
        return $this->setProperty('countryIso', $countryIso, 'string');
    }

    /**
     * @return string Country ISO 3166-2 (2 letter Uppercase)
     */
    public function getCountryIso()
    {
        return $this->countryIso;
    }

 
}
