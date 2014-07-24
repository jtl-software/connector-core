<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Extra charge for productVariationValue per customerGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductVariationValueExtraCharge extends DataModel
{
    /**
     * @type Identity Reference to customerGroup
     */
    protected $_customerGroupId = null;

    /**
     * @type Identity Reference to productVariationValue
     */
    protected $_productVariationValueId = null;

    /**
     * @type integer 
     */
    protected $_connectorId = 0;

    /**
     * @type float Extra charge (net)
     */
    protected $_extraChargeNet = 0.0;

    /**
	 * Nav [ProductVariationValueExtraCharge » Many]
	 *
     * @type \jtl\Connector\Model\ProductVariationValue[]
     */
    protected $_productVariationValue = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_productVariationValueId',
		'_customerGroupId',
	);

	/**
	 * @param  integer $connectorId 
	 * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
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
	 * @param  float $extraChargeNet Extra charge (net)
	 * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setExtraChargeNet($extraChargeNet)
	{
		if (!is_float($extraChargeNet))
			throw new InvalidArgumentException('float expected.');
		$this->_extraChargeNet = $extraChargeNet;
		return $this;
	}
	
	/**
	 * @return float Extra charge (net)
	 */
	public function getExtraChargeNet()
	{
		return $this->_extraChargeNet;
	}

	/**
	 * @param  Identity $productVariationValueId Reference to productVariationValue
	 * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setProductVariationValueId(Identity $productVariationValueId)
	{
		
		$this->_productVariationValueId = $productVariationValueId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to productVariationValue
	 */
	public function getProductVariationValueId()
	{
		return $this->_productVariationValueId;
	}

	/**
	 * @param  Identity $customerGroupId Reference to customerGroup
	 * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
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
	 * @param  \jtl\Connector\Model\ProductVariationValue $productVariationValue
	 * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
	 */
	public function addProductVariationValue(\jtl\Connector\Model\ProductVariationValue $productVariationValue)
	{
		$this->_productVariationValue[] = $productVariationValue;
		return $this;
	}
	
	/**
	 * @return ProductVariationValue
	 */
	public function getProductVariationValue()
	{
		return $this->_productVariationValue;
	}

	/**
	 * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
	 */
	public function clearProductVariationValue()
	{
		$this->_productVariationValue = array();
		return $this;
	}
}

