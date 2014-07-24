<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * customer order item variation.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerOrderItemVariation extends DataModel
{
    /**
     * @type Identity Reference to customerOrderItem
     */
    protected $_customerOrderItemId = null;

    /**
     * @type Identity Unique customerOrderItemVariation id
     */
    protected $_id = null;

    /**
     * @type Identity 
     */
    protected $_productId = null;

    /**
     * @type Identity Reference to productVariation
     */
    protected $_productVariationId = null;

    /**
     * @type Identity Reference to productVariationValue
     */
    protected $_productVariationValueId = null;

    /**
     * @type string Variation name e.g. "color"
     */
    protected $_productVariationName = '';

    /**
     * @type string Variation value e.g. "red"
     */
    protected $_productVariationValueName = '';

    /**
     * @type float|null Optional extra surcharge (added to item price)
     */
    protected $_surcharge = 0.0;


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_productVariationValueId',
		'_customerOrderItemId',
		'_productId',
		'_productVariationId',
	);

	/**
	 * @param  string $productVariationName Variation name e.g. "color"
	 * @return \jtl\Connector\Model\CustomerOrderItemVariation
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setProductVariationName($productVariationName)
	{
		if (!is_string($productVariationName))
			throw new InvalidArgumentException('string expected.');
		$this->_productVariationName = $productVariationName;
		return $this;
	}
	
	/**
	 * @return string Variation name e.g. "color"
	 */
	public function getProductVariationName()
	{
		return $this->_productVariationName;
	}

	/**
	 * @param  string $productVariationValueName Variation value e.g. "red"
	 * @return \jtl\Connector\Model\CustomerOrderItemVariation
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setProductVariationValueName($productVariationValueName)
	{
		if (!is_string($productVariationValueName))
			throw new InvalidArgumentException('string expected.');
		$this->_productVariationValueName = $productVariationValueName;
		return $this;
	}
	
	/**
	 * @return string Variation value e.g. "red"
	 */
	public function getProductVariationValueName()
	{
		return $this->_productVariationValueName;
	}

	/**
	 * @param  float $surcharge Optional extra surcharge (added to item price)
	 * @return \jtl\Connector\Model\CustomerOrderItemVariation
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setSurcharge($surcharge)
	{
		if (!is_float($surcharge))
			throw new InvalidArgumentException('float expected.');
		$this->_surcharge = $surcharge;
		return $this;
	}
	
	/**
	 * @return float Optional extra surcharge (added to item price)
	 */
	public function getSurcharge()
	{
		return $this->_surcharge;
	}

	/**
	 * @param  Identity $id Unique customerOrderItemVariation id
	 * @return \jtl\Connector\Model\CustomerOrderItemVariation
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique customerOrderItemVariation id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $productVariationValueId Reference to productVariationValue
	 * @return \jtl\Connector\Model\CustomerOrderItemVariation
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
	 * @param  Identity $customerOrderItemId Reference to customerOrderItem
	 * @return \jtl\Connector\Model\CustomerOrderItemVariation
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCustomerOrderItemId(Identity $customerOrderItemId)
	{
		
		$this->_customerOrderItemId = $customerOrderItemId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to customerOrderItem
	 */
	public function getCustomerOrderItemId()
	{
		return $this->_customerOrderItemId;
	}

	/**
	 * @param  Identity $productId 
	 * @return \jtl\Connector\Model\CustomerOrderItemVariation
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
	 * @param  Identity $productVariationId Reference to productVariation
	 * @return \jtl\Connector\Model\CustomerOrderItemVariation
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
}

