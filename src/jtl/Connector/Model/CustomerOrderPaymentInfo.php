<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Additional payment info for direct debit / banktransfer or payment by credit card. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CustomerOrderPaymentInfo extends DataModel
{
    /**
     * @var Identity Reference to customerOrder
     */
    protected $customerOrderId = null;

    /**
     * @var Identity Unique customerOrderPaymentInfo id
     */
    protected $id = null;

    /**
     * @var string Bank account holder name
     */
    protected $accountHolder = '';

    /**
     * @var string Bank account number (deprecated in DE since SEPA)
     */
    protected $accountNumber = '';

    /**
     * @var string Bank code (deprecated in DE since SEPA)
     */
    protected $bankCode = '';

    /**
     * @var string Bank name
     */
    protected $bankName = '';

    /**
     * @var string Bank Identifier Code (BIC)
     */
    protected $bic = '';

    /**
     * @var string Credit card expiration date
     */
    protected $creditCardExpiration = '';

    /**
     * @var string Credit card holder name
     */
    protected $creditCardHolder = '';

    /**
     * @var string Credit card number
     */
    protected $creditCardNumber = '';

    /**
     * @var string Credit card type (e.g. "visa")
     */
    protected $creditCardType = '';

    /**
     * @var string Credit card verification number
     */
    protected $creditCardVerificationNumber = '';

    /**
     * @var string International Bank Account Number (IBAN)
     */
    protected $iban = '';

    /**
     * @param  Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  Identity $id Unique customerOrderPaymentInfo id
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  string $accountHolder Bank account holder name
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $accountNumber Bank account number (deprecated in DE since SEPA)
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $bankCode Bank code (deprecated in DE since SEPA)
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $bankName Bank name
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setBankName($bankName)
    {
        return $this->setProperty('bankName', $bankName, 'string');
    }

    /**
     * @return string Bank name
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @param  string $bic Bank Identifier Code (BIC)
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
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
     * @param  string $creditCardExpiration Credit card expiration date
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCreditCardExpiration($creditCardExpiration)
    {
        return $this->setProperty('creditCardExpiration', $creditCardExpiration, 'string');
    }

    /**
     * @return string Credit card expiration date
     */
    public function getCreditCardExpiration()
    {
        return $this->creditCardExpiration;
    }

    /**
     * @param  string $creditCardHolder Credit card holder name
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCreditCardHolder($creditCardHolder)
    {
        return $this->setProperty('creditCardHolder', $creditCardHolder, 'string');
    }

    /**
     * @return string Credit card holder name
     */
    public function getCreditCardHolder()
    {
        return $this->creditCardHolder;
    }

    /**
     * @param  string $creditCardNumber Credit card number
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $creditCardType Credit card type (e.g. "visa")
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCreditCardType($creditCardType)
    {
        return $this->setProperty('creditCardType', $creditCardType, 'string');
    }

    /**
     * @return string Credit card type (e.g. "visa")
     */
    public function getCreditCardType()
    {
        return $this->creditCardType;
    }

    /**
     * @param  string $creditCardVerificationNumber Credit card verification number
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCreditCardVerificationNumber($creditCardVerificationNumber)
    {
        return $this->setProperty('creditCardVerificationNumber', $creditCardVerificationNumber, 'string');
    }

    /**
     * @return string Credit card verification number
     */
    public function getCreditCardVerificationNumber()
    {
        return $this->creditCardVerificationNumber;
    }

    /**
     * @param  string $iban International Bank Account Number (IBAN)
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
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

 
}
