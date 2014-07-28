<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Specify product to hide from customerGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductInvisibility extends DataModel
{
    /**
     * @type Identity Reference to customerGroup
     */
    protected $_customerGroupId = null;

    /**
     * @type Identity Reference to product
     */
    protected $_productId = null;

    /**
     * @type integer 
     */
    protected $_connectorId = 0;

    /**
	 * Nav [ProductInvisibility » Many]
	 *
     * @type \jtl\Connector\Model\Product[]
     */
    protected $_product = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_productId',
		'_customerGroupId',
	);

	/**
	 * @param  integer $connectorId 
	 * @return \jtl\Connector\Model\ProductInvisibility
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
	 * @param  Identity $productId Reference to product
	 * @return \jtl\Connector\Model\ProductInvisibility
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
	 * @param  Identity $customerGroupId Reference to customerGroup
	 * @return \jtl\Connector\Model\ProductInvisibility
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
	 * @param  \jtl\Connector\Model\Product $product
	 * @return \jtl\Connector\Model\ProductInvisibility
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
	 * @return \jtl\Connector\Model\ProductInvisibility
	 */
	public function clearProduct()
	{
		$this->_product = array();
		return $this;
	}
}

