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
class ProductPrice extends DataModel
{
    /**
     * @type Identity 
     */
    protected $_customerGroupId = null;

    /**
     * @type Identity 
     */
    protected $_productId = null;

    /**
     * @type float 
     */
    protected $_netPrice = 0.0;

    /**
     * @type integer 
     */
    protected $_quantity = 0;


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_customerGroupId',
		'_productId',
	);

	/**
	 * @param  Identity $customerGroupId 
	 * @return \jtl\Connector\Model\ProductPrice
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCustomerGroupId(Identity $customerGroupId)
	{
		
		$this->_customerGroupId = $customerGroupId;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getCustomerGroupId()
	{
		return $this->_customerGroupId;
	}

	/**
	 * @param  Identity $productId 
	 * @return \jtl\Connector\Model\ProductPrice
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setProductId(Identity $productId)
	{
		
		$this->_productId = $productId;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getProductId()
	{
		return $this->_productId;
	}

	/**
	 * @param  float $netPrice 
	 * @return \jtl\Connector\Model\ProductPrice
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setNetPrice($netPrice)
	{
		if (!is_float($netPrice))
			throw new InvalidArgumentException('float expected.');
		$this->_netPrice = $netPrice;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getNetPrice()
	{
		return $this->_netPrice;
	}

	/**
	 * @param  integer $quantity 
	 * @return \jtl\Connector\Model\ProductPrice
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setQuantity($quantity)
	{
		if (!is_integer($quantity))
			throw new InvalidArgumentException('integer expected.');
		$this->_quantity = $quantity;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getQuantity()
	{
		return $this->_quantity;
	}
}

