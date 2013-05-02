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
     * @var int
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_logistic;
    
    /**
     * @var string
     */
    protected $_logisticURL;
    
    /**
     * @var string
     */
    protected $_identCode;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * @var string
     */
    protected $_note;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\Shipment
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
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
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/shipment/shipment.json", $this->getPublic(array()));
    }
}
?>