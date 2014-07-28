<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Provides company address and bank details.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Company extends DataModel
{
    /**
     * @type Identity 
     */
    public $_id = null;

    /**
     * @type string Bank account holder name e.g. "John Doe"
     */
    public $_accountHolder = '';

    /**
     * @type string Bank account number
     */
    public $_accountNumber = '';

    /**
     * @type string Bank code number
     */
    public $_bankCode = '';

    /**
     * @type string Bank name e.g. "Deutsche Bank"
     */
    public $_bankName = '';

    /**
     * @type string Bank Identifier Code (BIC)
     */
    public $_bic = '';

    /**
     * @type string Company businessman / entrepreneur
     */
    public $_businessman = '';

    /**
     * @type string City
     */
    public $_city = '';

    /**
     * @type string CountryIso
     */
    public $_countryIso = '';

    /**
     * @type string Company E-Mail address
     */
    public $_eMail = '';

    /**
     * @type string Fax number
     */
    public $_fax = '';

    /**
     * @type boolean 
     */
    public $_flagUpdate = false;

    /**
     * @type string 
     */
    public $_footer = '';

    /**
     * @type string 
     */
    public $_headerLogo = '';

    /**
     * @type string International Bank Account Number (IBAN) 
     */
    public $_iban = '';

    /**
     * @type string 
     */
    public $_intrashipNumber = '';

    /**
     * @type boolean 
     */
    public $_isActive = false;

    /**
     * @type string Company name
     */
    public $_name = '';

    /**
     * @type string Phone number
     */
    public $_phone = '';

    /**
     * @type string Street
     */
    public $_street = '';

    /**
     * @type string Tax id number (german: Steuernummer)
     */
    public $_taxIdNumber = '';

    /**
     * @type string 
     */
    public $_upsNumber = '';

    /**
     * @type string VAT registration number (german: USt-ID)
     */
    public $_vatNumber = '';

    /**
     * @type string Company website URL
     */
    public $_www = '';

    /**
     * @type string Zip code / postcode
     */
    public $_zipCode = '';


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
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
     * @param  string $name Company name
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('_name', $name, 'string');
    }
    
    /**
     * @return string Company name
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param  string $businessman Company businessman / entrepreneur
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setBusinessman($businessman)
    {
        return $this->setProperty('_businessman', $businessman, 'string');
    }
    
    /**
     * @return string Company businessman / entrepreneur
     */
    public function getBusinessman()
    {
        return $this->_businessman;
    }

    /**
     * @param  string $street Street
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setStreet($street)
    {
        return $this->setProperty('_street', $street, 'string');
    }
    
    /**
     * @return string Street
     */
    public function getStreet()
    {
        return $this->_street;
    }

    /**
     * @param  string $zipCode Zip code / postcode
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setZipCode($zipCode)
    {
        return $this->setProperty('_zipCode', $zipCode, 'string');
    }
    
    /**
     * @return string Zip code / postcode
     */
    public function getZipCode()
    {
        return $this->_zipCode;
    }

    /**
     * @param  string $city City
     * @return \jtl\Connector\Model\Company
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
     * @param  string $countryIso CountryIso
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCountryIso($countryIso)
    {
        return $this->setProperty('_countryIso', $countryIso, 'string');
    }
    
    /**
     * @return string CountryIso
     */
    public function getCountryIso()
    {
        return $this->_countryIso;
    }

    /**
     * @param  string $phone Phone number
     * @return \jtl\Connector\Model\Company
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
     * @return \jtl\Connector\Model\Company
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
     * @param  string $eMail Company E-Mail address
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setEMail($eMail)
    {
        return $this->setProperty('_eMail', $eMail, 'string');
    }
    
    /**
     * @return string Company E-Mail address
     */
    public function getEMail()
    {
        return $this->_eMail;
    }

    /**
     * @param  string $www Company website URL
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setWww($www)
    {
        return $this->setProperty('_www', $www, 'string');
    }
    
    /**
     * @return string Company website URL
     */
    public function getWww()
    {
        return $this->_www;
    }

    /**
     * @param  string $bankCode Bank code number
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setBankCode($bankCode)
    {
        return $this->setProperty('_bankCode', $bankCode, 'string');
    }
    
    /**
     * @return string Bank code number
     */
    public function getBankCode()
    {
        return $this->_bankCode;
    }

    /**
     * @param  string $accountNumber Bank account number
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setAccountNumber($accountNumber)
    {
        return $this->setProperty('_accountNumber', $accountNumber, 'string');
    }
    
    /**
     * @return string Bank account number
     */
    public function getAccountNumber()
    {
        return $this->_accountNumber;
    }

    /**
     * @param  string $bankName Bank name e.g. "Deutsche Bank"
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setBankName($bankName)
    {
        return $this->setProperty('_bankName', $bankName, 'string');
    }
    
    /**
     * @return string Bank name e.g. "Deutsche Bank"
     */
    public function getBankName()
    {
        return $this->_bankName;
    }

    /**
     * @param  string $vatNumber VAT registration number (german: USt-ID)
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setVatNumber($vatNumber)
    {
        return $this->setProperty('_vatNumber', $vatNumber, 'string');
    }
    
    /**
     * @return string VAT registration number (german: USt-ID)
     */
    public function getVatNumber()
    {
        return $this->_vatNumber;
    }

    /**
     * @param  string $taxIdNumber Tax id number (german: Steuernummer)
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setTaxIdNumber($taxIdNumber)
    {
        return $this->setProperty('_taxIdNumber', $taxIdNumber, 'string');
    }
    
    /**
     * @return string Tax id number (german: Steuernummer)
     */
    public function getTaxIdNumber()
    {
        return $this->_taxIdNumber;
    }

    /**
     * @param  string $intrashipNumber 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setIntrashipNumber($intrashipNumber)
    {
        return $this->setProperty('_intrashipNumber', $intrashipNumber, 'string');
    }
    
    /**
     * @return string 
     */
    public function getIntrashipNumber()
    {
        return $this->_intrashipNumber;
    }

    /**
     * @param  string $upsNumber 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUpsNumber($upsNumber)
    {
        return $this->setProperty('_upsNumber', $upsNumber, 'string');
    }
    
    /**
     * @return string 
     */
    public function getUpsNumber()
    {
        return $this->_upsNumber;
    }

    /**
     * @param  string $iban International Bank Account Number (IBAN) 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setIban($iban)
    {
        return $this->setProperty('_iban', $iban, 'string');
    }
    
    /**
     * @return string International Bank Account Number (IBAN) 
     */
    public function getIban()
    {
        return $this->_iban;
    }

    /**
     * @param  string $bic Bank Identifier Code (BIC)
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setBic($bic)
    {
        return $this->setProperty('_bic', $bic, 'string');
    }
    
    /**
     * @return string Bank Identifier Code (BIC)
     */
    public function getBic()
    {
        return $this->_bic;
    }

    /**
     * @param  string $headerLogo 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setHeaderLogo($headerLogo)
    {
        return $this->setProperty('_headerLogo', $headerLogo, 'string');
    }
    
    /**
     * @return string 
     */
    public function getHeaderLogo()
    {
        return $this->_headerLogo;
    }

    /**
     * @param  string $footer 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setFooter($footer)
    {
        return $this->setProperty('_footer', $footer, 'string');
    }
    
    /**
     * @return string 
     */
    public function getFooter()
    {
        return $this->_footer;
    }

    /**
     * @param  string $accountHolder Bank account holder name e.g. "John Doe"
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setAccountHolder($accountHolder)
    {
        return $this->setProperty('_accountHolder', $accountHolder, 'string');
    }
    
    /**
     * @return string Bank account holder name e.g. "John Doe"
     */
    public function getAccountHolder()
    {
        return $this->_accountHolder;
    }

    /**
     * @param  Identity $id 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  boolean $flagUpdate 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setFlagUpdate($flagUpdate)
    {
        return $this->setProperty('_flagUpdate', $flagUpdate, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getFlagUpdate()
    {
        return $this->_flagUpdate;
    }

    /**
     * @param  boolean $isActive 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('_isActive', $isActive, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->_isActive;
    }
}

