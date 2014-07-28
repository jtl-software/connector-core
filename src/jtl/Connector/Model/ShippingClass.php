<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Shipping classes are usually defined in JTL-Wawi ERP..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ShippingClass extends DataModel
{
    /**
     * @type Identity Unique shippingClass id
     */
    protected $_id = null;

    /**
     * @type string Optional (internal) Shipping class name
     */
    protected $_name = '';


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
	);

	/**
	 * @param  string $name Optional (internal) Shipping class name
	 * @return \jtl\Connector\Model\ShippingClass
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
	 * @return string Optional (internal) Shipping class name
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  Identity $id Unique shippingClass id
	 * @return \jtl\Connector\Model\ShippingClass
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique shippingClass id
	 */
	public function getId()
	{
		return $this->_id;
	}
}

