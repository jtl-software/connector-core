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
     * @var Identity Unique id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var int Reference to customerId
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("customerId")
     * @Serializer\Accessor(getter="getCustomerId",setter="setCustomerId")
     */
    protected $customerId = 0;

    /**
     * @var int customerOrderPaymentInfoId
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("customerOrderPaymentInfoId")
     * @Serializer\Accessor(getter="getCustomerOrderPaymentInfoId",setter="setCustomerOrderPaymentInfoId")
     */
    protected $customerOrderPaymentInfoId = 0;

    /**
     * @var int Reference to shippingAddressId
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("shippingAddressId")
     * @Serializer\Accessor(getter="getShippingAddressId",setter="setShippingAddressId")
     */
    protected $shippingAddressId = 0;


    public function __construct()
    {
        $this->id = new Identity;
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
     * @param  int $customerId Reference to customerId
     * @return \jtl\Connector\Model\CustomerOrderBasket
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setCustomerId($customerId)
    {
        return $this->setProperty('customerId', $customerId, 'int');
    }

    /**
     * @return int Reference to customerId
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param  int $customerOrderPaymentInfoId customerOrderPaymentInfoId
     * @return \jtl\Connector\Model\CustomerOrderBasket
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setCustomerOrderPaymentInfoId($customerOrderPaymentInfoId)
    {
        return $this->setProperty('customerOrderPaymentInfoId', $customerOrderPaymentInfoId, 'int');
    }

    /**
     * @return int customerOrderPaymentInfoId
     */
    public function getCustomerOrderPaymentInfoId()
    {
        return $this->customerOrderPaymentInfoId;
    }

    /**
     * @param  int $shippingAddressId Reference to shippingAddressId
     * @return \jtl\Connector\Model\CustomerOrderBasket
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setShippingAddressId($shippingAddressId)
    {
        return $this->setProperty('shippingAddressId', $shippingAddressId, 'int');
    }

    /**
     * @return int Reference to shippingAddressId
     */
    public function getShippingAddressId()
    {
        return $this->shippingAddressId;
    }

 
}
