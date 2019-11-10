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
 * ProductType model to classify and group products.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductType extends AbstractDataModel
{
    /**
     * @var Identity Unique productType id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var string Optional (internal) product type name
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
     * @param Identity $id Unique productType id
     * @return ProductType
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): ProductType
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique productType id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param string $name Optional (internal) product type name
     * @return ProductType
     */
    public function setName(string $name): ProductType
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Optional (internal) product type name
     */
    public function getName(): string
    {
        return $this->name;
    }
}
