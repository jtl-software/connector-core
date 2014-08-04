<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Localized config item name and description..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ConfigItemI18n extends DataModel
{
    /**
     * @type Identity Reference to configItem
     */
    protected $configItemId = null;

    /**
     * @type string Description (html). Will be ignored, if inheritProductName==true
     */
    protected $description = '';

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Config item name. Will be ignored if inheritProductName==true
     */
    protected $name = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'configItemId',
    );

    /**
     * @param  Identity $configItemId Reference to configItem
     * @return \jtl\Connector\Model\ConfigItemI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigItemId(Identity $configItemId)
    {
        return $this->setProperty('ConfigItemId', $configItemId, 'Identity');
    }

    /**
     * @return Identity Reference to configItem
     */
    public function getConfigItemId()
    {
        return $this->configItemId;
    }

    /**
     * @param  string $description Description (html). Will be ignored, if inheritProductName==true
     * @return \jtl\Connector\Model\ConfigItemI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDescription(Identity $description)
    {
        return $this->setProperty('Description', $description, 'string');
    }

    /**
     * @return string Description (html). Will be ignored, if inheritProductName==true
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\ConfigItemI18n
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
     * @param  string $name Config item name. Will be ignored if inheritProductName==true
     * @return \jtl\Connector\Model\ConfigItemI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Config item name. Will be ignored if inheritProductName==true
     */
    public function getName()
    {
        return $this->name;
    }

 
}
