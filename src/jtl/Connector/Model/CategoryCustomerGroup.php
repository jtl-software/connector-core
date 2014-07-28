<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Link customergroup with category. Set optional discount on category for customergroup. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CategoryCustomerGroup extends DataModel
{
    /**
     * @type Identity Reference to category
     */
    protected $_categoryId = null;

    /**
     * @type Identity Reference to customerGroup
     */
    protected $_customerGroupId = null;

    /**
     * @type integer 
     */
    protected $_connectorId = 0;

    /**
     * @type float|null Optional discount on products in specified categoryId for  customerGroupId
     */
    protected $_discount = 0.0;

    /**
	 * Nav [CategoryCustomerGroup » Many]
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
	 * @return \jtl\Connector\Model\CategoryCustomerGroup
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
	 * @param  float $discount Optional discount on products in specified categoryId for  customerGroupId
	 * @return \jtl\Connector\Model\CategoryCustomerGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setDiscount($discount)
	{
		if (!is_float($discount))
			throw new InvalidArgumentException('float expected.');
		$this->_discount = $discount;
		return $this;
	}
	
	/**
	 * @return float Optional discount on products in specified categoryId for  customerGroupId
	 */
	public function getDiscount()
	{
		return $this->_discount;
	}

	/**
	 * @param  Identity $categoryId Reference to category
	 * @return \jtl\Connector\Model\CategoryCustomerGroup
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
	 * @param  Identity $customerGroupId Reference to customerGroup
	 * @return \jtl\Connector\Model\CategoryCustomerGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCustomerGroupId(Identity $customerGroupId)
	{
		
		$this->_customerGroupId = $customerGroupId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to customerGroup
	 */
	public function getCustomerGroupId()
	{
		return $this->_customerGroupId;
	}

	/**
	 * @param  \jtl\Connector\Model\Category $category
	 * @return \jtl\Connector\Model\CategoryCustomerGroup
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
	 * @return \jtl\Connector\Model\CategoryCustomerGroup
	 */
	public function clearCategory()
	{
		$this->_category = array();
		return $this;
	}
}

