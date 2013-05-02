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
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_customerId;
    
    /**
     * @var string
     */
    protected $_salutation;
    
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
    protected $_title;
    
    /**
     * @var string
     */
    protected $_company;
    
    /**
     * @var string
     */
    protected $_extraAddressLine;
    
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
     * @param int $id
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param int $customerId
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setCustomerId($customerId)
    {
        $this->_customerId = (int)$customerId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->_customerId;
    }
    
    /**
     * @param string $salutation
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param string $firstName
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param string $title
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param string $extraAddressLine
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param string $street
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param string $state
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @param string $phone
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/CustomerOrderShippingAddress/CustomerOrderShippingAddress.json", $this->getPublic(array()));
    }
}
?>