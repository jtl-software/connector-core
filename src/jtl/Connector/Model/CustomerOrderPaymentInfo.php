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
     * @type string Bank account holder name
     */
    protected $accountHolder = '';

    /**
     * @type string Bank account number (deprecated in DE since SEPA)
     */
    protected $accountNumber = '';

    /**
     * @type string Bank code (deprecated in DE since SEPA)
     */
    protected $bankCode = '';

    /**
     * @type string Bank name
     */
    protected $bankName = '';

    /**
     * @type string Bank Identifier Code (BIC)
     */
    protected $bic = '';

    /**
     * @type string Credit card expiration date
     */
    protected $creditCardExpiration = '';

    /**
     * @type string Credit card holder name
     */
    protected $creditCardHolder = '';

    /**
     * @type string Credit card number
     */
    protected $creditCardNumber = '';

    /**
     * @type string Credit card type (e.g. "visa")
     */
    protected $creditCardType = '';

    /**
     * @type string Credit card verification number
     */
    protected $creditCardVerificationNumber = '';

    /**
     * @type string International Bank Account Number (IBAN)
     */
    protected $iban = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'customerOrderId',
        'id',
    );

    /**
     * @param  Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        return $this->setProperty('CustomerOrderId', $customerOrderId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setAccountHolder(Identity $accountHolder)
    {
        return $this->setProperty('AccountHolder', $accountHolder, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setAccountNumber(Identity $accountNumber)
    {
        return $this->setProperty('AccountNumber', $accountNumber, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBankCode(Identity $bankCode)
    {
        return $this->setProperty('BankCode', $bankCode, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBankName(Identity $bankName)
    {
        return $this->setProperty('BankName', $bankName, 'string');
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
     * @param  string $creditCardExpiration Credit card expiration date
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCreditCardExpiration(Identity $creditCardExpiration)
    {
        return $this->setProperty('CreditCardExpiration', $creditCardExpiration, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCreditCardHolder(Identity $creditCardHolder)
    {
        return $this->setProperty('CreditCardHolder', $creditCardHolder, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCreditCardNumber(Identity $creditCardNumber)
    {
        return $this->setProperty('CreditCardNumber', $creditCardNumber, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCreditCardType(Identity $creditCardType)
    {
        return $this->setProperty('CreditCardType', $creditCardType, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCreditCardVerificationNumber(Identity $creditCardVerificationNumber)
    {
        return $this->setProperty('CreditCardVerificationNumber', $creditCardVerificationNumber, 'string');
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

 
}
