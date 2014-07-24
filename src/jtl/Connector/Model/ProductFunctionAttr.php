<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Monolingual product function attribute..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductFunctionAttr extends DataModel
{
    /**
     * @type Identity Unique productFunctionAttr id
     */
    protected $_id = null;

    /**
     * @type Identity Reference to product
     */
    protected $_productId = null;

    /**
     * @type string Attribute key
     */
    protected $_key = '';

    /**
     * @type string Attribute value
     */
    protected $_value = '';

    /**
	 * Nav [ProductFunctionAttr » Many]
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
	);

	/**
	 * @param  string $key Attribute key
	 * @return \jtl\Connector\Model\ProductFunctionAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setKey($key)
	{
		if (!is_string($key))
			throw new InvalidArgumentException('string expected.');
		$this->_key = $key;
		return $this;
	}
	
	/**
	 * @return string Attribute key
	 */
	public function getKey()
	{
		return $this->_key;
	}

	/**
	 * @param  string $value Attribute value
	 * @return \jtl\Connector\Model\ProductFunctionAttr
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
	 * @return string Attribute value
	 */
	public function getValue()
	{
		return $this->_value;
	}

	/**
	 * @param  Identity $id Unique productFunctionAttr id
	 * @return \jtl\Connector\Model\ProductFunctionAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique productFunctionAttr id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $productId Reference to product
	 * @return \jtl\Connector\Model\ProductFunctionAttr
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
	 * @param  \jtl\Connector\Model\Product $product
	 * @return \jtl\Connector\Model\ProductFunctionAttr
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
	 * @return \jtl\Connector\Model\ProductFunctionAttr
	 */
	public function clearProduct()
	{
		$this->_product = array();
		return $this;
	}
}

