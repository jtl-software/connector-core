<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Shipping Address properties of a customer (order)
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerOrderShippingAddress extends AbstractOrderAddress
{
    /**
     * @var Identity Reference to customer
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerId")
     * @Serializer\Accessor(getter="getCustomerId",setter="setCustomerId")
     */
    protected $customerId = null;

    /**
     * @param Identity $customerId Reference to customer
     * @return CustomerOrderShippingAddress
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId): CustomerOrderShippingAddress
    {
        $this->customerId = $customerId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to customer
     */
    public function getCustomerId(): Identity
    {
        return $this->customerId;
    }
}
