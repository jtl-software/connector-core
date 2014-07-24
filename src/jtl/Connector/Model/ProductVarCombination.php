<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Product to productVariationValue Allocation..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductVarCombination extends DataModel
{
    /**
     * @type Identity 
     */
    protected $_id = null;

    /**
     * @type Identity Reference to productVariation
     */
    protected $_productVariationId = null;

    /**
     * @type Identity Reference to productVariationValue
     */
    protected $_productVariationValueId = null;


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_productVariationId',
		'_productVariationValueId',
	);

	/**
	 * @param  Identity $id 
	 * @return \jtl\Connector\Model\ProductVarCombination
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
	 * @param  Identity $productVariationId Reference to productVariation
	 * @return \jtl\Connector\Model\ProductVarCombination
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
	 * @param  Identity $productVariationValueId Reference to productVariationValue
	 * @return \jtl\Connector\Model\ProductVarCombination
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
}

