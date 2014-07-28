<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Additional payment info for direct debit / banktransfer or payment by credit card. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerOrderPaymentInfo extends DataModel
{
    /**
     * @type Identity Reference to customerOrder
     */
    protected $_customerOrderId = null;

    /**
     * @type Identity Unique customerOrderPaymentInfo id
     */
    protected $_id = null;

    /**
     * @type Identity 
     */
    protected $_platformId = null;

    /**
     * @type string Bank account holder name
     */
    protected $_accountHolder = '';

    /**
     * @type string Bank account number (deprecated in DE since SEPA)
     */
    protected $_accountNumber = '';

    /**
     * @type string 
     */
    protected $_bankAccount = '';

    /**
     * @type string Bank code (deprecated in DE since SEPA)
     */
    protected $_bankCode = '';

    /**
     * @type string 
     */
    protected $_cBIC = '';

    /**
     * @type string 
     */
    protected $_cIBAN = '';

    /**
     * @type string Credit card number
     */
    protected $_creditCardNumber = '';

    /**
     * @type string 
     */
    protected $_cvv = '';

    /**
	 * Nav [CustomerOrderPaymentInfo » Many]
	 *
     * @type \jtl\Connector\Model\CustomerOrder[]
     */
    protected $_customerOrders = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_customerOrderId',
		'_platformId',
	);

	/**
	 * @param  string $bankAccount 
	 * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setBankAccount($bankAccount)
	{
		if (!is_string($bankAccount))
			throw new InvalidArgumentException('string expected.');
		$this->_bankAccount = $bankAccount;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getBankAccount()
	{
		return $this->_bankAccount;
	}

	/**
	 * @param  string $bankCode Bank code (deprecated in DE since SEPA)
	 * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setBankCode($bankCode)
	{
		if (!is_string($bankCode))
			throw new InvalidArgumentException('string expected.');
		$this->_bankCode = $bankCode;
		return $this;
	}
	
	/**
	 * @return string Bank code (deprecated in DE since SEPA)
	 */
	public function getBankCode()
	{
		return $this->_bankCode;
	}

	/**
	 * @param  string $accountNumber Bank account number (deprecated in DE since SEPA)
	 * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setAccountNumber($accountNumber)
	{
		if (!is_string($accountNumber))
			throw new InvalidArgumentException('string expected.');
		$this->_accountNumber = $accountNumber;
		return $this;
	}
	
	/**
	 * @return string Bank account number (deprecated in DE since SEPA)
	 */
	public function getAccountNumber()
	{
		return $this->_accountNumber;
	}

	/**
	 * @param  string $creditCardNumber Credit card number
	 * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setCreditCardNumber($creditCardNumber)
	{
		if (!is_string($creditCardNumber))
			throw new InvalidArgumentException('string expected.');
		$this->_creditCardNumber = $creditCardNumber;
		return $this;
	}
	
	/**
	 * @return string Credit card number
	 */
	public function getCreditCardNumber()
	{
		return $this->_creditCardNumber;
	}

	/**
	 * @param  string $cvv 
	 * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setCvv($cvv)
	{
		if (!is_string($cvv))
			throw new InvalidArgumentException('string expected.');
		$this->_cvv = $cvv;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getCvv()
	{
		return $this->_cvv;
	}

	/**
	 * @param  string $accountHolder Bank account holder name
	 * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setAccountHolder($accountHolder)
	{
		if (!is_string($accountHolder))
			throw new InvalidArgumentException('string expected.');
		$this->_accountHolder = $accountHolder;
		return $this;
	}
	
	/**
	 * @return string Bank account holder name
	 */
	public function getAccountHolder()
	{
		return $this->_accountHolder;
	}

	/**
	 * @param  string $cIBAN 
	 * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setCIBAN($cIBAN)
	{
		if (!is_string($cIBAN))
			throw new InvalidArgumentException('string expected.');
		$this->_cIBAN = $cIBAN;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getCIBAN()
	{
		return $this->_cIBAN;
	}

	/**
	 * @param  string $cBIC 
	 * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setCBIC($cBIC)
	{
		if (!is_string($cBIC))
			throw new InvalidArgumentException('string expected.');
		$this->_cBIC = $cBIC;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getCBIC()
	{
		return $this->_cBIC;
	}

	/**
	 * @param  Identity $id Unique customerOrderPaymentInfo id
	 * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique customerOrderPaymentInfo id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $customerOrderId Reference to customerOrder
	 * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
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
	 * @param  Identity $platformId 
	 * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setPlatformId(Identity $platformId)
	{
		
		$this->_platformId = $platformId;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getPlatformId()
	{
		return $this->_platformId;
	}

	/**
	 * @param  \jtl\Connector\Model\CustomerOrder $customerOrder
	 * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
	 */
	public function addCustomerOrder(\jtl\Connector\Model\CustomerOrder $customerOrder)
	{
		$this->_customerOrders[] = $customerOrder;
		return $this;
	}
	
	/**
	 * @return CustomerOrder
	 */
	public function getCustomerOrders()
	{
		return $this->_customerOrders;
	}

	/**
	 * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
	 */
	public function clearCustomerOrders()
	{
		$this->_customerOrders = array();
		return $this;
	}
}

