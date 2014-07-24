<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
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
    protected $_companyId = null;

    /**
     * @type string Bank account holder name e.g. "John Doe"
     */
    protected $_accountHolder = '';

    /**
     * @type string Bank account number
     */
    protected $_accountNumber = '';

    /**
     * @type string Bank code number
     */
    protected $_bankCode = '';

    /**
     * @type string Bank name e.g. "Deutsche Bank"
     */
    protected $_bankName = '';

    /**
     * @type string Bank Identifier Code (BIC)
     */
    protected $_bic = '';

    /**
     * @type string Company businessman / entrepreneur
     */
    protected $_businessman = '';

    /**
     * @type string 
     */
    protected $_cGlaeubigerID = '';

    /**
     * @type string City
     */
    protected $_city = '';

    /**
     * @type string CountryIso
     */
    protected $_countryIso = '';

    /**
     * @type string Company E-Mail address
     */
    protected $_eMail = '';

    /**
     * @type string Fax number
     */
    protected $_fax = '';

    /**
     * @type boolean 
     */
    protected $_flagUpdate = false;

    /**
     * @type string 
     */
    protected $_footer = '';

    /**
     * @type string 
     */
    protected $_headerLogo = '';

    /**
     * @type string International Bank Account Number (IBAN) 
     */
    protected $_iban = '';

    /**
     * @type string 
     */
    protected $_intrashipNumber = '';

    /**
     * @type boolean 
     */
    protected $_isActive = false;

    /**
     * @type string Company name
     */
    protected $_name = '';

    /**
     * @type string Phone number
     */
    protected $_phone = '';

    /**
     * @type string Street
     */
    protected $_street = '';

    /**
     * @type string Tax id number (german: Steuernummer)
     */
    protected $_taxIdNumber = '';

    /**
     * @type string 
     */
    protected $_upsNumber = '';

    /**
     * @type string VAT registration number (german: USt-ID)
     */
    protected $_vatNumber = '';

    /**
     * @type string Company website URL
     */
    protected $_www = '';

    /**
     * @type string Zip code / postcode
     */
    protected $_zipCode = '';


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_companyId',
	);

	/**
	 * @param  string $name Company name
	 * @return \jtl\Connector\Model\Company
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setName($name)
	{
		if (!is_string($name))
			throw new InvalidArgumentException('string expected.');
		$this->_name = $name;
		return $this;
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
		if (!is_string($businessman))
			throw new InvalidArgumentException('string expected.');
		$this->_businessman = $businessman;
		return $this;
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
		if (!is_string($street))
			throw new InvalidArgumentException('string expected.');
		$this->_street = $street;
		return $this;
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
		if (!is_string($zipCode))
			throw new InvalidArgumentException('string expected.');
		$this->_zipCode = $zipCode;
		return $this;
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
		if (!is_string($city))
			throw new InvalidArgumentException('string expected.');
		$this->_city = $city;
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
	 * @param  string $countryIso CountryIso
	 * @return \jtl\Connector\Model\Company
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setCountryIso($countryIso)
	{
		if (!is_string($countryIso))
			throw new InvalidArgumentException('string expected.');
		$this->_countryIso = $countryIso;
		return $this;
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
		if (!is_string($phone))
			throw new InvalidArgumentException('string expected.');
		$this->_phone = $phone;
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
	 * @param  string $fax Fax number
	 * @return \jtl\Connector\Model\Company
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setFax($fax)
	{
		if (!is_string($fax))
			throw new InvalidArgumentException('string expected.');
		$this->_fax = $fax;
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
	 * @param  string $eMail Company E-Mail address
	 * @return \jtl\Connector\Model\Company
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setEMail($eMail)
	{
		if (!is_string($eMail))
			throw new InvalidArgumentException('string expected.');
		$this->_eMail = $eMail;
		return $this;
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
		if (!is_string($www))
			throw new InvalidArgumentException('string expected.');
		$this->_www = $www;
		return $this;
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
		if (!is_string($bankCode))
			throw new InvalidArgumentException('string expected.');
		$this->_bankCode = $bankCode;
		return $this;
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
		if (!is_string($accountNumber))
			throw new InvalidArgumentException('string expected.');
		$this->_accountNumber = $accountNumber;
		return $this;
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
		if (!is_string($bankName))
			throw new InvalidArgumentException('string expected.');
		$this->_bankName = $bankName;
		return $this;
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
		if (!is_string($vatNumber))
			throw new InvalidArgumentException('string expected.');
		$this->_vatNumber = $vatNumber;
		return $this;
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
		if (!is_string($taxIdNumber))
			throw new InvalidArgumentException('string expected.');
		$this->_taxIdNumber = $taxIdNumber;
		return $this;
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
		if (!is_string($intrashipNumber))
			throw new InvalidArgumentException('string expected.');
		$this->_intrashipNumber = $intrashipNumber;
		return $this;
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
		if (!is_string($upsNumber))
			throw new InvalidArgumentException('string expected.');
		$this->_upsNumber = $upsNumber;
		return $this;
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
		if (!is_string($iban))
			throw new InvalidArgumentException('string expected.');
		$this->_iban = $iban;
		return $this;
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
		if (!is_string($bic))
			throw new InvalidArgumentException('string expected.');
		$this->_bic = $bic;
		return $this;
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
		if (!is_string($headerLogo))
			throw new InvalidArgumentException('string expected.');
		$this->_headerLogo = $headerLogo;
		return $this;
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
		if (!is_string($footer))
			throw new InvalidArgumentException('string expected.');
		$this->_footer = $footer;
		return $this;
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
		if (!is_string($accountHolder))
			throw new InvalidArgumentException('string expected.');
		$this->_accountHolder = $accountHolder;
		return $this;
	}
	
	/**
	 * @return string Bank account holder name e.g. "John Doe"
	 */
	public function getAccountHolder()
	{
		return $this->_accountHolder;
	}

	/**
	 * @param  string $cGlaeubigerID 
	 * @return \jtl\Connector\Model\Company
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setCGlaeubigerID($cGlaeubigerID)
	{
		if (!is_string($cGlaeubigerID))
			throw new InvalidArgumentException('string expected.');
		$this->_cGlaeubigerID = $cGlaeubigerID;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getCGlaeubigerID()
	{
		return $this->_cGlaeubigerID;
	}

	/**
	 * @param  Identity $companyId 
	 * @return \jtl\Connector\Model\Company
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCompanyId(Identity $companyId)
	{
		
		$this->_companyId = $companyId;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getCompanyId()
	{
		return $this->_companyId;
	}

	/**
	 * @param  boolean $flagUpdate 
	 * @return \jtl\Connector\Model\Company
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setFlagUpdate($flagUpdate)
	{
		if (!is_bool($flagUpdate))
			throw new InvalidArgumentException('boolean expected.');
		$this->_flagUpdate = $flagUpdate;
		return $this;
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
		if (!is_bool($isActive))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isActive = $isActive;
		return $this;
	}
	
	/**
	 * @return boolean 
	 */
	public function getIsActive()
	{
		return $this->_isActive;
	}
}

