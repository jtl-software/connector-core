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
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductStockLevel extends DataModel
{
    /**
     * @var Identity
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;
    
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("stockLevel")
     * @Serializer\Accessor(getter="getStockLevel",setter="setStockLevel")
     */
    protected $stockLevel = 0.0;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productId = new Identity();
    }
    
    /**
     * @param Identity $productId
     * @return ProductStockLevel
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId): ProductStockLevel
    {
        $this->productId = $productId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getProductId(): Identity
    {
        return $this->productId;
    }
    
    /**
     * @param double $stockLevel
     * @return ProductStockLevel
     */
    public function setStockLevel(float $stockLevel): ProductStockLevel
    {
        $this->stockLevel = $stockLevel;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getStockLevel(): float
    {
        return $this->stockLevel;
    }
}
