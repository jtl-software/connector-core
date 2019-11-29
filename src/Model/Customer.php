<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use DateTime;
use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Customer address data and preference properties.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class Customer extends AbstractDataModel implements IdentityInterface
{
    /**
     * @var Identity References a customer group
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected $customerGroupId = null;
    
    /**
     * @var Identity Unique customer id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
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
     * @var KeyValueAttribute[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\KeyValueAttribute>")
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
     * @return Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId): Customer
    {
        $this->customerGroupId = $customerGroupId;
        
        return $this;
    }
    
    /**
     * @return Identity References a customer group
     */
    public function getCustomerGroupId(): Identity
    {
        return $this->customerGroupId;
    }
    
    /**
     * @param Identity $id Unique customer id
     * @return Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): Customer
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
     * @return Customer
     */
    public function setAccountCredit(float $accountCredit): Customer
    {
        $this->accountCredit = $accountCredit;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getAccountCredit(): float
    {
        return $this->accountCredit;
    }
    
    /**
     * @param \DateTimeInterface $birthday Date of birth
     * @return Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setBirthday(\DateTimeInterface $birthday = null): Customer
    {
        $this->birthday = $birthday;
        
        return $this;
    }
    
    /**
     * @return DateTime Date of birth
     */
    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }
    
    /**
     * @param string $city City
     * @return Customer
     */
    public function setCity(string $city): Customer
    {
        $this->city = $city;
        
        return $this;
    }
    
    /**
     * @return string City
     */
    public function getCity(): string
    {
        return $this->city;
    }
    
    /**
     * @param string $company Company name
     * @return Customer
     */
    public function setCompany(string $company): Customer
    {
        $this->company = $company;
        
        return $this;
    }
    
    /**
     * @return string Company name
     */
    public function getCompany(): string
    {
        return $this->company;
    }
    
    /**
     * @param string $countryIso Country ISO 3166-2 (2 letter Uppercase)
     * @return Customer
     */
    public function setCountryIso(string $countryIso): Customer
    {
        $this->countryIso = $countryIso;
        
        return $this;
    }
    
    /**
     * @return string Country ISO 3166-2 (2 letter Uppercase)
     */
    public function getCountryIso(): string
    {
        return $this->countryIso;
    }
    
    /**
     * @param \DateTimeInterface $creationDate
     * @return Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreationDate(\DateTimeInterface $creationDate = null): Customer
    {
        $this->creationDate = $creationDate;
        
        return $this;
    }
    
    /**
     * @return DateTime
     */
    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }
    
    /**
     * @param string $customerNumber Optional customer number set by JTL-Wawi ERP software
     * @return Customer
     */
    public function setCustomerNumber(string $customerNumber): Customer
    {
        $this->customerNumber = $customerNumber;
        
        return $this;
    }
    
    /**
     * @return string Optional customer number set by JTL-Wawi ERP software
     */
    public function getCustomerNumber(): string
    {
        return $this->customerNumber;
    }
    
    /**
     * @param string $deliveryInstruction Delivery instruction e.g. "c/o John Doe"
     * @return Customer
     */
    public function setDeliveryInstruction(string $deliveryInstruction): Customer
    {
        $this->deliveryInstruction = $deliveryInstruction;
        
        return $this;
    }
    
    /**
     * @return string Delivery instruction e.g. "c/o John Doe"
     */
    public function getDeliveryInstruction(): string
    {
        return $this->deliveryInstruction;
    }
    
    /**
     * @param double $discount Percentage discount for customer on all prices
     * @return Customer
     */
    public function setDiscount(float $discount): Customer
    {
        $this->discount = $discount;
        
        return $this;
    }
    
    /**
     * @return double Percentage discount for customer on all prices
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }
    
    /**
     * @param string $eMail E-Mail address
     * @return Customer
     */
    public function setEMail(string $eMail): Customer
    {
        $this->eMail = $eMail;
        
        return $this;
    }
    
    /**
     * @return string E-Mail address
     */
    public function getEMail(): string
    {
        return $this->eMail;
    }
    
    /**
     * @param string $extraAddressLine Extra address line e.g. "Apartment 2.5"
     * @return Customer
     */
    public function setExtraAddressLine(string $extraAddressLine): Customer
    {
        $this->extraAddressLine = $extraAddressLine;
        
        return $this;
    }
    
    /**
     * @return string Extra address line e.g. "Apartment 2.5"
     */
    public function getExtraAddressLine(): string
    {
        return $this->extraAddressLine;
    }
    
    /**
     * @param string $fax Fax number
     * @return Customer
     */
    public function setFax(string $fax): Customer
    {
        $this->fax = $fax;
        
        return $this;
    }
    
    /**
     * @return string Fax number
     */
    public function getFax(): string
    {
        return $this->fax;
    }
    
    /**
     * @param string $firstName First name
     * @return Customer
     */
    public function setFirstName(string $firstName): Customer
    {
        $this->firstName = $firstName;
        
        return $this;
    }
    
    /**
     * @return string First name
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    
    /**
     * @param boolean $hasCustomerAccount
     * @return Customer
     */
    public function setHasCustomerAccount(bool $hasCustomerAccount): Customer
    {
        $this->hasCustomerAccount = $hasCustomerAccount;
        
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function getHasCustomerAccount(): bool
    {
        return $this->hasCustomerAccount;
    }
    
    /**
     * @param boolean $hasNewsletterSubscription Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     * @return Customer
     */
    public function setHasNewsletterSubscription(bool $hasNewsletterSubscription): Customer
    {
        $this->hasNewsletterSubscription = $hasNewsletterSubscription;
        
        return $this;
    }
    
    /**
     * @return boolean Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     */
    public function getHasNewsletterSubscription(): bool
    {
        return $this->hasNewsletterSubscription;
    }
    
    /**
     * @param boolean $isActive Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password.
     * @return Customer
     */
    public function setIsActive(bool $isActive): Customer
    {
        $this->isActive = $isActive;
        
        return $this;
    }
    
    /**
     * @return boolean Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password.
     */
    public function getIsActive(): bool
    {
        return $this->isActive;
    }
    
    /**
     * @param string $languageISO User locale preference
     * @return Customer
     */
    public function setLanguageISO(string $languageISO): Customer
    {
        $this->languageISO = $languageISO;
        
        return $this;
    }
    
    /**
     * @return string User locale preference
     */
    public function getLanguageISO(): string
    {
        return $this->languageISO;
    }
    
    /**
     * @param string $lastName Last name
     * @return Customer
     */
    public function setLastName(string $lastName): Customer
    {
        $this->lastName = $lastName;
        
        return $this;
    }
    
    /**
     * @return string Last name
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
    
    /**
     * @param string $mobile Mobile phone number
     * @return Customer
     */
    public function setMobile(string $mobile): Customer
    {
        $this->mobile = $mobile;
        
        return $this;
    }
    
    /**
     * @return string Mobile phone number
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }
    
    /**
     * @param string $note customer note
     * @return Customer
     */
    public function setNote(string $note): Customer
    {
        $this->note = $note;
        
        return $this;
    }
    
    /**
     * @return string customer note
     */
    public function getNote(): string
    {
        return $this->note;
    }
    
    /**
     * @param string $origin Customer origin
     * @return Customer
     */
    public function setOrigin(string $origin): Customer
    {
        $this->origin = $origin;
        
        return $this;
    }
    
    /**
     * @return string Customer origin
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }
    
    /**
     * @param string $phone Phone number
     * @return Customer
     */
    public function setPhone(string $phone): Customer
    {
        $this->phone = $phone;
        
        return $this;
    }
    
    /**
     * @return string Phone number
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
    
    /**
     * @param string $salutation Salutation (german: "Anrede")
     * @return Customer
     */
    public function setSalutation(string $salutation): Customer
    {
        $this->salutation = $salutation;
        
        return $this;
    }
    
    /**
     * @return string Salutation (german: "Anrede")
     */
    public function getSalutation(): string
    {
        return $this->salutation;
    }
    
    /**
     * @param string $state State
     * @return Customer
     */
    public function setState(string $state): Customer
    {
        $this->state = $state;
        
        return $this;
    }
    
    /**
     * @return string State
     */
    public function getState(): string
    {
        return $this->state;
    }
    
    /**
     * @param string $street Street name
     * @return Customer
     */
    public function setStreet(string $street): Customer
    {
        $this->street = $street;
        
        return $this;
    }
    
    /**
     * @return string Street name
     */
    public function getStreet(): string
    {
        return $this->street;
    }
    
    /**
     * @param string $title Title, e.g. "Prof. Dr."
     * @return Customer
     */
    public function setTitle(string $title): Customer
    {
        $this->title = $title;
        
        return $this;
    }
    
    /**
     * @return string Title, e.g. "Prof. Dr."
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    
    /**
     * @param string $vatNumber VAT number (german "USt-ID")
     * @return Customer
     */
    public function setVatNumber(string $vatNumber): Customer
    {
        $this->vatNumber = $vatNumber;
        
        return $this;
    }
    
    /**
     * @return string VAT number (german "USt-ID")
     */
    public function getVatNumber(): string
    {
        return $this->vatNumber;
    }
    
    /**
     * @param string $websiteUrl WWW address
     * @return Customer
     */
    public function setWebsiteUrl(string $websiteUrl): Customer
    {
        $this->websiteUrl = $websiteUrl;
        
        return $this;
    }
    
    /**
     * @return string WWW address
     */
    public function getWebsiteUrl(): string
    {
        return $this->websiteUrl;
    }
    
    /**
     * @param string $zipCode ZIP / postal code
     * @return Customer
     */
    public function setZipCode(string $zipCode): Customer
    {
        $this->zipCode = $zipCode;
        
        return $this;
    }
    
    /**
     * @return string ZIP / postal code
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }
    
    /**
     * @param KeyValueAttribute $attribute
     * @return Customer
     */
    public function addAttribute(KeyValueAttribute $attribute): Customer
    {
        $this->attributes[] = $attribute;
        
        return $this;
    }

    /**
     * @param KeyValueAttribute ...$attributes
     * @return Customer
     */
    public function setAttributes(KeyValueAttribute ...$attributes): Customer
    {
        $this->attributes = $attributes;
        
        return $this;
    }
    
    /**
     * @return KeyValueAttribute[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
    
    /**
     * @return Customer
     */
    public function clearAttributes(): Customer
    {
        $this->attributes = [];
        
        return $this;
    }
}
