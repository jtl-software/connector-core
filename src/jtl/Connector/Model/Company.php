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
     * @var 
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @var 
     */
    protected $_businessman;
    
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
     * @var 
     */
    protected $_phone;
    
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
    protected $_www;
    
    /**
     * @var 
     */
    protected $_bankCode;
    
    /**
     * @var 
     */
    protected $_accountNumber;
    
    /**
     * @var 
     */
    protected $_bankAccount;
    
    /**
     * @var 
     */
    protected $_accountHolder;
    
    /**
     * @var 
     */
    protected $_vatNumber;
    
    /**
     * @var 
     */
    protected $_taxIdNumber;
    
    /**
     * @var 
     */
    protected $_iban;
    
    /**
     * @var 
     */
    protected $_bic;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\Company
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
     * @param int $name
     * @return \jtl\Connector\Model\Company
     */
    public function setName($name)
    {
        $this->_name = (int)$name;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param  $businessman
     * @return \jtl\Connector\Model\Company
     */
    public function setBusinessman($businessman)
    {
        $this->_businessman = ()$businessman;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getBusinessman()
    {
        return $this->_businessman;
    }
    
    /**
     * @param  $street
     * @return \jtl\Connector\Model\Company
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
     * @return \jtl\Connector\Model\Company
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
     * @param  $zipCode
     * @return \jtl\Connector\Model\Company
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
     * @param  $phone
     * @return \jtl\Connector\Model\Company
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
     * @param double $fax
     * @return \jtl\Connector\Model\Company
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
     * @return \jtl\Connector\Model\Company
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
     * @param  $www
     * @return \jtl\Connector\Model\Company
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
     * @param  $bankCode
     * @return \jtl\Connector\Model\Company
     */
    public function setBankCode($bankCode)
    {
        $this->_bankCode = ()$bankCode;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getBankCode()
    {
        return $this->_bankCode;
    }
    
    /**
     * @param  $accountNumber
     * @return \jtl\Connector\Model\Company
     */
    public function setAccountNumber($accountNumber)
    {
        $this->_accountNumber = ()$accountNumber;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getAccountNumber()
    {
        return $this->_accountNumber;
    }
    
    /**
     * @param  $bankAccount
     * @return \jtl\Connector\Model\Company
     */
    public function setBankAccount($bankAccount)
    {
        $this->_bankAccount = ()$bankAccount;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getBankAccount()
    {
        return $this->_bankAccount;
    }
    
    /**
     * @param  $accountHolder
     * @return \jtl\Connector\Model\Company
     */
    public function setAccountHolder($accountHolder)
    {
        $this->_accountHolder = ()$accountHolder;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getAccountHolder()
    {
        return $this->_accountHolder;
    }
    
    /**
     * @param  $vatNumber
     * @return \jtl\Connector\Model\Company
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
     * @param  $taxIdNumber
     * @return \jtl\Connector\Model\Company
     */
    public function setTaxIdNumber($taxIdNumber)
    {
        $this->_taxIdNumber = ()$taxIdNumber;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getTaxIdNumber()
    {
        return $this->_taxIdNumber;
    }
    
    /**
     * @param  $iban
     * @return \jtl\Connector\Model\Company
     */
    public function setIban($iban)
    {
        $this->_iban = ()$iban;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIban()
    {
        return $this->_iban;
    }
    
    /**
     * @param  $bic
     * @return \jtl\Connector\Model\Company
     */
    public function setBic($bic)
    {
        $this->_bic = ()$bic;
        return $this;
    }
    
    /**
     * @return 
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
        Schema::validateModel(CONNECTOR_DIR . "schema/Company/Company.json", $this->getPublic(array()));
    }
}
?>