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
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_basketId;
    
    /**
     * @var int
     */
    protected $_customerId;
    
    /**
     * @var int
     */
    protected $_shippingAddressId;
    
    /**
     * @var int
     */
    protected $_billingAddressId;
    
    /**
     * @var int
     */
    protected $_paymentMethodId;
    
    /**
     * @var int
     */
    protected $_shippingMethodId;
    
    /**
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_currencyIso;
    
    /**
     * @var int
     */
    protected $_paymentMethodType;
    
    /**
     * @var double
     */
    protected $_credit;
    
    /**
     * @var double
     */
    protected $_totalSum;
    
    /**
     * @var string
     */
    protected $_session;
    
    /**
     * @var string
     */
    protected $_shippingMethodName;
    
    /**
     * @var string
     */
    protected $_paymentMethodName;
    
    /**
     * @var string
     */
    protected $_orderNumber;
    
    /**
     * @var string
     */
    protected $_shippingInfo;
    
    /**
     * @var string
     */
    protected $_shippingDate;
    
    /**
     * @var string
     */
    protected $_paymentDate;
    
    /**
     * @var string
     */
    protected $_ratingNotificationDate;
    
    /**
     * @var string
     */
    protected $_tracking;
    
    /**
     * @var string
     */
    protected $_note;
    
    /**
     * @var string
     */
    protected $_logistic;
    
    /**
     * @var string
     */
    protected $_trackingURL;
    
    /**
     * @var string
     */
    protected $_ip;
    
    /**
     * @var string
     */
    protected $_isFetched;
    
    /**
     * @var string
     */
    protected $_status;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * @var string
     */
    protected $_paymentModuleId;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param int $basketId
     * @return \jtl\Connector\Model\CustomerOrder
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
     * @param int $customerId
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setCustomerId($customerId)
    {
        $this->_customerId = (int)$customerId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->_customerId;
    }
    
    /**
     * @param int $shippingAddressId
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingAddressId($shippingAddressId)
    {
        $this->_shippingAddressId = (int)$shippingAddressId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getShippingAddressId()
    {
        return $this->_shippingAddressId;
    }
    
    /**
     * @param int $billingAddressId
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setBillingAddressId($billingAddressId)
    {
        $this->_billingAddressId = (int)$billingAddressId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getBillingAddressId()
    {
        return $this->_billingAddressId;
    }
    
    /**
     * @param int $paymentMethodId
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setPaymentMethodId($paymentMethodId)
    {
        $this->_paymentMethodId = (int)$paymentMethodId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getPaymentMethodId()
    {
        return $this->_paymentMethodId;
    }
    
    /**
     * @param int $shippingMethodId
     * @return \jtl\Connector\Model\CustomerOrder
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
     * @param int $languageIso
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = (int)$languageIso;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getLanguageIso()
    {
        return $this->_languageIso;
    }
    
    /**
     * @param int $currencyIso
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setCurrencyIso($currencyIso)
    {
        $this->_currencyIso = (int)$currencyIso;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCurrencyIso()
    {
        return $this->_currencyIso;
    }
    
    /**
     * @param int $paymentMethodType
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setPaymentMethodType($paymentMethodType)
    {
        $this->_paymentMethodType = (int)$paymentMethodType;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getPaymentMethodType()
    {
        return $this->_paymentMethodType;
    }
    
    /**
     * @param double $credit
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setCredit($credit)
    {
        $this->_credit = (double)$credit;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getCredit()
    {
        return $this->_credit;
    }
    
    /**
     * @param double $totalSum
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setTotalSum($totalSum)
    {
        $this->_totalSum = (double)$totalSum;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getTotalSum()
    {
        return $this->_totalSum;
    }
    
    /**
     * @param string $session
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setSession($session)
    {
        $this->_session = (string)$session;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSession()
    {
        return $this->_session;
    }
    
    /**
     * @param string $shippingMethodName
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingMethodName($shippingMethodName)
    {
        $this->_shippingMethodName = (string)$shippingMethodName;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getShippingMethodName()
    {
        return $this->_shippingMethodName;
    }
    
    /**
     * @param string $paymentMethodName
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setPaymentMethodName($paymentMethodName)
    {
        $this->_paymentMethodName = (string)$paymentMethodName;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPaymentMethodName()
    {
        return $this->_paymentMethodName;
    }
    
    /**
     * @param string $orderNumber
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setOrderNumber($orderNumber)
    {
        $this->_orderNumber = (string)$orderNumber;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->_orderNumber;
    }
    
    /**
     * @param string $shippingInfo
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingInfo($shippingInfo)
    {
        $this->_shippingInfo = (string)$shippingInfo;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getShippingInfo()
    {
        return $this->_shippingInfo;
    }
    
    /**
     * @param string $shippingDate
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingDate($shippingDate)
    {
        $this->_shippingDate = (string)$shippingDate;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getShippingDate()
    {
        return $this->_shippingDate;
    }
    
    /**
     * @param string $paymentDate
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setPaymentDate($paymentDate)
    {
        $this->_paymentDate = (string)$paymentDate;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPaymentDate()
    {
        return $this->_paymentDate;
    }
    
    /**
     * @param string $ratingNotificationDate
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setRatingNotificationDate($ratingNotificationDate)
    {
        $this->_ratingNotificationDate = (string)$ratingNotificationDate;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getRatingNotificationDate()
    {
        return $this->_ratingNotificationDate;
    }
    
    /**
     * @param string $tracking
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setTracking($tracking)
    {
        $this->_tracking = (string)$tracking;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTracking()
    {
        return $this->_tracking;
    }
    
    /**
     * @param string $note
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setNote($note)
    {
        $this->_note = (string)$note;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getNote()
    {
        return $this->_note;
    }
    
    /**
     * @param string $logistic
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setLogistic($logistic)
    {
        $this->_logistic = (string)$logistic;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLogistic()
    {
        return $this->_logistic;
    }
    
    /**
     * @param string $trackingURL
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setTrackingURL($trackingURL)
    {
        $this->_trackingURL = (string)$trackingURL;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTrackingURL()
    {
        return $this->_trackingURL;
    }
    
    /**
     * @param string $ip
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setIp($ip)
    {
        $this->_ip = (string)$ip;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIp()
    {
        return $this->_ip;
    }
    
    /**
     * @param string $isFetched
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setIsFetched($isFetched)
    {
        $this->_isFetched = (string)$isFetched;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIsFetched()
    {
        return $this->_isFetched;
    }
    
    /**
     * @param string $status
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setStatus($status)
    {
        $this->_status = (string)$status;
        return $this;
    }
    
    /**
     * @return string
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
     * @param string $paymentModuleId
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setPaymentModuleId($paymentModuleId)
    {
        $this->_paymentModuleId = (string)$paymentModuleId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPaymentModuleId()
    {
        return $this->_paymentModuleId;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/customerorder/customerorder.json", $this->getPublic(array()));
    }
}
?>