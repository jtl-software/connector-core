<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Tax zone model (set in JTL-Wawi ERP)..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class TaxZone extends DataModel
{
    /**
     * @type Identity Unique taxZone id
     */
    protected $_id = null;

    /**
     * @type string Optional tax zone name e.g. "EU Zone"
     */
    protected $_name = '';


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
	);

	/**
	 * @param  string $name Optional tax zone name e.g. "EU Zone"
	 * @return \jtl\Connector\Model\TaxZone
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
	 * @return string Optional tax zone name e.g. "EU Zone"
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  Identity $id Unique taxZone id
	 * @return \jtl\Connector\Model\TaxZone
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique taxZone id
	 */
	public function getId()
	{
		return $this->_id;
	}
}

