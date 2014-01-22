<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * DeliveryNoteItem Model
 * Delivery note item properties.
 *
 * @access public
 */
class DeliveryNoteItem extends DataModel
{
    /**
     * @var string - Unique deliveryNoteItem id
     */
    protected $_id = '';
    
    /**
     * @var string - Reference to customerOrderItem
     */
    protected $_customerOrderItemId = '';
    
    /**
     * @var double - Quantity delivered
     */
    protected $_quantity = 0.0;
    
    /**
     * @var string - Optional reference to warehouse
     */
    protected $_warehouseId = '';
    
    /**
     * @var string - Optional serial number
     */
    protected $_serialNumber = '';
    
    /**
     * @var string - Optional batch number
     */
    protected $_batchNumber = '';
    
    /**
     * @var string - Optional best before date
     */
    protected $_bestBefore = '';
    
    /**
     * @var string - Reference to deliveryNote
     */
    protected $_deliveryNoteId = '';
    
    /**
     * DeliveryNoteItem Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_id":
                case "_customerOrderItemId":
                case "_warehouseId":
                case "_serialNumber":
                case "_batchNumber":
                case "_bestBefore":
                case "_deliveryNoteId":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_quantity":
                
                    $this->$name = (double)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id
     * @return \jtl\Connector\Model\DeliveryNoteItem
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $customerOrderItemId
     * @return \jtl\Connector\Model\DeliveryNoteItem
     */
    public function setCustomerOrderItemId($customerOrderItemId)
    {
        $this->_customerOrderItemId = (string)$customerOrderItemId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerOrderItemId()
    {
        return $this->_customerOrderItemId;
    }
    
    /**
     * @param double $quantity
     * @return \jtl\Connector\Model\DeliveryNoteItem
     */
    public function setQuantity($quantity)
    {
        $this->_quantity = (double)$quantity;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }
    
    /**
     * @param string $warehouseId
     * @return \jtl\Connector\Model\DeliveryNoteItem
     */
    public function setWarehouseId($warehouseId)
    {
        $this->_warehouseId = (string)$warehouseId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getWarehouseId()
    {
        return $this->_warehouseId;
    }
    
    /**
     * @param string $serialNumber
     * @return \jtl\Connector\Model\DeliveryNoteItem
     */
    public function setSerialNumber($serialNumber)
    {
        $this->_serialNumber = (string)$serialNumber;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSerialNumber()
    {
        return $this->_serialNumber;
    }
    
    /**
     * @param string $batchNumber
     * @return \jtl\Connector\Model\DeliveryNoteItem
     */
    public function setBatchNumber($batchNumber)
    {
        $this->_batchNumber = (string)$batchNumber;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBatchNumber()
    {
        return $this->_batchNumber;
    }
    
    /**
     * @param string $bestBefore
     * @return \jtl\Connector\Model\DeliveryNoteItem
     */
    public function setBestBefore($bestBefore)
    {
        $this->_bestBefore = (string)$bestBefore;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getBestBefore()
    {
        return $this->_bestBefore;
    }
    
    /**
     * @param string $deliveryNoteId
     * @return \jtl\Connector\Model\DeliveryNoteItem
     */
    public function setDeliveryNoteId($deliveryNoteId)
    {
        $this->_deliveryNoteId = (string)$deliveryNoteId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDeliveryNoteId()
    {
        return $this->_deliveryNoteId;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}