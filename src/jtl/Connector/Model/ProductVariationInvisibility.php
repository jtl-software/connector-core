<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Specify productVariation to hide from customerGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductVariationInvisibility extends DataModel
{
    /**
     * @type Identity Reference to customerGroup
     */
    protected $_customerGroupId = null;

    /**
     * @type Identity Reference to productVariation
     */
    protected $_productVariationId = null;

    /**
     * @type integer 
     */
    protected $_connectorId = 0;

    /**
	 * Nav [ProductVariationInvisibility » Many]
	 *
     * @type \jtl\Connector\Model\ProductVariation[]
     */
    protected $_productVariation = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_productVariationId',
		'_customerGroupId',
	);

	/**
	 * @param  integer $connectorId 
	 * @return \jtl\Connector\Model\ProductVariationInvisibility
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
	 * @param  Identity $productVariationId Reference to productVariation
	 * @return \jtl\Connector\Model\ProductVariationInvisibility
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setProductVariationId(Identity $productVariationId)
	{
		
		$this->_productVariationId = $productVariationId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to productVariation
	 */
	public function getProductVariationId()
	{
		return $this->_productVariationId;
	}

	/**
	 * @param  Identity $customerGroupId Reference to customerGroup
	 * @return \jtl\Connector\Model\ProductVariationInvisibility
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
	 * @param  \jtl\Connector\Model\ProductVariation $productVariation
	 * @return \jtl\Connector\Model\ProductVariationInvisibility
	 */
	public function addProductVariation(\jtl\Connector\Model\ProductVariation $productVariation)
	{
		$this->_productVariation[] = $productVariation;
		return $this;
	}
	
	/**
	 * @return ProductVariation
	 */
	public function getProductVariation()
	{
		return $this->_productVariation;
	}

	/**
	 * @return \jtl\Connector\Model\ProductVariationInvisibility
	 */
	public function clearProductVariation()
	{
		$this->_productVariation = array();
		return $this;
	}
}

