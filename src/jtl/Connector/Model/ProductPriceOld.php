<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductPriceOld extends DataModel
{
    /**
     * @type Identity 
     */
    protected $_customerGroupId = null;

    /**
     * @type Identity 
     */
    protected $_productId = null;

    /**
     * @type integer 
     */
    protected $_connectorId = 0;

    /**
     * @type float|null 
     */
    protected $_netPercent1 = 0.0;

    /**
     * @type float|null 
     */
    protected $_netPercent2 = 0.0;

    /**
     * @type float|null 
     */
    protected $_netPercent3 = 0.0;

    /**
     * @type float|null 
     */
    protected $_netPercent4 = 0.0;

    /**
     * @type float|null 
     */
    protected $_netPercent5 = 0.0;

    /**
     * @type float 
     */
    protected $_netPrice = 0.0;

    /**
     * @type float 
     */
    protected $_netPrice1 = 0.0;

    /**
     * @type float 
     */
    protected $_netPrice2 = 0.0;

    /**
     * @type float 
     */
    protected $_netPrice3 = 0.0;

    /**
     * @type float 
     */
    protected $_netPrice4 = 0.0;

    /**
     * @type float 
     */
    protected $_netPrice5 = 0.0;

    /**
     * @type float|null 
     */
    protected $_percent = 0.0;

    /**
     * @type integer|null 
     */
    protected $_quantity1 = 0;

    /**
     * @type integer|null 
     */
    protected $_quantity2 = 0;

    /**
     * @type integer|null 
     */
    protected $_quantity3 = 0;

    /**
     * @type integer|null 
     */
    protected $_quantity4 = 0;

    /**
     * @type integer|null 
     */
    protected $_quantity5 = 0;

    /**
	 * Nav [ProductPrice » Many]
	 *
     * @type \jtl\Connector\Model\Product[]
     */
    protected $_product = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_customerGroupId',
		'_productId',
	);

	/**
	 * @param  integer $connectorId 
	 * @return \jtl\Connector\Model\ProductPriceOld
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
	 * @param  integer $quantity1 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setQuantity1($quantity1)
	{
		if (!is_integer($quantity1))
			throw new InvalidArgumentException('integer expected.');
		$this->_quantity1 = $quantity1;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getQuantity1()
	{
		return $this->_quantity1;
	}

	/**
	 * @param  integer $quantity2 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setQuantity2($quantity2)
	{
		if (!is_integer($quantity2))
			throw new InvalidArgumentException('integer expected.');
		$this->_quantity2 = $quantity2;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getQuantity2()
	{
		return $this->_quantity2;
	}

	/**
	 * @param  integer $quantity3 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setQuantity3($quantity3)
	{
		if (!is_integer($quantity3))
			throw new InvalidArgumentException('integer expected.');
		$this->_quantity3 = $quantity3;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getQuantity3()
	{
		return $this->_quantity3;
	}

	/**
	 * @param  integer $quantity4 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setQuantity4($quantity4)
	{
		if (!is_integer($quantity4))
			throw new InvalidArgumentException('integer expected.');
		$this->_quantity4 = $quantity4;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getQuantity4()
	{
		return $this->_quantity4;
	}

	/**
	 * @param  integer $quantity5 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setQuantity5($quantity5)
	{
		if (!is_integer($quantity5))
			throw new InvalidArgumentException('integer expected.');
		$this->_quantity5 = $quantity5;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getQuantity5()
	{
		return $this->_quantity5;
	}

	/**
	 * @param  float $percent 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setPercent($percent)
	{
		if (!is_float($percent))
			throw new InvalidArgumentException('float expected.');
		$this->_percent = $percent;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getPercent()
	{
		return $this->_percent;
	}

	/**
	 * @param  float $netPercent1 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setNetPercent1($netPercent1)
	{
		if (!is_float($netPercent1))
			throw new InvalidArgumentException('float expected.');
		$this->_netPercent1 = $netPercent1;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getNetPercent1()
	{
		return $this->_netPercent1;
	}

	/**
	 * @param  float $netPercent2 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setNetPercent2($netPercent2)
	{
		if (!is_float($netPercent2))
			throw new InvalidArgumentException('float expected.');
		$this->_netPercent2 = $netPercent2;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getNetPercent2()
	{
		return $this->_netPercent2;
	}

	/**
	 * @param  float $netPercent3 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setNetPercent3($netPercent3)
	{
		if (!is_float($netPercent3))
			throw new InvalidArgumentException('float expected.');
		$this->_netPercent3 = $netPercent3;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getNetPercent3()
	{
		return $this->_netPercent3;
	}

	/**
	 * @param  float $netPercent4 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setNetPercent4($netPercent4)
	{
		if (!is_float($netPercent4))
			throw new InvalidArgumentException('float expected.');
		$this->_netPercent4 = $netPercent4;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getNetPercent4()
	{
		return $this->_netPercent4;
	}

	/**
	 * @param  float $netPercent5 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setNetPercent5($netPercent5)
	{
		if (!is_float($netPercent5))
			throw new InvalidArgumentException('float expected.');
		$this->_netPercent5 = $netPercent5;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getNetPercent5()
	{
		return $this->_netPercent5;
	}

	/**
	 * @param  Identity $customerGroupId 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCustomerGroupId(Identity $customerGroupId)
	{
		
		$this->_customerGroupId = $customerGroupId;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getCustomerGroupId()
	{
		return $this->_customerGroupId;
	}

	/**
	 * @param  Identity $productId 
	 * @return \jtl\Connector\Model\ProductPriceOld
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
	 * @param  float $netPrice 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setNetPrice($netPrice)
	{
		if (!is_float($netPrice))
			throw new InvalidArgumentException('float expected.');
		$this->_netPrice = $netPrice;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getNetPrice()
	{
		return $this->_netPrice;
	}

	/**
	 * @param  float $netPrice1 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setNetPrice1($netPrice1)
	{
		if (!is_float($netPrice1))
			throw new InvalidArgumentException('float expected.');
		$this->_netPrice1 = $netPrice1;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getNetPrice1()
	{
		return $this->_netPrice1;
	}

	/**
	 * @param  float $netPrice2 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setNetPrice2($netPrice2)
	{
		if (!is_float($netPrice2))
			throw new InvalidArgumentException('float expected.');
		$this->_netPrice2 = $netPrice2;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getNetPrice2()
	{
		return $this->_netPrice2;
	}

	/**
	 * @param  float $netPrice3 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setNetPrice3($netPrice3)
	{
		if (!is_float($netPrice3))
			throw new InvalidArgumentException('float expected.');
		$this->_netPrice3 = $netPrice3;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getNetPrice3()
	{
		return $this->_netPrice3;
	}

	/**
	 * @param  float $netPrice4 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setNetPrice4($netPrice4)
	{
		if (!is_float($netPrice4))
			throw new InvalidArgumentException('float expected.');
		$this->_netPrice4 = $netPrice4;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getNetPrice4()
	{
		return $this->_netPrice4;
	}

	/**
	 * @param  float $netPrice5 
	 * @return \jtl\Connector\Model\ProductPriceOld
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setNetPrice5($netPrice5)
	{
		if (!is_float($netPrice5))
			throw new InvalidArgumentException('float expected.');
		$this->_netPrice5 = $netPrice5;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getNetPrice5()
	{
		return $this->_netPrice5;
	}

	/**
	 * @param  \jtl\Connector\Model\Product $product
	 * @return \jtl\Connector\Model\ProductPriceOld
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
	 * @return \jtl\Connector\Model\ProductPriceOld
	 */
	public function clearProduct()
	{
		$this->_product = array();
		return $this;
	}
}

