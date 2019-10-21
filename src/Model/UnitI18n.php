<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Localized Unit Name
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class UnitI18n extends DataModel
{
    /**
     * @var Identity Unit id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("unitId")
     * @Serializer\Accessor(getter="getUnitId",setter="setUnitId")
     */
    protected $unitId = null;
    
    /**
     * @var string Locale
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';
    
    /**
     * @var string Localized unit name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->unitId = new Identity();
    }
    
    /**
     * @param Identity $unitId Unit id
     * @return UnitI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setUnitId(Identity $unitId): UnitI18n
    {
        $this->unitId = $unitId;
        
        return $this;
    }
    
    /**
     * @return Identity Unit id
     */
    public function getUnitId(): Identity
    {
        return $this->unitId;
    }
    
    /**
     * @param string $languageISO Locale
     * @return UnitI18n
     */
    public function setLanguageISO(string $languageISO): UnitI18n
    {
        $this->languageISO = $languageISO;
        
        return $this;
    }
    
    /**
     * @return string Locale
     */
    public function getLanguageISO(): string
    {
        return $this->languageISO;
    }
    
    /**
     * @param string $name Localized unit name
     * @return UnitI18n
     */
    public function setName(string $name): UnitI18n
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Localized unit name
     */
    public function getName(): string
    {
        return $this->name;
    }
}
