<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * CustomerOrder Model
 * @access public
 */
abstract class CustomerOrder extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_basketId;
    
    /**
     * @var string
     */
    protected $_customerId;
    
    /**
     * @var 
     */
    protected $_shippingAddressId;
    
    /**
     * @var 
     */
    protected $_billingAddressId;
    
    /**
     * @var 
     */
    protected $_paymentMethodId;
    
    /**
     * @var 
     */
    protected $_shippingMethodId;
    
    /**
     * @var 
     */
    protected $_languageIso;
    
    /**
     * @var string
     */
    protected $_currencyIso;
    
    /**
     * @var 
     */
    protected $_paymentMethodType;
    
    /**
     * @var string
     */
    protected $_credit;
    
    /**
     * @var 
     */
    protected $_totalSum;
    
    /**
     * @var 
     */
    protected $_session;
    
    /**
     * @var 
     */
    protected $_shippingMethodName;
    
    /**
     * @var 
     */
    protected $_paymentMethodName;
    
    /**
     * @var 
     */
    protected $_orderNumber;
    
    /**
     * @var 
     */
    protected $_shippingInfo;
    
    /**
     * @var 
     */
    protected $_shippingDate;
    
    /**
     * @var 
     */
    protected $_paymentDate;
    
    /**
     * @var 
     */
    protected $_ratingNotificationDate;
    
    /**
     * @var 
     */
    protected $_tracking;
    
    /**
     * @var int
     */
    protected $_note;
    
    /**
     * @var 
     */
    protected $_logistic;
    
    /**
     * @var 
     */
    protected $_trackingURL;
    
    /**
     * @var 
     */
    protected $_ip;
    
    /**
     * @var 
     */
    protected $_isFetched;
    
    /**
     * @var 
     */
    protected $_status;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * @var 
     */
    protected $_paymentMethodId;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setId($id)
    {
        $this->_id = ()$id;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param  $basketId
     * @return \jtl\Connector\Model\CustomerOrder
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
     * @param string $customerId
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setCustomerId($customerId)
    {
        $this->_customerId = (string)$customerId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->_customerId;
    }
    
    /**
     * @param  $shippingAddressId
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingAddressId($shippingAddressId)
    {
        $this->_shippingAddressId = ()$shippingAddressId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getShippingAddressId()
    {
        return $this->_shippingAddressId;
    }
    
    /**
     * @param  $billingAddressId
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setBillingAddressId($billingAddressId)
    {
        $this->_billingAddressId = ()$billingAddressId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getBillingAddressId()
    {
        return $this->_billingAddressId;
    }
    
    /**
     * @param  $paymentMethodId
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setPaymentMethodId($paymentMethodId)
    {
        $this->_paymentMethodId = ()$paymentMethodId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getPaymentMethodId()
    {
        return $this->_paymentMethodId;
    }
    
    /**
     * @param  $shippingMethodId
     * @return \jtl\Connector\Model\CustomerOrder
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
     * @param  $languageIso
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = ()$languageIso;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getLanguageIso()
    {
        return $this->_languageIso;
    }
    
    /**
     * @param string $currencyIso
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setCurrencyIso($currencyIso)
    {
        $this->_currencyIso = (string)$currencyIso;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCurrencyIso()
    {
        return $this->_currencyIso;
    }
    
    /**
     * @param  $paymentMethodType
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setPaymentMethodType($paymentMethodType)
    {
        $this->_paymentMethodType = ()$paymentMethodType;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getPaymentMethodType()
    {
        return $this->_paymentMethodType;
    }
    
    /**
     * @param string $credit
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setCredit($credit)
    {
        $this->_credit = (string)$credit;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCredit()
    {
        return $this->_credit;
    }
    
    /**
     * @param  $totalSum
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setTotalSum($totalSum)
    {
        $this->_totalSum = ()$totalSum;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getTotalSum()
    {
        return $this->_totalSum;
    }
    
    /**
     * @param  $session
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setSession($session)
    {
        $this->_session = ()$session;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSession()
    {
        return $this->_session;
    }
    
    /**
     * @param  $shippingMethodName
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingMethodName($shippingMethodName)
    {
        $this->_shippingMethodName = ()$shippingMethodName;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getShippingMethodName()
    {
        return $this->_shippingMethodName;
    }
    
    /**
     * @param  $paymentMethodName
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setPaymentMethodName($paymentMethodName)
    {
        $this->_paymentMethodName = ()$paymentMethodName;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getPaymentMethodName()
    {
        return $this->_paymentMethodName;
    }
    
    /**
     * @param  $orderNumber
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setOrderNumber($orderNumber)
    {
        $this->_orderNumber = ()$orderNumber;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getOrderNumber()
    {
        return $this->_orderNumber;
    }
    
    /**
     * @param  $shippingInfo
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingInfo($shippingInfo)
    {
        $this->_shippingInfo = ()$shippingInfo;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getShippingInfo()
    {
        return $this->_shippingInfo;
    }
    
    /**
     * @param  $shippingDate
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingDate($shippingDate)
    {
        $this->_shippingDate = ()$shippingDate;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getShippingDate()
    {
        return $this->_shippingDate;
    }
    
    /**
     * @param  $paymentDate
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setPaymentDate($paymentDate)
    {
        $this->_paymentDate = ()$paymentDate;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getPaymentDate()
    {
        return $this->_paymentDate;
    }
    
    /**
     * @param  $ratingNotificationDate
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setRatingNotificationDate($ratingNotificationDate)
    {
        $this->_ratingNotificationDate = ()$ratingNotificationDate;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getRatingNotificationDate()
    {
        return $this->_ratingNotificationDate;
    }
    
    /**
     * @param  $tracking
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setTracking($tracking)
    {
        $this->_tracking = ()$tracking;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getTracking()
    {
        return $this->_tracking;
    }
    
    /**
     * @param int $note
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setNote($note)
    {
        $this->_note = (int)$note;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getNote()
    {
        return $this->_note;
    }
    
    /**
     * @param  $logistic
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setLogistic($logistic)
    {
        $this->_logistic = ()$logistic;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getLogistic()
    {
        return $this->_logistic;
    }
    
    /**
     * @param  $trackingURL
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setTrackingURL($trackingURL)
    {
        $this->_trackingURL = ()$trackingURL;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getTrackingURL()
    {
        return $this->_trackingURL;
    }
    
    /**
     * @param  $ip
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setIp($ip)
    {
        $this->_ip = ()$ip;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIp()
    {
        return $this->_ip;
    }
    
    /**
     * @param  $isFetched
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setIsFetched($isFetched)
    {
        $this->_isFetched = ()$isFetched;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIsFetched()
    {
        return $this->_isFetched;
    }
    
    /**
     * @param  $status
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setStatus($status)
    {
        $this->_status = ()$status;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getStatus()
    {
        return $this->_status;
    }
    
    /**
     * @param string $created
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setCreated($created)
    {
        $this->_created = (string)$created;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->_created;
    }
    
    /**
     * @param  $paymentMethodId
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setPaymentMethodId($paymentMethodId)
    {
        $this->_paymentMethodId = ()$paymentMethodId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getPaymentMethodId()
    {
        return $this->_paymentMethodId;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/CustomerOrder/CustomerOrder.json", $this->getPublic(array()));
    }
}
?>