<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Localized configGroup.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ConfigGroupI18n extends DataModel
{
    /**
     * @type Identity Reference to configGroup
     */
    protected $_configGroupId = null;

    /**
     * @type string Optional description (HTML)
     */
    protected $_description = '';

    /**
     * @type string Locale
     */
    protected $_localeName = '';

    /**
     * @type string Config group name
     */
    protected $_name = '';


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_configGroupId',
	);

	/**
	 * @param  string $name Config group name
	 * @return \jtl\Connector\Model\ConfigGroupI18n
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
	 * @return string Config group name
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  string $description Optional description (HTML)
	 * @return \jtl\Connector\Model\ConfigGroupI18n
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
	 * @return string Optional description (HTML)
	 */
	public function getDescription()
	{
		return $this->_description;
	}

	/**
	 * @param  Identity $configGroupId Reference to configGroup
	 * @return \jtl\Connector\Model\ConfigGroupI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setConfigGroupId(Identity $configGroupId)
	{
		
		$this->_configGroupId = $configGroupId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to configGroup
	 */
	public function getConfigGroupId()
	{
		return $this->_configGroupId;
	}

	/**
	 * @param  string $localeName Locale
	 * @return \jtl\Connector\Model\ConfigGroupI18n
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

