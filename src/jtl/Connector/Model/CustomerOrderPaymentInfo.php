<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Additional payment info for direct debit / banktransfer or payment by credit card. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CustomerOrderPaymentInfo extends DataModel
{
    /**
     * @type Identity Reference to customerOrder
     */
    protected $customerOrderId = null;

    /**
     * @type Identity Unique customerOrderPaymentInfo id
     */
    protected $id = null;

    /**
     * @type Identity 
     */
    protected $platformId = null;

    /**
     * @type string Bank account holder name
     */
    protected $accountHolder = '';

    /**
     * @type string Bank account number (deprecated in DE since SEPA)
     */
    protected $accountNumber = '';

    /**
     * @type string 
     */
    protected $bankAccount = '';

    /**
     * @type string Bank code (deprecated in DE since SEPA)
     */
    protected $bankCode = '';

    /**
     * @type string 
     */
    protected $cBIC = '';

    /**
     * @type string 
     */
    protected $cIBAN = '';

    /**
     * @type string Credit card number
     */
    protected $creditCardNumber = '';

    /**
     * @type string 
     */
    protected $cvv = '';


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'customerOrderId',
        'platformId',
    );

    /**
     * @type array list of propertyInfo
     */
    protected $propertyInfos = array(
        'bankAccount' => 'string',
        'bankCode' => 'string',
        'accountNumber' => 'string',
        'creditCardNumber' => 'string',
        'cvv' => 'string',
        'accountHolder' => 'string',
        'cIBAN' => 'string',
        'cBIC' => 'string',
        'id' => '\jtl\Connector\Model\Identity',
        'customerOrderId' => '\jtl\Connector\Model\Identity',
        'platformId' => '\jtl\Connector\Model\Identity',
    );


    /**
     * @param  string $bankAccount 
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setBankAccount($bankAccount)
    {
        return $this->setProperty('bankAccount', $bankAccount, 'string');
    }
    
    /**
     * @return string 
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param  string $bankCode Bank code (deprecated in DE since SEPA)
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setBankCode($bankCode)
    {
        return $this->setProperty('bankCode', $bankCode, 'string');
    }
    
    /**
     * @return string Bank code (deprecated in DE since SEPA)
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * @param  string $accountNumber Bank account number (deprecated in DE since SEPA)
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setAccountNumber($accountNumber)
    {
        return $this->setProperty('accountNumber', $accountNumber, 'string');
    }
    
    /**
     * @return string Bank account number (deprecated in DE since SEPA)
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param  string $creditCardNumber Credit card number
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCreditCardNumber($creditCardNumber)
    {
        return $this->setProperty('creditCardNumber', $creditCardNumber, 'string');
    }
    
    /**
     * @return string Credit card number
     */
    public function getCreditCardNumber()
    {
        return $this->creditCardNumber;
    }

    /**
     * @param  string $cvv 
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCvv($cvv)
    {
        return $this->setProperty('cvv', $cvv, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * @param  string $accountHolder Bank account holder name
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setAccountHolder($accountHolder)
    {
        return $this->setProperty('accountHolder', $accountHolder, 'string');
    }
    
    /**
     * @return string Bank account holder name
     */
    public function getAccountHolder()
    {
        return $this->accountHolder;
    }

    /**
     * @param  string $cIBAN 
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCIBAN($cIBAN)
    {
        return $this->setProperty('cIBAN', $cIBAN, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCIBAN()
    {
        return $this->cIBAN;
    }

    /**
     * @param  string $cBIC 
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCBIC($cBIC)
    {
        return $this->setProperty('cBIC', $cBIC, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCBIC()
    {
        return $this->cBIC;
    }

    /**
     * @param  Identity $id Unique customerOrderPaymentInfo id
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique customerOrderPaymentInfo id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        return $this->setProperty('customerOrderId', $customerOrderId, 'Identity');
    }
    
    /**
     * @return Identity Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->customerOrderId;
    }

    /**
     * @param  Identity $platformId 
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPlatformId(Identity $platformId)
    {
        return $this->setProperty('platformId', $platformId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getPlatformId()
    {
        return $this->platformId;
    }
}

