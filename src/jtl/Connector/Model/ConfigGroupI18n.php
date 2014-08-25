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
 * Localized configGroup.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 * 
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
     * @var Identity Locale
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("localeName")
     * @Serializer\Accessor(getter="getLocaleName",setter="setLocaleName")
     */
    protected $localeName = null;

    /**
     * @var string Optional description (HTML)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected $description = '';

    /**
     * @var string Config group name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';


    public function __construct()
    {
        $this->configGroupId = new Identity;
        $this->localeName = new Identity;
    }

    /**
     * @param  Identity $configGroupId Reference to configGroup
     * @return \jtl\Connector\Model\ConfigGroupI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigGroupId(Identity $configGroupId)
    {
        return $this->setProperty('configGroupId', $configGroupId, 'Identity');
    }

    /**
     * @return Identity Reference to configGroup
     */
    public function getConfigGroupId()
    {
        return $this->configGroupId;
    }

    /**
     * @param  Identity $localeName Locale
     * @return \jtl\Connector\Model\ConfigGroupI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('localeName', $localeName, 'Identity');
    }

    /**
     * @return Identity Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }

    /**
     * @param  string $description Optional description (HTML)
     * @return \jtl\Connector\Model\ConfigGroupI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $name Config group name
     * @return \jtl\Connector\Model\ConfigGroupI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
