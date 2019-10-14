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
 * Shipping Address properties of a customer (order)
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerOrderShippingAddress extends DataModel
{
    /**
     * @var Identity Reference to customer
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerId")
     * @Serializer\Accessor(getter="getCustomerId",setter="setCustomerId")
     */
    protected $customerId = null;
    
    /**
     * @var Identity Unique customerOrderShippingAddress id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
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
        $this->id = new Identity();
        $this->customerId = new Identity();
    }
    
    /**
     * @param Identity $customerId Reference to customer
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId)
    {
        $this->customerId = $customerId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to customer
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }
    
    /**
     * @param Identity $id Unique customerOrderShippingAddress id
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique customerOrderShippingAddress id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param string $city City
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param string $deliveryInstruction Delivery instruction e.g. "c/o John Doe"
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param string $eMail E-Mail address
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param string $extraAddressLine Extra address line e.g. 'Apartment 2.5'
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setExtraAddressLine($extraAddressLine)
    {
        $this->extraAddressLine = $extraAddressLine;
        
        return $this;
    }
    
    /**
     * @return string Extra address line e.g. 'Apartment 2.5'
     */
    public function getExtraAddressLine()
    {
        return $this->extraAddressLine;
    }
    
    /**
     * @param string $fax Fax number
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param string $lastName Last name
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param string $phone Phone number
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param string $salutation Salutation e.g. 'Mr.'
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
        
        return $this;
    }
    
    /**
     * @return string Salutation e.g. 'Mr.'
     */
    public function getSalutation()
    {
        return $this->salutation;
    }
    
    /**
     * @param string $state State
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param string $street Street + streetnumber
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setStreet($street)
    {
        $this->street = $street;
        
        return $this;
    }
    
    /**
     * @return string Street + streetnumber
     */
    public function getStreet()
    {
        return $this->street;
    }
    
    /**
     * @param string $title Title e.g. ("Prof. Dr.")
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setTitle($title)
    {
        $this->title = $title;
        
        return $this;
    }
    
    /**
     * @return string Title e.g. ("Prof. Dr.")
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @param string $zipCode Zip / postal code
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        
        return $this;
    }
    
    /**
     * @return string Zip / postal code
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
}
