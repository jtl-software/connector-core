<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Monolingual customer group attribute..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerGroupAttr extends DataModel
{
    /**
     * @type Identity Reference to customerGroup
     */
    protected $_customerGroupId = null;

    /**
     * @type Identity Unique customerGroupAttr id
     */
    protected $_id = null;

    /**
     * @type string Attribute key
     */
    protected $_key = '';

    /**
     * @type string Attribute value
     */
    protected $_value = '';

    /**
	 * Nav [CustomerGroupAttr » Many]
	 *
     * @type \jtl\Connector\Model\CustomerGroup[]
     */
    protected $_customerGroup = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_customerGroupId',
	);

	/**
	 * @param  string $key Attribute key
	 * @return \jtl\Connector\Model\CustomerGroupAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setKey($key)
	{
		if (!is_string($key))
			throw new InvalidArgumentException('string expected.');
		$this->_key = $key;
		return $this;
	}
	
	/**
	 * @return string Attribute key
	 */
	public function getKey()
	{
		return $this->_key;
	}

	/**
	 * @param  string $value Attribute value
	 * @return \jtl\Connector\Model\CustomerGroupAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setValue($value)
	{
		if (!is_string($value))
			throw new InvalidArgumentException('string expected.');
		$this->_value = $value;
		return $this;
	}
	
	/**
	 * @return string Attribute value
	 */
	public function getValue()
	{
		return $this->_value;
	}

	/**
	 * @param  Identity $id Unique customerGroupAttr id
	 * @return \jtl\Connector\Model\CustomerGroupAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique customerGroupAttr id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $customerGroupId Reference to customerGroup
	 * @return \jtl\Connector\Model\CustomerGroupAttr
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
	 * @param  \jtl\Connector\Model\CustomerGroup $customerGroup
	 * @return \jtl\Connector\Model\CustomerGroupAttr
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
	 * @return \jtl\Connector\Model\CustomerGroupAttr
	 */
	public function clearCustomerGroup()
	{
		$this->_customerGroup = array();
		return $this;
	}
}

