<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Localized configGroup.
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ConfigGroupI18n extends DataModel
{
    /**
     * @type Identity Reference to configGroup
     */
    protected $configGroupId = null;

    /**
     * @type string Optional description (HTML)
     */
    protected $description = '';

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Config group name
     */
    protected $name = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'configGroupId',
    );

    /**
     * @param  Identity $configGroupId Reference to configGroup
     * @return \jtl\Connector\Model\ConfigGroupI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigGroupId(Identity $configGroupId)
    {
        return $this->setProperty('ConfigGroupId', $configGroupId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDescription(Identity $description)
    {
        return $this->setProperty('Description', $description, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('LocaleName', $localeName, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Config group name
     */
    public function getName()
    {
        return $this->name;
    }

 
}
