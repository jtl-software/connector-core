<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;
use jtl\Connector\Model\Customer\Attribute;

/**
 * Monolingual customer attribute.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerAttr extends Attribute
{
    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerId")
     * @Serializer\Accessor(getter="getCustomerId",setter="setCustomerId")
     */
    protected $customerId = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customerId = new Identity();
    }
    
    /**
     * @param Identity $customerId
     * @return CustomerAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId): CustomerAttr
    {
        $this->customerId = $customerId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getCustomerId(): Identity
    {
        return $this->customerId;
    }

}
