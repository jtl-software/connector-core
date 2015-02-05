
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
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
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
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bestBefore")
     * @Serializer\Accessor(getter="getBestBefore",setter="setBestBefore")
     */
    protected $bestBefore = '';


    /**
     * @var double 
     * @Serializer\Type("double")
     * @Serializer\SerializedName("quantity")
     * @Serializer\Accessor(getter="getQuantity",setter="setQuantity")
     */
    protected $quantity = 0.0;


    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("warehouseId")
     * @Serializer\Accessor(getter="getWarehouseId",setter="setWarehouseId")
     */
    protected $warehouseId = '';

	
 
    /**
     * @param string $batch 
     * @return \jtl\Connector\Model\DeliveryNoteItemInfo
     */
    public function setBatch($batch)
    {
        return $this->setProperty('batch', $batch, 'string');
    }

    /**
     * @return string 
     */
    public function getBatch()
    {
        return $this->batch;
    }
	
 
    /**
     * @param string $bestBefore 
     * @return \jtl\Connector\Model\DeliveryNoteItemInfo
     */
    public function setBestBefore($bestBefore)
    {
        return $this->setProperty('bestBefore', $bestBefore, 'string');
    }

    /**
     * @return string 
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
        return $this->setProperty('quantity', $quantity, 'double');
    }

    /**
     * @return double 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
	
 
    /**
     * @param string $warehouseId 
     * @return \jtl\Connector\Model\DeliveryNoteItemInfo
     */
    public function setWarehouseId($warehouseId)
    {
        return $this->setProperty('warehouseId', $warehouseId, 'string');
    }

    /**
     * @return string 
     */
    public function getWarehouseId()
    {
        return $this->warehouseId;
    }


}
