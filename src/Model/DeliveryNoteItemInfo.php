<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class DeliveryNoteItemInfo extends DataModel
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("batch")
     * @Serializer\Accessor(getter="getBatch",setter="setBatch")
     */
    protected $batch = '';
    
    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("bestBefore")
     * @Serializer\Accessor(getter="getBestBefore",setter="setBestBefore")
     */
    protected $bestBefore = null;
    
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("quantity")
     * @Serializer\Accessor(getter="getQuantity",setter="setQuantity")
     */
    protected $quantity = 0.0;
    
    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("warehouseId")
     * @Serializer\Accessor(getter="getWarehouseId",setter="setWarehouseId")
     */
    protected $warehouseId = 0;
    
    
    /**
     * @param string $batch
     * @return DeliveryNoteItemInfo
     */
    public function setBatch(string $batch): DeliveryNoteItemInfo
    {
        $this->batch = $batch;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBatch(): string
    {
        return $this->batch;
    }
    
    /**
     * @param DateTime $bestBefore
     * @return DeliveryNoteItemInfo
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setBestBefore(DateTime $bestBefore = null): DeliveryNoteItemInfo
    {
        $this->bestBefore = $bestBefore;
        
        return $this;
    }
    
    /**
     * @return DateTime
     */
    public function getBestBefore(): DateTime
    {
        return $this->bestBefore;
    }
    
    /**
     * @param double $quantity
     * @return DeliveryNoteItemInfo
     */
    public function setQuantity(float $quantity): DeliveryNoteItemInfo
    {
        $this->quantity = $quantity;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }
    
    /**
     * @param integer $warehouseId
     * @return DeliveryNoteItemInfo
     */
    public function setWarehouseId(int $warehouseId): DeliveryNoteItemInfo
    {
        $this->warehouseId = $warehouseId;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getWarehouseId(): int
    {
        return $this->warehouseId;
    }
}
