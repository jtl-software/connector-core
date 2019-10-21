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
 * Product to specificValue Assignment. Product specifics are used to assign characteristic product attributes like color or  size... When different products have common specifics, products are similar.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductSpecific extends DataModel
{
    /**
     * @var Identity Unique productSpecific id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var Identity Reference to product
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;
    
    /**
     * @var Identity Reference to specificValue
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("specificValueId")
     * @Serializer\Accessor(getter="getSpecificValueId",setter="setSpecificValueId")
     */
    protected $specificValueId = null;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->specificValueId = new Identity();
        $this->productId = new Identity();
    }
    
    /**
     * @param Identity $id Unique productSpecific id
     * @return ProductSpecific
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): ProductSpecific
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique productSpecific id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param Identity $productId Reference to product
     * @return ProductSpecific
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId): ProductSpecific
    {
        $this->productId = $productId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId(): Identity
    {
        return $this->productId;
    }
    
    /**
     * @param Identity $specificValueId Reference to specificValue
     * @return ProductSpecific
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSpecificValueId(Identity $specificValueId): ProductSpecific
    {
        $this->specificValueId = $specificValueId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to specificValue
     */
    public function getSpecificValueId(): Identity
    {
        return $this->specificValueId;
    }
}
