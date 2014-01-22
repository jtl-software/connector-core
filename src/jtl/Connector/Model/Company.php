<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Company Model
 * Provides company address and bank details
 *
 * @access public
 */
class Company extends DataModel
{
    /**
     * @var string - Company name
     */
    protected $_name = '';
    
    /**
     * @var string - Company businessman / entrepreneur
     */
    protected $_businessman = '';
    
    /**
     * @var string - Street
     */
    protected $_street = '';
    
    /**
     * @var string - Street number
     */
    protected $_streetNumber = '';
    
    /**
     * @var string - Zip code / postcode
     */
    protected $_zipCode = '';
    
    /**
     * @var string - City
     */
    protected $_city = '';
    
    /**
     * @var string - CountryIso
     */
    protected $_countryIso = '';
    
    /**
     * @var string - Phone number
     */
    protected $_phone = '';
    
    /**
     * @var string - Fax number
     */
    protected $_fax = '';
    
    /**
     * @var string - Company E-Mail address
     */
    protected $_eMail = '';
    
    /**
     * @var string - Company website URL
     */
    protected $_www = '';
    
    /**
     * @var string - Bank code number
     */
    protected $_bankCode = '';
    
    /**
     * @var string - Bank account number
     */
    protected $_accountNumber = '';
    
    /**
     * @var string - Bank name e.g. "Deutsche Bank"
     */
    protected $_bankName = '';
    
    /**
     * @var string - Bank account holder name e.g. "John Doe"
     */
    protected $_accountHolder = '';
    
    /**
     * @var string - VAT registration number (german: USt-ID)
     */
    protected $_vatNumber = '';
    
    /**
     * @var string - Tax id number (german: Steuernummer)
     */
    protected $_taxIdNumber = '';
    
    /**
     * @var string - International Bank Account Number (IBAN) 
     */
    protected $_iban = '';
    
    /**
     * @var string - Bank Identifier Code (BIC)
     */
    protected $_bic = '';
    
    /**
     * Company Setter
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
                case "_name":
                case "_businessman":
                case "_street":
                case "_streetNumber":
                case "_zipCode":
                case "_city":
                case "_countryIso":
                case "_phone":
                case "_fax":
                case "_eMail":
                case "_www":
                case "_bankCode":
                case "_accountNumber":
                case "_bankName":
                case "_accountHolder":
                case "_vatNumber":
                case "_taxIdNumber":
                case "_iban":
                case "_bic":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
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
     * @param string $countryIso
     * @return \jtl\Connector\Model\Company
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
     * @param string $bankName
     * @return \jtl\Connector\Model\Company
     */
    public function setBankName($bankName)
    {
        $this->_bankName = (string)$bankName;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->_bankName;
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
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}