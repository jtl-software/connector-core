<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Customer order properties..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CustomerOrder extends DataModel
{
    /**
     * @type Identity Reference to billingAddress
     */
    protected $billingAddressId = null;

    /**
     * @type Identity Optional reference to customer. 
     */
    protected $customerId = null;

    /**
     * @type Identity Unique customerOrder id
     */
    protected $id = null;

    /**
     * @type Identity Reference to shippingAddress
     */
    protected $shippingAddressId = null;

    /**
     * @type string Optional Carrier name
     */
    protected $carrierName = '';

    /**
     * @type string Date of creation
     */
    protected $created = '';

    /**
     * @type double Optional customer credit (credit reduces total sum)
     */
    protected $credit = 0.0;

    /**
     * @type string Currency ISO set, when customerOrder was finished
     */
    protected $currencyIso = '';

    /**
     * @type string Optional Estimated delivery date set by ERP System
     */
    protected $estimatedDeliveryDate = '';

    /**
     * @type string Optional customer IP address at the time of checkout. Do not store full IP-Adress (dependent on local laws or regulations)
     */
    protected $ip = '';

    /**
     * @type bool Optional flag, if customerOrder is fetched by ERP System
     */
    protected $isFetched = false;

    /**
     * @type string Locale set when customerOrder was finished. Important for further E-Mail message and notification localization. 
     */
    protected $localeName = '';

    /**
     * @type string Optional additional note
     */
    protected $note = '';

    /**
     * @type string Optional order number (usually set by ERP System later)
     */
    protected $orderNumber = '';

    /**
     * @type string Payment date
     */
    protected $paymentDate = '';

    /**
     * @type string Optional payment module code
     */
    protected $paymentModuleCode = '';

    /**
     * @type string Date from when customer will receive notification to rate order
     */
    protected $ratingNotificationDate = '';

    /**
     * @type string Optional session id or session hash
     */
    protected $session = '';

    /**
     * @type string Shipping date
     */
    protected $shippingDate = '';

    /**
     * @type string Additional shipping info
     */
    protected $shippingInfo = '';

    /**
     * @type string Identifier code for shippingMethod
     */
    protected $shippingMethodCode = '';

    /**
     * @type string Optional shipping method name
     */
    protected $shippingMethodName = '';

    /**
     * @type string Customer order status: new / processing / payment_completed / completed / partially_shipped / cancelled / reactivated / updated / pending_payment
     */
    protected $status = '';

    /**
     * @type double Total sum to pay
     */
    protected $totalSum = 0.0;

    /**
     * @type string Optional TrackingID (not Tracking URL)
     */
    protected $tracking = '';

    /**
     * @type string Optional Tracking URL
     */
    protected $trackingURL = '';

    /**
     * @type \jtl\Connector\Model\CustomerOrderShippingAddress[]
     */
    protected $shippingAddress = array();

    /**
     * @type \jtl\Connector\Model\CustomerOrderPosition[]
     */
    protected $positions = array();

    /**
     * @type \jtl\Connector\Model\CustomerOrderPaymentInfo[]
     */
    protected $paymentInfo = array();

    /**
     * @type \jtl\Connector\Model\CustomerOrderBillingAddress[]
     */
    protected $billingAddress = array();

    /**
     * @type \jtl\Connector\Model\CustomerOrderAttr[]
     */
    protected $attributes = array();

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'billingAddressId',
        'customerId',
        'id',
        'shippingAddressId',
    );

    /**
     * @param  Identity $billingAddressId Reference to billingAddress
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBillingAddressId(Identity $billingAddressId)
    {
        return $this->setProperty('BillingAddressId', $billingAddressId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId)
    {
        return $this->setProperty('CustomerId', $customerId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingAddressId(Identity $shippingAddressId)
    {
        return $this->setProperty('ShippingAddressId', $shippingAddressId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCarrierName(Identity $carrierName)
    {
        return $this->setProperty('CarrierName', $carrierName, 'string');
    }

    /**
     * @return string Optional Carrier name
     */
    public function getCarrierName()
    {
        return $this->carrierName;
    }

    /**
     * @param  string $created Date of creation
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCreated(Identity $created)
    {
        return $this->setProperty('Created', $created, 'string');
    }

    /**
     * @return string Date of creation
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param  double $credit Optional customer credit (credit reduces total sum)
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCredit(Identity $credit)
    {
        return $this->setProperty('Credit', $credit, 'double');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCurrencyIso(Identity $currencyIso)
    {
        return $this->setProperty('CurrencyIso', $currencyIso, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setEstimatedDeliveryDate(Identity $estimatedDeliveryDate)
    {
        return $this->setProperty('EstimatedDeliveryDate', $estimatedDeliveryDate, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIp(Identity $ip)
    {
        return $this->setProperty('Ip', $ip, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsFetched(Identity $isFetched)
    {
        return $this->setProperty('IsFetched', $isFetched, 'bool');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('LocaleName', $localeName, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setNote(Identity $note)
    {
        return $this->setProperty('Note', $note, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setOrderNumber(Identity $orderNumber)
    {
        return $this->setProperty('OrderNumber', $orderNumber, 'string');
    }

    /**
     * @return string Optional order number (usually set by ERP System later)
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @param  string $paymentDate Payment date
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPaymentDate(Identity $paymentDate)
    {
        return $this->setProperty('PaymentDate', $paymentDate, 'string');
    }

    /**
     * @return string Payment date
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param  string $paymentModuleCode Optional payment module code
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPaymentModuleCode(Identity $paymentModuleCode)
    {
        return $this->setProperty('PaymentModuleCode', $paymentModuleCode, 'string');
    }

    /**
     * @return string Optional payment module code
     */
    public function getPaymentModuleCode()
    {
        return $this->paymentModuleCode;
    }

    /**
     * @param  string $ratingNotificationDate Date from when customer will receive notification to rate order
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setRatingNotificationDate(Identity $ratingNotificationDate)
    {
        return $this->setProperty('RatingNotificationDate', $ratingNotificationDate, 'string');
    }

    /**
     * @return string Date from when customer will receive notification to rate order
     */
    public function getRatingNotificationDate()
    {
        return $this->ratingNotificationDate;
    }

    /**
     * @param  string $session Optional session id or session hash
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSession(Identity $session)
    {
        return $this->setProperty('Session', $session, 'string');
    }

    /**
     * @return string Optional session id or session hash
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param  string $shippingDate Shipping date
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingDate(Identity $shippingDate)
    {
        return $this->setProperty('ShippingDate', $shippingDate, 'string');
    }

    /**
     * @return string Shipping date
     */
    public function getShippingDate()
    {
        return $this->shippingDate;
    }

    /**
     * @param  string $shippingInfo Additional shipping info
     * @return \jtl\Connector\Model\CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingInfo(Identity $shippingInfo)
    {
        return $this->setProperty('ShippingInfo', $shippingInfo, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingMethodCode(Identity $shippingMethodCode)
    {
        return $this->setProperty('ShippingMethodCode', $shippingMethodCode, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingMethodName(Identity $shippingMethodName)
    {
        return $this->setProperty('ShippingMethodName', $shippingMethodName, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setStatus(Identity $status)
    {
        return $this->setProperty('Status', $status, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTotalSum(Identity $totalSum)
    {
        return $this->setProperty('TotalSum', $totalSum, 'double');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTracking(Identity $tracking)
    {
        return $this->setProperty('Tracking', $tracking, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTrackingURL(Identity $trackingURL)
    {
        return $this->setProperty('TrackingURL', $trackingURL, 'string');
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
     * @param  \jtl\Connector\Model\CustomerOrderPosition $positions
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function addPosition(\jtl\Connector\Model\CustomerOrderPosition $position)
    {
        $this->positions[] = $position;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CustomerOrderPosition[]
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrder
     */
    public function clearPositions()
    {
        $this->positions = array();
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
