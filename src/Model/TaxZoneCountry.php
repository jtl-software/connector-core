<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * TaxZone to Country Allocation (set in JTL-Wawi ERP).
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class TaxZoneCountry extends DataModel
{
    /**
     * @var Identity Reference to taxZone
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("taxZoneId")
     * @Serializer\Accessor(getter="getTaxZoneId",setter="setTaxZoneId")
     */
    protected $taxZoneId = null;
    
    /**
     * @var string Country ISO 3166-2 (2 letter Uppercase)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("countryIso")
     * @Serializer\Accessor(getter="getCountryIso",setter="setCountryIso")
     */
    protected $countryIso = '';
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->taxZoneId = new Identity();
    }
    
    /**
     * @param Identity $taxZoneId Reference to taxZone
     * @return TaxZoneCountry
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTaxZoneId(Identity $taxZoneId): TaxZoneCountry
    {
        $this->taxZoneId = $taxZoneId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to taxZone
     */
    public function getTaxZoneId(): Identity
    {
        return $this->taxZoneId;
    }
    
    /**
     * @param string $countryIso Country ISO 3166-2 (2 letter Uppercase)
     * @return TaxZoneCountry
     */
    public function setCountryIso(string $countryIso): TaxZoneCountry
    {
        $this->countryIso = $countryIso;
        
        return $this;
    }
    
    /**
     * @return string Country ISO 3166-2 (2 letter Uppercase)
     */
    public function getCountryIso(): string
    {
        return $this->countryIso;
    }
}
