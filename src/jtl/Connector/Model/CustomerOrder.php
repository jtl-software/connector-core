<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Customer order properties..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerOrder extends DataModel
{
    /**
     * @type Identity Reference to billingAddress
     */
    protected $_billingAddressId = null;

    /**
     * @type Identity 
     */
    protected $_companyId = null;

    /**
     * @type Identity Optional reference to customer. 
     */
    protected $_customerId = null;

    /**
     * @type Identity Unique customerOrder id
     */
    protected $_id = null;

    /**
     * @type Identity Reference to shippingAddress
     */
    protected $_shippingAddressId = null;

    /**
     * @type DateTime|null Date of creation
     */
    protected $_created = null;

    /**
     * @type string Currency ISO set, when customerOrder was finished
     */
    protected $_currencyIso = '';

    /**
     * @type DateTime|null Optional Estimated delivery date set by ERP System
     */
    protected $_estimatedDeliveryDate = null;

    /**
     * @type float 
     */
    protected $_factor = 0.0;

    /**
     * @type boolean 
     */
    protected $_isFullyDelivered = false;

    /**
     * @type boolean 
     */
    protected $_isPlatform = false;

    /**
     * @type integer 
     */
    protected $_languageId = 0;

    /**
     * @type integer|null 
     */
    protected $_nGesperrt = 0;

    /**
     * @type string Optional order number (usually set by ERP System later)
     */
    protected $_orderNumber = '';

    /**
     * @type DateTime|null Payment date
     */
    protected $_paymentDate = null;

    /**
     * @type string Optional payment module code
     */
    protected $_paymentModuleCode = '';

    /**
     * @type DateTime|null Shipping date
     */
    protected $_shippingDate = null;

    /**
     * @type string Additional shipping info
     */
    protected $_shippingInfo = '';

    /**
     * @type string 
     */
    protected $_status = '';

    /**
	 * Nav [CustomerOrder » One]
	 *
     * @type \jtl\Connector\Model\CustomerOrderItem[]
     */
    protected $_positions = array();

    /**
	 * Nav [CustomerOrder » ZeroOrOne]
	 *
     * @type \jtl\Connector\Model\CustomerOrderAttr[]
     */
    protected $_attrs = array();

    /**
	 * Nav [CustomerOrder » Many]
	 *
     * @type \jtl\Connector\Model\CustomerOrderBillingAddress[]
     */
    protected $_billingAddress = array();

    /**
	 * Nav [CustomerOrder » Many]
	 *
     * @type \jtl\Connector\Model\CustomerOrderShippingAddress[]
     */
    protected $_shippingAddress = array();

    /**
	 * Nav [CustomerOrder » ZeroOrOne]
	 *
     * @type \jtl\Connector\Model\CustomerOrderPaymentInfo[]
     */
    protected $_paymentInfo = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_customerId',
		'_shippingAddressId',
		'_billingAddressId',
		'_companyId',
	);

	/**
	 * @param  string $orderNumber Optional order number (usually set by ERP System later)
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setOrderNumber($orderNumber)
	{
		if (!is_string($orderNumber))
			throw new InvalidArgumentException('string expected.');
		$this->_orderNumber = $orderNumber;
		return $this;
	}
	
	/**
	 * @return string Optional order number (usually set by ERP System later)
	 */
	public function getOrderNumber()
	{
		return $this->_orderNumber;
	}

	/**
	 * @param  DateTime $created Date of creation
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
	 */
	public function setCreated(DateTime $created)
	{
		
		$this->_created = $created;
		return $this;
	}
	
	/**
	 * @return DateTime Date of creation
	 */
	public function getCreated()
	{
		return $this->_created;
	}

	/**
	 * @param  string $shippingInfo Additional shipping info
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setShippingInfo($shippingInfo)
	{
		if (!is_string($shippingInfo))
			throw new InvalidArgumentException('string expected.');
		$this->_shippingInfo = $shippingInfo;
		return $this;
	}
	
	/**
	 * @return string Additional shipping info
	 */
	public function getShippingInfo()
	{
		return $this->_shippingInfo;
	}

	/**
	 * @param  DateTime $shippingDate Shipping date
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
	 */
	public function setShippingDate(DateTime $shippingDate)
	{
		
		$this->_shippingDate = $shippingDate;
		return $this;
	}
	
	/**
	 * @return DateTime Shipping date
	 */
	public function getShippingDate()
	{
		return $this->_shippingDate;
	}

	/**
	 * @param  DateTime $estimatedDeliveryDate Optional Estimated delivery date set by ERP System
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
	 */
	public function setEstimatedDeliveryDate(DateTime $estimatedDeliveryDate)
	{
		
		$this->_estimatedDeliveryDate = $estimatedDeliveryDate;
		return $this;
	}
	
	/**
	 * @return DateTime Optional Estimated delivery date set by ERP System
	 */
	public function getEstimatedDeliveryDate()
	{
		return $this->_estimatedDeliveryDate;
	}

	/**
	 * @param  string $currencyIso Currency ISO set, when customerOrder was finished
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setCurrencyIso($currencyIso)
	{
		if (!is_string($currencyIso))
			throw new InvalidArgumentException('string expected.');
		$this->_currencyIso = $currencyIso;
		return $this;
	}
	
	/**
	 * @return string Currency ISO set, when customerOrder was finished
	 */
	public function getCurrencyIso()
	{
		return $this->_currencyIso;
	}

	/**
	 * @param  integer $languageId 
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setLanguageId($languageId)
	{
		if (!is_integer($languageId))
			throw new InvalidArgumentException('integer expected.');
		$this->_languageId = $languageId;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getLanguageId()
	{
		return $this->_languageId;
	}

	/**
	 * @param  string $paymentModuleCode Optional payment module code
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setPaymentModuleCode($paymentModuleCode)
	{
		if (!is_string($paymentModuleCode))
			throw new InvalidArgumentException('string expected.');
		$this->_paymentModuleCode = $paymentModuleCode;
		return $this;
	}
	
	/**
	 * @return string Optional payment module code
	 */
	public function getPaymentModuleCode()
	{
		return $this->_paymentModuleCode;
	}

	/**
	 * @param  DateTime $paymentDate Payment date
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
	 */
	public function setPaymentDate(DateTime $paymentDate)
	{
		
		$this->_paymentDate = $paymentDate;
		return $this;
	}
	
	/**
	 * @return DateTime Payment date
	 */
	public function getPaymentDate()
	{
		return $this->_paymentDate;
	}

	/**
	 * @param  float $factor 
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setFactor($factor)
	{
		if (!is_float($factor))
			throw new InvalidArgumentException('float expected.');
		$this->_factor = $factor;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getFactor()
	{
		return $this->_factor;
	}

	/**
	 * @param  integer $nGesperrt 
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setNGesperrt($nGesperrt)
	{
		if (!is_integer($nGesperrt))
			throw new InvalidArgumentException('integer expected.');
		$this->_nGesperrt = $nGesperrt;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getNGesperrt()
	{
		return $this->_nGesperrt;
	}

	/**
	 * @param  Identity $id Unique customerOrder id
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique customerOrder id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $customerId Optional reference to customer. 
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCustomerId(Identity $customerId)
	{
		
		$this->_customerId = $customerId;
		return $this;
	}
	
	/**
	 * @return Identity Optional reference to customer. 
	 */
	public function getCustomerId()
	{
		return $this->_customerId;
	}

	/**
	 * @param  Identity $shippingAddressId Reference to shippingAddress
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setShippingAddressId(Identity $shippingAddressId)
	{
		
		$this->_shippingAddressId = $shippingAddressId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to shippingAddress
	 */
	public function getShippingAddressId()
	{
		return $this->_shippingAddressId;
	}

	/**
	 * @param  Identity $billingAddressId Reference to billingAddress
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setBillingAddressId(Identity $billingAddressId)
	{
		
		$this->_billingAddressId = $billingAddressId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to billingAddress
	 */
	public function getBillingAddressId()
	{
		return $this->_billingAddressId;
	}

	/**
	 * @param  Identity $companyId 
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCompanyId(Identity $companyId)
	{
		
		$this->_companyId = $companyId;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getCompanyId()
	{
		return $this->_companyId;
	}

	/**
	 * @param  boolean $isPlatform 
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setIsPlatform($isPlatform)
	{
		if (!is_bool($isPlatform))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isPlatform = $isPlatform;
		return $this;
	}
	
	/**
	 * @return boolean 
	 */
	public function getIsPlatform()
	{
		return $this->_isPlatform;
	}

	/**
	 * @param  boolean $isFullyDelivered 
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setIsFullyDelivered($isFullyDelivered)
	{
		if (!is_bool($isFullyDelivered))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isFullyDelivered = $isFullyDelivered;
		return $this;
	}
	
	/**
	 * @return boolean 
	 */
	public function getIsFullyDelivered()
	{
		return $this->_isFullyDelivered;
	}

	/**
	 * @param  string $status 
	 * @return \jtl\Connector\Model\CustomerOrder
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setStatus($status)
	{
		if (!is_string($status))
			throw new InvalidArgumentException('string expected.');
		$this->_status = $status;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getStatus()
	{
		return $this->_status;
	}

	/**
	 * @param  \jtl\Connector\Model\CustomerOrderItem $position
	 * @return \jtl\Connector\Model\CustomerOrder
	 */
	public function addPosition(\jtl\Connector\Model\CustomerOrderItem $position)
	{
		$this->_positions[] = $position;
		return $this;
	}
	
	/**
	 * @return CustomerOrderItem
	 */
	public function getPositions()
	{
		return $this->_positions;
	}

	/**
	 * @return \jtl\Connector\Model\CustomerOrder
	 */
	public function clearPositions()
	{
		$this->_positions = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\CustomerOrderAttr $attr
	 * @return \jtl\Connector\Model\CustomerOrder
	 */
	public function addAttr(\jtl\Connector\Model\CustomerOrderAttr $attr)
	{
		$this->_attrs[] = $attr;
		return $this;
	}
	
	/**
	 * @return CustomerOrderAttr
	 */
	public function getAttrs()
	{
		return $this->_attrs;
	}

	/**
	 * @return \jtl\Connector\Model\CustomerOrder
	 */
	public function clearAttrs()
	{
		$this->_attrs = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\CustomerOrderBillingAddress $billingAddress
	 * @return \jtl\Connector\Model\CustomerOrder
	 */
	public function addBillingAddress(\jtl\Connector\Model\CustomerOrderBillingAddress $billingAddress)
	{
		$this->_billingAddress[] = $billingAddress;
		return $this;
	}
	
	/**
	 * @return CustomerOrderBillingAddress
	 */
	public function getBillingAddress()
	{
		return $this->_billingAddress;
	}

	/**
	 * @return \jtl\Connector\Model\CustomerOrder
	 */
	public function clearBillingAddress()
	{
		$this->_billingAddress = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\CustomerOrderShippingAddress $shippingAddress
	 * @return \jtl\Connector\Model\CustomerOrder
	 */
	public function addShippingAddress(\jtl\Connector\Model\CustomerOrderShippingAddress $shippingAddress)
	{
		$this->_shippingAddress[] = $shippingAddress;
		return $this;
	}
	
	/**
	 * @return CustomerOrderShippingAddress
	 */
	public function getShippingAddress()
	{
		return $this->_shippingAddress;
	}

	/**
	 * @return \jtl\Connector\Model\CustomerOrder
	 */
	public function clearShippingAddress()
	{
		$this->_shippingAddress = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\CustomerOrderPaymentInfo $paymentInfo
	 * @return \jtl\Connector\Model\CustomerOrder
	 */
	public function addPaymentInfo(\jtl\Connector\Model\CustomerOrderPaymentInfo $paymentInfo)
	{
		$this->_paymentInfo[] = $paymentInfo;
		return $this;
	}
	
	/**
	 * @return CustomerOrderPaymentInfo
	 */
	public function getPaymentInfo()
	{
		return $this->_paymentInfo;
	}

	/**
	 * @return \jtl\Connector\Model\CustomerOrder
	 */
	public function clearPaymentInfo()
	{
		$this->_paymentInfo = array();
		return $this;
	}
}

