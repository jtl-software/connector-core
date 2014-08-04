<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Customer address data and preference properties..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Customer extends DataModel
{
    /**
     * @type Identity References a customer group
     */
    protected $customerGroupId = null;

    /**
     * @type Identity Unique customer id
     */
    protected $id = null;

    /**
     * @type double Credit value on customer account in default currency
     */
    protected $accountCredit = 0.0;

    /**
     * @type string Date of birth
     */
    protected $birthday = '';

    /**
     * @type string City
     */
    protected $city = '';

    /**
     * @type string Company name
     */
    protected $company = '';

    /**
     * @type string Country ISO 3166-2 (2 letter Uppercase)
     */
    protected $countryIso = '';

    /**
     * @type string Creation date
     */
    protected $created = '';

    /**
     * @type string Optional customer number set by JTL-Wawi ERP software
     */
    protected $customerNumber = '';

    /**
     * @type string Delivery instruction e.g. "c/o John Doe"
     */
    protected $deliveryInstruction = '';

    /**
     * @type double Percentual discount for customer on all prices
     */
    protected $discount = 0.0;

    /**
     * @type string E-Mail address
     */
    protected $eMail = '';

    /**
     * @type string Extra address line e.g. "Apartment 2.5"
     */
    protected $extraAddressLine = '';

    /**
     * @type string Fax number
     */
    protected $fax = '';

    /**
     * @type string First name
     */
    protected $firstName = '';

    /**
     * @type bool Flag persistent customer account. True, if customer chose to create persistent customer account. False, if customer doesnt want to have his data stored for login-purposes.
     */
    protected $hasCustomerAccount = false;

    /**
     * @type bool Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     */
    protected $hasNewsletterSubscription = false;

    /**
     * @type bool Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password. 
     */
    protected $isActive = false;

    /**
     * @type bool Flag if customer is fetched by ERP System. True, if customer is already fetched and must not be fetched again. 
     */
    protected $isFetched = false;

    /**
     * @type string Last name
     */
    protected $lastName = '';

    /**
     * @type string User locale preference
     */
    protected $localeName = '';

    /**
     * @type string Mobile phone number
     */
    protected $mobile = '';

    /**
     * @type string Last modified date
     */
    protected $modified = '';

    /**
     * @type string Customer origin
     */
    protected $origin = '';

    /**
     * @type string Optional (encrypted!) customer password
     */
    protected $password = '';

    /**
     * @type string Phone number
     */
    protected $phone = '';

    /**
     * @type string Salutation (german: "Anrede")
     */
    protected $salutation = '';

    /**
     * @type string State
     */
    protected $state = '';

    /**
     * @type string Street name
     */
    protected $street = '';

    /**
     * @type string Title, e.g. "Prof. Dr."
     */
    protected $title = '';

    /**
     * @type string VAT number (german "USt-ID")
     */
    protected $vatNumber = '';

    /**
     * @type string WWW address
     */
    protected $www = '';

    /**
     * @type string ZIP / postal code
     */
    protected $zipCode = '';

    /**
     * @type \jtl\Connector\Model\CustomerAttr[]
     */
    protected $attributes = array();

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'customerGroupId',
        'id',
    );

    /**
     * @param  Identity $customerGroupId References a customer group
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('CustomerGroupId', $customerGroupId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setAccountCredit(Identity $accountCredit)
    {
        return $this->setProperty('AccountCredit', $accountCredit, 'double');
    }

    /**
     * @return double Credit value on customer account in default currency
     */
    public function getAccountCredit()
    {
        return $this->accountCredit;
    }

    /**
     * @param  string $birthday Date of birth
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBirthday(Identity $birthday)
    {
        return $this->setProperty('Birthday', $birthday, 'string');
    }

    /**
     * @return string Date of birth
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param  string $city City
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCity(Identity $city)
    {
        return $this->setProperty('City', $city, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCompany(Identity $company)
    {
        return $this->setProperty('Company', $company, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCountryIso(Identity $countryIso)
    {
        return $this->setProperty('CountryIso', $countryIso, 'string');
    }

    /**
     * @return string Country ISO 3166-2 (2 letter Uppercase)
     */
    public function getCountryIso()
    {
        return $this->countryIso;
    }

    /**
     * @param  string $created Creation date
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCreated(Identity $created)
    {
        return $this->setProperty('Created', $created, 'string');
    }

    /**
     * @return string Creation date
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param  string $customerNumber Optional customer number set by JTL-Wawi ERP software
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerNumber(Identity $customerNumber)
    {
        return $this->setProperty('CustomerNumber', $customerNumber, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDeliveryInstruction(Identity $deliveryInstruction)
    {
        return $this->setProperty('DeliveryInstruction', $deliveryInstruction, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDiscount(Identity $discount)
    {
        return $this->setProperty('Discount', $discount, 'double');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setEMail(Identity $eMail)
    {
        return $this->setProperty('EMail', $eMail, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setExtraAddressLine(Identity $extraAddressLine)
    {
        return $this->setProperty('ExtraAddressLine', $extraAddressLine, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setFax(Identity $fax)
    {
        return $this->setProperty('Fax', $fax, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setFirstName(Identity $firstName)
    {
        return $this->setProperty('FirstName', $firstName, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setHasCustomerAccount(Identity $hasCustomerAccount)
    {
        return $this->setProperty('HasCustomerAccount', $hasCustomerAccount, 'bool');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setHasNewsletterSubscription(Identity $hasNewsletterSubscription)
    {
        return $this->setProperty('HasNewsletterSubscription', $hasNewsletterSubscription, 'bool');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsActive(Identity $isActive)
    {
        return $this->setProperty('IsActive', $isActive, 'bool');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsFetched(Identity $isFetched)
    {
        return $this->setProperty('IsFetched', $isFetched, 'bool');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLastName(Identity $lastName)
    {
        return $this->setProperty('LastName', $lastName, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('LocaleName', $localeName, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMobile(Identity $mobile)
    {
        return $this->setProperty('Mobile', $mobile, 'string');
    }

    /**
     * @return string Mobile phone number
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param  string $modified Last modified date
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setModified(Identity $modified)
    {
        return $this->setProperty('Modified', $modified, 'string');
    }

    /**
     * @return string Last modified date
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param  string $origin Customer origin
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setOrigin(Identity $origin)
    {
        return $this->setProperty('Origin', $origin, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPassword(Identity $password)
    {
        return $this->setProperty('Password', $password, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPhone(Identity $phone)
    {
        return $this->setProperty('Phone', $phone, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSalutation(Identity $salutation)
    {
        return $this->setProperty('Salutation', $salutation, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setState(Identity $state)
    {
        return $this->setProperty('State', $state, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setStreet(Identity $street)
    {
        return $this->setProperty('Street', $street, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTitle(Identity $title)
    {
        return $this->setProperty('Title', $title, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setVatNumber(Identity $vatNumber)
    {
        return $this->setProperty('VatNumber', $vatNumber, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setWww(Identity $www)
    {
        return $this->setProperty('Www', $www, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setZipCode(Identity $zipCode)
    {
        return $this->setProperty('ZipCode', $zipCode, 'string');
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
