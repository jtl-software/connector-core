<?php

/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Customer order properties.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerOrder extends AbstractI18n implements IdentityInterface
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
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerId")
     * @Serializer\Accessor(getter="getCustomerId",setter="setCustomerId")
     */
    protected $customerId = null;

    /**
     * @var Identity Unique customerOrder id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var CustomerOrderBillingAddress Billing address
     * @Serializer\Type("Jtl\Connector\Core\Model\CustomerOrderBillingAddress")
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
     * @var \DateTimeInterface Date of creation
     * @Serializer\Type("DateTimeInterface")
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
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("customerNote")
     * @Serializer\Accessor(getter="getCustomerNote",setter="setCustomerNote")
     */
    protected $customerNote = '';

    /**
     * @var \DateTimeInterface
     * @Serializer\Type("DateTimeInterface")
     * @Serializer\SerializedName("estimatedDeliveryDate")
     * @Serializer\Accessor(getter="getEstimatedDeliveryDate",setter="setEstimatedDeliveryDate")
     */
    protected $estimatedDeliveryDate = null;

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
     * @var \DateTimeInterface Payment date
     * @Serializer\Type("DateTimeInterface")
     * @Serializer\SerializedName("paymentDate")
     * @Serializer\Accessor(getter="getPaymentDate",setter="setPaymentDate")
     */
    protected $paymentDate = null;

    /**
     * @var CustomerOrderPaymentInfo
     * @Serializer\Type("Jtl\Connector\Core\Model\CustomerOrderPaymentInfo")
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
     * @Serializer\Type("Jtl\Connector\Core\Model\CustomerOrderShippingAddress")
     * @Serializer\SerializedName("shippingAddress")
     * @Serializer\Accessor(getter="getShippingAddress",setter="setShippingAddress")
     */
    protected $shippingAddress = null;

    /**
     * @var \DateTimeInterface Shipping date
     * @Serializer\Type("DateTimeInterface")
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
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
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
     * @var KeyValueAttribute[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\KeyValueAttribute>")
     * @Serializer\SerializedName("attributes")
     * @Serializer\AccessType("reflection")
     */
    protected $attributes = [];

    /**
     * @var CustomerOrderItem[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CustomerOrderItem>")
     * @Serializer\SerializedName("items")
     * @Serializer\AccessType("reflection")
     */
    protected $items = [];

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id               = new Identity();
        $this->customerId       = new Identity();
        $this->shippingMethodId = new Identity();
    }

    /**
     * @param Identity $customerId Optional reference to customer.
     * @return CustomerOrder
     */
    public function setCustomerId(Identity $customerId): self
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
     */
    public function setId(Identity $id): self
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
     */
    public function setBillingAddress(CustomerOrderBillingAddress $billingAddress = null): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * @return CustomerOrderBillingAddress Billing address
     */
    public function getBillingAddress(): ?CustomerOrderBillingAddress
    {
        return $this->billingAddress;
    }

    /**
     * @param string $carrierName
     * @return CustomerOrder
     */
    public function setCarrierName(string $carrierName): self
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
     * @param \DateTimeInterface $creationDate Date of creation
     * @return CustomerOrder
     */
    public function setCreationDate(\DateTimeInterface $creationDate = null): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface Date of creation
     */
    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    /**
     * @param string $currencyIso
     * @return CustomerOrder
     */
    public function setCurrencyIso(string $currencyIso): self
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
     * @param string $customerNote
     * @return CustomerOrder
     */
    public function setCustomerNote(string $customerNote): self
    {
        $this->customerNote = $customerNote;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerNote(): string
    {
        return $this->customerNote;
    }

    /**
     * @param \DateTimeInterface $estimatedDeliveryDate
     * @return CustomerOrder
     */
    public function setEstimatedDeliveryDate(\DateTimeInterface $estimatedDeliveryDate = null): self
    {
        $this->estimatedDeliveryDate = $estimatedDeliveryDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getEstimatedDeliveryDate(): ?\DateTimeInterface
    {
        return $this->estimatedDeliveryDate;
    }

    /**
     * @param string $note
     * @return CustomerOrder
     */
    public function setNote(string $note): self
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
    public function setOrderNumber(string $orderNumber): self
    {
        $this->setIdentificationStringBySubject('orderNumber', \sprintf('Order number = %s', $orderNumber));
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
     * @param \DateTimeInterface|null $paymentDate Payment date
     * @return CustomerOrder
     */
    public function setPaymentDate(\DateTimeInterface $paymentDate = null): self
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface Payment date
     */
    public function getPaymentDate(): ?\DateTimeInterface
    {
        return $this->paymentDate;
    }

    /**
     * @param CustomerOrderPaymentInfo|null $paymentInfo
     * @return CustomerOrder
     */
    public function setPaymentInfo(CustomerOrderPaymentInfo $paymentInfo = null): self
    {
        $this->paymentInfo = $paymentInfo;

        return $this;
    }

    /**
     * @return CustomerOrderPaymentInfo
     */
    public function getPaymentInfo(): ?CustomerOrderPaymentInfo
    {
        return $this->paymentInfo;
    }

    /**
     * @param string $paymentModuleCode
     * @return CustomerOrder
     */
    public function setPaymentModuleCode(string $paymentModuleCode): self
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
    public function setPaymentStatus(string $paymentStatus): self
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
    public function setPui(string $pui): self
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
     */
    public function setShippingAddress(CustomerOrderShippingAddress $shippingAddress = null): self
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    /**
     * @return CustomerOrderShippingAddress Shipping address
     */
    public function getShippingAddress(): ?CustomerOrderShippingAddress
    {
        return $this->shippingAddress;
    }

    /**
     * @param \DateTimeInterface $shippingDate Shipping date
     * @return CustomerOrder
     */
    public function setShippingDate(\DateTimeInterface $shippingDate = null): self
    {
        $this->shippingDate = $shippingDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface Shipping date
     */
    public function getShippingDate(): ?\DateTimeInterface
    {
        return $this->shippingDate;
    }

    /**
     * @param string $shippingInfo Additional shipping info
     * @return CustomerOrder
     */
    public function setShippingInfo(string $shippingInfo): self
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
     */
    public function setShippingMethodId(Identity $shippingMethodId): self
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
     */
    public function setShippingMethodName(string $shippingMethodName): self
    {
        $this->shippingMethodName = $shippingMethodName;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingMethodName(): string
    {
        return $this->shippingMethodName;
    }

    /**
     * @param string $status Shipping status
     * @return CustomerOrder
     */
    public function setStatus(string $status): self
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
    public function setTotalSum(float $totalSum): self
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
    public function setTotalSumGross(float $totalSumGross): self
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
     * @param KeyValueAttribute $attribute
     * @return CustomerOrder
     */
    public function addAttribute(KeyValueAttribute $attribute): self
    {
        $this->attributes[] = $attribute;

        return $this;
    }

    /**
     * @param KeyValueAttribute ...$attributes
     * @return CustomerOrder
     */
    public function setAttributes(KeyValueAttribute ...$attributes): self
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @return KeyValueAttribute[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @return CustomerOrder
     */
    public function clearAttributes(): self
    {
        $this->attributes = [];

        return $this;
    }

    /**
     * @param CustomerOrderItem $item
     * @return CustomerOrder
     */
    public function addItem(CustomerOrderItem $item): self
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * @param CustomerOrderItem ...$items
     * @return CustomerOrder
     */
    public function setItems(CustomerOrderItem ...$items): self
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
    public function clearItems(): self
    {
        $this->items = [];

        return $this;
    }
}
