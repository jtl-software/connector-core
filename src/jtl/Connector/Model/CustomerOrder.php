<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage CustomerOrder
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Customer order properties.
 *
 * @access public
 * @subpackage CustomerOrder
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
     * @var Identity Unique customerOrder id
     */
    protected $_id = null;
    
    /**
     * @var string Optional reference to customer. 
     */
    protected $_customerId = '';
    
    /**
     * @var Identity Reference to shippingAddress
     */
    protected $_shippingAddressId = null;
    
    /**
     * @var Identity Reference to billingAddress
     */
    protected $_billingAddressId = null;
    
    /**
     * @var Identity Reference to shippingMethod
     */
    protected $_shippingMethodId = null;
    
    /**
     * @var string Locale set when customerOrder was finished. Important for further E-Mail message and notification localization. 
     */
    protected $_localeName = '';
    
    /**
     * @var string Currency ISO set, when customerOrder was finished
     */
    protected $_currencyIso = '';
    
    /**
     * @var string Optional Estimated delivery date set by ERP System
     */
    protected $_estimatedDeliveryDate = null;
    
    /**
     * @var double Optional customer credit (credit reduces total sum)
     */
    protected $_credit = 0;
    
    /**
     * @var double Total sum to pay
     */
    protected $_totalSum = 0.0;
    
    /**
     * @var string Optional session id or session hash
     */
    protected $_session = '';
    
    /**
     * @var string Optional shipping method name
     */
    protected $_shippingMethodName = '';
    
    /**
     * @var string Optional order number (usually set by ERP System later)
     */
    protected $_orderNumber = '';
    
    /**
     * @var string Additional shipping info
     */
    protected $_shippingInfo = '';
    
    /**
     * @var string Shipping date
     */
    protected $_shippingDate = null;
    
    /**
     * @var string Payment date
     */
    protected $_paymentDate = null;
    
    /**
     * @var string Date from when customer will receive notification to rate order
     */
    protected $_ratingNotificationDate = null;
    
    /**
     * @var string Optional TrackingID (not Tracking URL)
     */
    protected $_tracking = '';
    
    /**
     * @var string Optional additional note
     */
    protected $_note = '';
    
    /**
     * @var string Optional Carrier name
     */
    protected $_carrierName = '';
    
    /**
     * @var string Optional Tracking URL
     */
    protected $_trackingURL = '';
    
    /**
     * @var string Optional customer IP address at the time of checkout. Do not store full IP-Adress (dependent on local laws or regulations)
     */
    protected $_ip = '';
    
    /**
     * @var bool Optional flag, if customerOrder is fetched by ERP System
     */
    protected $_isFetched = false;
    
    /**
     * @var string Customer order status: new / processing / payment_completed / completed / partially_shipped / cancelled / reactivated / updated / pending_payment
     */
    protected $_status = 'new';
    
    /**
     * @var string Date of creation
     */
    protected $_created = null;
    
    /**
     * @var Identity Optional payment module id
     */
    protected $_paymentModuleId = null;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id',
        '_shippingAddressId',
        '_billingAddressId',
        '_shippingMethodId',
        '_paymentModuleId'
    );
    
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
                case "_shippingAddressId":
                case "_billingAddressId":
                case "_shippingMethodId":
                case "_paymentModuleId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_customerId":
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
                case "_carrierName":
                case "_trackingURL":
                case "_ip":
                case "_status":
                case "_created":
                
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
     * @param Identity $id Unique customerOrder id
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique customerOrder id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $customerId Optional reference to customer. 
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setCustomerId($customerId)
    {
        $this->_customerId = (string)$customerId;
        return $this;
    }
    
    /**
     * @return string Optional reference to customer. 
     */
    public function getCustomerId()
    {
        return $this->_customerId;
    }
    /**
     * @param Identity $shippingAddressId Reference to shippingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingAddressId(Identity $shippingAddressId)
    {
        $this->_shippingAddressId = $shippingAddressId;
        return $this;
    }
    
    /**
     * @return Identity Reference to shippingAddress
     */
    public function getShippingAddressId()
    {
        return $this->_shippingAddressId;
    }
    /**
     * @param Identity $billingAddressId Reference to billingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setBillingAddressId(Identity $billingAddressId)
    {
        $this->_billingAddressId = $billingAddressId;
        return $this;
    }
    
    /**
     * @return Identity Reference to billingAddress
     */
    public function getBillingAddressId()
    {
        return $this->_billingAddressId;
    }
    /**
     * @param Identity $shippingMethodId Reference to shippingMethod
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingMethodId(Identity $shippingMethodId)
    {
        $this->_shippingMethodId = $shippingMethodId;
        return $this;
    }
    
    /**
     * @return Identity Reference to shippingMethod
     */
    public function getShippingMethodId()
    {
        return $this->_shippingMethodId;
    }
    /**
     * @param string $localeName Locale set when customerOrder was finished. Important for further E-Mail message and notification localization. 
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setLocaleName($localeName)
    {
        $this->_localeName = (string)$localeName;
        return $this;
    }
    
    /**
     * @return string Locale set when customerOrder was finished. Important for further E-Mail message and notification localization. 
     */
    public function getLocaleName()
    {
        return $this->_localeName;
    }
    /**
     * @param string $currencyIso Currency ISO set, when customerOrder was finished
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setCurrencyIso($currencyIso)
    {
        $this->_currencyIso = (string)$currencyIso;
        return $this;
    }
    
    /**
     * @return string Currency ISO set, when customerOrder was finished
     */
    public function getCurrencyIso()
    {
        return $this->_currencyIso;
    }
    /**
     * @param string $estimatedDeliveryDate Optional Estimated delivery date set by ERP System
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setEstimatedDeliveryDate($estimatedDeliveryDate)
    {
        $this->_estimatedDeliveryDate = (string)$estimatedDeliveryDate;
        return $this;
    }
    
    /**
     * @return string Optional Estimated delivery date set by ERP System
     */
    public function getEstimatedDeliveryDate()
    {
        return $this->_estimatedDeliveryDate;
    }
    /**
     * @param double $credit Optional customer credit (credit reduces total sum)
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setCredit($credit)
    {
        $this->_credit = (double)$credit;
        return $this;
    }
    
    /**
     * @return double Optional customer credit (credit reduces total sum)
     */
    public function getCredit()
    {
        return $this->_credit;
    }
    /**
     * @param double $totalSum Total sum to pay
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setTotalSum($totalSum)
    {
        $this->_totalSum = (double)$totalSum;
        return $this;
    }
    
    /**
     * @return double Total sum to pay
     */
    public function getTotalSum()
    {
        return $this->_totalSum;
    }
    /**
     * @param string $session Optional session id or session hash
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setSession($session)
    {
        $this->_session = (string)$session;
        return $this;
    }
    
    /**
     * @return string Optional session id or session hash
     */
    public function getSession()
    {
        return $this->_session;
    }
    /**
     * @param string $shippingMethodName Optional shipping method name
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingMethodName($shippingMethodName)
    {
        $this->_shippingMethodName = (string)$shippingMethodName;
        return $this;
    }
    
    /**
     * @return string Optional shipping method name
     */
    public function getShippingMethodName()
    {
        return $this->_shippingMethodName;
    }
    /**
     * @param string $orderNumber Optional order number (usually set by ERP System later)
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setOrderNumber($orderNumber)
    {
        $this->_orderNumber = (string)$orderNumber;
        return $this;
    }
    
    /**
     * @return string Optional order number (usually set by ERP System later)
     */
    public function getOrderNumber()
    {
        return $this->_orderNumber;
    }
    /**
     * @param string $shippingInfo Additional shipping info
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingInfo($shippingInfo)
    {
        $this->_shippingInfo = (string)$shippingInfo;
        return $this;
    }
    
    /**
     * @return string Additional shipping info
     */
    public function getShippingInfo()
    {
        return $this->_shippingInfo;
    }
    /**
     * @param string $shippingDate Shipping date
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setShippingDate($shippingDate)
    {
        $this->_shippingDate = (string)$shippingDate;
        return $this;
    }
    
    /**
     * @return string Shipping date
     */
    public function getShippingDate()
    {
        return $this->_shippingDate;
    }
    /**
     * @param string $paymentDate Payment date
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setPaymentDate($paymentDate)
    {
        $this->_paymentDate = (string)$paymentDate;
        return $this;
    }
    
    /**
     * @return string Payment date
     */
    public function getPaymentDate()
    {
        return $this->_paymentDate;
    }
    /**
     * @param string $ratingNotificationDate Date from when customer will receive notification to rate order
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setRatingNotificationDate($ratingNotificationDate)
    {
        $this->_ratingNotificationDate = (string)$ratingNotificationDate;
        return $this;
    }
    
    /**
     * @return string Date from when customer will receive notification to rate order
     */
    public function getRatingNotificationDate()
    {
        return $this->_ratingNotificationDate;
    }
    /**
     * @param string $tracking Optional TrackingID (not Tracking URL)
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setTracking($tracking)
    {
        $this->_tracking = (string)$tracking;
        return $this;
    }
    
    /**
     * @return string Optional TrackingID (not Tracking URL)
     */
    public function getTracking()
    {
        return $this->_tracking;
    }
    /**
     * @param string $note Optional additional note
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setNote($note)
    {
        $this->_note = (string)$note;
        return $this;
    }
    
    /**
     * @return string Optional additional note
     */
    public function getNote()
    {
        return $this->_note;
    }
    /**
     * @param string $carrierName Optional Carrier name
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setCarrierName($carrierName)
    {
        $this->_carrierName = (string)$carrierName;
        return $this;
    }
    
    /**
     * @return string Optional Carrier name
     */
    public function getCarrierName()
    {
        return $this->_carrierName;
    }
    /**
     * @param string $trackingURL Optional Tracking URL
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setTrackingURL($trackingURL)
    {
        $this->_trackingURL = (string)$trackingURL;
        return $this;
    }
    
    /**
     * @return string Optional Tracking URL
     */
    public function getTrackingURL()
    {
        return $this->_trackingURL;
    }
    /**
     * @param string $ip Optional customer IP address at the time of checkout. Do not store full IP-Adress (dependent on local laws or regulations)
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setIp($ip)
    {
        $this->_ip = (string)$ip;
        return $this;
    }
    
    /**
     * @return string Optional customer IP address at the time of checkout. Do not store full IP-Adress (dependent on local laws or regulations)
     */
    public function getIp()
    {
        return $this->_ip;
    }
    /**
     * @param bool $isFetched Optional flag, if customerOrder is fetched by ERP System
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setIsFetched($isFetched)
    {
        $this->_isFetched = (bool)$isFetched;
        return $this;
    }
    
    /**
     * @return bool Optional flag, if customerOrder is fetched by ERP System
     */
    public function getIsFetched()
    {
        return $this->_isFetched;
    }
    /**
     * @param string $status Customer order status: new / processing / payment_completed / completed / partially_shipped / cancelled / reactivated / updated / pending_payment
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setStatus($status)
    {
        $this->_status = (string)$status;
        return $this;
    }
    
    /**
     * @return string Customer order status: new / processing / payment_completed / completed / partially_shipped / cancelled / reactivated / updated / pending_payment
     */
    public function getStatus()
    {
        return $this->_status;
    }
    /**
     * @param string $created Date of creation
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setCreated($created)
    {
        $this->_created = (string)$created;
        return $this;
    }
    
    /**
     * @return string Date of creation
     */
    public function getCreated()
    {
        return $this->_created;
    }
    /**
     * @param Identity $paymentModuleId Optional payment module id
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function setPaymentModuleId(Identity $paymentModuleId)
    {
        $this->_paymentModuleId = $paymentModuleId;
        return $this;
    }
    
    /**
     * @return Identity Optional payment module id
     */
    public function getPaymentModuleId()
    {
        return $this->_paymentModuleId;
    }
}