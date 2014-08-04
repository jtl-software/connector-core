<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Localized config item name and description..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ConfigItemI18n extends DataModel
{
    /**
     * @var Identity Reference to configItem
     */
    protected $configItemId = null;

    /**
     * @var string Description (html). Will be ignored, if inheritProductName==true
     */
    protected $description = '';

    /**
     * @var string Locale
     */
    protected $localeName = '';

    /**
     * @var string Config item name. Will be ignored if inheritProductName==true
     */
    protected $name = '';

    /**
     * @param  Identity $configItemId Reference to configItem
     * @return \jtl\Connector\Model\ConfigItemI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigItemId(Identity $configItemId)
    {
        return $this->setProperty('configItemId', $configItemId, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('description', $description, 'string');
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
     * @param  string $name Config item name. Will be ignored if inheritProductName==true
     * @return \jtl\Connector\Model\ConfigItemI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Config item name. Will be ignored if inheritProductName==true
     */
    public function getName()
    {
        return $this->name;
    }

 
}
