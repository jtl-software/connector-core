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
     * @type string International Bank Account Number (IBAN) 
     */
    protected $iban = '';

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
     * @type string Street number
     */
    protected $streetNumber = '';

    /**
     * @type string Tax id number (german: Steuernummer)
     */
    protected $taxIdNumber = '';

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
    );

    /**
     * @param  string $accountHolder Bank account holder name e.g. "John Doe"
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setAccountHolder(Identity $accountHolder)
    {
        return $this->setProperty('AccountHolder', $accountHolder, 'string');
    }

    /**
     * @return string Bank account holder name e.g. "John Doe"
     */
    public function getAccountHolder()
    {
        return $this->accountHolder;
    }

    /**
     * @param  string $accountNumber Bank account number
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setAccountNumber(Identity $accountNumber)
    {
        return $this->setProperty('AccountNumber', $accountNumber, 'string');
    }

    /**
     * @return string Bank account number
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param  string $bankCode Bank code number
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBankCode(Identity $bankCode)
    {
        return $this->setProperty('BankCode', $bankCode, 'string');
    }

    /**
     * @return string Bank code number
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * @param  string $bankName Bank name e.g. "Deutsche Bank"
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBankName(Identity $bankName)
    {
        return $this->setProperty('BankName', $bankName, 'string');
    }

    /**
     * @return string Bank name e.g. "Deutsche Bank"
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @param  string $bic Bank Identifier Code (BIC)
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBic(Identity $bic)
    {
        return $this->setProperty('Bic', $bic, 'string');
    }

    /**
     * @return string Bank Identifier Code (BIC)
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @param  string $businessman Company businessman / entrepreneur
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBusinessman(Identity $businessman)
    {
        return $this->setProperty('Businessman', $businessman, 'string');
    }

    /**
     * @return string Company businessman / entrepreneur
     */
    public function getBusinessman()
    {
        return $this->businessman;
    }

    /**
     * @param  string $city City
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCity(Identity $city)
    {
        return $this->setProperty('City', $city, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCountryIso(Identity $countryIso)
    {
        return $this->setProperty('CountryIso', $countryIso, 'string');
    }

    /**
     * @return string CountryIso
     */
    public function getCountryIso()
    {
        return $this->countryIso;
    }

    /**
     * @param  string $eMail Company E-Mail address
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setEMail(Identity $eMail)
    {
        return $this->setProperty('EMail', $eMail, 'string');
    }

    /**
     * @return string Company E-Mail address
     */
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * @param  string $fax Fax number
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setFax(Identity $fax)
    {
        return $this->setProperty('Fax', $fax, 'string');
    }

    /**
     * @return string Fax number
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param  string $iban International Bank Account Number (IBAN) 
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIban(Identity $iban)
    {
        return $this->setProperty('Iban', $iban, 'string');
    }

    /**
     * @return string International Bank Account Number (IBAN) 
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param  string $name Company name
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Company name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $phone Phone number
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPhone(Identity $phone)
    {
        return $this->setProperty('Phone', $phone, 'string');
    }

    /**
     * @return string Phone number
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param  string $street Street
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setStreet(Identity $street)
    {
        return $this->setProperty('Street', $street, 'string');
    }

    /**
     * @return string Street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param  string $streetNumber Street number
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setStreetNumber(Identity $streetNumber)
    {
        return $this->setProperty('StreetNumber', $streetNumber, 'string');
    }

    /**
     * @return string Street number
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @param  string $taxIdNumber Tax id number (german: Steuernummer)
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTaxIdNumber(Identity $taxIdNumber)
    {
        return $this->setProperty('TaxIdNumber', $taxIdNumber, 'string');
    }

    /**
     * @return string Tax id number (german: Steuernummer)
     */
    public function getTaxIdNumber()
    {
        return $this->taxIdNumber;
    }

    /**
     * @param  string $vatNumber VAT registration number (german: USt-ID)
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setVatNumber(Identity $vatNumber)
    {
        return $this->setProperty('VatNumber', $vatNumber, 'string');
    }

    /**
     * @return string VAT registration number (german: USt-ID)
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    /**
     * @param  string $www Company website URL
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setWww(Identity $www)
    {
        return $this->setProperty('Www', $www, 'string');
    }

    /**
     * @return string Company website URL
     */
    public function getWww()
    {
        return $this->www;
    }

    /**
     * @param  string $zipCode Zip code / postcode
     * @return \jtl\Connector\Model\Company
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setZipCode(Identity $zipCode)
    {
        return $this->setProperty('ZipCode', $zipCode, 'string');
    }

    /**
     * @return string Zip code / postcode
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

 
}
