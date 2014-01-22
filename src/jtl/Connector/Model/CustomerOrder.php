<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrder Model
 * Customer order properties.
 *
 * @access public
 */
class CustomerOrder extends DataModel
{
    /**
     * @var string - Initial status for new customerOrder, when customer finished order and order has not yet been payed or fetched
     */
    const STATUS_NEW = 'new';
    
    /**
     * @var string - Customer order in process
     */
    const STATUS_PROCESSING = 'processing';
    
    /**
     * @var string - Status when order is payed completely
     */
    const STATUS_PAYMENT_COMPLETED = 'payment_completed';
    
    /**
     * @var string - Order payed and shipped completely
     */
    const STATUS_COMPLETED = 'completed';
    
    /**
     * @var string - Order has been shipped partially
     */
    const STATUS_PARTIALLY_SHIPPED = 'partially_shipped';
    
    /**
     * @var string - Cancelled by merchant or customer
     */
    const STATUS_CANCELLED = 'cancelled';
    
    /**
     * @var string - New status, when changes have been made to customerOrder (e.g. item quantity change)
     */
    const STATUS_UPDATED = 'updated';
    
    /**
     * @var string - Previous status was cancelled, next status is reactivated (similar to new or processing)
     */
    const STATUS_REACTIVATED = 'reactivated';
    
    /**
     * @var string - Waiting for payment confirmation. Depending on payment method, a customerOrder with pending_payment will not be processed until payment ist confirmed. 
     */
    const STATUS_PENDING_PAYMENT = 'pending_payment';
    
    /**
     * @var string - Unique customerOrder id
     */
    protected $_id = '';
    
    /**
     * @var string - Optional reference to customer. 
     */
    protected $_customerId = '';
    
    /**
     * @var string - Reference to shippingAddress
     */
    protected $_shippingAddressId = '';
    
    /**
     * @var string - Reference to billingAddress
     */
    protected $_billingAddressId = '';
    
    /**
     * @var string - Reference to shippingMethod
     */
    protected $_shippingMethodId = '';
    
    /**
     * @var string - Locale set when customerOrder was finished. Important for further E-Mail message and notification localization. 
     */
    protected $_localeName = '';
    
    /**
     * @var string - Currency ISO set, when customerOrder was finished
     */
    protected $_currencyIso = '';
    
    /**
     * @var string - Optional Estimated delivery date set by ERP System
     */
    protected $_estimatedDeliveryDate = '';
    
    /**
     * @var double - Optional customer credit (credit reduces total sum)
     */
    protected $_credit = 0;
    
    /**
     * @var double - Total sum to pay
     */
    protected $_totalSum = 0.0;
    
    /**
     * @var string - Optional session id or session hash
     */
    protected $_session = '';
    
    /**
     * @var string - Optional shipping method name
     */
    protected $_shippingMethodName = '';
    
    /**
     * @var string - Optional order number (usually set by ERP System later)
     */
    protected $_orderNumber = '';
    
    /**
     * @var string - Additional shipping info
     */
    protected $_shippingInfo = '';
    
    /**
     * @var string - Shipping date
     */
    protected $_shippingDate = '';
    
    /**
     * @var string - Payment date
     */
    protected $_paymentDate = '';
    
    /**
     * @var string - Date from when customer will receive notification to rate order
     */
    protected $_ratingNotificationDate = '';
    
    /**
     * @var string - Optional TrackingID (not Tracking URL)
     */
    protected $_tracking = '';
    
    /**
     * @var string - Optional additional note
     */
    protected $_note = '';
    
    /**
     * @var string - Optional Logistic name
     */
    protected $_logistic = '';
    
    /**
     * @var string - Optional Tracking URL
     */
    protected $_trackingURL = '';
    
    /**
     * @var string - Optional customer IP address at the time of checkout. Do not store full IP-Adress (dependent on local laws or regulations)
     */
    protected $_ip = '';
    
    /**
     * @var bool - Optional flag, if customerOrder is fetched by ERP System
     */
    protected $_isFetched = false;
    
    /**
     * @var string - Customer order status: new / processing / payment_completed / completed / partially_shipped / cancelled / reactivated / updated / pending_payment
     */
    protected $_status = 'new';
    
    /**
     * @var string - Date of creation
     */
    protected $_created = '';
    
    /**
     * @var string - Optional payment module id
     */
    protected $_paymentModuleId = '';
    
    /**
     * CustomerOrder Setter
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
                case "_customerId":
                case "_shippingAddressId":
                case "_billingAddressId":
                case "_shippingMethodId":
                case "_localeName":
                case "_currencyIso":
                case "_estimatedDeliveryDate":
                case "_session":
                case "_shippingMethodName":
                case "_orderNumber":
                case "_shippingInfo":
                case "_shippingDate":
                case "_paymentDate":
                case "_ratingNotificationDate":
                case "_tracking":
                case "_note":
                case "_logistic":
                case "_trackingURL":
                case "_ip":
                case "_status":
                case "_created":
                case "_paymentModuleId":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_credit":
                case "_totalSum":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_isFetched":
                
                    $this->$name = (bool)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
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
     * @param string $shippingAddressId
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingAddressId($shippingAddressId)
    {
        $this->_shippingAddressId = (string)$shippingAddressId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getShippingAddressId()
    {
        return $this->_shippingAddressId;
    }
    
    /**
     * @param string $billingAddressId
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setBillingAddressId($billingAddressId)
    {
        $this->_billingAddressId = (string)$billingAddressId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBillingAddressId()
    {
        return $this->_billingAddressId;
    }
    
    /**
     * @param string $shippingMethodId
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingMethodId($shippingMethodId)
    {
        $this->_shippingMethodId = (string)$shippingMethodId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getShippingMethodId()
    {
        return $this->_shippingMethodId;
    }
    
    /**
     * @param string $localeName
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setLocaleName($localeName)
    {
        $this->_localeName = (string)$localeName;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLocaleName()
    {
        return $this->_localeName;
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
     * @param string $estimatedDeliveryDate
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setEstimatedDeliveryDate($estimatedDeliveryDate)
    {
        $this->_estimatedDeliveryDate = (string)$estimatedDeliveryDate;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getEstimatedDeliveryDate()
    {
        return $this->_estimatedDeliveryDate;
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
     * @param bool $isFetched
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setIsFetched($isFetched)
    {
        $this->_isFetched = (bool)$isFetched;
        return $this;
    }
    
    /**
     * @return bool
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
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}