<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ConnectorCurrency extends DataModel
{
    /**
     * @type integer 
     */
    protected $_connectorId = 0;

    /**
     * @type integer 
     */
    protected $_currencyId = 0;

    /**
     * @type boolean 
     */
    protected $_isDefault = false;

    /**
	 * Nav [ConnectorCurrency » Many]
	 *
     * @type \jtl\Connector\Model\Connector[]
     */
    protected $_connector = array();

    /**
	 * Nav [ConnectorCurrency » Many]
	 *
     * @type \jtl\Connector\Model\Currency[]
     */
    protected $_currency = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
	);

	/**
	 * @param  integer $connectorId 
	 * @return \jtl\Connector\Model\ConnectorCurrency
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
	 * @param  integer $currencyId 
	 * @return \jtl\Connector\Model\ConnectorCurrency
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setCurrencyId($currencyId)
	{
		if (!is_integer($currencyId))
			throw new InvalidArgumentException('integer expected.');
		$this->_currencyId = $currencyId;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getCurrencyId()
	{
		return $this->_currencyId;
	}

	/**
	 * @param  boolean $isDefault 
	 * @return \jtl\Connector\Model\ConnectorCurrency
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setIsDefault($isDefault)
	{
		if (!is_bool($isDefault))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isDefault = $isDefault;
		return $this;
	}
	
	/**
	 * @return boolean 
	 */
	public function getIsDefault()
	{
		return $this->_isDefault;
	}

	/**
	 * @param  \jtl\Connector\Model\Connector $connector
	 * @return \jtl\Connector\Model\ConnectorCurrency
	 */
	public function addConnector(\jtl\Connector\Model\Connector $connector)
	{
		$this->_connector[] = $connector;
		return $this;
	}
	
	/**
	 * @return Connector
	 */
	public function getConnector()
	{
		return $this->_connector;
	}

	/**
	 * @return \jtl\Connector\Model\ConnectorCurrency
	 */
	public function clearConnector()
	{
		$this->_connector = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\Currency $currency
	 * @return \jtl\Connector\Model\ConnectorCurrency
	 */
	public function addCurrency(\jtl\Connector\Model\Currency $currency)
	{
		$this->_currency[] = $currency;
		return $this;
	}
	
	/**
	 * @return Currency
	 */
	public function getCurrency()
	{
		return $this->_currency;
	}

	/**
	 * @return \jtl\Connector\Model\ConnectorCurrency
	 */
	public function clearCurrency()
	{
		$this->_currency = array();
		return $this;
	}
}

