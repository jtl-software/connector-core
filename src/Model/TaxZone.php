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
 * Tax zone model (set in JTL-Wawi ERP).
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class TaxZone extends DataModel
{
    /**
     * @var Identity Unique taxZone id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var string Optional tax zone name e.g. "EU Zone"
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';
    
    /**
     * @var TaxZoneCountry[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\TaxZoneCountry>")
     * @Serializer\SerializedName("countries")
     * @Serializer\AccessType("reflection")
     */
    protected $countries = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
    }
    
    /**
     * @param Identity $id Unique taxZone id
     * @return TaxZone
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): TaxZone
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique taxZone id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param string $name Optional tax zone name e.g. "EU Zone"
     * @return TaxZone
     */
    public function setName(string $name): TaxZone
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Optional tax zone name e.g. "EU Zone"
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @param TaxZoneCountry $country
     * @return TaxZone
     */
    public function addCountry(TaxZoneCountry $country): TaxZone
    {
        $this->countries[] = $country;
        
        return $this;
    }
    
    /**
     * @return TaxZoneCountry[]
     */
    public function getCountries(): array
    {
        return $this->countries;
    }
    
    /**
     * @return TaxZone
     */
    public function clearCountries(): TaxZone
    {
        $this->countries = [];
        
        return $this;
    }
}
