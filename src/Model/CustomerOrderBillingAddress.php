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
 * Billing address of a customer (order)
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerOrderBillingAddress extends AbstractDataModel implements IdentityInterface
{
    /**
     * @var Identity Unique customerOrderBillingAddress id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
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
     * @var string Delivery instruction e.g. 'John Doe'
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
     * @var string Salutation (german: 'Anrede')
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
     * @var string Street + street number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("street")
     * @Serializer\Accessor(getter="getStreet",setter="setStreet")
     */
    protected $street = '';
    
    /**
     * @var string Title (e.g. 'Prof. Dr.')
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
    }

    /**
     * @param Identity $id Unique customerOrderBillingAddress id
     * @return CustomerOrderBillingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): CustomerOrderBillingAddress
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique customerOrderBillingAddress id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param string $city City
     * @return CustomerOrderBillingAddress
     */
    public function setCity(string $city): CustomerOrderBillingAddress
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
     * @return CustomerOrderBillingAddress
     */
    public function setCompany(string $company): CustomerOrderBillingAddress
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
     * @return CustomerOrderBillingAddress
     */
    public function setCountryIso(string $countryIso): CustomerOrderBillingAddress
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
     * @param string $deliveryInstruction Delivery instruction e.g. 'John Doe'
     * @return CustomerOrderBillingAddress
     */
    public function setDeliveryInstruction(string $deliveryInstruction): CustomerOrderBillingAddress
    {
        $this->deliveryInstruction = $deliveryInstruction;
        
        return $this;
    }
    
    /**
     * @return string Delivery instruction e.g. 'John Doe'
     */
    public function getDeliveryInstruction(): string
    {
        return $this->deliveryInstruction;
    }
    
    /**
     * @param string $eMail E-Mail address
     * @return CustomerOrderBillingAddress
     */
    public function setEMail(string $eMail): CustomerOrderBillingAddress
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
     * @return CustomerOrderBillingAddress
     */
    public function setExtraAddressLine(string $extraAddressLine): CustomerOrderBillingAddress
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
     * @return CustomerOrderBillingAddress
     */
    public function setFax(string $fax): CustomerOrderBillingAddress
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
     * @return CustomerOrderBillingAddress
     */
    public function setFirstName(string $firstName): CustomerOrderBillingAddress
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
     * @return CustomerOrderBillingAddress
     */
    public function setLastName(string $lastName): CustomerOrderBillingAddress
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
     * @return CustomerOrderBillingAddress
     */
    public function setMobile(string $mobile): CustomerOrderBillingAddress
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
     * @return CustomerOrderBillingAddress
     */
    public function setPhone(string $phone): CustomerOrderBillingAddress
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
     * @param string $salutation Salutation (german: 'Anrede')
     * @return CustomerOrderBillingAddress
     */
    public function setSalutation(string $salutation): CustomerOrderBillingAddress
    {
        $this->salutation = $salutation;
        
        return $this;
    }
    
    /**
     * @return string Salutation (german: 'Anrede')
     */
    public function getSalutation(): string
    {
        return $this->salutation;
    }
    
    /**
     * @param string $state State
     * @return CustomerOrderBillingAddress
     */
    public function setState(string $state): CustomerOrderBillingAddress
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
     * @param string $street Street + street number
     * @return CustomerOrderBillingAddress
     */
    public function setStreet(string $street): CustomerOrderBillingAddress
    {
        $this->street = $street;
        
        return $this;
    }
    
    /**
     * @return string Street + street number
     */
    public function getStreet(): string
    {
        return $this->street;
    }
    
    /**
     * @param string $title Title (e.g. 'Prof. Dr.')
     * @return CustomerOrderBillingAddress
     */
    public function setTitle(string $title): CustomerOrderBillingAddress
    {
        $this->title = $title;
        
        return $this;
    }
    
    /**
     * @return string Title (e.g. 'Prof. Dr.')
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    
    /**
     * @param string $vatNumber VAT number (german "USt-ID")
     * @return CustomerOrderBillingAddress
     */
    public function setVatNumber(string $vatNumber): CustomerOrderBillingAddress
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
     * @param string $zipCode Zip / postal code
     * @return CustomerOrderBillingAddress
     */
    public function setZipCode(string $zipCode): CustomerOrderBillingAddress
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
