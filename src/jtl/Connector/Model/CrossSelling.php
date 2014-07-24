<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Link 2 products that are in a common crossSellingGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CrossSelling extends DataModel
{
    /**
     * @type Identity Reference to crossSellingGroup
     */
    protected $_crossSellingGroupId = null;

    /**
     * @type Identity Reference to product (main product)
     */
    protected $_crossSellingProductId = null;

    /**
     * @type Identity Unique crossSelling id
     */
    protected $_id = null;

    /**
     * @type Identity Reference to product (cross selling product)
     */
    protected $_productId = null;

    /**
	 * Nav [CrossSelling » Many]
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
		'_crossSellingProductId',
		'_crossSellingGroupId',
	);

	/**
	 * @param  Identity $id Unique crossSelling id
	 * @return \jtl\Connector\Model\CrossSelling
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique crossSelling id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $productId Reference to product (cross selling product)
	 * @return \jtl\Connector\Model\CrossSelling
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setProductId(Identity $productId)
	{
		
		$this->_productId = $productId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to product (cross selling product)
	 */
	public function getProductId()
	{
		return $this->_productId;
	}

	/**
	 * @param  Identity $crossSellingProductId Reference to product (main product)
	 * @return \jtl\Connector\Model\CrossSelling
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCrossSellingProductId(Identity $crossSellingProductId)
	{
		
		$this->_crossSellingProductId = $crossSellingProductId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to product (main product)
	 */
	public function getCrossSellingProductId()
	{
		return $this->_crossSellingProductId;
	}

	/**
	 * @param  Identity $crossSellingGroupId Reference to crossSellingGroup
	 * @return \jtl\Connector\Model\CrossSelling
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCrossSellingGroupId(Identity $crossSellingGroupId)
	{
		
		$this->_crossSellingGroupId = $crossSellingGroupId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to crossSellingGroup
	 */
	public function getCrossSellingGroupId()
	{
		return $this->_crossSellingGroupId;
	}

	/**
	 * @param  \jtl\Connector\Model\Product $product
	 * @return \jtl\Connector\Model\CrossSelling
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
	 * @return \jtl\Connector\Model\CrossSelling
	 */
	public function clearProduct()
	{
		$this->_product = array();
		return $this;
	}
}

