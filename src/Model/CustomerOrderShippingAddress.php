<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Shipping Address properties of a customer (order)
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerOrderShippingAddress extends AbstractIdentity
{
    /**
     * @var Identity Reference to customer
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerId")
     * @Serializer\Accessor(getter="getCustomerId",setter="setCustomerId")
     */
    protected $customerId = null;

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
     * @var string Delivery instruction e.g. "c/o John Doe"
     * @Serializer\Type("string")
     * @Serializer\SerializedName("deliveryInstruction")
     * @Serializer\Accessor(getter="getDeliveryInstruction",setter="setDeliveryInstruction")
     */
    protected $deliveryInstruction = '';
    
    /**
     * @var string E-Mail address
     * @Serializer\Type("string")
     * @Serializer\SerializedName("eMail")
     * @Serializer\Accessor(getter="getEMail",setter="setEMail")
     */
    protected $eMail = '';
    
    /**
     * @var string Extra address line e.g. 'Apartment 2.5'
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
     * @var string Phone number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("phone")
     * @Serializer\Accessor(getter="getPhone",setter="setPhone")
     */
    protected $phone = '';
    
    /**
     * @var string Salutation e.g. 'Mr.'
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
     * @var string Street + streetnumber
     * @Serializer\Type("string")
     * @Serializer\SerializedName("street")
     * @Serializer\Accessor(getter="getStreet",setter="setStreet")
     */
    protected $street = '';
    
    /**
     * @var string Title e.g. ("Prof. Dr.")
     * @Serializer\Type("string")
     * @Serializer\SerializedName("title")
     * @Serializer\Accessor(getter="getTitle",setter="setTitle")
     */
    protected $title = '';
    
    /**
     * @var string Zip / postal code
     * @Serializer\Type("string")
     * @Serializer\SerializedName("zipCode")
     * @Serializer\Accessor(getter="getZipCode",setter="setZipCode")
     */
    protected $zipCode = '';
    
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->customerId = new Identity();
    }
    
    /**
     * @param Identity $customerId Reference to customer
     * @return CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId): CustomerOrderShippingAddress
    {
        $this->customerId = $customerId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to customer
     */
    public function getCustomerId(): Identity
    {
        return $this->customerId;
    }

    /**
     * @param string $city City
     * @return CustomerOrderShippingAddress
     */
    public function setCity(string $city): CustomerOrderShippingAddress
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
     * @return CustomerOrderShippingAddress
     */
    public function setCompany(string $company): CustomerOrderShippingAddress
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
     * @return CustomerOrderShippingAddress
     */
    public function setCountryIso(string $countryIso): CustomerOrderShippingAddress
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
     * @param string $deliveryInstruction Delivery instruction e.g. "c/o John Doe"
     * @return CustomerOrderShippingAddress
     */
    public function setDeliveryInstruction(string $deliveryInstruction): CustomerOrderShippingAddress
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
     * @param string $eMail E-Mail address
     * @return CustomerOrderShippingAddress
     */
    public function setEMail(string $eMail): CustomerOrderShippingAddress
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
     * @param string $extraAddressLine Extra address line e.g. 'Apartment 2.5'
     * @return CustomerOrderShippingAddress
     */
    public function setExtraAddressLine(string $extraAddressLine): CustomerOrderShippingAddress
    {
        $this->extraAddressLine = $extraAddressLine;
        
        return $this;
    }
    
    /**
     * @return string Extra address line e.g. 'Apartment 2.5'
     */
    public function getExtraAddressLine(): string
    {
        return $this->extraAddressLine;
    }
    
    /**
     * @param string $fax Fax number
     * @return CustomerOrderShippingAddress
     */
    public function setFax(string $fax): CustomerOrderShippingAddress
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
     * @return CustomerOrderShippingAddress
     */
    public function setFirstName(string $firstName): CustomerOrderShippingAddress
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
     * @param string $lastName Last name
     * @return CustomerOrderShippingAddress
     */
    public function setLastName(string $lastName): CustomerOrderShippingAddress
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
     * @return CustomerOrderShippingAddress
     */
    public function setMobile(string $mobile): CustomerOrderShippingAddress
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
     * @param string $phone Phone number
     * @return CustomerOrderShippingAddress
     */
    public function setPhone(string $phone): CustomerOrderShippingAddress
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
     * @param string $salutation Salutation e.g. 'Mr.'
     * @return CustomerOrderShippingAddress
     */
    public function setSalutation(string $salutation): CustomerOrderShippingAddress
    {
        $this->salutation = $salutation;
        
        return $this;
    }
    
    /**
     * @return string Salutation e.g. 'Mr.'
     */
    public function getSalutation(): string
    {
        return $this->salutation;
    }
    
    /**
     * @param string $state State
     * @return CustomerOrderShippingAddress
     */
    public function setState(string $state): CustomerOrderShippingAddress
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
     * @param string $street Street + streetnumber
     * @return CustomerOrderShippingAddress
     */
    public function setStreet(string $street): CustomerOrderShippingAddress
    {
        $this->street = $street;
        
        return $this;
    }
    
    /**
     * @return string Street + streetnumber
     */
    public function getStreet(): string
    {
        return $this->street;
    }
    
    /**
     * @param string $title Title e.g. ("Prof. Dr.")
     * @return CustomerOrderShippingAddress
     */
    public function setTitle(string $title): CustomerOrderShippingAddress
    {
        $this->title = $title;
        
        return $this;
    }
    
    /**
     * @return string Title e.g. ("Prof. Dr.")
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    
    /**
     * @param string $zipCode Zip / postal code
     * @return CustomerOrderShippingAddress
     */
    public function setZipCode(string $zipCode): CustomerOrderShippingAddress
    {
        $this->zipCode = $zipCode;
        
        return $this;
    }
    
    /**
     * @return string Zip / postal code
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }
}
