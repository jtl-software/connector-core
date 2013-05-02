<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * Customer Model
 * @access public
 */
abstract class Customer extends Model
{
    /**
     * @var 
     */
    protected $_activateCustomer;
    
    /**
     * @var string
     */
    protected $_createAccountPassword;
    
    /**
     * @var string
     */
    protected $_deleteAccounts;
    
    /**
     * @var 
     */
    protected $_setAccountCredit;
    
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_customerGroupId;
    
    /**
     * @var 
     */
    protected $_languageIso;
    
    /**
     * @var string
     */
    protected $_customerNumber;
    
    /**
     * @var 
     */
    protected $_password;
    
    /**
     * @var 
     */
    protected $_salutation;
    
    /**
     * @var 
     */
    protected $_title;
    
    /**
     * @var double
     */
    protected $_firstName;
    
    /**
     * @var 
     */
    protected $_lastName;
    
    /**
     * @var string
     */
    protected $_company;
    
    /**
     * @var 
     */
    protected $_street;
    
    /**
     * @var 
     */
    protected $_streetNumber;
    
    /**
     * @var 
     */
    protected $_extraAddressLine;
    
    /**
     * @var 
     */
    protected $_zipCode;
    
    /**
     * @var string
     */
    protected $_city;
    
    /**
     * @var 
     */
    protected $_state;
    
    /**
     * @var string
     */
    protected $_country;
    
    /**
     * @var 
     */
    protected $_phone;
    
    /**
     * @var 
     */
    protected $_mobile;
    
    /**
     * @var double
     */
    protected $_fax;
    
    /**
     * @var 
     */
    protected $_eMail;
    
    /**
     * @var 
     */
    protected $_vatNumber;
    
    /**
     * @var 
     */
    protected $_www;
    
    /**
     * @var 
     */
    protected $_accountCredit;
    
    /**
     * @var int
     */
    protected $_newsletter;
    
    /**
     * @var 
     */
    protected $_birthday;
    
    /**
     * @var string
     */
    protected $_discount;
    
    /**
     * @var 
     */
    protected $_origin;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * @var 
     */
    protected $_modified;
    
    /**
     * @var 
     */
    protected $_isActive;
    
    /**
     * @var 
     */
    protected $_isFetched;
    
    /**
     * @var 
     */
    protected $_hasCustomerAccount;
    
    /**
     * @param  $activateCustomer
     * @return \jtl\Connector\Model\Customer
     */
    public function setActivateCustomer($activateCustomer)
    {
        $this->_activateCustomer = ()$activateCustomer;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getActivateCustomer()
    {
        return $this->_activateCustomer;
    }
    
    /**
     * @param string $createAccountPassword
     * @return \jtl\Connector\Model\Customer
     */
    public function setCreateAccountPassword($createAccountPassword)
    {
        $this->_createAccountPassword = (string)$createAccountPassword;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCreateAccountPassword()
    {
        return $this->_createAccountPassword;
    }
    
    /**
     * @param string $deleteAccounts
     * @return \jtl\Connector\Model\Customer
     */
    public function setDeleteAccounts($deleteAccounts)
    {
        $this->_deleteAccounts = (string)$deleteAccounts;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDeleteAccounts()
    {
        return $this->_deleteAccounts;
    }
    
    /**
     * @param  $setAccountCredit
     * @return \jtl\Connector\Model\Customer
     */
    public function setSetAccountCredit($setAccountCredit)
    {
        $this->_setAccountCredit = ()$setAccountCredit;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSetAccountCredit()
    {
        return $this->_setAccountCredit;
    }
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\Customer
     */
    public function setId($id)
    {
        $this->_id = ()$id;
        return $this;
    }
    
    /**
     * @return 
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
     * @param  $languageIso
     * @return \jtl\Connector\Model\Customer
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = ()$languageIso;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getLanguageIso()
    {
        return $this->_languageIso;
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
     * @param  $password
     * @return \jtl\Connector\Model\Customer
     */
    public function setPassword($password)
    {
        $this->_password = ()$password;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getPassword()
    {
        return $this->_password;
    }
    
    /**
     * @param  $salutation
     * @return \jtl\Connector\Model\Customer
     */
    public function setSalutation($salutation)
    {
        $this->_salutation = ()$salutation;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSalutation()
    {
        return $this->_salutation;
    }
    
    /**
     * @param  $title
     * @return \jtl\Connector\Model\Customer
     */
    public function setTitle($title)
    {
        $this->_title = ()$title;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getTitle()
    {
        return $this->_title;
    }
    
    /**
     * @param double $firstName
     * @return \jtl\Connector\Model\Customer
     */
    public function setFirstName($firstName)
    {
        $this->_firstName = (double)$firstName;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getFirstName()
    {
        return $this->_firstName;
    }
    
    /**
     * @param  $lastName
     * @return \jtl\Connector\Model\Customer
     */
    public function setLastName($lastName)
    {
        $this->_lastName = ()$lastName;
        return $this;
    }
    
    /**
     * @return 
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
     * @param  $street
     * @return \jtl\Connector\Model\Customer
     */
    public function setStreet($street)
    {
        $this->_street = ()$street;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getStreet()
    {
        return $this->_street;
    }
    
    /**
     * @param  $streetNumber
     * @return \jtl\Connector\Model\Customer
     */
    public function setStreetNumber($streetNumber)
    {
        $this->_streetNumber = ()$streetNumber;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getStreetNumber()
    {
        return $this->_streetNumber;
    }
    
    /**
     * @param  $extraAddressLine
     * @return \jtl\Connector\Model\Customer
     */
    public function setExtraAddressLine($extraAddressLine)
    {
        $this->_extraAddressLine = ()$extraAddressLine;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getExtraAddressLine()
    {
        return $this->_extraAddressLine;
    }
    
    /**
     * @param  $zipCode
     * @return \jtl\Connector\Model\Customer
     */
    public function setZipCode($zipCode)
    {
        $this->_zipCode = ()$zipCode;
        return $this;
    }
    
    /**
     * @return 
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
     * @param  $state
     * @return \jtl\Connector\Model\Customer
     */
    public function setState($state)
    {
        $this->_state = ()$state;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getState()
    {
        return $this->_state;
    }
    
    /**
     * @param string $country
     * @return \jtl\Connector\Model\Customer
     */
    public function setCountry($country)
    {
        $this->_country = (string)$country;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->_country;
    }
    
    /**
     * @param  $phone
     * @return \jtl\Connector\Model\Customer
     */
    public function setPhone($phone)
    {
        $this->_phone = ()$phone;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getPhone()
    {
        return $this->_phone;
    }
    
    /**
     * @param  $mobile
     * @return \jtl\Connector\Model\Customer
     */
    public function setMobile($mobile)
    {
        $this->_mobile = ()$mobile;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getMobile()
    {
        return $this->_mobile;
    }
    
    /**
     * @param double $fax
     * @return \jtl\Connector\Model\Customer
     */
    public function setFax($fax)
    {
        $this->_fax = (double)$fax;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getFax()
    {
        return $this->_fax;
    }
    
    /**
     * @param  $eMail
     * @return \jtl\Connector\Model\Customer
     */
    public function setEMail($eMail)
    {
        $this->_eMail = ()$eMail;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getEMail()
    {
        return $this->_eMail;
    }
    
    /**
     * @param  $vatNumber
     * @return \jtl\Connector\Model\Customer
     */
    public function setVatNumber($vatNumber)
    {
        $this->_vatNumber = ()$vatNumber;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getVatNumber()
    {
        return $this->_vatNumber;
    }
    
    /**
     * @param  $www
     * @return \jtl\Connector\Model\Customer
     */
    public function setWww($www)
    {
        $this->_www = ()$www;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getWww()
    {
        return $this->_www;
    }
    
    /**
     * @param  $accountCredit
     * @return \jtl\Connector\Model\Customer
     */
    public function setAccountCredit($accountCredit)
    {
        $this->_accountCredit = ()$accountCredit;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getAccountCredit()
    {
        return $this->_accountCredit;
    }
    
    /**
     * @param int $newsletter
     * @return \jtl\Connector\Model\Customer
     */
    public function setNewsletter($newsletter)
    {
        $this->_newsletter = (int)$newsletter;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getNewsletter()
    {
        return $this->_newsletter;
    }
    
    /**
     * @param  $birthday
     * @return \jtl\Connector\Model\Customer
     */
    public function setBirthday($birthday)
    {
        $this->_birthday = ()$birthday;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getBirthday()
    {
        return $this->_birthday;
    }
    
    /**
     * @param string $discount
     * @return \jtl\Connector\Model\Customer
     */
    public function setDiscount($discount)
    {
        $this->_discount = (string)$discount;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDiscount()
    {
        return $this->_discount;
    }
    
    /**
     * @param  $origin
     * @return \jtl\Connector\Model\Customer
     */
    public function setOrigin($origin)
    {
        $this->_origin = ()$origin;
        return $this;
    }
    
    /**
     * @return 
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
     * @param  $modified
     * @return \jtl\Connector\Model\Customer
     */
    public function setModified($modified)
    {
        $this->_modified = ()$modified;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getModified()
    {
        return $this->_modified;
    }
    
    /**
     * @param  $isActive
     * @return \jtl\Connector\Model\Customer
     */
    public function setIsActive($isActive)
    {
        $this->_isActive = ()$isActive;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIsActive()
    {
        return $this->_isActive;
    }
    
    /**
     * @param  $isFetched
     * @return \jtl\Connector\Model\Customer
     */
    public function setIsFetched($isFetched)
    {
        $this->_isFetched = ()$isFetched;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIsFetched()
    {
        return $this->_isFetched;
    }
    
    /**
     * @param  $hasCustomerAccount
     * @return \jtl\Connector\Model\Customer
     */
    public function setHasCustomerAccount($hasCustomerAccount)
    {
        $this->_hasCustomerAccount = ()$hasCustomerAccount;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getHasCustomerAccount()
    {
        return $this->_hasCustomerAccount;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/Customer/Customer.json", $this->getPublic(array()));
    }
}
?>