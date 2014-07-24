<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Define set articles / parts lists. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class SetArticle extends DataModel
{
    /**
     * @type Identity Unique setArticle id, referenced by product.setArticleId
     */
    protected $_id = null;

    /**
     * @type Identity Reference to a component / product
     */
    protected $_productId = null;

    /**
     * @type float Component quantity
     */
    protected $_quantity = 0.0;

    /**
	 * Nav [SetArticle » Many]
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
	 * @param  float $quantity Component quantity
	 * @return \jtl\Connector\Model\SetArticle
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setQuantity($quantity)
	{
		if (!is_float($quantity))
			throw new InvalidArgumentException('float expected.');
		$this->_quantity = $quantity;
		return $this;
	}
	
	/**
	 * @return float Component quantity
	 */
	public function getQuantity()
	{
		return $this->_quantity;
	}

	/**
	 * @param  Identity $id Unique setArticle id, referenced by product.setArticleId
	 * @return \jtl\Connector\Model\SetArticle
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique setArticle id, referenced by product.setArticleId
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $productId Reference to a component / product
	 * @return \jtl\Connector\Model\SetArticle
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setProductId(Identity $productId)
	{
		
		$this->_productId = $productId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to a component / product
	 */
	public function getProductId()
	{
		return $this->_productId;
	}

	/**
	 * @param  \jtl\Connector\Model\Product $product
	 * @return \jtl\Connector\Model\SetArticle
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
	 * @return \jtl\Connector\Model\SetArticle
	 */
	public function clearProduct()
	{
		$this->_product = array();
		return $this;
	}
}

