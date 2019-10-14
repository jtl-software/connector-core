<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
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
     * @return \jtl\Connector\Model\SpecificI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSpecificId(Identity $specificId)
    {
        $this->specificId = $specificId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to specific
     */
    public function getSpecificId()
    {
        return $this->specificId;
    }
    
    /**
     * @param string $languageISO Locale
     * @return \jtl\Connector\Model\SpecificI18n
     */
    public function setLanguageISO($languageISO)
    {
        $this->languageISO = $languageISO;
        
        return $this;
    }
    
    /**
     * @return string Locale
     */
    public function getLanguageISO()
    {
        return $this->languageISO;
    }
    
    /**
     * @param string $name Localized name
     * @return \jtl\Connector\Model\SpecificI18n
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Localized name
     */
    public function getName()
    {
        return $this->name;
    }
}
