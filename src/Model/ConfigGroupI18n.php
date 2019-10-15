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
 * Localized configGroup
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ConfigGroupI18n extends DataModel
{
    /**
     * @var Identity Reference to configGroup
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("configGroupId")
     * @Serializer\Accessor(getter="getConfigGroupId",setter="setConfigGroupId")
     */
    protected $configGroupId = null;
    
    /**
     * @var string Optional description (HTML)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected $description = '';
    
    /**
     * @var string Locale
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';
    
    /**
     * @var string Config group name
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
        $this->configGroupId = new Identity();
    }
    
    /**
     * @param Identity $configGroupId Reference to configGroup
     * @return ConfigGroupI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigGroupId(Identity $configGroupId): ConfigGroupI18n
    {
        $this->configGroupId = $configGroupId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to configGroup
     */
    public function getConfigGroupId(): Identity
    {
        return $this->configGroupId;
    }
    
    /**
     * @param string $description Optional description (HTML)
     * @return ConfigGroupI18n
     */
    public function setDescription(string $description): string
    {
        $this->description = $description;
        
        return $this;
    }
    
    /**
     * @return string Optional description (HTML)
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    
    /**
     * @param string $languageISO Locale
     * @return ConfigGroupI18n
     */
    public function setLanguageISO(
        string $languageISO
    ): string {
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
     * @param string $name Config group name
     * @return ConfigGroupI18n
     */
    public function setName(string $name): string
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Config group name
     */
    public function getName(): string
    {
        return $this->name;
    }
}
