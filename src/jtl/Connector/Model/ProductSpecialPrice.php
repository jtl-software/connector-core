<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Special product price properties to specify date and stock limits..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductSpecialPrice extends DataModel
{
    /**
     * @type Identity Unique productSpecialPrice id
     */
    protected $_id = null;

    /**
     * @type Identity Reference to product
     */
    protected $_productId = null;

    /**
     * @type DateTime|null Optional: Activate special price from date
     */
    protected $_activeFrom = null;

    /**
     * @type DateTime|null Optional: Special price active until date
     */
    protected $_activeUntil = null;

    /**
     * @type integer|null Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     */
    protected $_considerDateLimit = 0;

    /**
     * @type integer|null Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     */
    protected $_considerStockLimit = 0;

    /**
     * @type boolean Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
     */
    protected $_isActive = false;

    /**
     * @type integer|null Optional: SpecialPrice active until stock level quantity
     */
    protected $_stockLimit = 0;

    /**
	 * Nav [ProductSpecialPrice » Many]
	 *
     * @type \jtl\Connector\Model\Product[]
     */
    protected $_product = array();

    /**
	 * Nav [ProductSpecialPrice » One]
	 *
     * @type \jtl\Connector\Model\SpecialPrice[]
     */
    protected $_specialPrices = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_productId',
	);

	/**
	 * @param  DateTime $activeFrom Optional: Activate special price from date
	 * @return \jtl\Connector\Model\ProductSpecialPrice
	 * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
	 */
	public function setActiveFrom(DateTime $activeFrom)
	{
		
		$this->_activeFrom = $activeFrom;
		return $this;
	}
	
	/**
	 * @return DateTime Optional: Activate special price from date
	 */
	public function getActiveFrom()
	{
		return $this->_activeFrom;
	}

	/**
	 * @param  integer $stockLimit Optional: SpecialPrice active until stock level quantity
	 * @return \jtl\Connector\Model\ProductSpecialPrice
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setStockLimit($stockLimit)
	{
		if (!is_integer($stockLimit))
			throw new InvalidArgumentException('integer expected.');
		$this->_stockLimit = $stockLimit;
		return $this;
	}
	
	/**
	 * @return integer Optional: SpecialPrice active until stock level quantity
	 */
	public function getStockLimit()
	{
		return $this->_stockLimit;
	}

	/**
	 * @param  DateTime $activeUntil Optional: Special price active until date
	 * @return \jtl\Connector\Model\ProductSpecialPrice
	 * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
	 */
	public function setActiveUntil(DateTime $activeUntil)
	{
		
		$this->_activeUntil = $activeUntil;
		return $this;
	}
	
	/**
	 * @return DateTime Optional: Special price active until date
	 */
	public function getActiveUntil()
	{
		return $this->_activeUntil;
	}

	/**
	 * @param  integer $considerDateLimit Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
	 * @return \jtl\Connector\Model\ProductSpecialPrice
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setConsiderDateLimit($considerDateLimit)
	{
		if (!is_integer($considerDateLimit))
			throw new InvalidArgumentException('integer expected.');
		$this->_considerDateLimit = $considerDateLimit;
		return $this;
	}
	
	/**
	 * @return integer Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
	 */
	public function getConsiderDateLimit()
	{
		return $this->_considerDateLimit;
	}

	/**
	 * @param  integer $considerStockLimit Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
	 * @return \jtl\Connector\Model\ProductSpecialPrice
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setConsiderStockLimit($considerStockLimit)
	{
		if (!is_integer($considerStockLimit))
			throw new InvalidArgumentException('integer expected.');
		$this->_considerStockLimit = $considerStockLimit;
		return $this;
	}
	
	/**
	 * @return integer Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
	 */
	public function getConsiderStockLimit()
	{
		return $this->_considerStockLimit;
	}

	/**
	 * @param  Identity $id Unique productSpecialPrice id
	 * @return \jtl\Connector\Model\ProductSpecialPrice
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique productSpecialPrice id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $productId Reference to product
	 * @return \jtl\Connector\Model\ProductSpecialPrice
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
	 * @param  boolean $isActive Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
	 * @return \jtl\Connector\Model\ProductSpecialPrice
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
	 * @return boolean Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
	 */
	public function getIsActive()
	{
		return $this->_isActive;
	}

	/**
	 * @param  \jtl\Connector\Model\Product $product
	 * @return \jtl\Connector\Model\ProductSpecialPrice
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
	 * @return \jtl\Connector\Model\ProductSpecialPrice
	 */
	public function clearProduct()
	{
		$this->_product = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\SpecialPrice $specialPrice
	 * @return \jtl\Connector\Model\ProductSpecialPrice
	 */
	public function addSpecialPrice(\jtl\Connector\Model\SpecialPrice $specialPrice)
	{
		$this->_specialPrices[] = $specialPrice;
		return $this;
	}
	
	/**
	 * @return SpecialPrice
	 */
	public function getSpecialPrices()
	{
		return $this->_specialPrices;
	}

	/**
	 * @return \jtl\Connector\Model\ProductSpecialPrice
	 */
	public function clearSpecialPrices()
	{
		$this->_specialPrices = array();
		return $this;
	}
}

