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
class ConnectorLog extends DataModel
{
    /**
     * @type Identity 
     */
    protected $_id = null;

    /**
     * @type integer 
     */
    protected $_connectorId = 0;

    /**
     * @type DateTime 
     */
    protected $_date = null;

    /**
     * @type string 
     */
    protected $_message = '';

    /**
	 * Nav [ConnectorLog » Many]
	 *
     * @type \jtl\Connector\Model\Connector[]
     */
    protected $_connector = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
	);

	/**
	 * @param  integer $connectorId 
	 * @return \jtl\Connector\Model\ConnectorLog
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
	 * @param  string $message 
	 * @return \jtl\Connector\Model\ConnectorLog
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setMessage($message)
	{
		if (!is_string($message))
			throw new InvalidArgumentException('string expected.');
		$this->_message = $message;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getMessage()
	{
		return $this->_message;
	}

	/**
	 * @param  DateTime $date 
	 * @return \jtl\Connector\Model\ConnectorLog
	 * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
	 */
	public function setDate(DateTime $date)
	{
		
		$this->_date = $date;
		return $this;
	}
	
	/**
	 * @return DateTime 
	 */
	public function getDate()
	{
		return $this->_date;
	}

	/**
	 * @param  Identity $id 
	 * @return \jtl\Connector\Model\ConnectorLog
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  \jtl\Connector\Model\Connector $connector
	 * @return \jtl\Connector\Model\ConnectorLog
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
	 * @return \jtl\Connector\Model\ConnectorLog
	 */
	public function clearConnector()
	{
		$this->_connector = array();
		return $this;
	}
}

