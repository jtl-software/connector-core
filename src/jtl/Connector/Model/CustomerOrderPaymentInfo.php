<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage CustomerOrder
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Additional payment info for direct debit / banktransfer or payment by credit card. 
 *
 * @access public
 * @subpackage CustomerOrder
 */
class CustomerOrderPaymentInfo extends DataModel
{
    /**
     * @var Identity Unique customerOrderPaymentInfo id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to customerOrder
     */
    protected $_customerOrderId = null;
    
    /**
     * @var string Bank name
     */
    protected $_bankName = '';
    
    /**
     * @var string Bank code (deprecated in DE since SEPA)
     */
    protected $_bankCode = '';
    
    /**
     * @var string Bank account holder name
     */
    protected $_accountHolder = '';
    
    /**
     * @var string Bank account number (deprecated in DE since SEPA)
     */
    protected $_accountNumber = '';
    
    /**
     * @var string International Bank Account Number (IBAN)
     */
    protected $_iban = '';
    
    /**
     * @var string Bank Identifier Code (BIC)
     */
    protected $_bic = '';
    
    /**
     * @var string Credit card number
     */
    protected $_creditCardNumber = '';
    
    /**
     * @var string Credit card verification number
     */
    protected $_creditCardVerificationNumber = '';
    
    /**
     * @var string Credit card expiration date
     */
    protected $_creditCardExpiration = '';
    
    /**
     * @var string Credit card type (e.g. "visa")
     */
    protected $_creditCardType = '';
    
    /**
     * @var string Credit card holder name
     */
    protected $_creditCardHolder = '';
    
    /**
     * CustomerOrderPaymentInfo Setter
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
                case "_id":
                case "_customerOrderId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_bankName":
                case "_bankCode":
                case "_accountHolder":
                case "_accountNumber":
                case "_iban":
                case "_bic":
                case "_creditCardNumber":
                case "_creditCardVerificationNumber":
                case "_creditCardExpiration":
                case "_creditCardType":
                case "_creditCardHolder":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique customerOrderPaymentInfo id
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique customerOrderPaymentInfo id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        $this->_customerOrderId = $customerOrderId;
        return $this;
    }
    
    /**
     * @return Identity Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->_customerOrderId;
    }
    /**
     * @param string $bankName Bank name
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setBankName($bankName)
    {
        $this->_bankName = (string)$bankName;
        return $this;
    }
    
    /**
     * @return string Bank name
     */
    public function getBankName()
    {
        return $this->_bankName;
    }
    /**
     * @param string $bankCode Bank code (deprecated in DE since SEPA)
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setBankCode($bankCode)
    {
        $this->_bankCode = (string)$bankCode;
        return $this;
    }
    
    /**
     * @return string Bank code (deprecated in DE since SEPA)
     */
    public function getBankCode()
    {
        return $this->_bankCode;
    }
    /**
     * @param string $accountHolder Bank account holder name
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setAccountHolder($accountHolder)
    {
        $this->_accountHolder = (string)$accountHolder;
        return $this;
    }
    
    /**
     * @return string Bank account holder name
     */
    public function getAccountHolder()
    {
        return $this->_accountHolder;
    }
    /**
     * @param string $accountNumber Bank account number (deprecated in DE since SEPA)
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setAccountNumber($accountNumber)
    {
        $this->_accountNumber = (string)$accountNumber;
        return $this;
    }
    
    /**
     * @return string Bank account number (deprecated in DE since SEPA)
     */
    public function getAccountNumber()
    {
        return $this->_accountNumber;
    }
    /**
     * @param string $iban International Bank Account Number (IBAN)
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setIban($iban)
    {
        $this->_iban = (string)$iban;
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
     * @param string $bic Bank Identifier Code (BIC)
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setBic($bic)
    {
        $this->_bic = (string)$bic;
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
     * @param string $creditCardNumber Credit card number
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setCreditCardNumber($creditCardNumber)
    {
        $this->_creditCardNumber = (string)$creditCardNumber;
        return $this;
    }
    
    /**
     * @return string Credit card number
     */
    public function getCreditCardNumber()
    {
        return $this->_creditCardNumber;
    }
    /**
     * @param string $creditCardVerificationNumber Credit card verification number
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setCreditCardVerificationNumber($creditCardVerificationNumber)
    {
        $this->_creditCardVerificationNumber = (string)$creditCardVerificationNumber;
        return $this;
    }
    
    /**
     * @return string Credit card verification number
     */
    public function getCreditCardVerificationNumber()
    {
        return $this->_creditCardVerificationNumber;
    }
    /**
     * @param string $creditCardExpiration Credit card expiration date
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setCreditCardExpiration($creditCardExpiration)
    {
        $this->_creditCardExpiration = (string)$creditCardExpiration;
        return $this;
    }
    
    /**
     * @return string Credit card expiration date
     */
    public function getCreditCardExpiration()
    {
        return $this->_creditCardExpiration;
    }
    /**
     * @param string $creditCardType Credit card type (e.g. "visa")
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setCreditCardType($creditCardType)
    {
        $this->_creditCardType = (string)$creditCardType;
        return $this;
    }
    
    /**
     * @return string Credit card type (e.g. "visa")
     */
    public function getCreditCardType()
    {
        return $this->_creditCardType;
    }
    /**
     * @param string $creditCardHolder Credit card holder name
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setCreditCardHolder($creditCardHolder)
    {
        $this->_creditCardHolder = (string)$creditCardHolder;
        return $this;
    }
    
    /**
     * @return string Credit card holder name
     */
    public function getCreditCardHolder()
    {
        return $this->_creditCardHolder;
    }
}