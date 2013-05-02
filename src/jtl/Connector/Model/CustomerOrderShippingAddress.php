<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * CustomerOrderShippingAddress Model
 * @access public
 */
abstract class CustomerOrderShippingAddress extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_customerId;
    
    /**
     * @var 
     */
    protected $_salutation;
    
    /**
     * @var double
     */
    protected $_firstName;
    
    /**
     * @var 
     */
    protected $_lastName;
    
    /**
     * @var 
     */
    protected $_title;
    
    /**
     * @var string
     */
    protected $_company;
    
    /**
     * @var 
     */
    protected $_extraAddressLine;
    
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
     * @param  $id
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param string $customerId
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setCustomerId($customerId)
    {
        $this->_customerId = (string)$customerId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->_customerId;
    }
    
    /**
     * @param  $salutation
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param double $firstName
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param  $title
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param string $company
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param  $extraAddressLine
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param  $street
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/CustomerOrderShippingAddress/CustomerOrderShippingAddress.json", $this->getPublic(array()));
    }
}
?>