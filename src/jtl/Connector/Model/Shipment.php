<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Shipment Model
 * Shipment Model with reference to a deliveryNote
 *
 * @access public
 */
class Shipment extends DataModel
{
    /**
     * @var string - Unique shipment id
     */
    protected $_id = '';
    
    /**
     * @var string - Reference to deliveryNote
     */
    protected $_deliveryNoteId = '';
    
    /**
     * @var string - Logistic name
     */
    protected $_logistic = '';
    
    /**
     * @var string - Optional Logistic URL
     */
    protected $_logisticURL = '';
    
    /**
     * @var string - Optional Identcode
     */
    protected $_identCode = '';
    
    /**
     * @var string - Creation date
     */
    protected $_created = '';
    
    /**
     * @var string - Optional shipment note
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
     * @param string $id
     * @return \jtl\Connector\Model\Shipment
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
     * @param string $deliveryNoteId
     * @return \jtl\Connector\Model\Shipment
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
     * @param string $logistic
     * @return \jtl\Connector\Model\Shipment
     */
    public function setLogistic($logistic)
    {
        $this->_logistic = (string)$logistic;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLogistic()
    {
        return $this->_logistic;
    }
    
    /**
     * @param string $logisticURL
     * @return \jtl\Connector\Model\Shipment
     */
    public function setLogisticURL($logisticURL)
    {
        $this->_logisticURL = (string)$logisticURL;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLogisticURL()
    {
        return $this->_logisticURL;
    }
    
    /**
     * @param string $identCode
     * @return \jtl\Connector\Model\Shipment
     */
    public function setIdentCode($identCode)
    {
        $this->_identCode = (string)$identCode;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIdentCode()
    {
        return $this->_identCode;
    }
    
    /**
     * @param string $created
     * @return \jtl\Connector\Model\Shipment
     */
    public function setCreated($created)
    {
        $this->_created = (string)$created;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->_created;
    }
    
    /**
     * @param string $note
     * @return \jtl\Connector\Model\Shipment
     */
    public function setNote($note)
    {
        $this->_note = (string)$note;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getNote()
    {
        return $this->_note;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}