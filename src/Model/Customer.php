<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Customer address data and preference properties.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class Customer extends DataModel
{
    /**
     * @var Identity References a customer group
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected $customerGroupId = null;
    
    /**
     * @var Identity Unique customer id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("accountCredit")
     * @Serializer\Accessor(getter="getAccountCredit",setter="setAccountCredit")
     */
    protected $accountCredit = 0.0;
    
    /**
     * @var DateTime Date of birth
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("birthday")
     * @Serializer\Accessor(getter="getBirthday",setter="setBirthday")
     */
    protected $birthday = null;
    
    /**
     * @var string City
     * @Serializer\Type("string")
     * @Serializer\SerializedName("city")
     * @Serializer\Accessor(getter="getCity",setter="setCity")
     */
    protected $city = '';
    
    /**
     * @var string Company name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("company")
     * @Serializer\Accessor(getter="getCompany",setter="setCompany")
     */
    protected $company = '';
    
    /**
     * @var string Country ISO 3166-2 (2 letter Uppercase)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("countryIso")
     * @Serializer\Accessor(getter="getCountryIso",setter="setCountryIso")
     */
    protected $countryIso = '';
    
    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("creationDate")
     * @Serializer\Accessor(getter="getCreationDate",setter="setCreationDate")
     */
    protected $creationDate = null;
    
    /**
     * @var string Optional customer number set by JTL-Wawi ERP software
     * @Serializer\Type("string")
     * @Serializer\SerializedName("customerNumber")
     * @Serializer\Accessor(getter="getCustomerNumber",setter="setCustomerNumber")
     */
    protected $customerNumber = '';
    
    /**
     * @var string Delivery instruction e.g. "c/o John Doe"
     * @Serializer\Type("string")
     * @Serializer\SerializedName("deliveryInstruction")
     * @Serializer\Accessor(getter="getDeliveryInstruction",setter="setDeliveryInstruction")
     */
    protected $deliveryInstruction = '';
    
    /**
     * @var double Percentage discount for customer on all prices
     * @Serializer\Type("double")
     * @Serializer\SerializedName("discount")
     * @Serializer\Accessor(getter="getDiscount",setter="setDiscount")
     */
    protected $discount = 0.0;
    
    /**
     * @var string E-Mail address
     * @Serializer\Type("string")
     * @Serializer\SerializedName("eMail")
     * @Serializer\Accessor(getter="getEMail",setter="setEMail")
     */
    protected $eMail = '';
    
    /**
     * @var string Extra address line e.g. "Apartment 2.5"
     * @Serializer\Type("string")
     * @Serializer\SerializedName("extraAddressLine")
     * @Serializer\Accessor(getter="getExtraAddressLine",setter="setExtraAddressLine")
     */
    protected $extraAddressLine = '';
    
    /**
     * @var string Fax number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("fax")
     * @Serializer\Accessor(getter="getFax",setter="setFax")
     */
    protected $fax = '';
    
    /**
     * @var string First name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("firstName")
     * @Serializer\Accessor(getter="getFirstName",setter="setFirstName")
     */
    protected $firstName = '';
    
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("hasCustomerAccount")
     * @Serializer\Accessor(getter="getHasCustomerAccount",setter="setHasCustomerAccount")
     */
    protected $hasCustomerAccount = false;
    
    /**
     * @var boolean Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("hasNewsletterSubscription")
     * @Serializer\Accessor(getter="getHasNewsletterSubscription",setter="setHasNewsletterSubscription")
     */
    protected $hasNewsletterSubscription = false;
    
    /**
     * @var boolean Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isActive")
     * @Serializer\Accessor(getter="getIsActive",setter="setIsActive")
     */
    protected $isActive = false;
    
    /**
     * @var string User locale preference
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';
    
    /**
     * @var string Last name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("lastName")
     * @Serializer\Accessor(getter="getLastName",setter="setLastName")
     */
    protected $lastName = '';
    
    /**
     * @var string Mobile phone number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("mobile")
     * @Serializer\Accessor(getter="getMobile",setter="setMobile")
     */
    protected $mobile = '';
    
    /**
     * @var string customer note
     * @Serializer\Type("string")
     * @Serializer\SerializedName("note")
     * @Serializer\Accessor(getter="getNote",setter="setNote")
     */
    protected $note = '';
    
    /**
     * @var string Customer origin
     * @Serializer\Type("string")
     * @Serializer\SerializedName("origin")
     * @Serializer\Accessor(getter="getOrigin",setter="setOrigin")
     */
    protected $origin = '';
    
    /**
     * @var string Phone number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("phone")
     * @Serializer\Accessor(getter="getPhone",setter="setPhone")
     */
    protected $phone = '';
    
    /**
     * @var string Salutation (german: "Anrede")
     * @Serializer\Type("string")
     * @Serializer\SerializedName("salutation")
     * @Serializer\Accessor(getter="getSalutation",setter="setSalutation")
     */
    protected $salutation = '';
    
    /**
     * @var string State
     * @Serializer\Type("string")
     * @Serializer\SerializedName("state")
     * @Serializer\Accessor(getter="getState",setter="setState")
     */
    protected $state = '';
    
    /**
     * @var string Street name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("street")
     * @Serializer\Accessor(getter="getStreet",setter="setStreet")
     */
    protected $street = '';
    
    /**
     * @var string Title, e.g. "Prof. Dr."
     * @Serializer\Type("string")
     * @Serializer\SerializedName("title")
     * @Serializer\Accessor(getter="getTitle",setter="setTitle")
     */
    protected $title = '';
    
    /**
     * @var string VAT number (german "USt-ID")
     * @Serializer\Type("string")
     * @Serializer\SerializedName("vatNumber")
     * @Serializer\Accessor(getter="getVatNumber",setter="setVatNumber")
     */
    protected $vatNumber = '';
    
    /**
     * @var string WWW address
     * @Serializer\Type("string")
     * @Serializer\SerializedName("websiteUrl")
     * @Serializer\Accessor(getter="getWebsiteUrl",setter="setWebsiteUrl")
     */
    protected $websiteUrl = '';
    
    /**
     * @var string ZIP / postal code
     * @Serializer\Type("string")
     * @Serializer\SerializedName("zipCode")
     * @Serializer\Accessor(getter="getZipCode",setter="setZipCode")
     */
    protected $zipCode = '';
    
    /**
     * @var \jtl\Connector\Model\CustomerAttr[]
     * @Serializer\Type("array<jtl\Connector\Model\CustomerAttr>")
     * @Serializer\SerializedName("attributes")
     * @Serializer\AccessType("reflection")
     */
    protected $attributes = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customerGroupId = new Identity();
        $this->id = new Identity();
    }
    
    /**
     * @param Identity $customerGroupId References a customer group
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        $this->customerGroupId = $customerGroupId;
        
        return $this;
    }
    
    /**
     * @return Identity References a customer group
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }
    
    /**
     * @param Identity $id Unique customer id
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique customer id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param double $accountCredit
     * @return \jtl\Connector\Model\Customer
     */
    public function setAccountCredit($accountCredit)
    {
        $this->accountCredit = $accountCredit;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getAccountCredit()
    {
        return $this->accountCredit;
    }
    
    /**
     * @param DateTime $birthday Date of birth
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setBirthday(DateTime $birthday = null)
    {
        $this->birthday = $birthday;
        
        return $this;
    }
    
    /**
     * @return DateTime Date of birth
     */
    public function getBirthday()
    {
        return $this->birthday;
    }
    
    /**
     * @param string $city City
     * @return \jtl\Connector\Model\Customer
     */
    public function setCity($city)
    {
        $this->city = $city;
        
        return $this;
    }
    
    /**
     * @return string City
     */
    public function getCity()
    {
        return $this->city;
    }
    
    /**
     * @param string $company Company name
     * @return \jtl\Connector\Model\Customer
     */
    public function setCompany($company)
    {
        $this->company = $company;
        
        return $this;
    }
    
    /**
     * @return string Company name
     */
    public function getCompany()
    {
        return $this->company;
    }
    
    /**
     * @param string $countryIso Country ISO 3166-2 (2 letter Uppercase)
     * @return \jtl\Connector\Model\Customer
     */
    public function setCountryIso($countryIso)
    {
        $this->countryIso = $countryIso;
        
        return $this;
    }
    
    /**
     * @return string Country ISO 3166-2 (2 letter Uppercase)
     */
    public function getCountryIso()
    {
        return $this->countryIso;
    }
    
    /**
     * @param DateTime $creationDate
     * @return \jtl\Connector\Model\Customer
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreationDate(DateTime $creationDate = null)
    {
        $this->creationDate = $creationDate;
        
        return $this;
    }
    
    /**
     * @return DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }
    
    /**
     * @param string $customerNumber Optional customer number set by JTL-Wawi ERP software
     * @return \jtl\Connector\Model\Customer
     */
    public function setCustomerNumber($customerNumber)
    {
        $this->customerNumber = $customerNumber;
        
        return $this;
    }
    
    /**
     * @return string Optional customer number set by JTL-Wawi ERP software
     */
    public function getCustomerNumber()
    {
        return $this->customerNumber;
    }
    
    /**
     * @param string $deliveryInstruction Delivery instruction e.g. "c/o John Doe"
     * @return \jtl\Connector\Model\Customer
     */
    public function setDeliveryInstruction($deliveryInstruction)
    {
        $this->deliveryInstruction = $deliveryInstruction;
        
        return $this;
    }
    
    /**
     * @return string Delivery instruction e.g. "c/o John Doe"
     */
    public function getDeliveryInstruction()
    {
        return $this->deliveryInstruction;
    }
    
    /**
     * @param double $discount Percentage discount for customer on all prices
     * @return \jtl\Connector\Model\Customer
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        
        return $this;
    }
    
    /**
     * @return double Percentage discount for customer on all prices
     */
    public function getDiscount()
    {
        return $this->discount;
    }
    
    /**
     * @param string $eMail E-Mail address
     * @return \jtl\Connector\Model\Customer
     */
    public function setEMail($eMail)
    {
        $this->eMail = $eMail;
        
        return $this;
    }
    
    /**
     * @return string E-Mail address
     */
    public function getEMail()
    {
        return $this->eMail;
    }
    
    /**
     * @param string $extraAddressLine Extra address line e.g. "Apartment 2.5"
     * @return \jtl\Connector\Model\Customer
     */
    public function setExtraAddressLine($extraAddressLine)
    {
        $this->extraAddressLine = $extraAddressLine;
        
        return $this;
    }
    
    /**
     * @return string Extra address line e.g. "Apartment 2.5"
     */
    public function getExtraAddressLine()
    {
        return $this->extraAddressLine;
    }
    
    /**
     * @param string $fax Fax number
     * @return \jtl\Connector\Model\Customer
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
        
        return $this;
    }
    
    /**
     * @return string Fax number
     */
    public function getFax()
    {
        return $this->fax;
    }
    
    /**
     * @param string $firstName First name
     * @return \jtl\Connector\Model\Customer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        
        return $this;
    }
    
    /**
     * @return string First name
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * @param boolean $hasCustomerAccount
     * @return \jtl\Connector\Model\Customer
     */
    public function setHasCustomerAccount($hasCustomerAccount)
    {
        $this->hasCustomerAccount = $hasCustomerAccount;
        
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function getHasCustomerAccount()
    {
        return $this->hasCustomerAccount;
    }
    
    /**
     * @param boolean $hasNewsletterSubscription Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     * @return \jtl\Connector\Model\Customer
     */
    public function setHasNewsletterSubscription($hasNewsletterSubscription)
    {
        $this->hasNewsletterSubscription = $hasNewsletterSubscription;
        
        return $this;
    }
    
    /**
     * @return boolean Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     */
    public function getHasNewsletterSubscription()
    {
        return $this->hasNewsletterSubscription;
    }
    
    /**
     * @param boolean $isActive Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password.
     * @return \jtl\Connector\Model\Customer
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        
        return $this;
    }
    
    /**
     * @return boolean Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password.
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    
    /**
     * @param string $languageISO User locale preference
     * @return \jtl\Connector\Model\Customer
     */
    public function setLanguageISO($languageISO)
    {
        $this->languageISO = $languageISO;
        
        return $this;
    }
    
    /**
     * @return string User locale preference
     */
    public function getLanguageISO()
    {
        return $this->languageISO;
    }
    
    /**
     * @param string $lastName Last name
     * @return \jtl\Connector\Model\Customer
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        
        return $this;
    }
    
    /**
     * @return string Last name
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * @param string $mobile Mobile phone number
     * @return \jtl\Connector\Model\Customer
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        
        return $this;
    }
    
    /**
     * @return string Mobile phone number
     */
    public function getMobile()
    {
        return $this->mobile;
    }
    
    /**
     * @param string $note customer note
     * @return \jtl\Connector\Model\Customer
     */
    public function setNote($note)
    {
        $this->note = $note;
        
        return $this;
    }
    
    /**
     * @return string customer note
     */
    public function getNote()
    {
        return $this->note;
    }
    
    /**
     * @param string $origin Customer origin
     * @return \jtl\Connector\Model\Customer
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
        
        return $this;
    }
    
    /**
     * @return string Customer origin
     */
    public function getOrigin()
    {
        return $this->origin;
    }
    
    /**
     * @param string $phone Phone number
     * @return \jtl\Connector\Model\Customer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        
        return $this;
    }
    
    /**
     * @return string Phone number
     */
    public function getPhone()
    {
        return $this->phone;
    }
    
    /**
     * @param string $salutation Salutation (german: "Anrede")
     * @return \jtl\Connector\Model\Customer
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
        
        return $this;
    }
    
    /**
     * @return string Salutation (german: "Anrede")
     */
    public function getSalutation()
    {
        return $this->salutation;
    }
    
    /**
     * @param string $state State
     * @return \jtl\Connector\Model\Customer
     */
    public function setState($state)
    {
        $this->state = $state;
        
        return $this;
    }
    
    /**
     * @return string State
     */
    public function getState()
    {
        return $this->state;
    }
    
    /**
     * @param string $street Street name
     * @return \jtl\Connector\Model\Customer
     */
    public function setStreet($street)
    {
        $this->street = $street;
        
        return $this;
    }
    
    /**
     * @return string Street name
     */
    public function getStreet()
    {
        return $this->street;
    }
    
    /**
     * @param string $title Title, e.g. "Prof. Dr."
     * @return \jtl\Connector\Model\Customer
     */
    public function setTitle($title)
    {
        $this->title = $title;
        
        return $this;
    }
    
    /**
     * @return string Title, e.g. "Prof. Dr."
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @param string $vatNumber VAT number (german "USt-ID")
     * @return \jtl\Connector\Model\Customer
     */
    public function setVatNumber($vatNumber)
    {
        $this->vatNumber = $vatNumber;
        
        return $this;
    }
    
    /**
     * @return string VAT number (german "USt-ID")
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }
    
    /**
     * @param string $websiteUrl WWW address
     * @return \jtl\Connector\Model\Customer
     */
    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;
        
        return $this;
    }
    
    /**
     * @return string WWW address
     */
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }
    
    /**
     * @param string $zipCode ZIP / postal code
     * @return \jtl\Connector\Model\Customer
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        
        return $this;
    }
    
    /**
     * @return string ZIP / postal code
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
    
    /**
     * @param \jtl\Connector\Model\CustomerAttr $attribute
     * @return \jtl\Connector\Model\Customer
     */
    public function addAttribute(\jtl\Connector\Model\CustomerAttr $attribute)
    {
        $this->attributes[] = $attribute;
        
        return $this;
    }
    
    /**
     * @param array $attributes
     * @return \jtl\Connector\Model\Customer
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
        
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
        $this->attributes = [];
        
        return $this;
    }
}
