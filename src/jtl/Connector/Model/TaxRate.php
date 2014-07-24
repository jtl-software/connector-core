<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Tax rate model (set in JTL-Wawi ERP)..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class TaxRate extends DataModel
{
    /**
     * @type Identity Unique taxRate id
     */
    protected $_id = null;

    /**
     * @type Identity Reference to taxClass
     */
    protected $_taxClassId = null;

    /**
     * @type Identity Reference to taxZone
     */
    protected $_taxZoneId = null;

    /**
     * @type integer|null Optional priority number. Higher value means higher priority
     */
    protected $_priority = 0;

    /**
     * @type float|null Tax rate value e.g. 19.00
     */
    protected $_rate = 0.0;


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_taxZoneId',
		'_taxClassId',
	);

	/**
	 * @param  float $rate Tax rate value e.g. 19.00
	 * @return \jtl\Connector\Model\TaxRate
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setRate($rate)
	{
		if (!is_float($rate))
			throw new InvalidArgumentException('float expected.');
		$this->_rate = $rate;
		return $this;
	}
	
	/**
	 * @return float Tax rate value e.g. 19.00
	 */
	public function getRate()
	{
		return $this->_rate;
	}

	/**
	 * @param  integer $priority Optional priority number. Higher value means higher priority
	 * @return \jtl\Connector\Model\TaxRate
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setPriority($priority)
	{
		if (!is_integer($priority))
			throw new InvalidArgumentException('integer expected.');
		$this->_priority = $priority;
		return $this;
	}
	
	/**
	 * @return integer Optional priority number. Higher value means higher priority
	 */
	public function getPriority()
	{
		return $this->_priority;
	}

	/**
	 * @param  Identity $id Unique taxRate id
	 * @return \jtl\Connector\Model\TaxRate
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique taxRate id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $taxZoneId Reference to taxZone
	 * @return \jtl\Connector\Model\TaxRate
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setTaxZoneId(Identity $taxZoneId)
	{
		
		$this->_taxZoneId = $taxZoneId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to taxZone
	 */
	public function getTaxZoneId()
	{
		return $this->_taxZoneId;
	}

	/**
	 * @param  Identity $taxClassId Reference to taxClass
	 * @return \jtl\Connector\Model\TaxRate
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setTaxClassId(Identity $taxClassId)
	{
		
		$this->_taxClassId = $taxClassId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to taxClass
	 */
	public function getTaxClassId()
	{
		return $this->_taxClassId;
	}
}

