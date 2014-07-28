<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * ProductType model to classify and group products..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductType extends DataModel
{
    /**
     * @type Identity Unique productType id
     */
    protected $_id = null;

    /**
     * @type string Optional (internal) product type name
     */
    protected $_name = '';


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
	);

	/**
	 * @param  string $name Optional (internal) product type name
	 * @return \jtl\Connector\Model\ProductType
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
	 * @return string Optional (internal) product type name
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  Identity $id Unique productType id
	 * @return \jtl\Connector\Model\ProductType
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique productType id
	 */
	public function getId()
	{
		return $this->_id;
	}
}

