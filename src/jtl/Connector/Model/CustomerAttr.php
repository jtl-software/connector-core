<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Monolingual customer attribute..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerAttr extends DataModel
{
    /**
     * @type Identity Reference to customer
     */
    protected $_customerId = null;

    /**
     * @type Identity Unique customerAttr id
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
	 * Nav [CustomerAttr » Many]
	 *
     * @type \jtl\Connector\Model\Customer[]
     */
    protected $_customer = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_customerId',
	);

	/**
	 * @param  string $key Attribute key
	 * @return \jtl\Connector\Model\CustomerAttr
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
	 * @return \jtl\Connector\Model\CustomerAttr
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
	 * @param  Identity $id Unique customerAttr id
	 * @return \jtl\Connector\Model\CustomerAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique customerAttr id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $customerId Reference to customer
	 * @return \jtl\Connector\Model\CustomerAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCustomerId(Identity $customerId)
	{
		
		$this->_customerId = $customerId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to customer
	 */
	public function getCustomerId()
	{
		return $this->_customerId;
	}

	/**
	 * @param  \jtl\Connector\Model\Customer $customer
	 * @return \jtl\Connector\Model\CustomerAttr
	 */
	public function addCustomer(\jtl\Connector\Model\Customer $customer)
	{
		$this->_customer[] = $customer;
		return $this;
	}
	
	/**
	 * @return Customer
	 */
	public function getCustomer()
	{
		return $this->_customer;
	}

	/**
	 * @return \jtl\Connector\Model\CustomerAttr
	 */
	public function clearCustomer()
	{
		$this->_customer = array();
		return $this;
	}
}

