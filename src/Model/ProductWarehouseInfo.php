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
 * Product to warehouse info association.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductWarehouseInfo extends AbstractDataModel
{
    /**
     * @var Identity Reference to product
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;
    
    /**
     * @var Identity
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("warehouseId")
     * @Serializer\Accessor(getter="getwarehouseId",setter="setwarehouseId")
     */
    protected $warehouseId = null;
    
    /**
     * @var double Optional product inflow quantity for specified warehouse
     * @Serializer\Type("double")
     * @Serializer\SerializedName("inflowQuantity")
     * @Serializer\Accessor(getter="getInflowQuantity",setter="setInflowQuantity")
     */
    protected $inflowQuantity = 0.0;
    
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("stockLevel")
     * @Serializer\Accessor(getter="getstockLevel",setter="setstockLevel")
     */
    protected $stockLevel = 0.0;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productId = new Identity();
        $this->warehouseId = new Identity();
    }
    
    /**
     * @param Identity $productId Reference to product
     * @return ProductWarehouseInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId): ProductWarehouseInfo
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
     * @param Identity $warehouseId
     * @return ProductWarehouseInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setWarehouseId(Identity $warehouseId): ProductWarehouseInfo
    {
        $this->warehouseId = $warehouseId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getWarehouseId(): Identity
    {
        return $this->warehouseId;
    }
    
    /**
     * @param double $inflowQuantity Optional product inflow quantity for specified warehouse
     * @return ProductWarehouseInfo
     */
    public function setInflowQuantity(float $inflowQuantity): ProductWarehouseInfo
    {
        $this->inflowQuantity = $inflowQuantity;
        
        return $this;
    }
    
    /**
     * @return double Optional product inflow quantity for specified warehouse
     */
    public function getInflowQuantity(): float
    {
        return $this->inflowQuantity;
    }
    
    /**
     * @param double $stockLevel
     * @return ProductWarehouseInfo
     */
    public function setStockLevel(float $stockLevel): ProductWarehouseInfo
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
