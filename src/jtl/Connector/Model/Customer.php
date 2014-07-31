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
     * @type Identity 
     */
    protected $customerCategoryId = null;

    /**
     * @type Identity References a customer group
     */
    protected $customerGroupId = null;

    /**
     * @type Identity Unique customer id
     */
    protected $id = null;

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
     * @type DateTime|null Creation date
     */
    protected $created = null;

    /**
     * @type string Optional customer number set by JTL-Wawi ERP software
     */
    protected $customerNumber = '';

    /**
     * @type string Delivery instruction e.g. "c/o John Doe"
     */
    protected $deliveryInstruction = '';

    /**
     * @type float|null Percentual discount for customer on all prices
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
     * @type boolean Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     */
    protected $hasNewsletterSubscription = false;

    /**
     * @type boolean Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password. 
     */
    protected $isActive = false;

    /**
     * @type integer|null 
     */
    protected $languageId = 0;

    /**
     * @type string Last name
     */
    protected $lastName = '';

    /**
     * @type string Mobile phone number
     */
    protected $mobile = '';

    /**
     * @type string Customer origin
     */
    protected $origin = '';

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
     * Nav [Customer » ZeroOrOne]
     *
     * @type \jtl\Connector\Model\CustomerAttr[]
     */
    protected $attributes = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'customerCategoryId',
        'customerGroupId',
    );

    /**
     * @param  string $customerNumber Optional customer number set by JTL-Wawi ERP software
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $company Company name
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $title Title, e.g. "Prof. Dr."
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $firstName First name
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $lastName Last name
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $street Street name
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $zipCode ZIP / postal code
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $city City
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $countryIso Country ISO 3166-2 (2 letter Uppercase)
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $phone Phone number
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $fax Fax number
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $eMail E-Mail address
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  DateTime $created Creation date
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
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
     * @param  string $mobile Mobile phone number
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  float $discount Percentual discount for customer on all prices
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setDiscount($discount)
    {
        return $this->setProperty('discount', $discount, 'float');
    }
    
    /**
     * @return float Percentual discount for customer on all prices
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param  string $vatNumber VAT number (german "USt-ID")
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $deliveryInstruction Delivery instruction e.g. "c/o John Doe"
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $extraAddressLine Extra address line e.g. "Apartment 2.5"
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $www WWW address
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  integer $languageId 
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setLanguageId($languageId)
    {
        return $this->setProperty('languageId', $languageId, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * @param  string $state State
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $origin Customer origin
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  Identity $id Unique customer id
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  Identity $customerCategoryId 
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerCategoryId(Identity $customerCategoryId)
    {
        return $this->setProperty('customerCategoryId', $customerCategoryId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getCustomerCategoryId()
    {
        return $this->customerCategoryId;
    }

    /**
     * @param  string $salutation Salutation (german: "Anrede")
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  boolean $isActive Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password. 
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('isActive', $isActive, 'boolean');
    }
    
    /**
     * @return boolean Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password. 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param  boolean $hasNewsletterSubscription Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setHasNewsletterSubscription($hasNewsletterSubscription)
    {
        return $this->setProperty('hasNewsletterSubscription', $hasNewsletterSubscription, 'boolean');
    }
    
    /**
     * @return boolean Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     */
    public function getHasNewsletterSubscription()
    {
        return $this->hasNewsletterSubscription;
    }

    /**
     * @param  Identity $customerGroupId References a customer group
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  \jtl\Connector\Model\CustomerAttr $attribute
     * @return \jtl\Connector\Model\Customer
     */
    public function addAttribute(\jtl\Connector\Model\CustomerAttr $attribute)
    {
        $this->attributes[] = $attribute;
        return $this;
    }
    
    /**
     * @return CustomerAttr
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

