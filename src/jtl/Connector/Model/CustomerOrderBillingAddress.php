<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Billing address of a customer (order).
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CustomerOrderBillingAddress extends DataModel
{
    /**
     * @type Identity Reference to customer
     */
    protected $customerId = null;

    /**
     * @type Identity Unique customerOrderBillingAddress id
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
     * @type string Delivery instruction e.g. "c/o John Doe"
     */
    protected $deliveryInstruction = '';

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
     * @type string Last name
     */
    protected $lastName = '';

    /**
     * @type string Mobile phone number
     */
    protected $mobile = '';

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
     * @type string Street + street number
     */
    protected $street = '';

    /**
     * @type string Title (e.g. "Prof. Dr.")
     */
    protected $title = '';

    /**
     * @type string Zip / postal code
     */
    protected $zipCode = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'customerId',
        'id',
    );

    /**
     * @param  Identity $customerId Reference to customer
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId)
    {
        return $this->setProperty('CustomerId', $customerId, 'Identity');
    }

    /**
     * @return Identity Reference to customer
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param  Identity $id Unique customerOrderBillingAddress id
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique customerOrderBillingAddress id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $city City
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @param  string $deliveryInstruction Delivery instruction e.g. "c/o John Doe"
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @param  string $eMail E-Mail address
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @param  string $lastName Last name
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @param  string $mobile Mobile phone number
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @param  string $phone Phone number
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @param  string $street Street + street number
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setStreet(Identity $street)
    {
        return $this->setProperty('Street', $street, 'string');
    }

    /**
     * @return string Street + street number
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param  string $title Title (e.g. "Prof. Dr.")
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTitle(Identity $title)
    {
        return $this->setProperty('Title', $title, 'string');
    }

    /**
     * @return string Title (e.g. "Prof. Dr.")
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param  string $zipCode Zip / postal code
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setZipCode(Identity $zipCode)
    {
        return $this->setProperty('ZipCode', $zipCode, 'string');
    }

    /**
     * @return string Zip / postal code
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

 
}
