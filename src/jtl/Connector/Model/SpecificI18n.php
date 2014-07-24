<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Localized name for specific..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class SpecificI18n extends DataModel
{
    /**
     * @type Identity Reference to specific
     */
    protected $_specificId = null;

    /**
     * @type string Locale
     */
    protected $_localeName = '';

    /**
     * @type string Localized name
     */
    protected $_name = '';

    /**
	 * Nav [SpecificI18n » Many]
	 *
     * @type \jtl\Connector\Model\Specific[]
     */
    protected $_specific = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_specificId',
	);

	/**
	 * @param  string $name Localized name
	 * @return \jtl\Connector\Model\SpecificI18n
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
	 * @return string Localized name
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  Identity $specificId Reference to specific
	 * @return \jtl\Connector\Model\SpecificI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setSpecificId(Identity $specificId)
	{
		
		$this->_specificId = $specificId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to specific
	 */
	public function getSpecificId()
	{
		return $this->_specificId;
	}

	/**
	 * @param  string $localeName Locale
	 * @return \jtl\Connector\Model\SpecificI18n
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

	/**
	 * @param  \jtl\Connector\Model\Specific $specific
	 * @return \jtl\Connector\Model\SpecificI18n
	 */
	public function addSpecific(\jtl\Connector\Model\Specific $specific)
	{
		$this->_specific[] = $specific;
		return $this;
	}
	
	/**
	 * @return Specific
	 */
	public function getSpecific()
	{
		return $this->_specific;
	}

	/**
	 * @return \jtl\Connector\Model\SpecificI18n
	 */
	public function clearSpecific()
	{
		$this->_specific = array();
		return $this;
	}
}

