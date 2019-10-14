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
 * Monolingual attribute for a customerorder.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerOrderAttr extends DataModel
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
     * @var string Attribute key name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("key")
     * @Serializer\Accessor(getter="getKey",setter="setKey")
     */
    protected $key = '';
    
    /**
     * @var string Attribute value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     * @Serializer\Accessor(getter="getValue",setter="setValue")
     */
    protected $value = '';
    
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
     * @return \jtl\Connector\Model\CustomerOrderAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        $this->customerOrderId = $customerOrderId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->customerOrderId;
    }
    
    /**
     * @param Identity $id Unique customerOrderAttr id
     * @return \jtl\Connector\Model\CustomerOrderAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
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
    
    /**
     * @param string $key Attribute key name
     * @return \jtl\Connector\Model\CustomerOrderAttr
     */
    public function setKey($key)
    {
        $this->key = $key;
        
        return $this;
    }
    
    /**
     * @return string Attribute key name
     */
    public function getKey()
    {
        return $this->key;
    }
    
    /**
     * @param string $value Attribute value
     * @return \jtl\Connector\Model\CustomerOrderAttr
     */
    public function setValue($value)
    {
        $this->value = $value;
        
        return $this;
    }
    
    /**
     * @return string Attribute value
     */
    public function getValue()
    {
        return $this->value;
    }
}
