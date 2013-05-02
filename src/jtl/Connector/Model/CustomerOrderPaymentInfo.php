<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * CustomerOrderPaymentInfo Model
 * @access public
 */
abstract class CustomerOrderPaymentInfo extends Model
{
    /**
     * @var 
     */
    protected $_shippingMethodId;
    
    /**
     * @var 
     */
    protected $_basketId;
    
    /**
     * @var 
     */
    protected $_bankAccount;
    
    /**
     * @var 
     */
    protected $_bankCode;
    
    /**
     * @var 
     */
    protected $_accountHolder;
    
    /**
     * @var 
     */
    protected $_accountNumber;
    
    /**
     * @var 
     */
    protected $_iban;
    
    /**
     * @var 
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
     * @param  $shippingMethodId
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setShippingMethodId($shippingMethodId)
    {
        $this->_shippingMethodId = ()$shippingMethodId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getShippingMethodId()
    {
        return $this->_shippingMethodId;
    }
    
    /**
     * @param  $basketId
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setBasketId($basketId)
    {
        $this->_basketId = ()$basketId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getBasketId()
    {
        return $this->_basketId;
    }
    
    /**
     * @param  $bankAccount
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setBankAccount($bankAccount)
    {
        $this->_bankAccount = ()$bankAccount;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getBankAccount()
    {
        return $this->_bankAccount;
    }
    
    /**
     * @param  $bankCode
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setBankCode($bankCode)
    {
        $this->_bankCode = ()$bankCode;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getBankCode()
    {
        return $this->_bankCode;
    }
    
    /**
     * @param  $accountHolder
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setAccountHolder($accountHolder)
    {
        $this->_accountHolder = ()$accountHolder;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getAccountHolder()
    {
        return $this->_accountHolder;
    }
    
    /**
     * @param  $accountNumber
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setAccountNumber($accountNumber)
    {
        $this->_accountNumber = ()$accountNumber;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getAccountNumber()
    {
        return $this->_accountNumber;
    }
    
    /**
     * @param  $iban
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setIban($iban)
    {
        $this->_iban = ()$iban;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIban()
    {
        return $this->_iban;
    }
    
    /**
     * @param  $bic
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo
     */
    public function setBic($bic)
    {
        $this->_bic = ()$bic;
        return $this;
    }
    
    /**
     * @return 
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
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/CustomerOrderPaymentInfo/CustomerOrderPaymentInfo.json", $this->getPublic(array()));
    }
}
?>