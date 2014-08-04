<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Customer address data and preference properties..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Customer extends DataModel
{
    /**
     * @var Identity References a customer group
     */
    protected $customerGroupId = null;

    /**
     * @var Identity Unique customer id
     */
    protected $id = null;

    /**
     * @var double Credit value on customer account in default currency
     */
    protected $accountCredit = 0.0;

    /**
     * @var DateTime Date of birth
     */
    protected $birthday = null;

    /**
     * @var string City
     */
    protected $city = '';

    /**
     * @var string Company name
     */
    protected $company = '';

    /**
     * @var string Country ISO 3166-2 (2 letter Uppercase)
     */
    protected $countryIso = '';

    /**
     * @var DateTime Creation date
     */
    protected $created = null;

    /**
     * @var string Optional customer number set by JTL-Wawi ERP software
     */
    protected $customerNumber = '';

    /**
     * @var string Delivery instruction e.g. "c/o John Doe"
     */
    protected $deliveryInstruction = '';

    /**
     * @var double Percentual discount for customer on all prices
     */
    protected $discount = 0.0;

    /**
     * @var string E-Mail address
     */
    protected $eMail = '';

    /**
     * @var string Extra address line e.g. "Apartment 2.5"
     */
    protected $extraAddressLine = '';

    /**
     * @var string Fax number
     */
    protected $fax = '';

    /**
     * @var string First name
     */
    protected $firstName = '';

    /**
     * @var bool Flag persistent customer account. True, if customer chose to create persistent customer account. False, if customer doesnt want to have his data stored for login-purposes.
     */
    protected $hasCustomerAccount = false;

    /**
     * @var bool Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     */
    protected $hasNewsletterSubscription = false;

    /**
     * @var bool Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password. 
     */
    protected $isActive = false;

    /**
     * @var bool Flag if customer is fetched by ERP System. True, if customer is already fetched and must not be fetched again. 
     */
    protected $isFetched = false;

    /**
     * @var string Last name
     */
    protected $lastName = '';

    /**
     * @var string User locale preference
     */
    protected $localeName = '';

    /**
     * @var string Mobile phone number
     */
    protected $mobile = '';

    /**
     * @var DateTime Last modified date
     */
    protected $modified = null;

    /**
     * @var string Customer origin
     */
    protected $origin = '';

    /**
     * @var string Optional (encrypted!) customer password
     */
    protected $password = '';

    /**
     * @var string Phone number
     */
    protected $phone = '';

    /**
     * @var string Salutation (german: "Anrede")
     */
    protected $salutation = '';

    /**
     * @var string State
     */
    protected $state = '';

    /**
     * @var string Street name
     */
    protected $street = '';

    /**
     * @var string Title, e.g. "Prof. Dr."
     */
    protected $title = '';

    /**
     * @var string VAT number (german "USt-ID")
     */
    protected $vatNumber = '';

    /**
     * @var string WWW address
     */
    protected $www = '';

    /**
     * @var string ZIP / postal code
     */
    protected $zipCode = '';

    /**
     * @var \jtl\Connector\Model\CustomerAttr[]
     */
    protected $attributes = array();

    /**
     * @param  Identity $customerGroupId References a customer group
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('customerGroupId', $customerGroupId, 'Identity');
    }

    /**
     * @return Identity References a customer group
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }

    /**
     * @param  Identity $id Unique customer id
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique customer id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  double $accountCredit Credit value on customer account in default currency
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setAccountCredit($accountCredit)
    {
        return $this->setProperty('accountCredit', $accountCredit, 'double');
    }

    /**
     * @return double Credit value on customer account in default currency
     */
    public function getAccountCredit()
    {
        return $this->accountCredit;
    }

    /**
     * @param  DateTime $birthday Date of birth
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setBirthday(DateTime $birthday)
    {
        return $this->setProperty('birthday', $birthday, 'DateTime');
    }

    /**
     * @return DateTime Date of birth
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param  string $city City
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCity($city)
    {
        return $this->setProperty('city', $city, 'string');
    }

    /**
     * @return string City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param  string $company Company name
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCompany($company)
    {
        return $this->setProperty('company', $company, 'string');
    }

    /**
     * @return string Company name
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param  string $countryIso Country ISO 3166-2 (2 letter Uppercase)
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCountryIso($countryIso)
    {
        return $this->setProperty('countryIso', $countryIso, 'string');
    }

    /**
     * @return string Country ISO 3166-2 (2 letter Uppercase)
     */
    public function getCountryIso()
    {
        return $this->countryIso;
    }

    /**
     * @param  DateTime $created Creation date
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreated(DateTime $created)
    {
        return $this->setProperty('created', $created, 'DateTime');
    }

    /**
     * @return DateTime Creation date
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param  string $customerNumber Optional customer number set by JTL-Wawi ERP software
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCustomerNumber($customerNumber)
    {
        return $this->setProperty('customerNumber', $customerNumber, 'string');
    }

    /**
     * @return string Optional customer number set by JTL-Wawi ERP software
     */
    public function getCustomerNumber()
    {
        return $this->customerNumber;
    }

    /**
     * @param  string $deliveryInstruction Delivery instruction e.g. "c/o John Doe"
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDeliveryInstruction($deliveryInstruction)
    {
        return $this->setProperty('deliveryInstruction', $deliveryInstruction, 'string');
    }

    /**
     * @return string Delivery instruction e.g. "c/o John Doe"
     */
    public function getDeliveryInstruction()
    {
        return $this->deliveryInstruction;
    }

    /**
     * @param  double $discount Percentual discount for customer on all prices
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setDiscount($discount)
    {
        return $this->setProperty('discount', $discount, 'double');
    }

    /**
     * @return double Percentual discount for customer on all prices
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param  string $eMail E-Mail address
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setEMail($eMail)
    {
        return $this->setProperty('eMail', $eMail, 'string');
    }

    /**
     * @return string E-Mail address
     */
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * @param  string $extraAddressLine Extra address line e.g. "Apartment 2.5"
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setExtraAddressLine($extraAddressLine)
    {
        return $this->setProperty('extraAddressLine', $extraAddressLine, 'string');
    }

    /**
     * @return string Extra address line e.g. "Apartment 2.5"
     */
    public function getExtraAddressLine()
    {
        return $this->extraAddressLine;
    }

    /**
     * @param  string $fax Fax number
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setFax($fax)
    {
        return $this->setProperty('fax', $fax, 'string');
    }

    /**
     * @return string Fax number
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param  string $firstName First name
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setFirstName($firstName)
    {
        return $this->setProperty('firstName', $firstName, 'string');
    }

    /**
     * @return string First name
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param  bool $hasCustomerAccount Flag persistent customer account. True, if customer chose to create persistent customer account. False, if customer doesnt want to have his data stored for login-purposes.
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setHasCustomerAccount($hasCustomerAccount)
    {
        return $this->setProperty('hasCustomerAccount', $hasCustomerAccount, 'bool');
    }

    /**
     * @return bool Flag persistent customer account. True, if customer chose to create persistent customer account. False, if customer doesnt want to have his data stored for login-purposes.
     */
    public function getHasCustomerAccount()
    {
        return $this->hasCustomerAccount;
    }

    /**
     * @param  bool $hasNewsletterSubscription Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setHasNewsletterSubscription($hasNewsletterSubscription)
    {
        return $this->setProperty('hasNewsletterSubscription', $hasNewsletterSubscription, 'bool');
    }

    /**
     * @return bool Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     */
    public function getHasNewsletterSubscription()
    {
        return $this->hasNewsletterSubscription;
    }

    /**
     * @param  bool $isActive Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password. 
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('isActive', $isActive, 'bool');
    }

    /**
     * @return bool Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password. 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param  bool $isFetched Flag if customer is fetched by ERP System. True, if customer is already fetched and must not be fetched again. 
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsFetched($isFetched)
    {
        return $this->setProperty('isFetched', $isFetched, 'bool');
    }

    /**
     * @return bool Flag if customer is fetched by ERP System. True, if customer is already fetched and must not be fetched again. 
     */
    public function getIsFetched()
    {
        return $this->isFetched;
    }

    /**
     * @param  string $lastName Last name
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLastName($lastName)
    {
        return $this->setProperty('lastName', $lastName, 'string');
    }

    /**
     * @return string Last name
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param  string $localeName User locale preference
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('localeName', $localeName, 'string');
    }

    /**
     * @return string User locale preference
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }

    /**
     * @param  string $mobile Mobile phone number
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMobile($mobile)
    {
        return $this->setProperty('mobile', $mobile, 'string');
    }

    /**
     * @return string Mobile phone number
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param  DateTime $modified Last modified date
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setModified(DateTime $modified)
    {
        return $this->setProperty('modified', $modified, 'DateTime');
    }

    /**
     * @return DateTime Last modified date
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param  string $origin Customer origin
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setOrigin($origin)
    {
        return $this->setProperty('origin', $origin, 'string');
    }

    /**
     * @return string Customer origin
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param  string $password Optional (encrypted!) customer password
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setPassword($password)
    {
        return $this->setProperty('password', $password, 'string');
    }

    /**
     * @return string Optional (encrypted!) customer password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param  string $phone Phone number
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setPhone($phone)
    {
        return $this->setProperty('phone', $phone, 'string');
    }

    /**
     * @return string Phone number
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param  string $salutation Salutation (german: "Anrede")
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setSalutation($salutation)
    {
        return $this->setProperty('salutation', $salutation, 'string');
    }

    /**
     * @return string Salutation (german: "Anrede")
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * @param  string $state State
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setState($state)
    {
        return $this->setProperty('state', $state, 'string');
    }

    /**
     * @return string State
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param  string $street Street name
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setStreet($street)
    {
        return $this->setProperty('street', $street, 'string');
    }

    /**
     * @return string Street name
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param  string $title Title, e.g. "Prof. Dr."
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setTitle($title)
    {
        return $this->setProperty('title', $title, 'string');
    }

    /**
     * @return string Title, e.g. "Prof. Dr."
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param  string $vatNumber VAT number (german "USt-ID")
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setVatNumber($vatNumber)
    {
        return $this->setProperty('vatNumber', $vatNumber, 'string');
    }

    /**
     * @return string VAT number (german "USt-ID")
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    /**
     * @param  string $www WWW address
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setWww($www)
    {
        return $this->setProperty('www', $www, 'string');
    }

    /**
     * @return string WWW address
     */
    public function getWww()
    {
        return $this->www;
    }

    /**
     * @param  string $zipCode ZIP / postal code
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setZipCode($zipCode)
    {
        return $this->setProperty('zipCode', $zipCode, 'string');
    }

    /**
     * @return string ZIP / postal code
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerAttr $attributes
     * @return \jtl\Connector\Model\Customer
     */
    public function addAttribute(\jtl\Connector\Model\CustomerAttr $attribute)
    {
        $this->attributes[] = $attribute;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CustomerAttr[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return \jtl\Connector\Model\Customer
     */
    public function clearAttributes()
    {
        $this->attributes = array();
        return $this;
    }

 
}
