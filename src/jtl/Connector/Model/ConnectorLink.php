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
class ConnectorLink extends DataModel
{
    /**
     * @type integer 
     */
    protected $_connectorId = 0;

    /**
     * @type string 
     */
    protected $_endpointId = '';

    /**
     * @type integer 
     */
    protected $_id = 0;

    /**
     * @type integer 
     */
    protected $_type = 0;

    /**
     * @type integer 
     */
    protected $_wawiId = 0;

    /**
     * @type integer|null 
     */
    protected $_wawiId2 = 0;

    /**
     * @type integer|null 
     */
    protected $_wawiId3 = 0;

    /**
     * @type integer|null 
     */
    protected $_wawiId4 = 0;

    /**
	 * Nav [ConnectorLink » Many]
	 *
     * @type \jtl\Connector\Model\Connector[]
     */
    protected $_connector = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
	);

	/**
	 * @param  integer $connectorId 
	 * @return \jtl\Connector\Model\ConnectorLink
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
	 * @param  integer $type 
	 * @return \jtl\Connector\Model\ConnectorLink
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
	 * @return integer 
	 */
	public function getType()
	{
		return $this->_type;
	}

	/**
	 * @param  string $endpointId 
	 * @return \jtl\Connector\Model\ConnectorLink
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setEndpointId($endpointId)
	{
		if (!is_string($endpointId))
			throw new InvalidArgumentException('string expected.');
		$this->_endpointId = $endpointId;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getEndpointId()
	{
		return $this->_endpointId;
	}

	/**
	 * @param  integer $id 
	 * @return \jtl\Connector\Model\ConnectorLink
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setId($id)
	{
		if (!is_integer($id))
			throw new InvalidArgumentException('integer expected.');
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  integer $wawiId 
	 * @return \jtl\Connector\Model\ConnectorLink
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setWawiId($wawiId)
	{
		if (!is_integer($wawiId))
			throw new InvalidArgumentException('integer expected.');
		$this->_wawiId = $wawiId;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getWawiId()
	{
		return $this->_wawiId;
	}

	/**
	 * @param  integer $wawiId2 
	 * @return \jtl\Connector\Model\ConnectorLink
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setWawiId2($wawiId2)
	{
		if (!is_integer($wawiId2))
			throw new InvalidArgumentException('integer expected.');
		$this->_wawiId2 = $wawiId2;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getWawiId2()
	{
		return $this->_wawiId2;
	}

	/**
	 * @param  integer $wawiId3 
	 * @return \jtl\Connector\Model\ConnectorLink
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setWawiId3($wawiId3)
	{
		if (!is_integer($wawiId3))
			throw new InvalidArgumentException('integer expected.');
		$this->_wawiId3 = $wawiId3;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getWawiId3()
	{
		return $this->_wawiId3;
	}

	/**
	 * @param  integer $wawiId4 
	 * @return \jtl\Connector\Model\ConnectorLink
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setWawiId4($wawiId4)
	{
		if (!is_integer($wawiId4))
			throw new InvalidArgumentException('integer expected.');
		$this->_wawiId4 = $wawiId4;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getWawiId4()
	{
		return $this->_wawiId4;
	}

	/**
	 * @param  \jtl\Connector\Model\Connector $connector
	 * @return \jtl\Connector\Model\ConnectorLink
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
	 * @return \jtl\Connector\Model\ConnectorLink
	 */
	public function clearConnector()
	{
		$this->_connector = array();
		return $this;
	}
}

