<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Customer Model
 * @access public
 */
abstract class Customer extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_customerGroupId;
    
    /**
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var string
     */
    protected $_customerNumber;
    
    /**
     * @var string
     */
    protected $_password;
    
    /**
     * @var string
     */
    protected $_salutation;
    
    /**
     * @var string
     */
    protected $_title;
    
    /**
     * @var string
     */
    protected $_firstName;
    
    /**
     * @var string
     */
    protected $_lastName;
    
    /**
     * @var string
     */
    protected $_company;
    
    /**
     * @var string
     */
    protected $_street;
    
    /**
     * @var string
     */
    protected $_streetNumber;
    
    /**
     * @var string
     */
    protected $_extraAddressLine;
    
    /**
     * @var string
     */
    protected $_zipCode;
    
    /**
     * @var string
     */
    protected $_city;
    
    /**
     * @var string
     */
    protected $_state;
    
    /**
     * @var string
     */
    protected $_country;
    
    /**
     * @var string
     */
    protected $_phone;
    
    /**
     * @var string
     */
    protected $_mobile;
    
    /**
     * @var string
     */
    protected $_fax;
    
    /**
     * @var string
     */
    protected $_eMail;
    
    /**
     * @var string
     */
    protected $_vatNumber;
    
    /**
     * @var string
     */
    protected $_www;
    
    /**
     * @var double
     */
    protected $_accountCredit;
    
    /**
     * @var string
     */
    protected $_newsletter;
    
    /**
     * @var string
     */
    protected $_birthday;
    
    /**
     * @var double
     */
    protected $_discount;
    
    /**
     * @var string
     */
    protected $_origin;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * @var string
     */
    protected $_modified;
    
    /**
     * @var string
     */
    protected $_isActive;
    
    /**
     * @var string
     */
    protected $_isFetched;
    
    /**
     * @var int
     */
    protected $_hasCustomerAccount;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\Customer
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param int $customerGroupId
     * @return \jtl\Connector\Model\Customer
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (int)$customerGroupId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    /**
     * @param int $languageIso
     * @return \jtl\Connector\Model\Customer
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = (int)$languageIso;
        return $this;
    }
    
    /**
     * @return int
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
     * @param string $streetNumber
     * @return \jtl\Connector\Model\Customer
     */
    public function setStreetNumber($streetNumber)
    {
        $this->_streetNumber = (string)$streetNumber;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->_streetNumber;
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
     * @param string $newsletter
     * @return \jtl\Connector\Model\Customer
     */
    public function setNewsletter($newsletter)
    {
        $this->_newsletter = (string)$newsletter;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getNewsletter()
    {
        return $this->_newsletter;
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
     * @param string $isActive
     * @return \jtl\Connector\Model\Customer
     */
    public function setIsActive($isActive)
    {
        $this->_isActive = (string)$isActive;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIsActive()
    {
        return $this->_isActive;
    }
    /**
     * @param string $isFetched
     * @return \jtl\Connector\Model\Customer
     */
    public function setIsFetched($isFetched)
    {
        $this->_isFetched = (string)$isFetched;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIsFetched()
    {
        return $this->_isFetched;
    }
    /**
     * @param int $hasCustomerAccount
     * @return \jtl\Connector\Model\Customer
     */
    public function setHasCustomerAccount($hasCustomerAccount)
    {
        $this->_hasCustomerAccount = (int)$hasCustomerAccount;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getHasCustomerAccount()
    {
        return $this->_hasCustomerAccount;
    }
}
?>