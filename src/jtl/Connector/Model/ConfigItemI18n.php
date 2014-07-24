<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Localized config item name and description..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ConfigItemI18n extends DataModel
{
    /**
     * @type Identity Reference to configItem
     */
    protected $_configItemId = null;

    /**
     * @type string Description (html). Will be ignored, if inheritProductName==true
     */
    protected $_description = '';

    /**
     * @type string Locale
     */
    protected $_localeName = '';

    /**
     * @type string Config item name. Will be ignored if inheritProductName==true
     */
    protected $_name = '';


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_configItemId',
	);

	/**
	 * @param  string $name Config item name. Will be ignored if inheritProductName==true
	 * @return \jtl\Connector\Model\ConfigItemI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setName($name)
	{
		if (!is_string($name))
			throw new InvalidArgumentException('string expected.');
		$this->_name = $name;
		return $this;
	}
	
	/**
	 * @return string Config item name. Will be ignored if inheritProductName==true
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  string $description Description (html). Will be ignored, if inheritProductName==true
	 * @return \jtl\Connector\Model\ConfigItemI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setDescription($description)
	{
		if (!is_string($description))
			throw new InvalidArgumentException('string expected.');
		$this->_description = $description;
		return $this;
	}
	
	/**
	 * @return string Description (html). Will be ignored, if inheritProductName==true
	 */
	public function getDescription()
	{
		return $this->_description;
	}

	/**
	 * @param  Identity $configItemId Reference to configItem
	 * @return \jtl\Connector\Model\ConfigItemI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setConfigItemId(Identity $configItemId)
	{
		
		$this->_configItemId = $configItemId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to configItem
	 */
	public function getConfigItemId()
	{
		return $this->_configItemId;
	}

	/**
	 * @param  string $localeName Locale
	 * @return \jtl\Connector\Model\ConfigItemI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setLocaleName($localeName)
	{
		if (!is_string($localeName))
			throw new InvalidArgumentException('string expected.');
		$this->_localeName = $localeName;
		return $this;
	}
	
	/**
	 * @return string Locale
	 */
	public function getLocaleName()
	{
		return $this->_localeName;
	}
}

