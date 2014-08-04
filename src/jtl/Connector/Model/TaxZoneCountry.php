<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * TaxZone to Country Allocation (set in JTL-Wawi ERP)..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class TaxZoneCountry extends DataModel
{
    /**
     * @type Identity Unique taxZoneCountry id
     */
    protected $id = null;

    /**
     * @type Identity Reference to taxZone
     */
    protected $taxZoneId = null;

    /**
     * @type string Country ISO 3166-2 (2 letter Uppercase)
     */
    protected $countryIso = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'id',
        'taxZoneId',
    );

    /**
     * @param  Identity $id Unique taxZoneCountry id
     * @return \jtl\Connector\Model\TaxZoneCountry
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
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
     * @param  string $countryIso Country ISO 3166-2 (2 letter Uppercase)
     * @return \jtl\Connector\Model\TaxZoneCountry
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCountryIso(Identity $countryIso)
    {
        return $this->setProperty('CountryIso', $countryIso, 'string');
    }

    /**
     * @return string Country ISO 3166-2 (2 letter Uppercase)
     */
    public function getCountryIso()
    {
        return $this->countryIso;
    }

 
}
