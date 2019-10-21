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
 * Localized name for specific.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class SpecificI18n extends DataModel
{
    /**
     * @var Identity Reference to specific
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("specificId")
     * @Serializer\Accessor(getter="getSpecificId",setter="setSpecificId")
     */
    protected $specificId = null;
    
    /**
     * @var string Locale
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';
    
    /**
     * @var string Localized name
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
        $this->specificId = new Identity();
    }
    
    /**
     * @param Identity $specificId Reference to specific
     * @return SpecificI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSpecificId(Identity $specificId): SpecificI18n
    {
        $this->specificId = $specificId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to specific
     */
    public function getSpecificId(): Identity
    {
        return $this->specificId;
    }
    
    /**
     * @param string $languageISO Locale
     * @return SpecificI18n
     */
    public function setLanguageISO(string $languageISO): SpecificI18n
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
     * @param string $name Localized name
     * @return SpecificI18n
     */
    public function setName(string $name): SpecificI18n
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Localized name
     */
    public function getName(): string
    {
        return $this->name;
    }
}
