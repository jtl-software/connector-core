<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * Company Model
 * @access public
 */
abstract class Company extends Model
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_businessman;
    
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
    protected $_zipCode;
    
    /**
     * @var string
     */
    protected $_city;
    
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
    protected $_fax;
    
    /**
     * @var string
     */
    protected $_eMail;
    
    /**
     * @var string
     */
    protected $_www;
    
    /**
     * @var string
     */
    protected $_bankCode;
    
    /**
     * @var string
     */
    protected $_accountNumber;
    
    /**
     * @var string
     */
    protected $_bankAccount;
    
    /**
     * @var string
     */
    protected $_accountHolder;
    
    /**
     * @var string
     */
    protected $_vatNumber;
    
    /**
     * @var string
     */
    protected $_taxIdNumber;
    
    /**
     * @var string
     */
    protected $_iban;
    
    /**
     * @var string
     */
    protected $_bic;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\Company
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
     * @param string $name
     * @return \jtl\Connector\Model\Company
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param string $businessman
     * @return \jtl\Connector\Model\Company
     */
    public function setBusinessman($businessman)
    {
        $this->_businessman = (string)$businessman;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBusinessman()
    {
        return $this->_businessman;
    }
    
    /**
     * @param string $street
     * @return \jtl\Connector\Model\Company
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
     * @return \jtl\Connector\Model\Company
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
     * @param string $zipCode
     * @return \jtl\Connector\Model\Company
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
     * @return \jtl\Connector\Model\Company
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
     * @param string $country
     * @return \jtl\Connector\Model\Company
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
     * @return \jtl\Connector\Model\Company
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
     * @param string $fax
     * @return \jtl\Connector\Model\Company
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
     * @return \jtl\Connector\Model\Company
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
     * @param string $www
     * @return \jtl\Connector\Model\Company
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
     * @param string $bankCode
     * @return \jtl\Connector\Model\Company
     */
    public function setBankCode($bankCode)
    {
        $this->_bankCode = (string)$bankCode;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBankCode()
    {
        return $this->_bankCode;
    }
    
    /**
     * @param string $accountNumber
     * @return \jtl\Connector\Model\Company
     */
    public function setAccountNumber($accountNumber)
    {
        $this->_accountNumber = (string)$accountNumber;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->_accountNumber;
    }
    
    /**
     * @param string $bankAccount
     * @return \jtl\Connector\Model\Company
     */
    public function setBankAccount($bankAccount)
    {
        $this->_bankAccount = (string)$bankAccount;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBankAccount()
    {
        return $this->_bankAccount;
    }
    
    /**
     * @param string $accountHolder
     * @return \jtl\Connector\Model\Company
     */
    public function setAccountHolder($accountHolder)
    {
        $this->_accountHolder = (string)$accountHolder;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getAccountHolder()
    {
        return $this->_accountHolder;
    }
    
    /**
     * @param string $vatNumber
     * @return \jtl\Connector\Model\Company
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
     * @param string $taxIdNumber
     * @return \jtl\Connector\Model\Company
     */
    public function setTaxIdNumber($taxIdNumber)
    {
        $this->_taxIdNumber = (string)$taxIdNumber;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTaxIdNumber()
    {
        return $this->_taxIdNumber;
    }
    
    /**
     * @param string $iban
     * @return \jtl\Connector\Model\Company
     */
    public function setIban($iban)
    {
        $this->_iban = (string)$iban;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIban()
    {
        return $this->_iban;
    }
    
    /**
     * @param string $bic
     * @return \jtl\Connector\Model\Company
     */
    public function setBic($bic)
    {
        $this->_bic = (string)$bic;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBic()
    {
        return $this->_bic;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/company/company.json", $this->getPublic(array()));
    }
}
?>