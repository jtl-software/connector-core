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
 * warehouse model (set in JTL-Wawi ERP).
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class Warehouse extends DataModel
{
    /**
     * @var Identity Unique warehouse id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var string Warehouse name
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
     * @param Identity $id Unique warehouse id
     * @return Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): Warehouse
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique warehouse id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param string $name Warehouse name
     * @return Warehouse
     */
    public function setName(string $name): Warehouse
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Warehouse name
     */
    public function getName(): string
    {
        return $this->name;
    }
}
