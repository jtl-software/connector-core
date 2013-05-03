<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrderPaymentInfo Model
 * @access public
 */
abstract class CustomerOrderPaymentInfo extends DataModel
{
    /**
     * @var int
     */
    protected $_shippingMethodId;
    
    /**
     * @var int
     */
    protected $_basketId;
    
    /**
     * @var string
     */
    protected $_bankAccount;
    
    /**
     * @var string
     */
    protected $_bankCode;
    
    /**
     * @var string
     */
    protected $_accountHolder;
    
    /**
     * @var string
     */
    protected $_accountNumber;
    
    /**
     * @var string
     */
    protected $_iban;
    
    /**
     * @var string
     */
    protected $_bic;
    
    /**
     * @var string
     */
    protected $_creditCardNumber;
    
    /**
     * @var string
     */
    protected $_cvv;
    
    /**
     * @param int $shippingMethodId
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setShippingMethodId($shippingMethodId)
    {
        $this->_shippingMethodId = (int)$shippingMethodId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getShippingMethodId()
    {
        return $this->_shippingMethodId;
    }
    /**
     * @param int $basketId
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setBasketId($basketId)
    {
        $this->_basketId = (int)$basketId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getBasketId()
    {
        return $this->_basketId;
    }
    /**
     * @param string $bankAccount
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setBankAccount($bankAccount)
    {
        $this->_bankAccount = (string)$bankAccount;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBankAccount()
    {
        return $this->_bankAccount;
    }
    /**
     * @param string $bankCode
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
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
     * @param string $accountHolder
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
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
     * @param string $accountNumber
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
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
     * @param string $iban
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
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
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
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
     * @param string $creditCardNumber
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setCreditCardNumber($creditCardNumber)
    {
        $this->_creditCardNumber = (string)$creditCardNumber;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCreditCardNumber()
    {
        return $this->_creditCardNumber;
    }
    /**
     * @param string $cvv
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setCvv($cvv)
    {
        $this->_cvv = (string)$cvv;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCvv()
    {
        return $this->_cvv;
    }
}
?>