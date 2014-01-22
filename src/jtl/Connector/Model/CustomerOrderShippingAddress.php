<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrderShippingAddress Model
 * Shipping Address properties of a customer (order)
 *
 * @access public
 */
class CustomerOrderShippingAddress extends DataModel
{
    /**
     * @var string Unique customerOrderShippingAddress id
     */
    protected $_id = '';
    
    /**
     * @var string Reference to customer
     */
    protected $_customerId = '';
    
    /**
     * @var string Salutation e.g. "Mr."
     */
    protected $_salutation = '';
    
    /**
     * @var string First name
     */
    protected $_firstName = '';
    
    /**
     * @var string Last name
     */
    protected $_lastName = '';
    
    /**
     * @var string Title e.g. ("Prof. Dr.")
     */
    protected $_title = '';
    
    /**
     * @var string Company name
     */
    protected $_company = '';
    
    /**
     * @var string Delivery instruction e.g. "c/o John Doe"
     */
    protected $_deliveryInstruction = '';
    
    /**
     * @var string Street + streetnumber
     */
    protected $_street = '';
    
    /**
     * @var string Extra address line e.g. "Apartment 2.5"
     */
    protected $_extraAddressLine = '';
    
    /**
     * @var string Zip / postal code
     */
    protected $_zipCode = '';
    
    /**
     * @var string City
     */
    protected $_city = '';
    
    /**
     * @var string State
     */
    protected $_state = '';
    
    /**
     * @var string Country ISO 3166-2 (2 letter Uppercase)
     */
    protected $_countryIso = '';
    
    /**
     * @var string Phone number
     */
    protected $_phone = '';
    
    /**
     * @var string Mobile phone number
     */
    protected $_mobile = '';
    
    /**
     * @var string Fax number
     */
    protected $_fax = '';
    
    /**
     * @var string E-Mail address
     */
    protected $_eMail = '';
    
    /**
     * CustomerOrderShippingAddress Setter
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
                case "_customerId":
                case "_salutation":
                case "_firstName":
                case "_lastName":
                case "_title":
                case "_company":
                case "_deliveryInstruction":
                case "_street":
                case "_extraAddressLine":
                case "_zipCode":
                case "_city":
                case "_state":
                case "_countryIso":
                case "_phone":
                case "_mobile":
                case "_fax":
                case "_eMail":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique customerOrderShippingAddress id
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique customerOrderShippingAddress id
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $customerId Reference to customer
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setCustomerId($customerId)
    {
        $this->_customerId = (string)$customerId;
        return $this;
    }
    
    /**
     * @return string Reference to customer
     */
    public function getCustomerId()
    {
        return $this->_customerId;
    }
    
    /**
     * @param string $salutation Salutation e.g. "Mr."
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setSalutation($salutation)
    {
        $this->_salutation = (string)$salutation;
        return $this;
    }
    
    /**
     * @return string Salutation e.g. "Mr."
     */
    public function getSalutation()
    {
        return $this->_salutation;
    }
    
    /**
     * @param string $firstName First name
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setFirstName($firstName)
    {
        $this->_firstName = (string)$firstName;
        return $this;
    }
    
    /**
     * @return string First name
     */
    public function getFirstName()
    {
        return $this->_firstName;
    }
    
    /**
     * @param string $lastName Last name
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setLastName($lastName)
    {
        $this->_lastName = (string)$lastName;
        return $this;
    }
    
    /**
     * @return string Last name
     */
    public function getLastName()
    {
        return $this->_lastName;
    }
    
    /**
     * @param string $title Title e.g. ("Prof. Dr.")
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setTitle($title)
    {
        $this->_title = (string)$title;
        return $this;
    }
    
    /**
     * @return string Title e.g. ("Prof. Dr.")
     */
    public function getTitle()
    {
        return $this->_title;
    }
    
    /**
     * @param string $company Company name
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setCompany($company)
    {
        $this->_company = (string)$company;
        return $this;
    }
    
    /**
     * @return string Company name
     */
    public function getCompany()
    {
        return $this->_company;
    }
    
    /**
     * @param string $deliveryInstruction Delivery instruction e.g. "c/o John Doe"
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setDeliveryInstruction($deliveryInstruction)
    {
        $this->_deliveryInstruction = (string)$deliveryInstruction;
        return $this;
    }
    
    /**
     * @return string Delivery instruction e.g. "c/o John Doe"
     */
    public function getDeliveryInstruction()
    {
        return $this->_deliveryInstruction;
    }
    
    /**
     * @param string $street Street + streetnumber
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setStreet($street)
    {
        $this->_street = (string)$street;
        return $this;
    }
    
    /**
     * @return string Street + streetnumber
     */
    public function getStreet()
    {
        return $this->_street;
    }
    
    /**
     * @param string $extraAddressLine Extra address line e.g. "Apartment 2.5"
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setExtraAddressLine($extraAddressLine)
    {
        $this->_extraAddressLine = (string)$extraAddressLine;
        return $this;
    }
    
    /**
     * @return string Extra address line e.g. "Apartment 2.5"
     */
    public function getExtraAddressLine()
    {
        return $this->_extraAddressLine;
    }
    
    /**
     * @param string $zipCode Zip / postal code
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setZipCode($zipCode)
    {
        $this->_zipCode = (string)$zipCode;
        return $this;
    }
    
    /**
     * @return string Zip / postal code
     */
    public function getZipCode()
    {
        return $this->_zipCode;
    }
    
    /**
     * @param string $city City
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setCity($city)
    {
        $this->_city = (string)$city;
        return $this;
    }
    
    /**
     * @return string City
     */
    public function getCity()
    {
        return $this->_city;
    }
    
    /**
     * @param string $state State
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setState($state)
    {
        $this->_state = (string)$state;
        return $this;
    }
    
    /**
     * @return string State
     */
    public function getState()
    {
        return $this->_state;
    }
    
    /**
     * @param string $countryIso Country ISO 3166-2 (2 letter Uppercase)
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setCountryIso($countryIso)
    {
        $this->_countryIso = (string)$countryIso;
        return $this;
    }
    
    /**
     * @return string Country ISO 3166-2 (2 letter Uppercase)
     */
    public function getCountryIso()
    {
        return $this->_countryIso;
    }
    
    /**
     * @param string $phone Phone number
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setPhone($phone)
    {
        $this->_phone = (string)$phone;
        return $this;
    }
    
    /**
     * @return string Phone number
     */
    public function getPhone()
    {
        return $this->_phone;
    }
    
    /**
     * @param string $mobile Mobile phone number
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setMobile($mobile)
    {
        $this->_mobile = (string)$mobile;
        return $this;
    }
    
    /**
     * @return string Mobile phone number
     */
    public function getMobile()
    {
        return $this->_mobile;
    }
    
    /**
     * @param string $fax Fax number
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setFax($fax)
    {
        $this->_fax = (string)$fax;
        return $this;
    }
    
    /**
     * @return string Fax number
     */
    public function getFax()
    {
        return $this->_fax;
    }
    
    /**
     * @param string $eMail E-Mail address
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress
     */
    public function setEMail($eMail)
    {
        $this->_eMail = (string)$eMail;
        return $this;
    }
    
    /**
     * @return string E-Mail address
     */
    public function getEMail()
    {
        return $this->_eMail;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}