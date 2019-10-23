<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Monolingual attribute for a customerorder.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerOrderAttr extends AbstractKeyValueAttribute
{
    /**
     * @var Identity Reference to customerOrder
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerOrderId")
     * @Serializer\Accessor(getter="getCustomerOrderId",setter="setCustomerOrderId")
     */
    protected $customerOrderId = null;
    
    /**
     * @var Identity Unique customerOrderAttr id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->customerOrderId = new Identity();
    }
    
    /**
     * @param Identity $customerOrderId Reference to customerOrder
     * @return CustomerOrderAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId): CustomerOrderAttr
    {
        $this->customerOrderId = $customerOrderId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to customerOrder
     */
    public function getCustomerOrderId(): Identity
    {
        return $this->customerOrderId;
    }
    
    /**
     * @param Identity $id Unique customerOrderAttr id
     * @return CustomerOrderAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): CustomerOrderAttr
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique customerOrderAttr id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
}
