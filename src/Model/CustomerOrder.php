<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Customer order properties.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerOrder extends DataModel
{
    /**
     * @var string - Status when payment is completed
     */
    const PAYMENT_STATUS_COMPLETED = 'completed';
    
    /**
     * @var string - Status when order is partially paid
     */
    const PAYMENT_STATUS_PARTIALLY = 'partially_paid';
    
    /**
     * @var string - Status when order is unpaid
     */
    const PAYMENT_STATUS_UNPAID = 'unpaid';
    
    /**
     * @var string - New order
     */
    const STATUS_NEW = 'new';
    
    /**
     * @var string - Cancelled by merchant or customer
     */
    const STATUS_CANCELLED = 'cancelled';
    
    /**
     * @var string - Order has been shipped partially
     */
    const STATUS_PARTIALLY_SHIPPED = 'partially_shipped';
    
    /**
     * @var string - Order has been shipped
     */
    const STATUS_SHIPPED = 'shipped';
    
    /**
     * @var Identity Optional reference to customer.
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerId")
     * @Serializer\Accessor(getter="getCustomerId",setter="setCustomerId")
     */
    protected $customerId = null;
    
    /**
     * @var Identity Unique customerOrder id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var CustomerOrderBillingAddress Billing address
     * @Serializer\Type("jtl\Connector\Model\CustomerOrderBillingAddress")
     * @Serializer\SerializedName("billingAddress")
     * @Serializer\Accessor(getter="getBillingAddress",setter="setBillingAddress")
     */
    protected $billingAddress = null;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("carrierName")
     * @Serializer\Accessor(getter="getCarrierName",setter="setCarrierName")
     */
    protected $carrierName = '';
    
    /**
     * @var DateTime Date of creation
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("creationDate")
     * @Serializer\Accessor(getter="getCreationDate",setter="setCreationDate")
     */
    protected $creationDate = null;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("currencyIso")
     * @Serializer\Accessor(getter="getCurrencyIso",setter="setCurrencyIso")
     */
    protected $currencyIso = '';
    
    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("estimatedDeliveryDate")
     * @Serializer\Accessor(getter="getEstimatedDeliveryDate",setter="setEstimatedDeliveryDate")
     */
    protected $estimatedDeliveryDate = null;
    
    /**
     * @var string Locale set when customerOrder was finished. Important for further E-Mail message and notification localization.
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("note")
     * @Serializer\Accessor(getter="getNote",setter="setNote")
     */
    protected $note = '';
    
    /**
     * @var string Optional order number (usually set by ERP System later)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderNumber")
     * @Serializer\Accessor(getter="getOrderNumber",setter="setOrderNumber")
     */
    protected $orderNumber = '';
    
    /**
     * @var DateTime Payment date
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("paymentDate")
     * @Serializer\Accessor(getter="getPaymentDate",setter="setPaymentDate")
     */
    protected $paymentDate = null;
    
    /**
     * @var CustomerOrderPaymentInfo
     * @Serializer\Type("jtl\Connector\Model\CustomerOrderPaymentInfo")
     * @Serializer\SerializedName("paymentInfo")
     * @Serializer\Accessor(getter="getPaymentInfo",setter="setPaymentInfo")
     */
    protected $paymentInfo = null;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("paymentModuleCode")
     * @Serializer\Accessor(getter="getPaymentModuleCode",setter="setPaymentModuleCode")
     */
    protected $paymentModuleCode = '';
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("paymentStatus")
     * @Serializer\Accessor(getter="getPaymentStatus",setter="setPaymentStatus")
     */
    protected $paymentStatus = '';
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("pui")
     * @Serializer\Accessor(getter="getPui",setter="setPui")
     */
    protected $pui = '';
    
    /**
     * @var CustomerOrderShippingAddress Shipping address
     * @Serializer\Type("jtl\Connector\Model\CustomerOrderShippingAddress")
     * @Serializer\SerializedName("shippingAddress")
     * @Serializer\Accessor(getter="getShippingAddress",setter="setShippingAddress")
     */
    protected $shippingAddress = null;
    
    /**
     * @var DateTime Shipping date
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("shippingDate")
     * @Serializer\Accessor(getter="getShippingDate",setter="setShippingDate")
     */
    protected $shippingDate = null;
    
    /**
     * @var string Additional shipping info
     * @Serializer\Type("string")
     * @Serializer\SerializedName("shippingInfo")
     * @Serializer\Accessor(getter="getShippingInfo",setter="setShippingInfo")
     */
    protected $shippingInfo = '';
    
    /**
     * @var Identity Optional reference to customer.
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("shippingMethodId")
     * @Serializer\Accessor(getter="getShippingMethodId",setter="setShippingMethodId")
     */
    protected $shippingMethodId = null;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("shippingMethodName")
     * @Serializer\Accessor(getter="getShippingMethodName",setter="setShippingMethodName")
     */
    protected $shippingMethodName = '';
    
    /**
     * @var string Shipping status
     * @Serializer\Type("string")
     * @Serializer\SerializedName("status")
     * @Serializer\Accessor(getter="getStatus",setter="setStatus")
     */
    protected $status = '';
    
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("totalSum")
     * @Serializer\Accessor(getter="getTotalSum",setter="setTotalSum")
     */
    protected $totalSum = 0.0;
    
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("totalSumGross")
     * @Serializer\Accessor(getter="getTotalSumGross",setter="setTotalSumGross")
     */
    protected $totalSumGross = 0.0;
    
    /**
     * @var CustomerOrderAttr[]
     * @Serializer\Type("array<jtl\Connector\Model\CustomerOrderAttr>")
     * @Serializer\SerializedName("attributes")
     * @Serializer\AccessType("reflection")
     */
    protected $attributes = [];
    
    /**
     * @var CustomerOrderItem[]
     * @Serializer\Type("array<jtl\Connector\Model\CustomerOrderItem>")
     * @Serializer\SerializedName("items")
     * @Serializer\AccessType("reflection")
     */
    protected $items = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->customerId = new Identity();
    }
    
    /**
     * @param Identity $customerId Optional reference to customer.
     * @return CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId): CustomerOrder
    {
        $this->customerId = $customerId;
        
        return $this;
    }
    
    /**
     * @return Identity Optional reference to customer.
     */
    public function getCustomerId(): Identity
    {
        return $this->customerId;
    }
    
    /**
     * @param Identity $id Unique customerOrder id
     * @return CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): CustomerOrder
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique customerOrder id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param CustomerOrderBillingAddress $billingAddress Billing address
     * @return CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'CustomerOrderBillingAddress'.
     */
    public function setBillingAddress(CustomerOrderBillingAddress $billingAddress = null): CustomerOrder
    {
        $this->billingAddress = $billingAddress;
        
        return $this;
    }
    
    /**
     * @return CustomerOrderBillingAddress Billing address
     */
    public function getBillingAddress(): CustomerOrderBillingAddress
    {
        return $this->billingAddress;
    }
    
    /**
     * @param string $carrierName
     * @return CustomerOrder
     */
    public function setCarrierName(string $carrierName): CustomerOrder
    {
        $this->carrierName = $carrierName;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCarrierName(): string
    {
        return $this->carrierName;
    }
    
    /**
     * @param DateTime $creationDate Date of creation
     * @return CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreationDate(DateTime $creationDate = null): CustomerOrder
    {
        $this->creationDate = $creationDate;
        
        return $this;
    }
    
    /**
     * @return DateTime Date of creation
     */
    public function getCreationDate(): DateTime
    {
        return $this->creationDate;
    }
    
    /**
     * @param string $currencyIso
     * @return CustomerOrder
     */
    public function setCurrencyIso(string $currencyIso): CustomerOrder
    {
        $this->currencyIso = $currencyIso;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCurrencyIso(): string
    {
        return $this->currencyIso;
    }
    
    /**
     * @param DateTime $estimatedDeliveryDate
     * @return CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setEstimatedDeliveryDate(DateTime $estimatedDeliveryDate = null): CustomerOrder
    {
        $this->estimatedDeliveryDate = $estimatedDeliveryDate;
        
        return $this;
    }
    
    /**
     * @return DateTime
     */
    public function getEstimatedDeliveryDate(): DateTime
    {
        return $this->estimatedDeliveryDate;
    }
    
    /**
     * @param string $languageISO Locale set when customerOrder was finished. Important for further E-Mail message and notification localization.
     * @return CustomerOrder
     */
    public function setLanguageISO(string $languageISO): CustomerOrder
    {
        $this->languageISO = $languageISO;
        
        return $this;
    }
    
    /**
     * @return string Locale set when customerOrder was finished. Important for further E-Mail message and notification localization.
     */
    public function getLanguageISO(): string
    {
        return $this->languageISO;
    }
    
    /**
     * @param string $note
     * @return CustomerOrder
     */
    public function setNote(string $note): CustomerOrder
    {
        $this->note = $note;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }
    
    /**
     * @param string $orderNumber Optional order number (usually set by ERP System later)
     * @return CustomerOrder
     */
    public function setOrderNumber(string $orderNumber): CustomerOrder
    {
        $this->orderNumber = $orderNumber;
        
        return $this;
    }
    
    /**
     * @return string Optional order number (usually set by ERP System later)
     */
    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }
    
    /**
     * @param DateTime $paymentDate Payment date
     * @return CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setPaymentDate(DateTime $paymentDate = null): CustomerOrder
    {
        $this->paymentDate = $paymentDate;
        
        return $this;
    }
    
    /**
     * @return DateTime Payment date
     */
    public function getPaymentDate(): DateTime
    {
        return $this->paymentDate;
    }
    
    /**
     * @param CustomerOrderPaymentInfo $paymentInfo
     * @return CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'CustomerOrderPaymentInfo'.
     */
    public function setPaymentInfo(CustomerOrderPaymentInfo $paymentInfo = null): CustomerOrder
    {
        $this->paymentInfo = $paymentInfo;
        
        return $this;
    }
    
    /**
     * @return CustomerOrderPaymentInfo
     */
    public function getPaymentInfo(): CustomerOrderPaymentInfo
    {
        return $this->paymentInfo;
    }
    
    /**
     * @param string $paymentModuleCode
     * @return CustomerOrder
     */
    public function setPaymentModuleCode(string $paymentModuleCode): CustomerOrder
    {
        $this->paymentModuleCode = $paymentModuleCode;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPaymentModuleCode(): string
    {
        return $this->paymentModuleCode;
    }
    
    /**
     * @param string $paymentStatus
     * @return CustomerOrder
     */
    public function setPaymentStatus(string $paymentStatus): CustomerOrder
    {
        $this->paymentStatus = $paymentStatus;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPaymentStatus(): string
    {
        return $this->paymentStatus;
    }
    
    /**
     * @param string $pui
     * @return CustomerOrder
     */
    public function setPui(string $pui): CustomerOrder
    {
        $this->pui = $pui;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPui(): string
    {
        return $this->pui;
    }
    
    /**
     * @param CustomerOrderShippingAddress $shippingAddress Shipping address
     * @return CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'CustomerOrderShippingAddress'.
     */
    public function setShippingAddress(CustomerOrderShippingAddress $shippingAddress = null): CustomerOrder
    {
        $this->shippingAddress = $shippingAddress;
        
        return $this;
    }
    
    /**
     * @return CustomerOrderShippingAddress Shipping address
     */
    public function getShippingAddress(): CustomerOrderShippingAddress
    {
        return $this->shippingAddress;
    }
    
    /**
     * @param DateTime $shippingDate Shipping date
     * @return CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setShippingDate(DateTime $shippingDate = null): CustomerOrder
    {
        $this->shippingDate = $shippingDate;
        
        return $this;
    }
    
    /**
     * @return DateTime Shipping date
     */
    public function getShippingDate(): DateTime
    {
        return $this->shippingDate;
    }
    
    /**
     * @param string $shippingInfo Additional shipping info
     * @return CustomerOrder
     */
    public function setShippingInfo(string $shippingInfo): CustomerOrder
    {
        $this->shippingInfo = $shippingInfo;
        
        return $this;
    }
    
    /**
     * @return string Additional shipping info
     */
    public function getShippingInfo(): string
    {
        return $this->shippingInfo;
    }
    
    /**
     * @param Identity $shippingMethodId Optional reference to customer.
     * @return CustomerOrder
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingMethodId(Identity $shippingMethodId): CustomerOrder
    {
        $this->shippingMethodId = $shippingMethodId;
        
        return $this;
    }
    
    /**
     * @return Identity Optional reference to shipping method.
     */
    public function getShippingMethodId(): Identity
    {
        return $this->shippingMethodId;
    }
    
    /**
     * @param string $shippingMethodName
     * @return CustomerOrder
     * @deprecated will be removed in 3.1. Use shippingMethodId instead.
     */
    public function setShippingMethodName(string $shippingMethodName): CustomerOrder
    {
        $this->shippingMethodName = $shippingMethodName;
        
        return $this;
    }
    
    /**
     * @return string
     * @deprecated will be removed in 3.1. Use shippingMethodId instead.
     */
    public function getShippingMethodName(): string
    {
        return $this->shippingMethodName;
    }
    
    /**
     * @param string $status Shipping status
     * @return CustomerOrder
     */
    public function setStatus(string $status): CustomerOrder
    {
        $this->status = $status;
        
        return $this;
    }
    
    /**
     * @return string Shipping status
     */
    public function getStatus(): string
    {
        return $this->status;
    }
    
    /**
     * @param double $totalSum
     * @return CustomerOrder
     */
    public function setTotalSum(float $totalSum): CustomerOrder
    {
        $this->totalSum = $totalSum;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getTotalSum(): float
    {
        return $this->totalSum;
    }
    
    /**
     * @param double $totalSumGross
     * @return CustomerOrder
     */
    public function setTotalSumGross(float $totalSumGross): CustomerOrder
    {
        $this->totalSumGross = $totalSumGross;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getTotalSumGross(): float
    {
        return $this->totalSumGross;
    }
    
    /**
     * @param CustomerOrderAttr $attribute
     * @return CustomerOrder
     */
    public function addAttribute(CustomerOrderAttr $attribute): CustomerOrder
    {
        $this->attributes[] = $attribute;
        
        return $this;
    }
    
    /**
     * @param array $attributes
     * @return CustomerOrder
     */
    public function setAttributes(array $attributes): CustomerOrder
    {
        $this->attributes = $attributes;
        
        return $this;
    }
    
    /**
     * @return CustomerOrderAttr[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
    
    /**
     * @return CustomerOrder
     */
    public function clearAttributes(): CustomerOrder
    {
        $this->attributes = [];
        
        return $this;
    }
    
    /**
     * @param CustomerOrderItem $item
     * @return CustomerOrder
     */
    public function addItem(CustomerOrderItem $item): CustomerOrder
    {
        $this->items[] = $item;
        
        return $this;
    }
    
    /**
     * @param array $items
     * @return CustomerOrder
     */
    public function setItems(array $items): CustomerOrder
    {
        $this->items = $items;
        
        return $this;
    }
    
    /**
     * @return CustomerOrderItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
    
    /**
     * @return CustomerOrder
     */
    public function clearItems(): CustomerOrder
    {
        $this->items = [];
        
        return $this;
    }
}
