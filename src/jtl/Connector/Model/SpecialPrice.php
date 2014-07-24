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
class SpecialPrice extends DataModel
{
    /**
     * @type Identity 
     */
    protected $_customerGroupId = null;

    /**
     * @type Identity 
     */
    protected $_productSpecialPriceId = null;

    /**
     * @type integer 
     */
    protected $_connectorId = 0;

    /**
     * @type float 
     */
    protected $_priceNet = 0.0;

    /**
	 * Nav [SpecialPrice » Many]
	 *
     * @type \jtl\Connector\Model\ProductSpecialPrice[]
     */
    protected $_productSpecialPrice = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_productSpecialPriceId',
		'_customerGroupId',
	);

	/**
	 * @param  integer $connectorId 
	 * @return \jtl\Connector\Model\SpecialPrice
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
	 * @param  Identity $productSpecialPriceId 
	 * @return \jtl\Connector\Model\SpecialPrice
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setProductSpecialPriceId(Identity $productSpecialPriceId)
	{
		
		$this->_productSpecialPriceId = $productSpecialPriceId;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getProductSpecialPriceId()
	{
		return $this->_productSpecialPriceId;
	}

	/**
	 * @param  Identity $customerGroupId 
	 * @return \jtl\Connector\Model\SpecialPrice
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
	 * @param  float $priceNet 
	 * @return \jtl\Connector\Model\SpecialPrice
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setPriceNet($priceNet)
	{
		if (!is_float($priceNet))
			throw new InvalidArgumentException('float expected.');
		$this->_priceNet = $priceNet;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getPriceNet()
	{
		return $this->_priceNet;
	}

	/**
	 * @param  \jtl\Connector\Model\ProductSpecialPrice $productSpecialPrice
	 * @return \jtl\Connector\Model\SpecialPrice
	 */
	public function addProductSpecialPrice(\jtl\Connector\Model\ProductSpecialPrice $productSpecialPrice)
	{
		$this->_productSpecialPrice[] = $productSpecialPrice;
		return $this;
	}
	
	/**
	 * @return ProductSpecialPrice
	 */
	public function getProductSpecialPrice()
	{
		return $this->_productSpecialPrice;
	}

	/**
	 * @return \jtl\Connector\Model\SpecialPrice
	 */
	public function clearProductSpecialPrice()
	{
		$this->_productSpecialPrice = array();
		return $this;
	}
}

