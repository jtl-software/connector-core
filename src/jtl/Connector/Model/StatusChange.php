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
     * @var ShippingStatus 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("shippingStatus")
     * @Serializer\Accessor(getter="getShippingStatus",setter="setShippingStatus")
     */
    protected $shippingStatus = '';

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
     * @param OrderStatus $orderStatus 
     * @return \jtl\Connector\Model\StatusChange
     * @throws \InvalidArgumentException if the provided argument is not of type 'OrderStatus'.
     */
    public function setOrderStatus(OrderStatus $orderStatus = null)
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
     * @param PaymentStatus $paymentStatus 
     * @return \jtl\Connector\Model\StatusChange
     * @throws \InvalidArgumentException if the provided argument is not of type 'PaymentStatus'.
     */
    public function setPaymentStatus(PaymentStatus $paymentStatus = null)
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

    /**
     * @param ShippingStatus $shippingStatus 
     * @return \jtl\Connector\Model\StatusChange
     * @throws \InvalidArgumentException if the provided argument is not of type 'ShippingStatus'.
     */
    public function setShippingStatus(ShippingStatus $shippingStatus = null)
    {
        return $this->setProperty('shippingStatus', $shippingStatus, 'string');
    }

    /**
     * @return string 
     */
    public function getShippingStatus()
    {
        return $this->shippingStatus;
    }
}
