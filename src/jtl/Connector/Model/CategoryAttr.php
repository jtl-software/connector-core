<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Localized category attribute.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CategoryAttr extends DataModel
{
    /**
     * @type Identity Reference to category
     */
    protected $_categoryId = null;

    /**
     * @type Identity Unique categoryAttr id
     */
    protected $_id = null;

    /**
     * @type string 
     */
    protected $_name = '';

    /**
     * @type string 
     */
    protected $_value = '';

    /**
	 * Nav [CategoryAttr » Many]
	 *
     * @type \jtl\Connector\Model\Category[]
     */
    protected $_category = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_categoryId',
	);

	/**
	 * @param  string $name 
	 * @return \jtl\Connector\Model\CategoryAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setName($name)
	{
		if (!is_string($name))
			throw new InvalidArgumentException('string expected.');
		$this->_name = $name;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  string $value 
	 * @return \jtl\Connector\Model\CategoryAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setValue($value)
	{
		if (!is_string($value))
			throw new InvalidArgumentException('string expected.');
		$this->_value = $value;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getValue()
	{
		return $this->_value;
	}

	/**
	 * @param  Identity $id Unique categoryAttr id
	 * @return \jtl\Connector\Model\CategoryAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique categoryAttr id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $categoryId Reference to category
	 * @return \jtl\Connector\Model\CategoryAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCategoryId(Identity $categoryId)
	{
		
		$this->_categoryId = $categoryId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to category
	 */
	public function getCategoryId()
	{
		return $this->_categoryId;
	}

	/**
	 * @param  \jtl\Connector\Model\Category $category
	 * @return \jtl\Connector\Model\CategoryAttr
	 */
	public function addCategory(\jtl\Connector\Model\Category $category)
	{
		$this->_category[] = $category;
		return $this;
	}
	
	/**
	 * @return Category
	 */
	public function getCategory()
	{
		return $this->_category;
	}

	/**
	 * @return \jtl\Connector\Model\CategoryAttr
	 */
	public function clearCategory()
	{
		$this->_category = array();
		return $this;
	}
}

