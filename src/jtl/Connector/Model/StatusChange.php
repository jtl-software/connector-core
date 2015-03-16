<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage StatusChange
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * @access public
 * @package jtl\Connector\Model
 * @subpackage StatusChange
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
     * @return Identity 
     */
    public function getCustomerOrderId()
    {
        return $this->customerOrderId;
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
     * @return string 
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * @param string $paymentStatus 
     * @return \jtl\Connector\Model\StatusChange
     */
    public function setPaymentStatus($paymentStatus)
    {
        return $this->setProperty('paymentStatus', $paymentStatus, 'string');
    }

    /**
     * @return string 
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * @param string $orderStatus 
     * @return \jtl\Connector\Model\StatusChange
     */
    public function setOrderStatus($orderStatus)
    {
        return $this->setProperty('orderStatus', $orderStatus, 'string');
    }
}