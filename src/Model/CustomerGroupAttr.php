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
 * Monolingual customer group attribute.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerGroupAttr extends AbstractKeyValueAttribute
{
    /**
     * @var Identity Unique customerGroupAttr id
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
    }

    /**
     * @param Identity $id Unique customerGroupAttr id
     * @return CustomerGroupAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): CustomerGroupAttr
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique customerGroupAttr id
     */
    public function getId(): Identity
    {
        return $this->id;
    }

}
