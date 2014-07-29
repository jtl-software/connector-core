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
        'id',
        'customerId',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->navigations;
    }

    /**
     * @param  string $company Company name
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @param  string $title Title (e.g. "Prof. Dr.")
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setTitle($title)
    {
        return $this->setProperty('title', $title, 'string');
    }
    
    /**
     * @return string Title (e.g. "Prof. Dr.")
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param  string $firstName First name
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @param  string $street Street + street number
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setStreet($street)
    {
        return $this->setProperty('street', $street, 'string');
    }
    
    /**
     * @return string Street + street number
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param  string $zipCode Zip / postal code
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setZipCode($zipCode)
    {
        return $this->setProperty('zipCode', $zipCode, 'string');
    }
    
    /**
     * @return string Zip / postal code
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param  string $city City
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @param  string $deliveryInstruction Delivery instruction e.g. "c/o John Doe"
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @param  string $mobile Mobile phone number
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @param  string $eMail E-Mail address
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @param  string $fax Fax number
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @param  string $state State
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
     * @param  Identity $id Unique customerOrderBillingAddress id
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique customerOrderBillingAddress id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $customerId Reference to customer
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId)
    {
        return $this->setProperty('customerId', $customerId, 'Identity');
    }
    
    /**
     * @return Identity Reference to customer
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param  string $salutation Salutation (german: "Anrede")
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress
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
}

