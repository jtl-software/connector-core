<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Customer group price for config item..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ConfigItemPrice extends DataModel
{
    /**
     * @type Identity Reference to configItem
     */
    protected $_configItemId = null;

    /**
     * @type Identity Reference to customerGroup
     */
    protected $_customerGroupId = null;

    /**
     * @type Identity 
     */
    protected $_taxClassId = null;

    /**
     * @type integer 
     */
    protected $_connectorId = 0;

    /**
     * @type float|null Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
     */
    protected $_price = 0.0;

    /**
     * @type integer|null Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
     */
    protected $_type = 0;


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_configItemId',
		'_customerGroupId',
		'_taxClassId',
	);

	/**
	 * @param  float $price Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
	 * @return \jtl\Connector\Model\ConfigItemPrice
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setPrice($price)
	{
		if (!is_float($price))
			throw new InvalidArgumentException('float expected.');
		$this->_price = $price;
		return $this;
	}
	
	/**
	 * @return float Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
	 */
	public function getPrice()
	{
		return $this->_price;
	}

	/**
	 * @param  integer $connectorId 
	 * @return \jtl\Connector\Model\ConfigItemPrice
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setConnectorId($connectorId)
	{
		if (!is_integer($connectorId))
			throw new InvalidArgumentException('integer expected.');
		$this->_connectorId = $connectorId;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getConnectorId()
	{
		return $this->_connectorId;
	}

	/**
	 * @param  integer $type Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
	 * @return \jtl\Connector\Model\ConfigItemPrice
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setType($type)
	{
		if (!is_integer($type))
			throw new InvalidArgumentException('integer expected.');
		$this->_type = $type;
		return $this;
	}
	
	/**
	 * @return integer Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
	 */
	public function getType()
	{
		return $this->_type;
	}

	/**
	 * @param  Identity $configItemId Reference to configItem
	 * @return \jtl\Connector\Model\ConfigItemPrice
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
	 * @param  Identity $customerGroupId Reference to customerGroup
	 * @return \jtl\Connector\Model\ConfigItemPrice
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
	 * @param  Identity $taxClassId 
	 * @return \jtl\Connector\Model\ConfigItemPrice
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setTaxClassId(Identity $taxClassId)
	{
		
		$this->_taxClassId = $taxClassId;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getTaxClassId()
	{
		return $this->_taxClassId;
	}
}

