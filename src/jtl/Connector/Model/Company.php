<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Provides company address and bank details.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 * 
 * @Serializer\AccessType("public_method")
 */
class Company extends DataModel
{
    /**
     * @var Identity Unique company id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var string Bank account holder name e.g. "John Doe"
     * @Serializer\Type("string")
     * @Serializer\SerializedName("accountHolder")
     * @Serializer\Accessor(getter="getAccountHolder",setter="setAccountHolder")
     */
    protected $accountHolder = '';

    /**
     * @var string Bank account number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("accountNumber")
     * @Serializer\Accessor(getter="getAccountNumber",setter="setAccountNumber")
     */
    protected $accountNumber = '';

    /**
     * @var string Bank code number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bankCode")
     * @Serializer\Accessor(getter="getBankCode",setter="setBankCode")
     */
    protected $bankCode = '';

    /**
     * @var string Bank name e.g. "Deutsche Bank"
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bankName")
     * @Serializer\Accessor(getter="getBankName",setter="setBankName")
     */
    protected $bankName = '';

    /**
     * @var string Bank Identifier Code (BIC)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bic")
     * @Serializer\Accessor(getter="getBic",setter="setBic")
     */
    protected $bic = '';

    /**
     * @var string Company businessman / entrepreneur
     * @Serializer\Type("string")
     * @Serializer\SerializedName("businessman")
     * @Serializer\Accessor(getter="getBusinessman",setter="setBusinessman")
     */
    protected $businessman = '';

    /**
     * @var string City
     * @Serializer\Type("string")
     * @Serializer\SerializedName("city")
     * @Serializer\Accessor(getter="getCity",setter="setCity")
     */
    protected $city = '';

    /**
     * @var string CountryIso
     * @Serializer\Type("string")
     * @Serializer\SerializedName("countryIso")
     * @Serializer\Accessor(getter="getCountryIso",setter="setCountryIso")
     */
    protected $countryIso = '';

    /**
     * @var string Company E-Mail address
     * @Serializer\Type("string")
     * @Serializer\SerializedName("eMail")
     * @Serializer\Accessor(getter="getEMail",setter="setEMail")
     */
    protected $eMail = '';

    /**
     * @var string Fax number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("fax")
     * @Serializer\Accessor(getter="getFax",setter="setFax")
     */
    protected $fax = '';

    /**
     * @var string International Bank Account Number (IBAN) 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("iban")
     * @Serializer\Accessor(getter="getIban",setter="setIban")
     */
    protected $iban = '';

    /**
     * @var string Company name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';

    /**
     * @var string Phone number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("phone")
     * @Serializer\Accessor(getter="getPhone",setter="setPhone")
     */
    protected $phone = '';

    /**
     * @var string Street
     * @Serializer\Type("string")
     * @Serializer\SerializedName("street")
     * @Serializer\Accessor(getter="getStreet",setter="setStreet")
     */
    protected $street = '';

    /**
     * @var string Street number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("streetNumber")
     * @Serializer\Accessor(getter="getStreetNumber",setter="setStreetNumber")
     */
    protected $streetNumber = '';

    /**
     * @var string Tax id number (german: Steuernummer)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("taxIdNumber")
     * @Serializer\Accessor(getter="getTaxIdNumber",setter="setTaxIdNumber")
     */
    protected $taxIdNumber = '';

    /**
     * @var string VAT registration number (german: USt-ID)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("vatNumber")
     * @Serializer\Accessor(getter="getVatNumber",setter="setVatNumber")
     */
    protected $vatNumber = '';

    /**
     * @var string Company website URL
     * @Serializer\Type("string")
     * @Serializer\SerializedName("www")
     * @Serializer\Accessor(getter="getWww",setter="setWww")
     */
    protected $www = '';

    /**
     * @var string Zip code / postcode
     * @Serializer\Type("string")
     * @Serializer\SerializedName("zipCode")
     * @Serializer\Accessor(getter="getZipCode",setter="setZipCode")
     */
    protected $zipCode = '';


    public function __construct()
    {
        $this->id = new Identity;
    }

    /**
     * @param  Identity $id Unique company id
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique company id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $accountHolder Bank account holder name e.g. "John Doe"
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $accountNumber Bank account number
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $bankCode Bank code number
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $bankName Bank name e.g. "Deutsche Bank"
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $bic Bank Identifier Code (BIC)
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $businessman Company businessman / entrepreneur
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $city City
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $eMail Company E-Mail address
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $fax Fax number
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $iban International Bank Account Number (IBAN) 
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $name Company name
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $phone Phone number
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $street Street
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $streetNumber Street number
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setStreetNumber($streetNumber)
    {
        return $this->setProperty('streetNumber', $streetNumber, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $vatNumber VAT registration number (german: USt-ID)
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $www Company website URL
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $zipCode Zip code / postcode
     * @return \jtl\Connector\Model\Company
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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

 
}
