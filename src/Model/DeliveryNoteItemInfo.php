<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
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
     * @return \jtl\Connector\Model\DeliveryNoteItemInfo
     */
    public function setBatch($batch)
    {
        $this->batch = $batch;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBatch()
    {
        return $this->batch;
    }
    
    /**
     * @param DateTime $bestBefore
     * @return \jtl\Connector\Model\DeliveryNoteItemInfo
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setBestBefore(DateTime $bestBefore = null)
    {
        $this->bestBefore = $bestBefore;
        
        return $this;
    }
    
    /**
     * @return DateTime
     */
    public function getBestBefore()
    {
        return $this->bestBefore;
    }
    
    /**
     * @param double $quantity
     * @return \jtl\Connector\Model\DeliveryNoteItemInfo
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
    
    /**
     * @param integer $warehouseId
     * @return \jtl\Connector\Model\DeliveryNoteItemInfo
     */
    public function setWarehouseId($warehouseId)
    {
        $this->warehouseId = $warehouseId;
        
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getWarehouseId()
    {
        return $this->warehouseId;
    }
}
