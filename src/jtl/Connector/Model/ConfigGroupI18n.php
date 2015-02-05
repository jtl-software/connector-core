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
 * Localized configGroup
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class ConfigGroupI18n extends DataModel
{
    /**
     * @var string Reference to configGroup
     * @Serializer\Type("string")
     * @Serializer\SerializedName("configGroupId")
     * @Serializer\Accessor(getter="getConfigGroupId",setter="setConfigGroupId")
     */
    protected $configGroupId = '';

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
     * @param string $configGroupId Reference to configGroup
     * @return \jtl\Connector\Model\ConfigGroupI18n
     */
    public function setConfigGroupId($configGroupId)
    {
        return $this->setProperty('configGroupId', $configGroupId, 'string');
    }

    /**
     * @return string Reference to configGroup
     */
    public function getConfigGroupId()
    {
        return $this->configGroupId;
    }

    /**
     * @param string $description Optional description (HTML)
     * @return \jtl\Connector\Model\ConfigGroupI18n
     */
    public function setDescription($description)
    {
        return $this->setProperty('description', $description, 'string');
    }

    /**
     * @return string Optional description (HTML)
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $languageISO Locale
     * @return \jtl\Connector\Model\ConfigGroupI18n
     */
    public function setLanguageISO($languageISO)
    {
        return $this->setProperty('languageISO', $languageISO, 'string');
    }

    /**
     * @return string Locale
     */
    public function getLanguageISO()
    {
        return $this->languageISO;
    }

    /**
     * @param string $name Config group name
     * @return \jtl\Connector\Model\ConfigGroupI18n
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Config group name
     */
    public function getName()
    {
        return $this->name;
    }
}
