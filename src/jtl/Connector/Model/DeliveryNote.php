<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * DeliveryNote Model
 * A delivery note created for shipment.
 *
 * @access public
 */
class DeliveryNote extends DataModel
{
    /**
     * @var string - Open deliveryNote status (not processed or shipped yet)
     */
    const STATUS_OPEN = 'open';
    
    /**
     * @var string - DeliveryNote Status in progress (not shipped yet)
     */
    const STATUS_PROCESSING = 'processing';
    
    /**
     * @var status - DeliveryNote shipped / completed status
     */
    const STATUS_COMPLETED = completed;
    
    /**
     * @var string Unique deliveryNote id
     */
    protected $_id = '';             
    
    /**
     * @var string Reference to customerOrder
     */
    protected $_customerOrderId = '';             
    
    /**
     * @var string Optional text note
     */
    protected $_note = '';             
    
    /**
     * @var string Creation date
     */
    protected $_created = null;             
    
    /**
     * @var bool Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     */
    protected $_isFulfillment = false;             
    
    /**
     * @var int Delivery status
     */
    protected $_status = 0;             
    
    /**
     * DeliveryNote Setter
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
                case "_customerOrderId":
                case "_note":
                case "_created":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_isFulfillment":
                
                    $this->$name = (bool)$value;
                    break;
            
                case "_status":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique deliveryNote id
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique deliveryNote id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setCustomerOrderId($customerOrderId)
    {
        $this->_customerOrderId = (string)$customerOrderId;
        return $this;
    }
    
    /**
     * @return string Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->_customerOrderId;
    }
    /**
     * @param string $note Optional text note
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setNote($note)
    {
        $this->_note = (string)$note;
        return $this;
    }
    
    /**
     * @return string Optional text note
     */
    public function getNote()
    {
        return $this->_note;
    }
    /**
     * @param string $created Creation date
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setCreated($created)
    {
        $this->_created = (string)$created;
        return $this;
    }
    
    /**
     * @return string Creation date
     */
    public function getCreated()
    {
        return $this->_created;
    }
    /**
     * @param bool $isFulfillment Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setIsFulfillment($isFulfillment)
    {
        $this->_isFulfillment = (bool)$isFulfillment;
        return $this;
    }
    
    /**
     * @return bool Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     */
    public function getIsFulfillment()
    {
        return $this->_isFulfillment;
    }
    /**
     * @param int $status Delivery status
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setStatus($status)
    {
        $this->_status = (int)$status;
        return $this;
    }
    
    /**
     * @return int Delivery status
     */
    public function getStatus()
    {
        return $this->_status;
    }
}