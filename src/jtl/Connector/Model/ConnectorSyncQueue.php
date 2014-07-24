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
class ConnectorSyncQueue extends DataModel
{
    /**
     * @type Byte[] 
     */
    protected $_action = null;

    /**
     * @type integer 
     */
    protected $_connectorId = 0;

    /**
     * @type integer 
     */
    protected $_key = 0;

    /**
     * @type integer 
     */
    protected $_queueId = 0;

    /**
     * @type integer 
     */
    protected $_tryCount = 0;

    /**
     * @type integer 
     */
    protected $_type = 0;

    /**
	 * Nav [ConnectorSyncQueue » Many]
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
	 * @param  integer $queueId 
	 * @return \jtl\Connector\Model\ConnectorSyncQueue
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setQueueId($queueId)
	{
		if (!is_integer($queueId))
			throw new InvalidArgumentException('integer expected.');
		$this->_queueId = $queueId;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getQueueId()
	{
		return $this->_queueId;
	}

	/**
	 * @param  integer $connectorId 
	 * @return \jtl\Connector\Model\ConnectorSyncQueue
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
	 * @param  integer $key 
	 * @return \jtl\Connector\Model\ConnectorSyncQueue
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setKey($key)
	{
		if (!is_integer($key))
			throw new InvalidArgumentException('integer expected.');
		$this->_key = $key;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getKey()
	{
		return $this->_key;
	}

	/**
	 * @param  integer $type 
	 * @return \jtl\Connector\Model\ConnectorSyncQueue
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
	 * @param  integer $tryCount 
	 * @return \jtl\Connector\Model\ConnectorSyncQueue
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setTryCount($tryCount)
	{
		if (!is_integer($tryCount))
			throw new InvalidArgumentException('integer expected.');
		$this->_tryCount = $tryCount;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getTryCount()
	{
		return $this->_tryCount;
	}

	/**
	 * @param  Byte[] $action 
	 * @return \jtl\Connector\Model\ConnectorSyncQueue
	 * @throws InvalidArgumentException if the provided argument is not of type 'Byte[]'.
	 */
	public function setAction(Byte[] $action)
	{
		
		$this->_action = $action;
		return $this;
	}
	
	/**
	 * @return Byte[] 
	 */
	public function getAction()
	{
		return $this->_action;
	}

	/**
	 * @param  \jtl\Connector\Model\Connector $connector
	 * @return \jtl\Connector\Model\ConnectorSyncQueue
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
	 * @return \jtl\Connector\Model\ConnectorSyncQueue
	 */
	public function clearConnector()
	{
		$this->_connector = array();
		return $this;
	}
}

