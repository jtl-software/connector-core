<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Monolingual attribute for a customerorder..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerOrderAttr extends DataModel
{
    /**
     * @type Identity Reference to customerOrder
     */
    protected $_customerOrderId = null;

    /**
     * @type Identity Unique customerOrderAttr id
     */
    protected $_id = null;

    /**
     * @type string Attribute key name
     */
    protected $_key = '';

    /**
     * @type string Attribute value
     */
    protected $_value = '';

    /**
	 * Nav [CustomerOrderAttr » Many]
	 *
     * @type \jtl\Connector\Model\CustomerOrder[]
     */
    protected $_customerOrder = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_customerOrderId',
	);

	/**
	 * @param  string $key Attribute key name
	 * @return \jtl\Connector\Model\CustomerOrderAttr
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
	 * @return string Attribute key name
	 */
	public function getKey()
	{
		return $this->_key;
	}

	/**
	 * @param  string $value Attribute value
	 * @return \jtl\Connector\Model\CustomerOrderAttr
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
	 * @param  Identity $id Unique customerOrderAttr id
	 * @return \jtl\Connector\Model\CustomerOrderAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique customerOrderAttr id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $customerOrderId Reference to customerOrder
	 * @return \jtl\Connector\Model\CustomerOrderAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCustomerOrderId(Identity $customerOrderId)
	{
		
		$this->_customerOrderId = $customerOrderId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to customerOrder
	 */
	public function getCustomerOrderId()
	{
		return $this->_customerOrderId;
	}

	/**
	 * @param  \jtl\Connector\Model\CustomerOrder $customerOrder
	 * @return \jtl\Connector\Model\CustomerOrderAttr
	 */
	public function addCustomerOrder(\jtl\Connector\Model\CustomerOrder $customerOrder)
	{
		$this->_customerOrder[] = $customerOrder;
		return $this;
	}
	
	/**
	 * @return CustomerOrder
	 */
	public function getCustomerOrder()
	{
		return $this->_customerOrder;
	}

	/**
	 * @return \jtl\Connector\Model\CustomerOrderAttr
	 */
	public function clearCustomerOrder()
	{
		$this->_customerOrder = array();
		return $this;
	}
}

