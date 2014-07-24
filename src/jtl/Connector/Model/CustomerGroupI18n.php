<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Localized customer group name..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerGroupI18n extends DataModel
{
    /**
     * @type Identity Reference to customerGroup
     */
    protected $_customerGroupId = null;

    /**
     * @type string Locale
     */
    protected $_localeName = '';

    /**
     * @type string Localized customer group name
     */
    protected $_name = '';

    /**
	 * Nav [CustomerGroupI18n » Many]
	 *
     * @type \jtl\Connector\Model\CustomerGroup[]
     */
    protected $_customerGroup = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_customerGroupId',
	);

	/**
	 * @param  string $name Localized customer group name
	 * @return \jtl\Connector\Model\CustomerGroupI18n
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
	 * @return string Localized customer group name
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  Identity $customerGroupId Reference to customerGroup
	 * @return \jtl\Connector\Model\CustomerGroupI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCustomerGroupId(Identity $customerGroupId)
	{
		
		$this->_customerGroupId = $customerGroupId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to customerGroup
	 */
	public function getCustomerGroupId()
	{
		return $this->_customerGroupId;
	}

	/**
	 * @param  string $localeName Locale
	 * @return \jtl\Connector\Model\CustomerGroupI18n
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
	 * @param  \jtl\Connector\Model\CustomerGroup $customerGroup
	 * @return \jtl\Connector\Model\CustomerGroupI18n
	 */
	public function addCustomerGroup(\jtl\Connector\Model\CustomerGroup $customerGroup)
	{
		$this->_customerGroup[] = $customerGroup;
		return $this;
	}
	
	/**
	 * @return CustomerGroup
	 */
	public function getCustomerGroup()
	{
		return $this->_customerGroup;
	}

	/**
	 * @return \jtl\Connector\Model\CustomerGroupI18n
	 */
	public function clearCustomerGroup()
	{
		$this->_customerGroup = array();
		return $this;
	}
}

