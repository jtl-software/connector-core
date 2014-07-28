<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Product-Category Allocation..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Product2Category extends DataModel
{
    /**
     * @type Identity Reference to category
     */
    protected $_categoryId = null;

    /**
     * @type Identity Unique product2Category id
     */
    protected $_id = null;

    /**
     * @type Identity Reference to product
     */
    protected $_productId = null;

    /**
	 * Nav [Product2Category » Many]
	 *
     * @type \jtl\Connector\Model\Product[]
     */
    protected $_product = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_productId',
		'_categoryId',
	);

	/**
	 * @param  Identity $id Unique product2Category id
	 * @return \jtl\Connector\Model\Product2Category
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique product2Category id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $productId Reference to product
	 * @return \jtl\Connector\Model\Product2Category
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setProductId(Identity $productId)
	{
		
		$this->_productId = $productId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to product
	 */
	public function getProductId()
	{
		return $this->_productId;
	}

	/**
	 * @param  Identity $categoryId Reference to category
	 * @return \jtl\Connector\Model\Product2Category
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
	 * @param  \jtl\Connector\Model\Product $product
	 * @return \jtl\Connector\Model\Product2Category
	 */
	public function addProduct(\jtl\Connector\Model\Product $product)
	{
		$this->_product[] = $product;
		return $this;
	}
	
	/**
	 * @return Product
	 */
	public function getProduct()
	{
		return $this->_product;
	}

	/**
	 * @return \jtl\Connector\Model\Product2Category
	 */
	public function clearProduct()
	{
		$this->_product = array();
		return $this;
	}
}

