<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class StatusChange extends DataModel
{
    /**
     * @var Identity 
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerOrderId")
     * @Serializer\Accessor(getter="getCustomerOrderId",setter="setCustomerOrderId")
     */
    protected $customerOrderId = null;

    /**
     * @var OrderStatus 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderStatus")
     * @Serializer\Accessor(getter="getOrderStatus",setter="setOrderStatus")
     */
    protected $orderStatus = '';

    /**
     * @var PaymentStatus 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("paymentStatus")
     * @Serializer\Accessor(getter="getPaymentStatus",setter="setPaymentStatus")
     */
    protected $paymentStatus = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customerOrderId = new Identity();
    }

    /**
     * @param Identity $customerOrderId 
     * @return \jtl\Connector\Model\StatusChange
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        return $this->setProperty('customerOrderId', $customerOrderId, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getCustomerOrderId()
    {
        return $this->customerOrderId;
    }

    /**
     * @param string $orderStatus 
     * @return \jtl\Connector\Model\StatusChange
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setOrderStatus($orderStatus)
    {
        return $this->setProperty('orderStatus', $orderStatus, 'string');
    }

    /**
     * @return string 
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * @param string $paymentStatus 
     * @return \jtl\Connector\Model\StatusChange
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setPaymentStatus($paymentStatus)
    {
        return $this->setProperty('paymentStatus', $paymentStatus, 'string');
    }

    /**
     * @return string 
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    public function getCombinatedStatus()
    {
        $order = $this->getOrderStatus();
        $payment = $this->getPaymentStatus();

        if ($order === CustomerOrder::STATUS_CANCELLED) {
            return CustomerOrder::STATUS_CANCELLED;
        } elseif ($shipping === CustomerOrder::SHIPPING_STATUS_NOTSHIPPED && $payment === CustomerOrder::PAYMENT_STATUS_COMPLETED) {
            return CustomerOrder::COMBO_STATUS_PAID;
        } elseif ($shipping === CustomerOrder::SHIPPING_STATUS_PARTIALLY && $payment === CustomerOrder::PAYMENT_STATUS_COMPLETED) {
            return CustomerOrder::COMBO_STATUS_PAID;
        } elseif ($shipping === CustomerOrder::SHIPPING_STATUS_COMPLETED && $payment === CustomerOrder::PAYMENT_STATUS_UNPAID) {
            return CustomerOrder::COMBO_STATUS_SHIPPED;
        } elseif ($shipping === CustomerOrder::SHIPPING_STATUS_COMPLETED && $payment === CustomerOrder::PAYMENT_STATUS_PARTIALLY) {
            return CustomerOrder::COMBO_STATUS_SHIPPED;
        } elseif ($shipping === CustomerOrder::SHIPPING_STATUS_COMPLETED && $payment === CustomerOrder::PAYMENT_STATUS_COMPLETED) {
            return CustomerOrder::COMBO_STATUS_COMPLETED;
        }
    }
}
