<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Customer address data and preference properties..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Customer extends DataModel
{
    /**
     * @type Identity 
     */
    protected $_customerCategoryId = null;

    /**
     * @type Identity References a customer group
     */
    protected $_customerGroupId = null;

    /**
     * @type Identity Unique customer id
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
     * @type DateTime|null Creation date
     */
    protected $_created = null;

    /**
     * @type string Optional customer number set by JTL-Wawi ERP software
     */
    protected $_customerNumber = '';

    /**
     * @type string Delivery instruction e.g. "c/o John Doe"
     */
    protected $_deliveryInstruction = '';

    /**
     * @type float|null Percentual discount for customer on all prices
     */
    protected $_discount = 0.0;

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
     * @type boolean Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     */
    protected $_hasNewsletterSubscription = false;

    /**
     * @type boolean Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password. 
     */
    protected $_isActive = false;

    /**
     * @type integer|null 
     */
    protected $_kKundenDrucktext = 0;

    /**
     * @type integer|null 
     */
    protected $_languageId = 0;

    /**
     * @type string Last name
     */
    protected $_lastName = '';

    /**
     * @type string Mobile phone number
     */
    protected $_mobile = '';

    /**
     * @type string Customer origin
     */
    protected $_origin = '';

    /**
     * @type string Phone number
     */
    protected $_phone = '';

    /**
     * @type string Salutation (german: "Anrede")
     */
    protected $_salutation = '';

    /**
     * @type string State
     */
    protected $_state = '';

    /**
     * @type string Street name
     */
    protected $_street = '';

    /**
     * @type string Title, e.g. "Prof. Dr."
     */
    protected $_title = '';

    /**
     * @type string VAT number (german "USt-ID")
     */
    protected $_vatNumber = '';

    /**
     * @type string WWW address
     */
    protected $_www = '';

    /**
     * @type string ZIP / postal code
     */
    protected $_zipCode = '';

    /**
	 * Nav [Customer » ZeroOrOne]
	 *
     * @type \jtl\Connector\Model\CustomerAttr[]
     */
    protected $_attrs = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_customerCategoryId',
		'_customerGroupId',
	);

	/**
	 * @param  string $customerNumber Optional customer number set by JTL-Wawi ERP software
	 * @return \jtl\Connector\Model\Customer
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setCustomerNumber($customerNumber)
	{
		if (!is_string($customerNumber))
			throw new InvalidArgumentException('string expected.');
		$this->_customerNumber = $customerNumber;
		return $this;
	}
	
	/**
	 * @return string Optional customer number set by JTL-Wawi ERP software
	 */
	public function getCustomerNumber()
	{
		return $this->_customerNumber;
	}

	/**
	 * @param  string $company Company name
	 * @return \jtl\Connector\Model\Customer
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
	 * @param  string $title Title, e.g. "Prof. Dr."
	 * @return \jtl\Connector\Model\Customer
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
	 * @return string Title, e.g. "Prof. Dr."
	 */
	public function getTitle()
	{
		return $this->_title;
	}

	/**
	 * @param  string $firstName First name
	 * @return \jtl\Connector\Model\Customer
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
	 * @return \jtl\Connector\Model\Customer
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
	 * @param  string $street Street name
	 * @return \jtl\Connector\Model\Customer
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
	 * @return string Street name
	 */
	public function getStreet()
	{
		return $this->_street;
	}

	/**
	 * @param  string $zipCode ZIP / postal code
	 * @return \jtl\Connector\Model\Customer
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
	 * @return string ZIP / postal code
	 */
	public function getZipCode()
	{
		return $this->_zipCode;
	}

	/**
	 * @param  string $city City
	 * @return \jtl\Connector\Model\Customer
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
	 * @return \jtl\Connector\Model\Customer
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
	 * @return \jtl\Connector\Model\Customer
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
	 * @param  string $fax Fax number
	 * @return \jtl\Connector\Model\Customer
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
	 * @param  string $eMail E-Mail address
	 * @return \jtl\Connector\Model\Customer
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
	 * @param  DateTime $created Creation date
	 * @return \jtl\Connector\Model\Customer
	 * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
	 */
	public function setCreated(DateTime $created)
	{
		
		$this->_created = $created;
		return $this;
	}
	
	/**
	 * @return DateTime Creation date
	 */
	public function getCreated()
	{
		return $this->_created;
	}

	/**
	 * @param  string $mobile Mobile phone number
	 * @return \jtl\Connector\Model\Customer
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
	 * @param  float $discount Percentual discount for customer on all prices
	 * @return \jtl\Connector\Model\Customer
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setDiscount($discount)
	{
		if (!is_float($discount))
			throw new InvalidArgumentException('float expected.');
		$this->_discount = $discount;
		return $this;
	}
	
	/**
	 * @return float Percentual discount for customer on all prices
	 */
	public function getDiscount()
	{
		return $this->_discount;
	}

	/**
	 * @param  string $vatNumber VAT number (german "USt-ID")
	 * @return \jtl\Connector\Model\Customer
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setVatNumber($vatNumber)
	{
		if (!is_string($vatNumber))
			throw new InvalidArgumentException('string expected.');
		$this->_vatNumber = $vatNumber;
		return $this;
	}
	
	/**
	 * @return string VAT number (german "USt-ID")
	 */
	public function getVatNumber()
	{
		return $this->_vatNumber;
	}

	/**
	 * @param  string $deliveryInstruction Delivery instruction e.g. "c/o John Doe"
	 * @return \jtl\Connector\Model\Customer
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
	 * @return \jtl\Connector\Model\Customer
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
	 * @param  string $www WWW address
	 * @return \jtl\Connector\Model\Customer
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setWww($www)
	{
		if (!is_string($www))
			throw new InvalidArgumentException('string expected.');
		$this->_www = $www;
		return $this;
	}
	
	/**
	 * @return string WWW address
	 */
	public function getWww()
	{
		return $this->_www;
	}

	/**
	 * @param  integer $languageId 
	 * @return \jtl\Connector\Model\Customer
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
	 * @param  string $state State
	 * @return \jtl\Connector\Model\Customer
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
	 * @param  string $origin Customer origin
	 * @return \jtl\Connector\Model\Customer
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setOrigin($origin)
	{
		if (!is_string($origin))
			throw new InvalidArgumentException('string expected.');
		$this->_origin = $origin;
		return $this;
	}
	
	/**
	 * @return string Customer origin
	 */
	public function getOrigin()
	{
		return $this->_origin;
	}

	/**
	 * @param  integer $kKundenDrucktext 
	 * @return \jtl\Connector\Model\Customer
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setKKundenDrucktext($kKundenDrucktext)
	{
		if (!is_integer($kKundenDrucktext))
			throw new InvalidArgumentException('integer expected.');
		$this->_kKundenDrucktext = $kKundenDrucktext;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getKKundenDrucktext()
	{
		return $this->_kKundenDrucktext;
	}

	/**
	 * @param  Identity $id Unique customer id
	 * @return \jtl\Connector\Model\Customer
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique customer id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $customerCategoryId 
	 * @return \jtl\Connector\Model\Customer
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCustomerCategoryId(Identity $customerCategoryId)
	{
		
		$this->_customerCategoryId = $customerCategoryId;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getCustomerCategoryId()
	{
		return $this->_customerCategoryId;
	}

	/**
	 * @param  string $salutation Salutation (german: "Anrede")
	 * @return \jtl\Connector\Model\Customer
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
	 * @return string Salutation (german: "Anrede")
	 */
	public function getSalutation()
	{
		return $this->_salutation;
	}

	/**
	 * @param  boolean $isActive Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password. 
	 * @return \jtl\Connector\Model\Customer
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
	 * @return boolean Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password. 
	 */
	public function getIsActive()
	{
		return $this->_isActive;
	}

	/**
	 * @param  boolean $hasNewsletterSubscription Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
	 * @return \jtl\Connector\Model\Customer
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setHasNewsletterSubscription($hasNewsletterSubscription)
	{
		if (!is_bool($hasNewsletterSubscription))
			throw new InvalidArgumentException('boolean expected.');
		$this->_hasNewsletterSubscription = $hasNewsletterSubscription;
		return $this;
	}
	
	/**
	 * @return boolean Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
	 */
	public function getHasNewsletterSubscription()
	{
		return $this->_hasNewsletterSubscription;
	}

	/**
	 * @param  Identity $customerGroupId References a customer group
	 * @return \jtl\Connector\Model\Customer
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCustomerGroupId(Identity $customerGroupId)
	{
		
		$this->_customerGroupId = $customerGroupId;
		return $this;
	}
	
	/**
	 * @return Identity References a customer group
	 */
	public function getCustomerGroupId()
	{
		return $this->_customerGroupId;
	}

	/**
	 * @param  \jtl\Connector\Model\CustomerAttr $attr
	 * @return \jtl\Connector\Model\Customer
	 */
	public function addAttr(\jtl\Connector\Model\CustomerAttr $attr)
	{
		$this->_attrs[] = $attr;
		return $this;
	}
	
	/**
	 * @return CustomerAttr
	 */
	public function getAttrs()
	{
		return $this->_attrs;
	}

	/**
	 * @return \jtl\Connector\Model\Customer
	 */
	public function clearAttrs()
	{
		$this->_attrs = array();
		return $this;
	}
}

