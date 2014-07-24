<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Localized product attribute..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductAttr extends DataModel
{
    /**
     * @type Identity Unique productAttr id
     */
    protected $_id = null;

    /**
     * @type Identity Reference to product
     */
    protected $_productId = null;

    /**
     * @type string 
     */
    protected $_cInternet = '';

    /**
     * @type string 
     */
    protected $_cName = '';

    /**
     * @type integer|null 
     */
    protected $_kFloat = 0;

    /**
     * @type integer|null 
     */
    protected $_kInt = 0;

    /**
     * @type integer|null 
     */
    protected $_kKategorie = 0;

    /**
     * @type integer|null 
     */
    protected $_kString = 0;

    /**
     * @type integer|null 
     */
    protected $_kText = 0;

    /**
     * @type integer|null 
     */
    protected $_nDruck = 0;

    /**
     * @type integer|null Optional sort number
     */
    protected $_sort = 0;

    /**
	 * Nav [ProductAttr » Many]
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
	 * @param  integer $kKategorie 
	 * @return \jtl\Connector\Model\ProductAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setKKategorie($kKategorie)
	{
		if (!is_integer($kKategorie))
			throw new InvalidArgumentException('integer expected.');
		$this->_kKategorie = $kKategorie;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getKKategorie()
	{
		return $this->_kKategorie;
	}

	/**
	 * @param  integer $kString 
	 * @return \jtl\Connector\Model\ProductAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setKString($kString)
	{
		if (!is_integer($kString))
			throw new InvalidArgumentException('integer expected.');
		$this->_kString = $kString;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getKString()
	{
		return $this->_kString;
	}

	/**
	 * @param  integer $kText 
	 * @return \jtl\Connector\Model\ProductAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setKText($kText)
	{
		if (!is_integer($kText))
			throw new InvalidArgumentException('integer expected.');
		$this->_kText = $kText;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getKText()
	{
		return $this->_kText;
	}

	/**
	 * @param  integer $kInt 
	 * @return \jtl\Connector\Model\ProductAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setKInt($kInt)
	{
		if (!is_integer($kInt))
			throw new InvalidArgumentException('integer expected.');
		$this->_kInt = $kInt;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getKInt()
	{
		return $this->_kInt;
	}

	/**
	 * @param  integer $kFloat 
	 * @return \jtl\Connector\Model\ProductAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setKFloat($kFloat)
	{
		if (!is_integer($kFloat))
			throw new InvalidArgumentException('integer expected.');
		$this->_kFloat = $kFloat;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getKFloat()
	{
		return $this->_kFloat;
	}

	/**
	 * @param  string $cName 
	 * @return \jtl\Connector\Model\ProductAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setCName($cName)
	{
		if (!is_string($cName))
			throw new InvalidArgumentException('string expected.');
		$this->_cName = $cName;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getCName()
	{
		return $this->_cName;
	}

	/**
	 * @param  string $cInternet 
	 * @return \jtl\Connector\Model\ProductAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setCInternet($cInternet)
	{
		if (!is_string($cInternet))
			throw new InvalidArgumentException('string expected.');
		$this->_cInternet = $cInternet;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getCInternet()
	{
		return $this->_cInternet;
	}

	/**
	 * @param  integer $sort Optional sort number
	 * @return \jtl\Connector\Model\ProductAttr
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
	 * @param  integer $nDruck 
	 * @return \jtl\Connector\Model\ProductAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setNDruck($nDruck)
	{
		if (!is_integer($nDruck))
			throw new InvalidArgumentException('integer expected.');
		$this->_nDruck = $nDruck;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getNDruck()
	{
		return $this->_nDruck;
	}

	/**
	 * @param  Identity $id Unique productAttr id
	 * @return \jtl\Connector\Model\ProductAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique productAttr id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $productId Reference to product
	 * @return \jtl\Connector\Model\ProductAttr
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
	 * @param  \jtl\Connector\Model\Product $product
	 * @return \jtl\Connector\Model\ProductAttr
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
	 * @return \jtl\Connector\Model\ProductAttr
	 */
	public function clearProduct()
	{
		$this->_product = array();
		return $this;
	}
}

