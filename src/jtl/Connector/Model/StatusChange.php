<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage CustomerOrder
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * @access public
 * @package jtl\Connector\Model
 * @subpackage CustomerOrder
 * 
 * @Serializer\AccessType("public_method")
 */
class StatusChange extends DataModel
{
    /**
     * @var Identity Unique customerOrder id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerOrderId")
     * @Serializer\Accessor(getter="getCustomerOrderId",setter="setCustomerOrderId")
     */
    protected $customerOrderId;

    /**
     * @var string Customer payment status: completed / partially_paid / unpaid
     * @Serializer\Type("string")
     * @Serializer\SerializedName("paymentStatus")
     * @Serializer\Accessor(getter="getPaymentStatus",setter="setPaymentStatus")
     */
    protected $paymentStatus = '';

    /**
     * @var string Customer order status: cancelled / completed / new / partially_shipped / processed / updated
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderStatus")
     * @Serializer\Accessor(getter="getOrderStatus",setter="setOrderStatus")
     */
    protected $orderStatus = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customerOrderId = new Identity();
    }

    /**
     * Gets the value of customerOrderId.
     *
     * @return Identity
     */
    public function getCustomerOrderId()
    {
        return $this->customerOrderId;
    }

    /**
     * Sets the value of customerOrderId.
     *
     * @param Identity $customerOrderId the customer order id
     *
     * @return self
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        $this->customerOrderId = $customerOrderId;

        return $this;
    }

    /**
     * Gets the value of paymentStatus.
     *
     * @return string
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * Sets the value of paymentStatus.
     *
     * @param string $paymentStatus the payment status
     *
     * @return self
     */
    public function setPaymentStatus($paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }

    /**
     * Gets the value of orderStatus.
     *
     * @return string
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * Sets the value of orderStatus.
     *
     * @param string $orderStatus the order status
     *
     * @return self
     */
    public function setOrderStatus($orderStatus)
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }
}