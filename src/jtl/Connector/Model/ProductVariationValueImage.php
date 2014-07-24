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
class ProductVariationValueImage extends DataModel
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
     * @type Byte[] 
     */
    protected $_data = null;

    /**
     * @type boolean 
     */
    protected $_flagDelete = false;

    /**
     * @type boolean 
     */
    protected $_flagUpdate = false;

    /**
     * @type string 
     */
    protected $_modified = '';

    /**
     * @type integer|null 
     */
    protected $_size = 0;


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_foreignKey',
	);

	/**
	 * @param  Byte[] $data 
	 * @return \jtl\Connector\Model\ProductVariationValueImage
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
	 * @return \jtl\Connector\Model\ProductVariationValueImage
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
	 * @param  string $modified 
	 * @return \jtl\Connector\Model\ProductVariationValueImage
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setModified($modified)
	{
		if (!is_string($modified))
			throw new InvalidArgumentException('string expected.');
		$this->_modified = $modified;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getModified()
	{
		return $this->_modified;
	}

	/**
	 * @param  Identity $id 
	 * @return \jtl\Connector\Model\ProductVariationValueImage
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
	 * @return \jtl\Connector\Model\ProductVariationValueImage
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
	 * @param  boolean $flagDelete 
	 * @return \jtl\Connector\Model\ProductVariationValueImage
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setFlagDelete($flagDelete)
	{
		if (!is_bool($flagDelete))
			throw new InvalidArgumentException('boolean expected.');
		$this->_flagDelete = $flagDelete;
		return $this;
	}
	
	/**
	 * @return boolean 
	 */
	public function getFlagDelete()
	{
		return $this->_flagDelete;
	}

	/**
	 * @param  boolean $flagUpdate 
	 * @return \jtl\Connector\Model\ProductVariationValueImage
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

