<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Monolingual customer group attribute.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerGroupAttr extends KeyValueAttribute implements IdentityInterface
{
    /**
     * @var Identity Unique customerGroupAttr id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
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
