<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Product-ConfigGroup Assignment..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductConfigGroup extends DataModel
{
    /**
     * @type Identity Reference to configGroup
     */
    protected $_configGroupId = null;

    /**
     * @type Identity Unique productConfigGroup id
     */
    protected $_id = null;

    /**
     * @type Identity Reference to product
     */
    protected $_productId = null;

    /**
     * @type integer Optional sort number
     */
    protected $_sort = 0;

    /**
	 * Nav [ProductConfigGroup » Many]
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
		'_configGroupId',
	);

	/**
	 * @param  integer $sort Optional sort number
	 * @return \jtl\Connector\Model\ProductConfigGroup
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
	 * @return integer Optional sort number
	 */
	public function getSort()
	{
		return $this->_sort;
	}

	/**
	 * @param  Identity $id Unique productConfigGroup id
	 * @return \jtl\Connector\Model\ProductConfigGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique productConfigGroup id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $productId Reference to product
	 * @return \jtl\Connector\Model\ProductConfigGroup
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
	 * @param  Identity $configGroupId Reference to configGroup
	 * @return \jtl\Connector\Model\ProductConfigGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setConfigGroupId(Identity $configGroupId)
	{
		
		$this->_configGroupId = $configGroupId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to configGroup
	 */
	public function getConfigGroupId()
	{
		return $this->_configGroupId;
	}

	/**
	 * @param  \jtl\Connector\Model\Product $product
	 * @return \jtl\Connector\Model\ProductConfigGroup
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
	 * @return \jtl\Connector\Model\ProductConfigGroup
	 */
	public function clearProduct()
	{
		$this->_product = array();
		return $this;
	}
}

