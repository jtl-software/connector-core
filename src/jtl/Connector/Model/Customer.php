<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Customer Model
 * Customer address data and preference properties.
 *
 * @access public
 */
class Customer extends DataModel
{
    /**
     * @var string - Unique customer id
     */
    protected $_id = '';
    
    /**
     * @var string - References a customer group
     */
    protected $_customerGroupId = '';
    
    /**
     * @var string - User locale preference
     */
    protected $_localeName = '';
    
    /**
     * @var string - Optional customer number set by JTL-Wawi ERP software
     */
    protected $_customerNumber = '';
    
    /**
     * @var string - Optional (encrypted!) customer password
     */
    protected $_password = '';
    
    /**
     * @var string - Salutation (german: "Anrede")
     */
    protected $_salutation = '';
    
    /**
     * @var string - Title, e.g. "Prof. Dr."
     */
    protected $_title = '';
    
    /**
     * @var string - First name
     */
    protected $_firstName = '';
    
    /**
     * @var string - Last name
     */
    protected $_lastName = '';
    
    /**
     * @var string - Company name
     */
    protected $_company = '';
    
    /**
     * @var string - Street name
     */
    protected $_street = '';
    
    /**
     * @var string - Delivery instruction e.g. "c/o John Doe"
     */
    protected $_deliveryInstruction = '';
    
    /**
     * @var string - Extra address line e.g. "Apartment 2.5"
     */
    protected $_extraAddressLine = '';
    
    /**
     * @var string - ZIP / postal code
     */
    protected $_zipCode = '';
    
    /**
     * @var string - City
     */
    protected $_city = '';
    
    /**
     * @var string - State
     */
    protected $_state = '';
    
    /**
     * @var string - Country ISO 3166-2 (2 letter Uppercase)
     */
    protected $_countryIso = '';
    
    /**
     * @var string - Phone number
     */
    protected $_phone = '';
    
    /**
     * @var string - Mobile phone number
     */
    protected $_mobile = '';
    
    /**
     * @var string - Fax number
     */
    protected $_fax = '';
    
    /**
     * @var string - E-Mail address
     */
    protected $_eMail = '';
    
    /**
     * @var string - VAT number (german "USt-ID")
     */
    protected $_vatNumber = '';
    
    /**
     * @var string - WWW address
     */
    protected $_www = '';
    
    /**
     * @var double - Credit value on customer account in default currency
     */
    protected $_accountCredit = 0.0;
    
    /**
     * @var bool - Optional flag if customer receives newsletter. If true, customer wants to receive newsletter.
     */
    protected $_hasNewsletterSubscription = false;
    
    /**
     * @var string - Date of birth
     */
    protected $_birthday = '';
    
    /**
     * @var double - Percentual discount for customer on all prices
     */
    protected $_discount = 0.0;
    
    /**
     * @var string - Customer origin
     */
    protected $_origin = '';
    
    /**
     * @var string - Creation date
     */
    protected $_created = '';
    
    /**
     * @var string - Last modified date
     */
    protected $_modified = '';
    
    /**
     * @var bool - Flag if customer is active (login allowed). True, if customer is allowed to login with his E-Mail address and password. 
     */
    protected $_isActive = true;
    
    /**
     * @var bool - Flag if customer is fetched by ERP System. True, if customer is already fetched and must not be fetched again. 
     */
    protected $_isFetched = false;
    
    /**
     * @var bool - Flag persistent customer account. True, if customer chose to create persistent customer account. False, if customer doesnt want to have his data stored for login-purposes.
     */
    protected $_hasCustomerAccount = false;
    
    /**
     * Customer Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_id":
                case "_customerGroupId":
                case "_localeName":
                case "_customerNumber":
                case "_password":
                case "_salutation":
                case "_title":
                case "_firstName":
                case "_lastName":
                case "_company":
                case "_street":
                case "_deliveryInstruction":
                case "_extraAddressLine":
                case "_zipCode":
                case "_city":
                case "_state":
                case "_countryIso":
                case "_phone":
                case "_mobile":
                case "_fax":
                case "_eMail":
                case "_vatNumber":
                case "_www":
                case "_birthday":
                case "_origin":
                case "_created":
                case "_modified":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_accountCredit":
                case "_discount":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_hasNewsletterSubscription":
                case "_isActive":
                case "_isFetched":
                case "_hasCustomerAccount":
                
                    $this->$name = (bool)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id
     * @return \jtl\Connector\Model\Customer
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $customerGroupId
     * @return \jtl\Connector\Model\Customer
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (string)$customerGroupId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    
    /**
     * @param string $localeName
     * @return \jtl\Connector\Model\Customer
     */
    public function setLocaleName($localeName)
    {
        $this->_localeName = (string)$localeName;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLocaleName()
    {
        return $this->_localeName;
    }
    
    /**
     * @param string $customerNumber
     * @return \jtl\Connector\Model\Customer
     */
    public function setCustomerNumber($customerNumber)
    {
        $this->_customerNumber = (string)$customerNumber;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerNumber()
    {
        return $this->_customerNumber;
    }
    
    /**
     * @param string $password
     * @return \jtl\Connector\Model\Customer
     */
    public function setPassword($password)
    {
        $this->_password = (string)$password;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->_password;
    }
    
    /**
     * @param string $salutation
     * @return \jtl\Connector\Model\Customer
     */
    public function setSalutation($salutation)
    {
        $this->_salutation = (string)$salutation;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSalutation()
    {
        return $this->_salutation;
    }
    
    /**
     * @param string $title
     * @return \jtl\Connector\Model\Customer
     */
    public function setTitle($title)
    {
        $this->_title = (string)$title;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }
    
    /**
     * @param string $firstName
     * @return \jtl\Connector\Model\Customer
     */
    public function setFirstName($firstName)
    {
        $this->_firstName = (string)$firstName;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->_firstName;
    }
    
    /**
     * @param string $lastName
     * @return \jtl\Connector\Model\Customer
     */
    public function setLastName($lastName)
    {
        $this->_lastName = (string)$lastName;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->_lastName;
    }
    
    /**
     * @param string $company
     * @return \jtl\Connector\Model\Customer
     */
    public function setCompany($company)
    {
        $this->_company = (string)$company;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->_company;
    }
    
    /**
     * @param string $street
     * @return \jtl\Connector\Model\Customer
     */
    public function setStreet($street)
    {
        $this->_street = (string)$street;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->_street;
    }
    
    /**
     * @param string $deliveryInstruction
     * @return \jtl\Connector\Model\Customer
     */
    public function setDeliveryInstruction($deliveryInstruction)
    {
        $this->_deliveryInstruction = (string)$deliveryInstruction;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDeliveryInstruction()
    {
        return $this->_deliveryInstruction;
    }
    
    /**
     * @param string $extraAddressLine
     * @return \jtl\Connector\Model\Customer
     */
    public function setExtraAddressLine($extraAddressLine)
    {
        $this->_extraAddressLine = (string)$extraAddressLine;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getExtraAddressLine()
    {
        return $this->_extraAddressLine;
    }
    
    /**
     * @param string $zipCode
     * @return \jtl\Connector\Model\Customer
     */
    public function setZipCode($zipCode)
    {
        $this->_zipCode = (string)$zipCode;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->_zipCode;
    }
    
    /**
     * @param string $city
     * @return \jtl\Connector\Model\Customer
     */
    public function setCity($city)
    {
        $this->_city = (string)$city;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCity()
    {
        return $this->_city;
    }
    
    /**
     * @param string $state
     * @return \jtl\Connector\Model\Customer
     */
    public function setState($state)
    {
        $this->_state = (string)$state;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getState()
    {
        return $this->_state;
    }
    
    /**
     * @param string $countryIso
     * @return \jtl\Connector\Model\Customer
     */
    public function setCountryIso($countryIso)
    {
        $this->_countryIso = (string)$countryIso;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCountryIso()
    {
        return $this->_countryIso;
    }
    
    /**
     * @param string $phone
     * @return \jtl\Connector\Model\Customer
     */
    public function setPhone($phone)
    {
        $this->_phone = (string)$phone;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->_phone;
    }
    
    /**
     * @param string $mobile
     * @return \jtl\Connector\Model\Customer
     */
    public function setMobile($mobile)
    {
        $this->_mobile = (string)$mobile;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->_mobile;
    }
    
    /**
     * @param string $fax
     * @return \jtl\Connector\Model\Customer
     */
    public function setFax($fax)
    {
        $this->_fax = (string)$fax;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFax()
    {
        return $this->_fax;
    }
    
    /**
     * @param string $eMail
     * @return \jtl\Connector\Model\Customer
     */
    public function setEMail($eMail)
    {
        $this->_eMail = (string)$eMail;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getEMail()
    {
        return $this->_eMail;
    }
    
    /**
     * @param string $vatNumber
     * @return \jtl\Connector\Model\Customer
     */
    public function setVatNumber($vatNumber)
    {
        $this->_vatNumber = (string)$vatNumber;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getVatNumber()
    {
        return $this->_vatNumber;
    }
    
    /**
     * @param string $www
     * @return \jtl\Connector\Model\Customer
     */
    public function setWww($www)
    {
        $this->_www = (string)$www;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getWww()
    {
        return $this->_www;
    }
    
    /**
     * @param double $accountCredit
     * @return \jtl\Connector\Model\Customer
     */
    public function setAccountCredit($accountCredit)
    {
        $this->_accountCredit = (double)$accountCredit;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getAccountCredit()
    {
        return $this->_accountCredit;
    }
    
    /**
     * @param bool $hasNewsletterSubscription
     * @return \jtl\Connector\Model\Customer
     */
    public function setHasNewsletterSubscription($hasNewsletterSubscription)
    {
        $this->_hasNewsletterSubscription = (bool)$hasNewsletterSubscription;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getHasNewsletterSubscription()
    {
        return $this->_hasNewsletterSubscription;
    }
    
    /**
     * @param string $birthday
     * @return \jtl\Connector\Model\Customer
     */
    public function setBirthday($birthday)
    {
        $this->_birthday = (string)$birthday;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBirthday()
    {
        return $this->_birthday;
    }
    
    /**
     * @param double $discount
     * @return \jtl\Connector\Model\Customer
     */
    public function setDiscount($discount)
    {
        $this->_discount = (double)$discount;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getDiscount()
    {
        return $this->_discount;
    }
    
    /**
     * @param string $origin
     * @return \jtl\Connector\Model\Customer
     */
    public function setOrigin($origin)
    {
        $this->_origin = (string)$origin;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getOrigin()
    {
        return $this->_origin;
    }
    
    /**
     * @param string $created
     * @return \jtl\Connector\Model\Customer
     */
    public function setCreated($created)
    {
        $this->_created = (string)$created;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->_created;
    }
    
    /**
     * @param string $modified
     * @return \jtl\Connector\Model\Customer
     */
    public function setModified($modified)
    {
        $this->_modified = (string)$modified;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getModified()
    {
        return $this->_modified;
    }
    
    /**
     * @param bool $isActive
     * @return \jtl\Connector\Model\Customer
     */
    public function setIsActive($isActive)
    {
        $this->_isActive = (bool)$isActive;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsActive()
    {
        return $this->_isActive;
    }
    
    /**
     * @param bool $isFetched
     * @return \jtl\Connector\Model\Customer
     */
    public function setIsFetched($isFetched)
    {
        $this->_isFetched = (bool)$isFetched;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsFetched()
    {
        return $this->_isFetched;
    }
    
    /**
     * @param bool $hasCustomerAccount
     * @return \jtl\Connector\Model\Customer
     */
    public function setHasCustomerAccount($hasCustomerAccount)
    {
        $this->_hasCustomerAccount = (bool)$hasCustomerAccount;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getHasCustomerAccount()
    {
        return $this->_hasCustomerAccount;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}