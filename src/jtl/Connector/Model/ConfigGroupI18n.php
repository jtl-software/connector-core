<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Localized configGroup.
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ConfigGroupI18n extends DataModel
{
    /**
     * @var Identity Reference to configGroup
     */
    protected $configGroupId = null;

    /**
     * @var string Optional description (HTML)
     */
    protected $description = '';

    /**
     * @var string Locale
     */
    protected $localeName = '';

    /**
     * @var string Config group name
     */
    protected $name = '';

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
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\ConfigGroupI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('localeName', $localeName, 'string');
    }

    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
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
