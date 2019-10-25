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
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class StatusChange extends DataModel
{
    /**
     * @var Identity
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerOrderId")
     * @Serializer\Accessor(getter="getCustomerOrderId",setter="setCustomerOrderId")
     */
    protected $customerOrderId = null;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("orderStatus")
     * @Serializer\Accessor(getter="getOrderStatus",setter="setOrderStatus")
     */
    protected $orderStatus = '';
    
    /**
     * @var string
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
     * @return StatusChange
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId): StatusChange
    {
        $this->customerOrderId = $customerOrderId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getCustomerOrderId(): Identity
    {
        return $this->customerOrderId;
    }
    
    /**
     * @param string $orderStatus
     * @return StatusChange
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setOrderStatus(string $orderStatus): StatusChange
    {
        $this->orderStatus = $orderStatus;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getOrderStatus(): string
    {
        return $this->orderStatus;
    }
    
    /**
     * @param string $paymentStatus
     * @return StatusChange
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setPaymentStatus(string $paymentStatus): StatusChange
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
}
