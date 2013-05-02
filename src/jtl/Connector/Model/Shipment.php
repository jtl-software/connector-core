<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * Shipment Model
 * @access public
 */
abstract class Shipment extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_logistic;
    
    /**
     * @var 
     */
    protected $_logisticURL;
    
    /**
     * @var 
     */
    protected $_identCode;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * @var int
     */
    protected $_note;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\Shipment
     */
    public function setId($id)
    {
        $this->_id = ()$id;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param  $logistic
     * @return \jtl\Connector\Model\Shipment
     */
    public function setLogistic($logistic)
    {
        $this->_logistic = ()$logistic;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getLogistic()
    {
        return $this->_logistic;
    }
    
    /**
     * @param  $logisticURL
     * @return \jtl\Connector\Model\Shipment
     */
    public function setLogisticURL($logisticURL)
    {
        $this->_logisticURL = ()$logisticURL;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getLogisticURL()
    {
        return $this->_logisticURL;
    }
    
    /**
     * @param  $identCode
     * @return \jtl\Connector\Model\Shipment
     */
    public function setIdentCode($identCode)
    {
        $this->_identCode = ()$identCode;
        return $this;
    }
    
    /**
     * @return 
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
     * @param int $note
     * @return \jtl\Connector\Model\Shipment
     */
    public function setNote($note)
    {
        $this->_note = (int)$note;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getNote()
    {
        return $this->_note;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/Shipment/Shipment.json", $this->getPublic(array()));
    }
}
?>