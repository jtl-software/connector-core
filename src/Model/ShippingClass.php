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
 * Shipping classes are usually defined in JTL-Wawi ERP.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ShippingClass extends AbstractDataModel implements IdentityInterface
{
    /**
     * @var Identity Unique shippingClass id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var string Optional (internal) Shipping class name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
    }
    
    /**
     * @param Identity $id Unique shippingClass id
     * @return ShippingClass
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): ShippingClass
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique shippingClass id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param string $name Optional (internal) Shipping class name
     * @return ShippingClass
     */
    public function setName(string $name): ShippingClass
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Optional (internal) Shipping class name
     */
    public function getName(): string
    {
        return $this->name;
    }
}
