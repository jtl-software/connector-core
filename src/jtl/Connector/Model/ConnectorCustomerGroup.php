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
class ConnectorCustomerGroup extends DataModel
{
    /**
     * @type Identity 
     */
    protected $_customerGroupId = null;

    /**
     * @type integer 
     */
    protected $_connectorId = 0;

    /**
     * @type boolean 
     */
    protected $_isDefault = false;

    /**
	 * Nav [ConnectorCustomerGroup » Many]
	 *
     * @type \jtl\Connector\Model\Connector[]
     */
    protected $_connector = array();

    /**
	 * Nav [ConnectorCustomerGroup » Many]
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
	 * @param  integer $connectorId 
	 * @return \jtl\Connector\Model\ConnectorCustomerGroup
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
	 * @param  Identity $customerGroupId 
	 * @return \jtl\Connector\Model\ConnectorCustomerGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCustomerGroupId(Identity $customerGroupId)
	{
		
		$this->_customerGroupId = $customerGroupId;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getCustomerGroupId()
	{
		return $this->_customerGroupId;
	}

	/**
	 * @param  boolean $isDefault 
	 * @return \jtl\Connector\Model\ConnectorCustomerGroup
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
	 * @return \jtl\Connector\Model\ConnectorCustomerGroup
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
	 * @return \jtl\Connector\Model\ConnectorCustomerGroup
	 */
	public function clearConnector()
	{
		$this->_connector = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\CustomerGroup $customerGroup
	 * @return \jtl\Connector\Model\ConnectorCustomerGroup
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
	 * @return \jtl\Connector\Model\ConnectorCustomerGroup
	 */
	public function clearCustomerGroup()
	{
		$this->_customerGroup = array();
		return $this;
	}
}

