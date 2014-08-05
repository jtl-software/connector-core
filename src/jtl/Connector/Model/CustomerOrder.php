<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage CustomerOrder
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Customer order properties..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage CustomerOrder
 * @JMS\AccessType("public_method")
 */
class CustomerOrder extends DataModel
{
    /**
     * @var Identity Reference to billingAddress
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $billingAddressId = null;

    /**
     * @var Identity Optional reference to customer. 
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $customerId = null;

    /**
     * @var Identity Unique customerOrder id
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $id = null;

    /**
     * @var Identity Reference to shippingAddress
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $shippingAddressId = null;

    /**
     * @var string Optional Carrier name
	 * @JMS\Type("string")
     */
    protected $carrierName = '';

    /**
     * @var DateTime Date of creation
	 * @JMS\Type("DateTime")
     */
    protected $created = null;

    /**
     * @var double Optional customer credit (credit reduces total sum)
	 * @JMS\Type("double")
     */
    protected $credit = 0.0;

    /**
     * @var string Currency ISO set, when customerOrder was finished
	 * @JMS\Type("string")
     */
    protected $currencyIso = '';

    /**
     * @var string Optional Estimated delivery date set by ERP System
	 * @JMS\Type("string")
     */
    protected $estimatedDeliveryDate = '';

    /**
     * @var string Optional customer IP address at the time of checkout. Do not store full IP-Adress (dependent on local laws or regulations)
	 * @JMS\Type("string")
     */
    protected $ip = '';

    /**
     * @var bool Optional flag, if customerOrder is fetched by ERP System
	 * @JMS\Type("boolean")
     */
    protected $isFetched = false;

    /**
     * @var string Locale set when customerOrder was finished. Important for further E-Mail message and notification localization. 
	 * @JMS\Type("string")
     */
    protected $localeName = '';

    /**
     * @var string Optional additional note
	 * @JMS\Type("string")
     */
    protected $note = '';

    /**
     * @var string Optional order number (usually set by ERP System later)
	 * @JMS\Type("string")
     */
    protected $orderNumber = '';

    /**
     * @var DateTime Payment date
	 * @JMS\Type("DateTime")
     */
    protected $paymentDate = null;

    /**
     * @var string Optional payment module code
	 * @JMS\Type("string")
     */
    protected $paymentModuleCode = '';

    /**
     * @var DateTime Date from when customer will receive notification to rate order
	 * @JMS\Type("DateTime")
     */
    protected $ratingNotificationDate = null;

    /**
     * @var string Optional session id or session hash
	 * @JMS\Type("string")
     */
    protected $session = '';

    /**
     * @var DateTime Shipping date
	 * @JMS\Type("DateTime")
     */
    protected $shippingDate = null;

    /**
     * @var string Additional shipping info
	 * @JMS\Type("string")
     */
    protected $shippingInfo = '';

    /**
     * @var string Identifier code for shippingMethod
	 * @JMS\Type("string")
     */
    protected $shippingMethodCode = '';

    /**
     * @var string Optional shipping method name
	 * @JMS\Type("string")
     */
    protected $shippingMethodName = '';

    /**
     * @var string Customer order status: new / processing / payment_completed / completed / partially_shipped / cancelled / reactivated / updated / pending_payment
	 * @JMS\Type("string")
     */
    protected $status = '';

    /**
     * @var double Total sum to pay
	 * @JMS\Type("double")
     */
    protected $totalSum = 0.0;

    /**
     * @var string Optional TrackingID (not Tracking URL)
	 * @JMS\Type("string")
     */
    protected $tracking = '';

    /**
     * @var string Optional Tracking URL
	 * @JMS\Type("string")
     */
    protected $trackingURL = '';

    /**
     * @var \jtl\Connector\Model\CustomerOrderShippingAddress[]
	 * @JMS\Type("array<\jtl\Connector\Model\CustomerOrderShippingAddress>")
     */
    protected $shippingAddress = array();

    /**
     * @var \jtl\Connector\Model\CustomerOrderPaymentInfo[]
	 * @JMS\Type("array<\jtl\Connector\Model\CustomerOrderPaymentInfo>")
     */
    protected $paymentInfo = array();

    /**
     * @var \jtl\Connector\Model\CustomerOrderItem[]
	 * @JMS\Type("array<\jtl\Connector\Model\CustomerOrderItem>")
     */
    protected $items = array();

    /**
     * @var \jtl\Connector\Model\CustomerOrderBillingAddress[]
	 * @JMS\Type("array<\jtl\Connector\Model\CustomerOrderBillingAddress>")
     */
    protected $billingAddress = array();

    /**
     * @var \jtl\Connector\Model\CustomerOrderAttr[]
	 * @JMS\Type("array<\jtl\Connector\Model\CustomerOrderAttr>")
     */
    protected $attributes = array();

    /**
     * @param  Identity $billingAddressId Reference to billingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBillingAddressId(Identity $billingAddressId)
    {
        return $this->setProperty('billingAddressId', $billingAddressId, 'Identity');
    }

    /**
     * @return Identity Reference to billingAddress
     */
    public function getBillingAddressId()
    {
        return $this->billingAddressId;
    }

    /**
     * @param  Identity $customerId Optional reference to customer. 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId)
    {
        return $this->setProperty('customerId', $customerId, 'Identity');
    }

    /**
     * @return Identity Optional reference to customer. 
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param  Identity $id Unique customerOrder id
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique customerOrder id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $shippingAddressId Reference to shippingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingAddressId(Identity $shippingAddressId)
    {
        return $this->setProperty('shippingAddressId', $shippingAddressId, 'Identity');
    }

    /**
     * @return Identity Reference to shippingAddress
     */
    public function getShippingAddressId()
    {
        return $this->shippingAddressId;
    }

    /**
     * @param  string $carrierName Optional Carrier name
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCarrierName($carrierName)
    {
        return $this->setProperty('carrierName', $carrierName, 'string');
    }

    /**
     * @return string Optional Carrier name
     */
    public function getCarrierName()
    {
        return $this->carrierName;
    }

    /**
     * @param  DateTime $created Date of creation
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreated(DateTime $created)
    {
        return $this->setProperty('created', $created, 'DateTime');
    }

    /**
     * @return DateTime Date of creation
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param  double $credit Optional customer credit (credit reduces total sum)
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setCredit($credit)
    {
        return $this->setProperty('credit', $credit, 'double');
    }

    /**
     * @return double Optional customer credit (credit reduces total sum)
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * @param  string $currencyIso Currency ISO set, when customerOrder was finished
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCurrencyIso($currencyIso)
    {
        return $this->setProperty('currencyIso', $currencyIso, 'string');
    }

    /**
     * @return string Currency ISO set, when customerOrder was finished
     */
    public function getCurrencyIso()
    {
        return $this->currencyIso;
    }

    /**
     * @param  string $estimatedDeliveryDate Optional Estimated delivery date set by ERP System
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setEstimatedDeliveryDate($estimatedDeliveryDate)
    {
        return $this->setProperty('estimatedDeliveryDate', $estimatedDeliveryDate, 'string');
    }

    /**
     * @return string Optional Estimated delivery date set by ERP System
     */
    public function getEstimatedDeliveryDate()
    {
        return $this->estimatedDeliveryDate;
    }

    /**
     * @param  string $ip Optional customer IP address at the time of checkout. Do not store full IP-Adress (dependent on local laws or regulations)
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setIp($ip)
    {
        return $this->setProperty('ip', $ip, 'string');
    }

    /**
     * @return string Optional customer IP address at the time of checkout. Do not store full IP-Adress (dependent on local laws or regulations)
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param  bool $isFetched Optional flag, if customerOrder is fetched by ERP System
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsFetched($isFetched)
    {
        return $this->setProperty('isFetched', $isFetched, 'bool');
    }

    /**
     * @return bool Optional flag, if customerOrder is fetched by ERP System
     */
    public function getIsFetched()
    {
        return $this->isFetched;
    }

    /**
     * @param  string $localeName Locale set when customerOrder was finished. Important for further E-Mail message and notification localization. 
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('localeName', $localeName, 'string');
    }

    /**
     * @return string Locale set when customerOrder was finished. Important for further E-Mail message and notification localization. 
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }

    /**
     * @param  string $note Optional additional note
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setNote($note)
    {
        return $this->setProperty('note', $note, 'string');
    }

    /**
     * @return string Optional additional note
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param  string $orderNumber Optional order number (usually set by ERP System later)
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setOrderNumber($orderNumber)
    {
        return $this->setProperty('orderNumber', $orderNumber, 'string');
    }

    /**
     * @return string Optional order number (usually set by ERP System later)
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @param  DateTime $paymentDate Payment date
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setPaymentDate(DateTime $paymentDate)
    {
        return $this->setProperty('paymentDate', $paymentDate, 'DateTime');
    }

    /**
     * @return DateTime Payment date
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param  string $paymentModuleCode Optional payment module code
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setPaymentModuleCode($paymentModuleCode)
    {
        return $this->setProperty('paymentModuleCode', $paymentModuleCode, 'string');
    }

    /**
     * @return string Optional payment module code
     */
    public function getPaymentModuleCode()
    {
        return $this->paymentModuleCode;
    }

    /**
     * @param  DateTime $ratingNotificationDate Date from when customer will receive notification to rate order
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setRatingNotificationDate(DateTime $ratingNotificationDate)
    {
        return $this->setProperty('ratingNotificationDate', $ratingNotificationDate, 'DateTime');
    }

    /**
     * @return DateTime Date from when customer will receive notification to rate order
     */
    public function getRatingNotificationDate()
    {
        return $this->ratingNotificationDate;
    }

    /**
     * @param  string $session Optional session id or session hash
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setSession($session)
    {
        return $this->setProperty('session', $session, 'string');
    }

    /**
     * @return string Optional session id or session hash
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param  DateTime $shippingDate Shipping date
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setShippingDate(DateTime $shippingDate)
    {
        return $this->setProperty('shippingDate', $shippingDate, 'DateTime');
    }

    /**
     * @return DateTime Shipping date
     */
    public function getShippingDate()
    {
        return $this->shippingDate;
    }

    /**
     * @param  string $shippingInfo Additional shipping info
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setShippingInfo($shippingInfo)
    {
        return $this->setProperty('shippingInfo', $shippingInfo, 'string');
    }

    /**
     * @return string Additional shipping info
     */
    public function getShippingInfo()
    {
        return $this->shippingInfo;
    }

    /**
     * @param  string $shippingMethodCode Identifier code for shippingMethod
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setShippingMethodCode($shippingMethodCode)
    {
        return $this->setProperty('shippingMethodCode', $shippingMethodCode, 'string');
    }

    /**
     * @return string Identifier code for shippingMethod
     */
    public function getShippingMethodCode()
    {
        return $this->shippingMethodCode;
    }

    /**
     * @param  string $shippingMethodName Optional shipping method name
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setShippingMethodName($shippingMethodName)
    {
        return $this->setProperty('shippingMethodName', $shippingMethodName, 'string');
    }

    /**
     * @return string Optional shipping method name
     */
    public function getShippingMethodName()
    {
        return $this->shippingMethodName;
    }

    /**
     * @param  string $status Customer order status: new / processing / payment_completed / completed / partially_shipped / cancelled / reactivated / updated / pending_payment
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setStatus($status)
    {
        return $this->setProperty('status', $status, 'string');
    }

    /**
     * @return string Customer order status: new / processing / payment_completed / completed / partially_shipped / cancelled / reactivated / updated / pending_payment
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param  double $totalSum Total sum to pay
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setTotalSum($totalSum)
    {
        return $this->setProperty('totalSum', $totalSum, 'double');
    }

    /**
     * @return double Total sum to pay
     */
    public function getTotalSum()
    {
        return $this->totalSum;
    }

    /**
     * @param  string $tracking Optional TrackingID (not Tracking URL)
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setTracking($tracking)
    {
        return $this->setProperty('tracking', $tracking, 'string');
    }

    /**
     * @return string Optional TrackingID (not Tracking URL)
     */
    public function getTracking()
    {
        return $this->tracking;
    }

    /**
     * @param  string $trackingURL Optional Tracking URL
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setTrackingURL($trackingURL)
    {
        return $this->setProperty('trackingURL', $trackingURL, 'string');
    }

    /**
     * @return string Optional Tracking URL
     */
    public function getTrackingURL()
    {
        return $this->trackingURL;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderShippingAddress $shippingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addShippingAddress(\jtl\Connector\Model\CustomerOrderShippingAddress $shippingAddress)
    {
        $this->shippingAddress[] = $shippingAddress;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CustomerOrderShippingAddress[]
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearShippingAddress()
    {
        $this->shippingAddress = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderPaymentInfo $paymentInfo
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addPaymentInfo(\jtl\Connector\Model\CustomerOrderPaymentInfo $paymentInfo)
    {
        $this->paymentInfo[] = $paymentInfo;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CustomerOrderPaymentInfo[]
     */
    public function getPaymentInfo()
    {
        return $this->paymentInfo;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearPaymentInfo()
    {
        $this->paymentInfo = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderItem $items
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addItem(\jtl\Connector\Model\CustomerOrderItem $item)
    {
        $this->items[] = $item;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CustomerOrderItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearItems()
    {
        $this->items = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderBillingAddress $billingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addBillingAddress(\jtl\Connector\Model\CustomerOrderBillingAddress $billingAddress)
    {
        $this->billingAddress[] = $billingAddress;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CustomerOrderBillingAddress[]
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearBillingAddress()
    {
        $this->billingAddress = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderAttr $attributes
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addAttribute(\jtl\Connector\Model\CustomerOrderAttr $attribute)
    {
        $this->attributes[] = $attribute;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CustomerOrderAttr[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearAttributes()
    {
        $this->attributes = array();
        return $this;
    }

 
}
