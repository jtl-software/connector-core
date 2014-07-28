<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * A category with sort number, link to parent category and level.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Category extends DataModel
{
    /**
     * @type Identity Unique category id
     */
    protected $_id = null;

    /**
     * @type Identity Optional reference to parent category id
     */
    protected $_parentCategoryId = null;

    /**
     * @type string 
     */
    protected $_description = '';

    /**
     * @type boolean 
     */
    protected $_flagDelete = false;

    /**
     * @type boolean 
     */
    protected $_flagUpdate = false;

    /**
     * @type boolean 
     */
    protected $_isActive = false;

    /**
     * @type string 
     */
    protected $_name = '';

    /**
     * @type integer|null Optional sort order number
     */
    protected $_sort = 0;

    /**
     * @type string 
     */
    protected $_url = '';

    /**
	 * Nav [ParentCategory » ZeroOrOne]
	 *
     * @type \jtl\Connector\Model\Category[]
     */
    protected $_childCategories = array();

    /**
	 * Nav [ChildCategory » Many]
	 *
     * @type \jtl\Connector\Model\Category[]
     */
    protected $_parentCategory = array();

    /**
	 * Nav [Category » One]
	 *
     * @type \jtl\Connector\Model\CategoryI18n[]
     */
    protected $_i18ns = array();

    /**
	 * Nav [Category » One]
	 *
     * @type \jtl\Connector\Model\CategoryInvisibility[]
     */
    protected $_invisibilities = array();

    /**
	 * Nav [Category » One]
	 *
     * @type \jtl\Connector\Model\CategoryCustomerGroup[]
     */
    protected $_customerGroups = array();

    /**
	 * Nav [Category » One]
	 *
     * @type \jtl\Connector\Model\CategoryAttr[]
     */
    protected $_attrs = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_parentCategoryId',
	);

	/**
	 * @param  string $name 
	 * @return \jtl\Connector\Model\Category
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
	 * @param  string $description 
	 * @return \jtl\Connector\Model\Category
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setDescription($description)
	{
		if (!is_string($description))
			throw new InvalidArgumentException('string expected.');
		$this->_description = $description;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getDescription()
	{
		return $this->_description;
	}

	/**
	 * @param  integer $sort Optional sort order number
	 * @return \jtl\Connector\Model\Category
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
	 * @return integer Optional sort order number
	 */
	public function getSort()
	{
		return $this->_sort;
	}

	/**
	 * @param  string $url 
	 * @return \jtl\Connector\Model\Category
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setUrl($url)
	{
		if (!is_string($url))
			throw new InvalidArgumentException('string expected.');
		$this->_url = $url;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getUrl()
	{
		return $this->_url;
	}

	/**
	 * @param  Identity $id Unique category id
	 * @return \jtl\Connector\Model\Category
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique category id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $parentCategoryId Optional reference to parent category id
	 * @return \jtl\Connector\Model\Category
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setParentCategoryId(Identity $parentCategoryId)
	{
		
		$this->_parentCategoryId = $parentCategoryId;
		return $this;
	}
	
	/**
	 * @return Identity Optional reference to parent category id
	 */
	public function getParentCategoryId()
	{
		return $this->_parentCategoryId;
	}

	/**
	 * @param  boolean $flagUpdate 
	 * @return \jtl\Connector\Model\Category
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

	/**
	 * @param  boolean $isActive 
	 * @return \jtl\Connector\Model\Category
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setIsActive($isActive)
	{
		if (!is_bool($isActive))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isActive = $isActive;
		return $this;
	}
	
	/**
	 * @return boolean 
	 */
	public function getIsActive()
	{
		return $this->_isActive;
	}

	/**
	 * @param  boolean $flagDelete 
	 * @return \jtl\Connector\Model\Category
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
	 * @param  \jtl\Connector\Model\Category $childCategory
	 * @return \jtl\Connector\Model\Category
	 */
	public function addChildCategory(\jtl\Connector\Model\Category $childCategory)
	{
		$this->_childCategories[] = $childCategory;
		return $this;
	}
	
	/**
	 * @return Category
	 */
	public function getChildCategories()
	{
		return $this->_childCategories;
	}

	/**
	 * @return \jtl\Connector\Model\Category
	 */
	public function clearChildCategories()
	{
		$this->_childCategories = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\Category $parentCategory
	 * @return \jtl\Connector\Model\Category
	 */
	public function addParentCategory(\jtl\Connector\Model\Category $parentCategory)
	{
		$this->_parentCategory[] = $parentCategory;
		return $this;
	}
	
	/**
	 * @return Category
	 */
	public function getParentCategory()
	{
		return $this->_parentCategory;
	}

	/**
	 * @return \jtl\Connector\Model\Category
	 */
	public function clearParentCategory()
	{
		$this->_parentCategory = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\CategoryI18n $i18ns
	 * @return \jtl\Connector\Model\Category
	 */
	public function addI18ns(\jtl\Connector\Model\CategoryI18n $i18ns)
	{
		$this->_i18ns[] = $i18ns;
		return $this;
	}
	
	/**
	 * @return CategoryI18n
	 */
	public function getI18ns()
	{
		return $this->_i18ns;
	}

	/**
	 * @return \jtl\Connector\Model\Category
	 */
	public function clearI18ns()
	{
		$this->_i18ns = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\CategoryInvisibility $invisibility
	 * @return \jtl\Connector\Model\Category
	 */
	public function addInvisibility(\jtl\Connector\Model\CategoryInvisibility $invisibility)
	{
		$this->_invisibilities[] = $invisibility;
		return $this;
	}
	
	/**
	 * @return CategoryInvisibility
	 */
	public function getInvisibilities()
	{
		return $this->_invisibilities;
	}

	/**
	 * @return \jtl\Connector\Model\Category
	 */
	public function clearInvisibilities()
	{
		$this->_invisibilities = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\CategoryCustomerGroup $customerGroup
	 * @return \jtl\Connector\Model\Category
	 */
	public function addCustomerGroup(\jtl\Connector\Model\CategoryCustomerGroup $customerGroup)
	{
		$this->_customerGroups[] = $customerGroup;
		return $this;
	}
	
	/**
	 * @return CategoryCustomerGroup
	 */
	public function getCustomerGroups()
	{
		return $this->_customerGroups;
	}

	/**
	 * @return \jtl\Connector\Model\Category
	 */
	public function clearCustomerGroups()
	{
		$this->_customerGroups = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\CategoryAttr $attr
	 * @return \jtl\Connector\Model\Category
	 */
	public function addAttr(\jtl\Connector\Model\CategoryAttr $attr)
	{
		$this->_attrs[] = $attr;
		return $this;
	}
	
	/**
	 * @return CategoryAttr
	 */
	public function getAttrs()
	{
		return $this->_attrs;
	}

	/**
	 * @return \jtl\Connector\Model\Category
	 */
	public function clearAttrs()
	{
		$this->_attrs = array();
		return $this;
	}
}

