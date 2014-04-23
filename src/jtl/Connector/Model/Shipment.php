<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage DeliveryNote
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Shipment Model with reference to a deliveryNote
 *
 * @access public
 * @subpackage DeliveryNote
 */
class Shipment extends DataModel
{
    /**
     * @var Identity Unique shipment id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to deliveryNote
     */
    protected $_deliveryNoteId = null;
    
    /**
     * @var string Logistic name
     */
    protected $_logistic = '';
    
    /**
     * @var string Optional Logistic URL
     */
    protected $_logisticURL = '';
    
    /**
     * @var string Optional Identcode
     */
    protected $_identCode = '';
    
    /**
     * @var string Creation date
     */
    protected $_created = null;
    
    /**
     * @var string Optional shipment note
     */
    protected $_note = '';
    
    /**
     * Shipment Setter
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
                case "_deliveryNoteId":
                
                    $this->$name = ($value instanceof Identity) ? $value : null;
                    break;
            
                case "_logistic":
                case "_logisticURL":
                case "_identCode":
                case "_created":
                case "_note":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique shipment id
     * @return \jtl\Connector\Model\Shipment
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique shipment id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $deliveryNoteId Reference to deliveryNote
     * @return \jtl\Connector\Model\Shipment
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
    /**
     * @param string $logistic Logistic name
     * @return \jtl\Connector\Model\Shipment
     */
    public function setLogistic($logistic)
    {
        $this->_logistic = (string)$logistic;
        return $this;
    }
    
    /**
     * @return string Logistic name
     */
    public function getLogistic()
    {
        return $this->_logistic;
    }
    /**
     * @param string $logisticURL Optional Logistic URL
     * @return \jtl\Connector\Model\Shipment
     */
    public function setLogisticURL($logisticURL)
    {
        $this->_logisticURL = (string)$logisticURL;
        return $this;
    }
    
    /**
     * @return string Optional Logistic URL
     */
    public function getLogisticURL()
    {
        return $this->_logisticURL;
    }
    /**
     * @param string $identCode Optional Identcode
     * @return \jtl\Connector\Model\Shipment
     */
    public function setIdentCode($identCode)
    {
        $this->_identCode = (string)$identCode;
        return $this;
    }
    
    /**
     * @return string Optional Identcode
     */
    public function getIdentCode()
    {
        return $this->_identCode;
    }
    /**
     * @param string $created Creation date
     * @return \jtl\Connector\Model\Shipment
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
     * @param string $note Optional shipment note
     * @return \jtl\Connector\Model\Shipment
     */
    public function setNote($note)
    {
        $this->_note = (string)$note;
        return $this;
    }
    
    /**
     * @return string Optional shipment note
     */
    public function getNote()
    {
        return $this->_note;
    }
}