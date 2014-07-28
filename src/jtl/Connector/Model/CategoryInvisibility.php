<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Specifies which CustomerGroup is not permitted to view category..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CategoryInvisibility extends DataModel
{
    /**
     * @type Identity Reference to category to hide from customerGroupId
     */
    protected $_categoryId = null;

    /**
     * @type Identity Reference to customerGroup that is not allowed to view categoryId
     */
    protected $_customerGroupId = null;

    /**
     * @type integer 
     */
    protected $_connectorId = 0;

    /**
	 * Nav [CategoryInvisibility » Many]
	 *
     * @type \jtl\Connector\Model\Category[]
     */
    protected $_category = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_categoryId',
		'_customerGroupId',
	);

	/**
	 * @param  integer $connectorId 
	 * @return \jtl\Connector\Model\CategoryInvisibility
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
	 * @param  Identity $categoryId Reference to category to hide from customerGroupId
	 * @return \jtl\Connector\Model\CategoryInvisibility
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCategoryId(Identity $categoryId)
	{
		
		$this->_categoryId = $categoryId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to category to hide from customerGroupId
	 */
	public function getCategoryId()
	{
		return $this->_categoryId;
	}

	/**
	 * @param  Identity $customerGroupId Reference to customerGroup that is not allowed to view categoryId
	 * @return \jtl\Connector\Model\CategoryInvisibility
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCustomerGroupId(Identity $customerGroupId)
	{
		
		$this->_customerGroupId = $customerGroupId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to customerGroup that is not allowed to view categoryId
	 */
	public function getCustomerGroupId()
	{
		return $this->_customerGroupId;
	}

	/**
	 * @param  \jtl\Connector\Model\Category $category
	 * @return \jtl\Connector\Model\CategoryInvisibility
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
	 * @return \jtl\Connector\Model\CategoryInvisibility
	 */
	public function clearCategory()
	{
		$this->_category = array();
		return $this;
	}
}

