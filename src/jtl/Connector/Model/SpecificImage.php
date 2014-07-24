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
class SpecificImage extends DataModel
{
    /**
     * @type Identity 
     */
    protected $_foreignKey = null;

    /**
     * @type Identity 
     */
    protected $_id = null;

    /**
     * @type integer|null 
     */
    protected $_connectorId = 0;

    /**
     * @type Byte[] 
     */
    protected $_data = null;

    /**
     * @type boolean 
     */
    protected $_flagUpdate = false;

    /**
     * @type integer|null 
     */
    protected $_size = 0;

    /**
     * @type integer|null 
     */
    protected $_sort = 0;


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_foreignKey',
	);

	/**
	 * @param  integer $connectorId 
	 * @return \jtl\Connector\Model\SpecificImage
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
	 * @param  Byte[] $data 
	 * @return \jtl\Connector\Model\SpecificImage
	 * @throws InvalidArgumentException if the provided argument is not of type 'Byte[]'.
	 */
	public function setData(Byte[] $data)
	{
		
		$this->_data = $data;
		return $this;
	}
	
	/**
	 * @return Byte[] 
	 */
	public function getData()
	{
		return $this->_data;
	}

	/**
	 * @param  integer $size 
	 * @return \jtl\Connector\Model\SpecificImage
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setSize($size)
	{
		if (!is_integer($size))
			throw new InvalidArgumentException('integer expected.');
		$this->_size = $size;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getSize()
	{
		return $this->_size;
	}

	/**
	 * @param  integer $sort 
	 * @return \jtl\Connector\Model\SpecificImage
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setSort($sort)
	{
		if (!is_integer($sort))
			throw new InvalidArgumentException('integer expected.');
		$this->_sort = $sort;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getSort()
	{
		return $this->_sort;
	}

	/**
	 * @param  Identity $id 
	 * @return \jtl\Connector\Model\SpecificImage
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
	 * @param  Identity $foreignKey 
	 * @return \jtl\Connector\Model\SpecificImage
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setForeignKey(Identity $foreignKey)
	{
		
		$this->_foreignKey = $foreignKey;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getForeignKey()
	{
		return $this->_foreignKey;
	}

	/**
	 * @param  boolean $flagUpdate 
	 * @return \jtl\Connector\Model\SpecificImage
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setFlagUpdate($flagUpdate)
	{
		if (!is_bool($flagUpdate))
			throw new InvalidArgumentException('boolean expected.');
		$this->_flagUpdate = $flagUpdate;
		return $this;
	}
	
	/**
	 * @return boolean 
	 */
	public function getFlagUpdate()
	{
		return $this->_flagUpdate;
	}
}

