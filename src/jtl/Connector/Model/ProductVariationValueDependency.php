<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * ToDo: Remove (deprecated).
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductVariationValueDependency extends DataModel
{
    /**
     * @type Identity 
     */
    protected $_id = null;

    /**
     * @type Identity 
     */
    protected $_productVariationValueId = null;

    /**
     * @type Identity 
     */
    protected $_productVariationValueTargetId = null;

    /**
	 * Nav [ProductVariationValueDependency » Many]
	 *
     * @type \jtl\Connector\Model\ProductVariationValue[]
     */
    protected $_productVariationValue = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_productVariationValueId',
		'_productVariationValueTargetId',
	);

	/**
	 * @param  Identity $id 
	 * @return \jtl\Connector\Model\ProductVariationValueDependency
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $productVariationValueId 
	 * @return \jtl\Connector\Model\ProductVariationValueDependency
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setProductVariationValueId(Identity $productVariationValueId)
	{
		
		$this->_productVariationValueId = $productVariationValueId;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getProductVariationValueId()
	{
		return $this->_productVariationValueId;
	}

	/**
	 * @param  Identity $productVariationValueTargetId 
	 * @return \jtl\Connector\Model\ProductVariationValueDependency
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setProductVariationValueTargetId(Identity $productVariationValueTargetId)
	{
		
		$this->_productVariationValueTargetId = $productVariationValueTargetId;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getProductVariationValueTargetId()
	{
		return $this->_productVariationValueTargetId;
	}

	/**
	 * @param  \jtl\Connector\Model\ProductVariationValue $productVariationValue
	 * @return \jtl\Connector\Model\ProductVariationValueDependency
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
	 * @return \jtl\Connector\Model\ProductVariationValueDependency
	 */
	public function clearProductVariationValue()
	{
		$this->_productVariationValue = array();
		return $this;
	}
}

