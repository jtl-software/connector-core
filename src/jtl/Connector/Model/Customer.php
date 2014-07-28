<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Customer address data and preference properties..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Customer extends DataModel
{
    /**
     * @type Identity 
     */
    public $_customerCategoryId = null;

    /**
     * @type Identity References a customer group
     */
    public $_customerGroupId = null;

    /**
     * @type Identity Unique customer id
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
     * @type DateTime|null Creation date
     */
    public $_created = null;

    /**
     * @type string Optional customer number set by JTL-Wawi ERP software
     */
    public $_customerNumber = '';

    /**
     * @type string Delivery instruction e.g. "c/o John Doe"
     */
    public $_deliveryInstruction = '';

    /**
     * @type float|null Percentual discount for customer on all prices
     */
    public $_discount = 0.0;

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
     * @type boolean Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     */
    public $_hasNewsletterSubscription = false;

    /**
     * @type boolean Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password. 
     */
    public $_isActive = false;

    /**
     * @type integer|null 
     */
    public $_languageId = 0;

    /**
     * @type string Last name
     */
    public $_lastName = '';

    /**
     * @type string Mobile phone number
     */
    public $_mobile = '';

    /**
     * @type string Customer origin
     */
    public $_origin = '';

    /**
     * @type string Phone number
     */
    public $_phone = '';

    /**
     * @type string Salutation (german: "Anrede")
     */
    public $_salutation = '';

    /**
     * @type string State
     */
    public $_state = '';

    /**
     * @type string Street name
     */
    public $_street = '';

    /**
     * @type string Title, e.g. "Prof. Dr."
     */
    public $_title = '';

    /**
     * @type string VAT number (german "USt-ID")
     */
    public $_vatNumber = '';

    /**
     * @type string WWW address
     */
    public $_www = '';

    /**
     * @type string ZIP / postal code
     */
    public $_zipCode = '';

    /**
     * Nav [Customer » ZeroOrOne]
     *
     * @type \jtl\Connector\Model\CustomerAttr[]
     */
    public $_attributes = array();


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_customerCategoryId',
        '_customerGroupId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
        '_attributes' => '\jtl\Connector\Model\CustomerAttr',
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
     * @param  string $customerNumber Optional customer number set by JTL-Wawi ERP software
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCustomerNumber($customerNumber)
    {
        return $this->setProperty('_customerNumber', $customerNumber, 'string');
    }
    
    /**
     * @return string Optional customer number set by JTL-Wawi ERP software
     */
    public function getCustomerNumber()
    {
        return $this->_customerNumber;
    }

    /**
     * @param  string $company Company name
     * @return \jtl\Connector\Model\Customer
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
     * @param  string $title Title, e.g. "Prof. Dr."
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setTitle($title)
    {
        return $this->setProperty('_title', $title, 'string');
    }
    
    /**
     * @return string Title, e.g. "Prof. Dr."
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param  string $firstName First name
     * @return \jtl\Connector\Model\Customer
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
     * @return \jtl\Connector\Model\Customer
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
     * @param  string $street Street name
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setStreet($street)
    {
        return $this->setProperty('_street', $street, 'string');
    }
    
    /**
     * @return string Street name
     */
    public function getStreet()
    {
        return $this->_street;
    }

    /**
     * @param  string $zipCode ZIP / postal code
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setZipCode($zipCode)
    {
        return $this->setProperty('_zipCode', $zipCode, 'string');
    }
    
    /**
     * @return string ZIP / postal code
     */
    public function getZipCode()
    {
        return $this->_zipCode;
    }

    /**
     * @param  string $city City
     * @return \jtl\Connector\Model\Customer
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
     * @return \jtl\Connector\Model\Customer
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
     * @return \jtl\Connector\Model\Customer
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
     * @param  string $fax Fax number
     * @return \jtl\Connector\Model\Customer
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
     * @param  string $eMail E-Mail address
     * @return \jtl\Connector\Model\Customer
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
     * @param  DateTime $created Creation date
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreated(DateTime $created)
    {
        return $this->setProperty('_created', $created, 'DateTime');
    }
    
    /**
     * @return DateTime Creation date
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * @param  string $mobile Mobile phone number
     * @return \jtl\Connector\Model\Customer
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
     * @param  float $discount Percentual discount for customer on all prices
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setDiscount($discount)
    {
        return $this->setProperty('_discount', $discount, 'float');
    }
    
    /**
     * @return float Percentual discount for customer on all prices
     */
    public function getDiscount()
    {
        return $this->_discount;
    }

    /**
     * @param  string $vatNumber VAT number (german "USt-ID")
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setVatNumber($vatNumber)
    {
        return $this->setProperty('_vatNumber', $vatNumber, 'string');
    }
    
    /**
     * @return string VAT number (german "USt-ID")
     */
    public function getVatNumber()
    {
        return $this->_vatNumber;
    }

    /**
     * @param  string $deliveryInstruction Delivery instruction e.g. "c/o John Doe"
     * @return \jtl\Connector\Model\Customer
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
     * @return \jtl\Connector\Model\Customer
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
     * @param  string $www WWW address
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setWww($www)
    {
        return $this->setProperty('_www', $www, 'string');
    }
    
    /**
     * @return string WWW address
     */
    public function getWww()
    {
        return $this->_www;
    }

    /**
     * @param  integer $languageId 
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setLanguageId($languageId)
    {
        return $this->setProperty('_languageId', $languageId, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getLanguageId()
    {
        return $this->_languageId;
    }

    /**
     * @param  string $state State
     * @return \jtl\Connector\Model\Customer
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
     * @param  string $origin Customer origin
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setOrigin($origin)
    {
        return $this->setProperty('_origin', $origin, 'string');
    }
    
    /**
     * @return string Customer origin
     */
    public function getOrigin()
    {
        return $this->_origin;
    }

    /**
     * @param  Identity $id Unique customer id
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique customer id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $customerCategoryId 
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerCategoryId(Identity $customerCategoryId)
    {
        return $this->setProperty('_customerCategoryId', $customerCategoryId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getCustomerCategoryId()
    {
        return $this->_customerCategoryId;
    }

    /**
     * @param  string $salutation Salutation (german: "Anrede")
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setSalutation($salutation)
    {
        return $this->setProperty('_salutation', $salutation, 'string');
    }
    
    /**
     * @return string Salutation (german: "Anrede")
     */
    public function getSalutation()
    {
        return $this->_salutation;
    }

    /**
     * @param  boolean $isActive Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password. 
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('_isActive', $isActive, 'boolean');
    }
    
    /**
     * @return boolean Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password. 
     */
    public function getIsActive()
    {
        return $this->_isActive;
    }

    /**
     * @param  boolean $hasNewsletterSubscription Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setHasNewsletterSubscription($hasNewsletterSubscription)
    {
        return $this->setProperty('_hasNewsletterSubscription', $hasNewsletterSubscription, 'boolean');
    }
    
    /**
     * @return boolean Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     */
    public function getHasNewsletterSubscription()
    {
        return $this->_hasNewsletterSubscription;
    }

    /**
     * @param  Identity $customerGroupId References a customer group
     * @return \jtl\Connector\Model\Customer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('_customerGroupId', $customerGroupId, 'Identity');
    }
    
    /**
     * @return Identity References a customer group
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerAttr $attribute
     * @return \jtl\Connector\Model\Customer
     */
    public function addAttribute(\jtl\Connector\Model\CustomerAttr $attribute)
    {
        $this->_attributes[] = $attribute;
        return $this;
    }
    
    /**
     * @return CustomerAttr
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }

    /**
     * @return \jtl\Connector\Model\Customer
     */
    public function clearAttributes()
    {
        $this->_attributes = array();
        return $this;
    }
}

