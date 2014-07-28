<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Shipping Address properties of a customer (order).
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerOrderShippingAddress extends DataModel
{
    /**
     * @type Identity Reference to customer
     */
    public $_customerId = null;

    /**
     * @type Identity Unique customerOrderShippingAddress id
     */
    public $_id = null;

    /**
     * @type string City
     */
    public $_city = '';

    /**
     * @type string Company name
     */
    public $_company = '';

    /**
     * @type string Country ISO 3166-2 (2 letter Uppercase)
     */
    public $_countryIso = '';

    /**
     * @type string Delivery instruction e.g. "c/o John Doe"
     */
    public $_deliveryInstruction = '';

    /**
     * @type string E-Mail address
     */
    public $_eMail = '';

    /**
     * @type string Extra address line e.g. "Apartment 2.5"
     */
    public $_extraAddressLine = '';

    /**
     * @type string Fax number
     */
    public $_fax = '';

    /**
     * @type string First name
     */
    public $_firstName = '';

    /**
     * @type string Last name
     */
    public $_lastName = '';

    /**
     * @type string Mobile phone number
     */
    public $_mobile = '';

    /**
     * @type string Phone number
     */
    public $_phone = '';

    /**
     * @type string Salutation e.g. "Mr."
     */
    public $_salutation = '';

    /**
     * @type string State
     */
    public $_state = '';

    /**
     * @type string Street + streetnumber
     */
    public $_street = '';

    /**
     * @type string Title e.g. ("Prof. Dr.")
     */
    public $_title = '';

    /**
     * @type string Zip / postal code
     */
    public $_zipCode = '';


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_customerId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  string $company Company name
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCompany($company)
    {
        return $this->setProperty('_company', $company, 'string');
    }
    
    /**
     * @return string Company name
     */
    public function getCompany()
    {
        return $this->_company;
    }

    /**
     * @param  string $title Title e.g. ("Prof. Dr.")
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setTitle($title)
    {
        return $this->setProperty('_title', $title, 'string');
    }
    
    /**
     * @return string Title e.g. ("Prof. Dr.")
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param  string $firstName First name
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setFirstName($firstName)
    {
        return $this->setProperty('_firstName', $firstName, 'string');
    }
    
    /**
     * @return string First name
     */
    public function getFirstName()
    {
        return $this->_firstName;
    }

    /**
     * @param  string $lastName Last name
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLastName($lastName)
    {
        return $this->setProperty('_lastName', $lastName, 'string');
    }
    
    /**
     * @return string Last name
     */
    public function getLastName()
    {
        return $this->_lastName;
    }

    /**
     * @param  string $street Street + streetnumber
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setStreet($street)
    {
        return $this->setProperty('_street', $street, 'string');
    }
    
    /**
     * @return string Street + streetnumber
     */
    public function getStreet()
    {
        return $this->_street;
    }

    /**
     * @param  string $zipCode Zip / postal code
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setZipCode($zipCode)
    {
        return $this->setProperty('_zipCode', $zipCode, 'string');
    }
    
    /**
     * @return string Zip / postal code
     */
    public function getZipCode()
    {
        return $this->_zipCode;
    }

    /**
     * @param  string $city City
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCity($city)
    {
        return $this->setProperty('_city', $city, 'string');
    }
    
    /**
     * @return string City
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @param  string $countryIso Country ISO 3166-2 (2 letter Uppercase)
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCountryIso($countryIso)
    {
        return $this->setProperty('_countryIso', $countryIso, 'string');
    }
    
    /**
     * @return string Country ISO 3166-2 (2 letter Uppercase)
     */
    public function getCountryIso()
    {
        return $this->_countryIso;
    }

    /**
     * @param  string $phone Phone number
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setPhone($phone)
    {
        return $this->setProperty('_phone', $phone, 'string');
    }
    
    /**
     * @return string Phone number
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param  string $deliveryInstruction Delivery instruction e.g. "c/o John Doe"
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDeliveryInstruction($deliveryInstruction)
    {
        return $this->setProperty('_deliveryInstruction', $deliveryInstruction, 'string');
    }
    
    /**
     * @return string Delivery instruction e.g. "c/o John Doe"
     */
    public function getDeliveryInstruction()
    {
        return $this->_deliveryInstruction;
    }

    /**
     * @param  string $extraAddressLine Extra address line e.g. "Apartment 2.5"
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setExtraAddressLine($extraAddressLine)
    {
        return $this->setProperty('_extraAddressLine', $extraAddressLine, 'string');
    }
    
    /**
     * @return string Extra address line e.g. "Apartment 2.5"
     */
    public function getExtraAddressLine()
    {
        return $this->_extraAddressLine;
    }

    /**
     * @param  string $mobile Mobile phone number
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMobile($mobile)
    {
        return $this->setProperty('_mobile', $mobile, 'string');
    }
    
    /**
     * @return string Mobile phone number
     */
    public function getMobile()
    {
        return $this->_mobile;
    }

    /**
     * @param  string $eMail E-Mail address
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setEMail($eMail)
    {
        return $this->setProperty('_eMail', $eMail, 'string');
    }
    
    /**
     * @return string E-Mail address
     */
    public function getEMail()
    {
        return $this->_eMail;
    }

    /**
     * @param  string $fax Fax number
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setFax($fax)
    {
        return $this->setProperty('_fax', $fax, 'string');
    }
    
    /**
     * @return string Fax number
     */
    public function getFax()
    {
        return $this->_fax;
    }

    /**
     * @param  string $state State
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setState($state)
    {
        return $this->setProperty('_state', $state, 'string');
    }
    
    /**
     * @return string State
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param  Identity $id Unique customerOrderShippingAddress id
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique customerOrderShippingAddress id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $customerId Reference to customer
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId)
    {
        return $this->setProperty('_customerId', $customerId, 'Identity');
    }
    
    /**
     * @return Identity Reference to customer
     */
    public function getCustomerId()
    {
        return $this->_customerId;
    }

    /**
     * @param  string $salutation Salutation e.g. "Mr."
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setSalutation($salutation)
    {
        return $this->setProperty('_salutation', $salutation, 'string');
    }
    
    /**
     * @return string Salutation e.g. "Mr."
     */
    public function getSalutation()
    {
        return $this->_salutation;
    }
}

