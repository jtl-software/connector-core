<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage DeliveryNote
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Delivery note item properties.
 *
 * @access public
 * @subpackage DeliveryNote
 */
class DeliveryNoteItem extends DataModel
{
    /**
     * @var Identity Unique deliveryNoteItem id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to customerOrderItem
     */
    protected $_customerOrderItemId = null;
    
    /**
     * @var double Quantity delivered
     */
    protected $_quantity = 0.0;
    
    /**
     * @var Identity Optional reference to warehouse
     */
    protected $_warehouseId = null;
    
    /**
     * @var string Optional serial number
     */
    protected $_serialNumber = '';
    
    /**
     * @var string Optional batch number
     */
    protected $_batchNumber = '';
    
    /**
     * @var string Optional best before date
     */
    protected $_bestBefore = null;
    
    /**
     * @var Identity Reference to deliveryNote
     */
    protected $_deliveryNoteId = null;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id',
        '_customerOrderItemId',
        '_warehouseId',
        '_deliveryNoteId'
    );
    
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
                case "_deliveryNoteId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_quantity":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_serialNumber":
                case "_batchNumber":
                case "_bestBefore":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique deliveryNoteItem id
     * @return \jtl\Connector\Model\DeliveryNoteItem
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique deliveryNoteItem id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $customerOrderItemId Reference to customerOrderItem
     * @return \jtl\Connector\Model\DeliveryNoteItem
     */
    public function setCustomerOrderItemId(Identity $customerOrderItemId)
    {
        $this->_customerOrderItemId = $customerOrderItemId;
        return $this;
    }
    
    /**
     * @return Identity Reference to customerOrderItem
     */
    public function getCustomerOrderItemId()
    {
        return $this->_customerOrderItemId;
    }
    /**
     * @param double $quantity Quantity delivered
     * @return \jtl\Connector\Model\DeliveryNoteItem
     */
    public function setQuantity($quantity)
    {
        $this->_quantity = (double)$quantity;
        return $this;
    }
    
    /**
     * @return double Quantity delivered
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }
    /**
     * @param Identity $warehouseId Optional reference to warehouse
     * @return \jtl\Connector\Model\DeliveryNoteItem
     */
    public function setWarehouseId(Identity $warehouseId)
    {
        $this->_warehouseId = $warehouseId;
        return $this;
    }
    
    /**
     * @return Identity Optional reference to warehouse
     */
    public function getWarehouseId()
    {
        return $this->_warehouseId;
    }
    /**
     * @param string $serialNumber Optional serial number
     * @return \jtl\Connector\Model\DeliveryNoteItem
     */
    public function setSerialNumber($serialNumber)
    {
        $this->_serialNumber = (string)$serialNumber;
        return $this;
    }
    
    /**
     * @return string Optional serial number
     */
    public function getSerialNumber()
    {
        return $this->_serialNumber;
    }
    /**
     * @param string $batchNumber Optional batch number
     * @return \jtl\Connector\Model\DeliveryNoteItem
     */
    public function setBatchNumber($batchNumber)
    {
        $this->_batchNumber = (string)$batchNumber;
        return $this;
    }
    
    /**
     * @return string Optional batch number
     */
    public function getBatchNumber()
    {
        return $this->_batchNumber;
    }
    /**
     * @param string $bestBefore Optional best before date
     * @return \jtl\Connector\Model\DeliveryNoteItem
     */
    public function setBestBefore($bestBefore)
    {
        $this->_bestBefore = (string)$bestBefore;
        return $this;
    }
    
    /**
     * @return string Optional best before date
     */
    public function getBestBefore()
    {
        return $this->_bestBefore;
    }
    /**
     * @param Identity $deliveryNoteId Reference to deliveryNote
     * @return \jtl\Connector\Model\DeliveryNoteItem
     */
    public function setDeliveryNoteId(Identity $deliveryNoteId)
    {
        $this->_deliveryNoteId = $deliveryNoteId;
        return $this;
    }
    
    /**
     * @return Identity Reference to deliveryNote
     */
    public function getDeliveryNoteId()
    {
        return $this->_deliveryNoteId;
    }
}