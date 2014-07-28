<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * ProductVariation Model. Each product defines its own variations, that means  variations are not global  in contrast to specifics. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductVariation extends DataModel
{
    /**
     * @type Identity Unique productVariation id
     */
    protected $_id = null;

    /**
     * @type Identity Reference to product
     */
    protected $_productId = null;

    /**
     * @type boolean 
     */
    protected $_isActive = false;

    /**
     * @type boolean 
     */
    protected $_isSelectable = false;

    /**
     * @type string 
     */
    protected $_name = '';

    /**
     * @type integer|null Optional sort number
     */
    protected $_sort = 0;

    /**
     * @type string Variation type e.g. radio or select
     */
    protected $_type = '';

    /**
	 * Nav [ProductVariation » Many]
	 *
     * @type \jtl\Connector\Model\Product[]
     */
    protected $_product = array();

    /**
	 * Nav [ProductVariation » One]
	 *
     * @type \jtl\Connector\Model\ProductVariationI18n[]
     */
    protected $_i18ns = array();

    /**
	 * Nav [ProductVariation » One]
	 *
     * @type \jtl\Connector\Model\ProductVariationInvisibility[]
     */
    protected $_invisibilities = array();

    /**
	 * Nav [ProductVariation » One]
	 *
     * @type \jtl\Connector\Model\ProductVariationValue[]
     */
    protected $_values = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_productId',
	);

	/**
	 * @param  string $name 
	 * @return \jtl\Connector\Model\ProductVariation
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setName($name)
	{
		if (!is_string($name))
			throw new InvalidArgumentException('string expected.');
		$this->_name = $name;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  integer $sort Optional sort number
	 * @return \jtl\Connector\Model\ProductVariation
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setSort($sort)
	{
		if (!is_integer($sort))
			throw new InvalidArgumentException('integer expected.');
		$this->_sort = $sort;
		return $this;
	}
	
	/**
	 * @return integer Optional sort number
	 */
	public function getSort()
	{
		return $this->_sort;
	}

	/**
	 * @param  string $type Variation type e.g. radio or select
	 * @return \jtl\Connector\Model\ProductVariation
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setType($type)
	{
		if (!is_string($type))
			throw new InvalidArgumentException('string expected.');
		$this->_type = $type;
		return $this;
	}
	
	/**
	 * @return string Variation type e.g. radio or select
	 */
	public function getType()
	{
		return $this->_type;
	}

	/**
	 * @param  Identity $id Unique productVariation id
	 * @return \jtl\Connector\Model\ProductVariation
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique productVariation id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $productId Reference to product
	 * @return \jtl\Connector\Model\ProductVariation
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
	 * @param  boolean $isSelectable 
	 * @return \jtl\Connector\Model\ProductVariation
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setIsSelectable($isSelectable)
	{
		if (!is_bool($isSelectable))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isSelectable = $isSelectable;
		return $this;
	}
	
	/**
	 * @return boolean 
	 */
	public function getIsSelectable()
	{
		return $this->_isSelectable;
	}

	/**
	 * @param  boolean $isActive 
	 * @return \jtl\Connector\Model\ProductVariation
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setIsActive($isActive)
	{
		if (!is_bool($isActive))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isActive = $isActive;
		return $this;
	}
	
	/**
	 * @return boolean 
	 */
	public function getIsActive()
	{
		return $this->_isActive;
	}

	/**
	 * @param  \jtl\Connector\Model\Product $product
	 * @return \jtl\Connector\Model\ProductVariation
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
	 * @return \jtl\Connector\Model\ProductVariation
	 */
	public function clearProduct()
	{
		$this->_product = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\ProductVariationI18n $i18ns
	 * @return \jtl\Connector\Model\ProductVariation
	 */
	public function addI18ns(\jtl\Connector\Model\ProductVariationI18n $i18ns)
	{
		$this->_i18ns[] = $i18ns;
		return $this;
	}
	
	/**
	 * @return ProductVariationI18n
	 */
	public function getI18ns()
	{
		return $this->_i18ns;
	}

	/**
	 * @return \jtl\Connector\Model\ProductVariation
	 */
	public function clearI18ns()
	{
		$this->_i18ns = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\ProductVariationInvisibility $invisibility
	 * @return \jtl\Connector\Model\ProductVariation
	 */
	public function addInvisibility(\jtl\Connector\Model\ProductVariationInvisibility $invisibility)
	{
		$this->_invisibilities[] = $invisibility;
		return $this;
	}
	
	/**
	 * @return ProductVariationInvisibility
	 */
	public function getInvisibilities()
	{
		return $this->_invisibilities;
	}

	/**
	 * @return \jtl\Connector\Model\ProductVariation
	 */
	public function clearInvisibilities()
	{
		$this->_invisibilities = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\ProductVariationValue $value
	 * @return \jtl\Connector\Model\ProductVariation
	 */
	public function addValue(\jtl\Connector\Model\ProductVariationValue $value)
	{
		$this->_values[] = $value;
		return $this;
	}
	
	/**
	 * @return ProductVariationValue
	 */
	public function getValues()
	{
		return $this->_values;
	}

	/**
	 * @return \jtl\Connector\Model\ProductVariation
	 */
	public function clearValues()
	{
		$this->_values = array();
		return $this;
	}
}

