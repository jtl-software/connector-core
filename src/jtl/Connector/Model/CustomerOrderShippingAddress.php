<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Shipping Address properties of a customer (order).
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerOrderShippingAddress extends DataModel
{
    /**
     * @type Identity Reference to customer
     */
    protected $_customerId = null;

    /**
     * @type Identity Unique customerOrderShippingAddress id
     */
    protected $_id = null;

    /**
     * @type string City
     */
    protected $_city = '';

    /**
     * @type string Company name
     */
    protected $_company = '';

    /**
     * @type string Country ISO 3166-2 (2 letter Uppercase)
     */
    protected $_countryIso = '';

    /**
     * @type string Delivery instruction e.g. "c/o John Doe"
     */
    protected $_deliveryInstruction = '';

    /**
     * @type string E-Mail address
     */
    protected $_eMail = '';

    /**
     * @type string Extra address line e.g. "Apartment 2.5"
     */
    protected $_extraAddressLine = '';

    /**
     * @type string Fax number
     */
    protected $_fax = '';

    /**
     * @type string First name
     */
    protected $_firstName = '';

    /**
     * @type string Last name
     */
    protected $_lastName = '';

    /**
     * @type string Mobile phone number
     */
    protected $_mobile = '';

    /**
     * @type string Phone number
     */
    protected $_phone = '';

    /**
     * @type string Salutation e.g. "Mr."
     */
    protected $_salutation = '';

    /**
     * @type string State
     */
    protected $_state = '';

    /**
     * @type string Street + streetnumber
     */
    protected $_street = '';

    /**
     * @type string Title e.g. ("Prof. Dr.")
     */
    protected $_title = '';

    /**
     * @type string Zip / postal code
     */
    protected $_zipCode = '';

    /**
	 * Nav [CustomerOrderShippingAddress » ZeroOrOne]
	 *
     * @type \jtl\Connector\Model\CustomerOrder[]
     */
    protected $_customerOrders = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_customerId',
	);

	/**
	 * @param  string $company Company name
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setCompany($company)
	{
		if (!is_string($company))
			throw new InvalidArgumentException('string expected.');
		$this->_company = $company;
		return $this;
	}
	
	/**
	 * @return string Company name
	 */
	public function getCompany()
	{
		return $this->_company;
	}

	/**
	 * @param  string $title Title e.g. ("Prof. Dr.")
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setTitle($title)
	{
		if (!is_string($title))
			throw new InvalidArgumentException('string expected.');
		$this->_title = $title;
		return $this;
	}
	
	/**
	 * @return string Title e.g. ("Prof. Dr.")
	 */
	public function getTitle()
	{
		return $this->_title;
	}

	/**
	 * @param  string $firstName First name
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setFirstName($firstName)
	{
		if (!is_string($firstName))
			throw new InvalidArgumentException('string expected.');
		$this->_firstName = $firstName;
		return $this;
	}
	
	/**
	 * @return string First name
	 */
	public function getFirstName()
	{
		return $this->_firstName;
	}

	/**
	 * @param  string $lastName Last name
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setLastName($lastName)
	{
		if (!is_string($lastName))
			throw new InvalidArgumentException('string expected.');
		$this->_lastName = $lastName;
		return $this;
	}
	
	/**
	 * @return string Last name
	 */
	public function getLastName()
	{
		return $this->_lastName;
	}

	/**
	 * @param  string $street Street + streetnumber
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setStreet($street)
	{
		if (!is_string($street))
			throw new InvalidArgumentException('string expected.');
		$this->_street = $street;
		return $this;
	}
	
	/**
	 * @return string Street + streetnumber
	 */
	public function getStreet()
	{
		return $this->_street;
	}

	/**
	 * @param  string $zipCode Zip / postal code
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setZipCode($zipCode)
	{
		if (!is_string($zipCode))
			throw new InvalidArgumentException('string expected.');
		$this->_zipCode = $zipCode;
		return $this;
	}
	
	/**
	 * @return string Zip / postal code
	 */
	public function getZipCode()
	{
		return $this->_zipCode;
	}

	/**
	 * @param  string $city City
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setCity($city)
	{
		if (!is_string($city))
			throw new InvalidArgumentException('string expected.');
		$this->_city = $city;
		return $this;
	}
	
	/**
	 * @return string City
	 */
	public function getCity()
	{
		return $this->_city;
	}

	/**
	 * @param  string $countryIso Country ISO 3166-2 (2 letter Uppercase)
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setCountryIso($countryIso)
	{
		if (!is_string($countryIso))
			throw new InvalidArgumentException('string expected.');
		$this->_countryIso = $countryIso;
		return $this;
	}
	
	/**
	 * @return string Country ISO 3166-2 (2 letter Uppercase)
	 */
	public function getCountryIso()
	{
		return $this->_countryIso;
	}

	/**
	 * @param  string $phone Phone number
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setPhone($phone)
	{
		if (!is_string($phone))
			throw new InvalidArgumentException('string expected.');
		$this->_phone = $phone;
		return $this;
	}
	
	/**
	 * @return string Phone number
	 */
	public function getPhone()
	{
		return $this->_phone;
	}

	/**
	 * @param  string $deliveryInstruction Delivery instruction e.g. "c/o John Doe"
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setDeliveryInstruction($deliveryInstruction)
	{
		if (!is_string($deliveryInstruction))
			throw new InvalidArgumentException('string expected.');
		$this->_deliveryInstruction = $deliveryInstruction;
		return $this;
	}
	
	/**
	 * @return string Delivery instruction e.g. "c/o John Doe"
	 */
	public function getDeliveryInstruction()
	{
		return $this->_deliveryInstruction;
	}

	/**
	 * @param  string $extraAddressLine Extra address line e.g. "Apartment 2.5"
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setExtraAddressLine($extraAddressLine)
	{
		if (!is_string($extraAddressLine))
			throw new InvalidArgumentException('string expected.');
		$this->_extraAddressLine = $extraAddressLine;
		return $this;
	}
	
	/**
	 * @return string Extra address line e.g. "Apartment 2.5"
	 */
	public function getExtraAddressLine()
	{
		return $this->_extraAddressLine;
	}

	/**
	 * @param  string $mobile Mobile phone number
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setMobile($mobile)
	{
		if (!is_string($mobile))
			throw new InvalidArgumentException('string expected.');
		$this->_mobile = $mobile;
		return $this;
	}
	
	/**
	 * @return string Mobile phone number
	 */
	public function getMobile()
	{
		return $this->_mobile;
	}

	/**
	 * @param  string $eMail E-Mail address
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setEMail($eMail)
	{
		if (!is_string($eMail))
			throw new InvalidArgumentException('string expected.');
		$this->_eMail = $eMail;
		return $this;
	}
	
	/**
	 * @return string E-Mail address
	 */
	public function getEMail()
	{
		return $this->_eMail;
	}

	/**
	 * @param  string $fax Fax number
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setFax($fax)
	{
		if (!is_string($fax))
			throw new InvalidArgumentException('string expected.');
		$this->_fax = $fax;
		return $this;
	}
	
	/**
	 * @return string Fax number
	 */
	public function getFax()
	{
		return $this->_fax;
	}

	/**
	 * @param  string $state State
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setState($state)
	{
		if (!is_string($state))
			throw new InvalidArgumentException('string expected.');
		$this->_state = $state;
		return $this;
	}
	
	/**
	 * @return string State
	 */
	public function getState()
	{
		return $this->_state;
	}

	/**
	 * @param  Identity $id Unique customerOrderShippingAddress id
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique customerOrderShippingAddress id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $customerId Reference to customer
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCustomerId(Identity $customerId)
	{
		
		$this->_customerId = $customerId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to customer
	 */
	public function getCustomerId()
	{
		return $this->_customerId;
	}

	/**
	 * @param  string $salutation Salutation e.g. "Mr."
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setSalutation($salutation)
	{
		if (!is_string($salutation))
			throw new InvalidArgumentException('string expected.');
		$this->_salutation = $salutation;
		return $this;
	}
	
	/**
	 * @return string Salutation e.g. "Mr."
	 */
	public function getSalutation()
	{
		return $this->_salutation;
	}

	/**
	 * @param  \jtl\Connector\Model\CustomerOrder $customerOrder
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
	 * @return \jtl\Connector\Model\CustomerOrderShippingAddress
	 */
	public function clearCustomerOrders()
	{
		$this->_customerOrders = array();
		return $this;
	}
}

