<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Provides company address and bank details.
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Company extends DataModel
{
    /**
     * @type Identity 
     */
    protected $id = null;

    /**
     * @type string Bank account holder name e.g. "John Doe"
     */
    protected $accountHolder = '';

    /**
     * @type string Bank account number
     */
    protected $accountNumber = '';

    /**
     * @type string Bank code number
     */
    protected $bankCode = '';

    /**
     * @type string Bank name e.g. "Deutsche Bank"
     */
    protected $bankName = '';

    /**
     * @type string Bank Identifier Code (BIC)
     */
    protected $bic = '';

    /**
     * @type string Company businessman / entrepreneur
     */
    protected $businessman = '';

    /**
     * @type string City
     */
    protected $city = '';

    /**
     * @type string CountryIso
     */
    protected $countryIso = '';

    /**
     * @type string Company E-Mail address
     */
    protected $eMail = '';

    /**
     * @type string Fax number
     */
    protected $fax = '';

    /**
     * @type boolean 
     */
    protected $flagUpdate = false;

    /**
     * @type string 
     */
    protected $footer = '';

    /**
     * @type string 
     */
    protected $headerLogo = '';

    /**
     * @type string International Bank Account Number (IBAN) 
     */
    protected $iban = '';

    /**
     * @type string 
     */
    protected $intrashipNumber = '';

    /**
     * @type boolean 
     */
    protected $isActive = false;

    /**
     * @type string Company name
     */
    protected $name = '';

    /**
     * @type string Phone number
     */
    protected $phone = '';

    /**
     * @type string Street
     */
    protected $street = '';

    /**
     * @type string Tax id number (german: Steuernummer)
     */
    protected $taxIdNumber = '';

    /**
     * @type string 
     */
    protected $upsNumber = '';

    /**
     * @type string VAT registration number (german: USt-ID)
     */
    protected $vatNumber = '';

    /**
     * @type string Company website URL
     */
    protected $www = '';

    /**
     * @type string Zip code / postcode
     */
    protected $zipCode = '';


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
    );


    /**
     * @param  string $name Company name
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }
    
    /**
     * @return string Company name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $businessman Company businessman / entrepreneur
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setBusinessman($businessman)
    {
        return $this->setProperty('businessman', $businessman, 'string');
    }
    
    /**
     * @return string Company businessman / entrepreneur
     */
    public function getBusinessman()
    {
        return $this->businessman;
    }

    /**
     * @param  string $street Street
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setStreet($street)
    {
        return $this->setProperty('street', $street, 'string');
    }
    
    /**
     * @return string Street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param  string $zipCode Zip code / postcode
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setZipCode($zipCode)
    {
        return $this->setProperty('zipCode', $zipCode, 'string');
    }
    
    /**
     * @return string Zip code / postcode
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param  string $city City
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCity($city)
    {
        return $this->setProperty('city', $city, 'string');
    }
    
    /**
     * @return string City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param  string $countryIso CountryIso
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCountryIso($countryIso)
    {
        return $this->setProperty('countryIso', $countryIso, 'string');
    }
    
    /**
     * @return string CountryIso
     */
    public function getCountryIso()
    {
        return $this->countryIso;
    }

    /**
     * @param  string $phone Phone number
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setPhone($phone)
    {
        return $this->setProperty('phone', $phone, 'string');
    }
    
    /**
     * @return string Phone number
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param  string $fax Fax number
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setFax($fax)
    {
        return $this->setProperty('fax', $fax, 'string');
    }
    
    /**
     * @return string Fax number
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param  string $eMail Company E-Mail address
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setEMail($eMail)
    {
        return $this->setProperty('eMail', $eMail, 'string');
    }
    
    /**
     * @return string Company E-Mail address
     */
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * @param  string $www Company website URL
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setWww($www)
    {
        return $this->setProperty('www', $www, 'string');
    }
    
    /**
     * @return string Company website URL
     */
    public function getWww()
    {
        return $this->www;
    }

    /**
     * @param  string $bankCode Bank code number
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setBankCode($bankCode)
    {
        return $this->setProperty('bankCode', $bankCode, 'string');
    }
    
    /**
     * @return string Bank code number
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * @param  string $accountNumber Bank account number
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setAccountNumber($accountNumber)
    {
        return $this->setProperty('accountNumber', $accountNumber, 'string');
    }
    
    /**
     * @return string Bank account number
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param  string $bankName Bank name e.g. "Deutsche Bank"
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setBankName($bankName)
    {
        return $this->setProperty('bankName', $bankName, 'string');
    }
    
    /**
     * @return string Bank name e.g. "Deutsche Bank"
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @param  string $vatNumber VAT registration number (german: USt-ID)
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setVatNumber($vatNumber)
    {
        return $this->setProperty('vatNumber', $vatNumber, 'string');
    }
    
    /**
     * @return string VAT registration number (german: USt-ID)
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    /**
     * @param  string $taxIdNumber Tax id number (german: Steuernummer)
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setTaxIdNumber($taxIdNumber)
    {
        return $this->setProperty('taxIdNumber', $taxIdNumber, 'string');
    }
    
    /**
     * @return string Tax id number (german: Steuernummer)
     */
    public function getTaxIdNumber()
    {
        return $this->taxIdNumber;
    }

    /**
     * @param  string $intrashipNumber 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setIntrashipNumber($intrashipNumber)
    {
        return $this->setProperty('intrashipNumber', $intrashipNumber, 'string');
    }
    
    /**
     * @return string 
     */
    public function getIntrashipNumber()
    {
        return $this->intrashipNumber;
    }

    /**
     * @param  string $upsNumber 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUpsNumber($upsNumber)
    {
        return $this->setProperty('upsNumber', $upsNumber, 'string');
    }
    
    /**
     * @return string 
     */
    public function getUpsNumber()
    {
        return $this->upsNumber;
    }

    /**
     * @param  string $iban International Bank Account Number (IBAN) 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setIban($iban)
    {
        return $this->setProperty('iban', $iban, 'string');
    }
    
    /**
     * @return string International Bank Account Number (IBAN) 
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param  string $bic Bank Identifier Code (BIC)
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setBic($bic)
    {
        return $this->setProperty('bic', $bic, 'string');
    }
    
    /**
     * @return string Bank Identifier Code (BIC)
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @param  string $headerLogo 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setHeaderLogo($headerLogo)
    {
        return $this->setProperty('headerLogo', $headerLogo, 'string');
    }
    
    /**
     * @return string 
     */
    public function getHeaderLogo()
    {
        return $this->headerLogo;
    }

    /**
     * @param  string $footer 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setFooter($footer)
    {
        return $this->setProperty('footer', $footer, 'string');
    }
    
    /**
     * @return string 
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param  string $accountHolder Bank account holder name e.g. "John Doe"
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setAccountHolder($accountHolder)
    {
        return $this->setProperty('accountHolder', $accountHolder, 'string');
    }
    
    /**
     * @return string Bank account holder name e.g. "John Doe"
     */
    public function getAccountHolder()
    {
        return $this->accountHolder;
    }

    /**
     * @param  Identity $id 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  boolean $flagUpdate 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setFlagUpdate($flagUpdate)
    {
        return $this->setProperty('flagUpdate', $flagUpdate, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getFlagUpdate()
    {
        return $this->flagUpdate;
    }

    /**
     * @param  boolean $isActive 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('isActive', $isActive, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
}

