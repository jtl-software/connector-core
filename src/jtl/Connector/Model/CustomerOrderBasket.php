<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Internal
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * ToDo: Remove this Controller, not defined. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Internal
 * 
 * @Serializer\AccessType("public_method")
 */
class CustomerOrderBasket extends DataModel
{
    /**
     * @var Identity Reference to customerId
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerId")
     * @Serializer\Accessor(getter="getCustomerId",setter="setCustomerId")
     */
    protected $customerId = null;

    /**
     * @var Identity customerOrderPaymentInfoId
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerOrderPaymentInfoId")
     * @Serializer\Accessor(getter="getCustomerOrderPaymentInfoId",setter="setCustomerOrderPaymentInfoId")
     */
    protected $customerOrderPaymentInfoId = null;

    /**
     * @var Identity Unique id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var Identity Reference to shippingAddressId
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("shippingAddressId")
     * @Serializer\Accessor(getter="getShippingAddressId",setter="setShippingAddressId")
     */
    protected $shippingAddressId = null;


    public function __construct()
    {
        $this->customerId = new Identity;
        $this->customerOrderPaymentInfoId = new Identity;
        $this->id = new Identity;
        $this->shippingAddressId = new Identity;
    }

    /**
     * @param  Identity $customerId Reference to customerId
     * @return \jtl\Connector\Model\CustomerOrderBasket
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId)
    {
        return $this->setProperty('customerId', $customerId, 'Identity');
    }

    /**
     * @return Identity Reference to customerId
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param  Identity $customerOrderPaymentInfoId customerOrderPaymentInfoId
     * @return \jtl\Connector\Model\CustomerOrderBasket
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderPaymentInfoId(Identity $customerOrderPaymentInfoId)
    {
        return $this->setProperty('customerOrderPaymentInfoId', $customerOrderPaymentInfoId, 'Identity');
    }

    /**
     * @return Identity customerOrderPaymentInfoId
     */
    public function getCustomerOrderPaymentInfoId()
    {
        return $this->customerOrderPaymentInfoId;
    }

    /**
     * @param  Identity $id Unique id
     * @return \jtl\Connector\Model\CustomerOrderBasket
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $shippingAddressId Reference to shippingAddressId
     * @return \jtl\Connector\Model\CustomerOrderBasket
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingAddressId(Identity $shippingAddressId)
    {
        return $this->setProperty('shippingAddressId', $shippingAddressId, 'Identity');
    }

    /**
     * @return Identity Reference to shippingAddressId
     */
    public function getShippingAddressId()
    {
        return $this->shippingAddressId;
    }

 
}
