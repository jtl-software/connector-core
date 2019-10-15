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
 * Define set articles / parts lists.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class PartsList extends DataModel
{
    /**
     * @var Identity Unique PartsList id, referenced by product.PartsListId
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var Identity Reference to a component / product
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;
    
    /**
     * @var double Component quantity
     * @Serializer\Type("double")
     * @Serializer\SerializedName("quantity")
     * @Serializer\Accessor(getter="getQuantity",setter="setQuantity")
     */
    protected $quantity = 0.0;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->productId = new Identity();
    }
    
    /**
     * @param Identity $id Unique PartsList id, referenced by product.PartsListId
     * @return PartsList
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): PartsList
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique PartsList id, referenced by product.PartsListId
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param Identity $productId Reference to a component / product
     * @return PartsList
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId): PartsList
    {
        $this->productId = $productId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to a component / product
     */
    public function getProductId(): Identity
    {
        return $this->productId;
    }
    
    /**
     * @param double $quantity Component quantity
     * @return PartsList
     */
    public function setQuantity(float $quantity): PartsList
    {
        $this->quantity = $quantity;
        
        return $this;
    }
    
    /**
     * @return double Component quantity
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }
}
