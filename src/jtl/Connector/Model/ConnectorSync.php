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
class ConnectorSync extends DataModel
{
    /**
     * @type Byte[] 
     */
    protected $_action = null;

    /**
     * @type integer 
     */
    protected $_key = 0;

    /**
     * @type integer 
     */
    protected $_syncId = 0;

    /**
     * @type integer 
     */
    protected $_type = 0;


	/**
	 * @type array
	 */
	protected $_identities = array(
	);

	/**
	 * @param  integer $syncId 
	 * @return \jtl\Connector\Model\ConnectorSync
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setSyncId($syncId)
	{
		if (!is_integer($syncId))
			throw new InvalidArgumentException('integer expected.');
		$this->_syncId = $syncId;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getSyncId()
	{
		return $this->_syncId;
	}

	/**
	 * @param  integer $key 
	 * @return \jtl\Connector\Model\ConnectorSync
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
	 * @return \jtl\Connector\Model\ConnectorSync
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
	 * @param  Byte[] $action 
	 * @return \jtl\Connector\Model\ConnectorSync
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
}

