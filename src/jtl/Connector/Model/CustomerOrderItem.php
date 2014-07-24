<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Order item in customer order..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerOrderItem extends DataModel
{
    /**
     * @type Identity Optional reference to configItemId (if item is part of a configurable item)
     */
    protected $_configItemId = null;

    /**
     * @type Identity Reference to customerOrder
     */
    protected $_customerOrderId = null;

    /**
     * @type Identity Unique customerOrderItem id
     */
    protected $_id = null;

    /**
     * @type Identity Reference to product
     */
    protected $_productId = null;

    /**
     * @type float|null 
     */
    protected $_grossPrice = 0.0;

    /**
     * @type integer 
     */
    protected $_kBestellStueckliste = 0;

    /**
     * @type string Order item name
     */
    protected $_name = '';

    /**
     * @type float|null Price (net)
     */
    protected $_price = 0.0;

    /**
     * @type float|null Quantity purchased
     */
    protected $_quantity = 0.0;

    /**
     * @type string Stock keeping Unit (unique item identifier)
     */
    protected $_sku = '';

    /**
     * @type integer 
     */
    protected $_sort = 0;

    /**
     * @type string 
     */
    protected $_type = '';

    /**
     * @type string Optional unique Hashsum (if item is part of configurable item
     */
    protected $_unique = '';

    /**
     * @type float|null Value added tax
     */
    protected $_vat = 0.0;

    /**
	 * Nav [CustomerOrderPosition » Many]
	 *
     * @type \jtl\Connector\Model\CustomerOrder[]
     */
    protected $_customerOrder = array();

    /**
	 * Nav [CustomerOrderItem » ZeroOrOne]
	 *
     * @type \jtl\Connector\Model\CustomerOrderItemVariation[]
     */
    protected $_variations = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_productId',
		'_customerOrderId',
		'_configItemId',
	);

	/**
	 * @param  float $grossPrice 
	 * @return \jtl\Connector\Model\CustomerOrderItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setGrossPrice($grossPrice)
	{
		if (!is_float($grossPrice))
			throw new InvalidArgumentException('float expected.');
		$this->_grossPrice = $grossPrice;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getGrossPrice()
	{
		return $this->_grossPrice;
	}

	/**
	 * @param  float $vat Value added tax
	 * @return \jtl\Connector\Model\CustomerOrderItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setVat($vat)
	{
		if (!is_float($vat))
			throw new InvalidArgumentException('float expected.');
		$this->_vat = $vat;
		return $this;
	}
	
	/**
	 * @return float Value added tax
	 */
	public function getVat()
	{
		return $this->_vat;
	}

	/**
	 * @param  float $quantity Quantity purchased
	 * @return \jtl\Connector\Model\CustomerOrderItem
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
	 * @return float Quantity purchased
	 */
	public function getQuantity()
	{
		return $this->_quantity;
	}

	/**
	 * @param  float $price Price (net)
	 * @return \jtl\Connector\Model\CustomerOrderItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setPrice($price)
	{
		if (!is_float($price))
			throw new InvalidArgumentException('float expected.');
		$this->_price = $price;
		return $this;
	}
	
	/**
	 * @return float Price (net)
	 */
	public function getPrice()
	{
		return $this->_price;
	}

	/**
	 * @param  string $sku Stock keeping Unit (unique item identifier)
	 * @return \jtl\Connector\Model\CustomerOrderItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setSku($sku)
	{
		if (!is_string($sku))
			throw new InvalidArgumentException('string expected.');
		$this->_sku = $sku;
		return $this;
	}
	
	/**
	 * @return string Stock keeping Unit (unique item identifier)
	 */
	public function getSku()
	{
		return $this->_sku;
	}

	/**
	 * @param  string $unique Optional unique Hashsum (if item is part of configurable item
	 * @return \jtl\Connector\Model\CustomerOrderItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setUnique($unique)
	{
		if (!is_string($unique))
			throw new InvalidArgumentException('string expected.');
		$this->_unique = $unique;
		return $this;
	}
	
	/**
	 * @return string Optional unique Hashsum (if item is part of configurable item
	 */
	public function getUnique()
	{
		return $this->_unique;
	}

	/**
	 * @param  integer $sort 
	 * @return \jtl\Connector\Model\CustomerOrderItem
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
	 * @return integer 
	 */
	public function getSort()
	{
		return $this->_sort;
	}

	/**
	 * @param  string $name Order item name
	 * @return \jtl\Connector\Model\CustomerOrderItem
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
	 * @return string Order item name
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  integer $kBestellStueckliste 
	 * @return \jtl\Connector\Model\CustomerOrderItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setKBestellStueckliste($kBestellStueckliste)
	{
		if (!is_integer($kBestellStueckliste))
			throw new InvalidArgumentException('integer expected.');
		$this->_kBestellStueckliste = $kBestellStueckliste;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getKBestellStueckliste()
	{
		return $this->_kBestellStueckliste;
	}

	/**
	 * @param  Identity $id Unique customerOrderItem id
	 * @return \jtl\Connector\Model\CustomerOrderItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique customerOrderItem id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $productId Reference to product
	 * @return \jtl\Connector\Model\CustomerOrderItem
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
	 * @param  Identity $customerOrderId Reference to customerOrder
	 * @return \jtl\Connector\Model\CustomerOrderItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCustomerOrderId(Identity $customerOrderId)
	{
		
		$this->_customerOrderId = $customerOrderId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to customerOrder
	 */
	public function getCustomerOrderId()
	{
		return $this->_customerOrderId;
	}

	/**
	 * @param  Identity $configItemId Optional reference to configItemId (if item is part of a configurable item)
	 * @return \jtl\Connector\Model\CustomerOrderItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setConfigItemId(Identity $configItemId)
	{
		
		$this->_configItemId = $configItemId;
		return $this;
	}
	
	/**
	 * @return Identity Optional reference to configItemId (if item is part of a configurable item)
	 */
	public function getConfigItemId()
	{
		return $this->_configItemId;
	}

	/**
	 * @param  string $type 
	 * @return \jtl\Connector\Model\CustomerOrderItem
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
	 * @return string 
	 */
	public function getType()
	{
		return $this->_type;
	}

	/**
	 * @param  \jtl\Connector\Model\CustomerOrder $customerOrder
	 * @return \jtl\Connector\Model\CustomerOrderItem
	 */
	public function addCustomerOrder(\jtl\Connector\Model\CustomerOrder $customerOrder)
	{
		$this->_customerOrder[] = $customerOrder;
		return $this;
	}
	
	/**
	 * @return CustomerOrder
	 */
	public function getCustomerOrder()
	{
		return $this->_customerOrder;
	}

	/**
	 * @return \jtl\Connector\Model\CustomerOrderItem
	 */
	public function clearCustomerOrder()
	{
		$this->_customerOrder = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\CustomerOrderItemVariation $variation
	 * @return \jtl\Connector\Model\CustomerOrderItem
	 */
	public function addVariation(\jtl\Connector\Model\CustomerOrderItemVariation $variation)
	{
		$this->_variations[] = $variation;
		return $this;
	}
	
	/**
	 * @return CustomerOrderItemVariation
	 */
	public function getVariations()
	{
		return $this->_variations;
	}

	/**
	 * @return \jtl\Connector\Model\CustomerOrderItem
	 */
	public function clearVariations()
	{
		$this->_variations = array();
		return $this;
	}
}

