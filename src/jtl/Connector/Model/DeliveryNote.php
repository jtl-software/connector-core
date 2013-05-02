<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * DeliveryNote Model
 * @access public
 */
abstract class DeliveryNote extends Model
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_customerOrderId;
    
    /**
     * @var string
     */
    protected $_note;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * @var int
     */
    protected $_fulfillment;
    
    /**
     * @var int
     */
    protected $_status;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\DeliveryNote
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
     * @param int $customerOrderId
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setCustomerOrderId($customerOrderId)
    {
        $this->_customerOrderId = (int)$customerOrderId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCustomerOrderId()
    {
        return $this->_customerOrderId;
    }
    
    /**
     * @param string $note
     * @return \jtl\Connector\Model\DeliveryNote
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
     * @param string $created
     * @return \jtl\Connector\Model\DeliveryNote
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
     * @param int $fulfillment
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setFulfillment($fulfillment)
    {
        $this->_fulfillment = (int)$fulfillment;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getFulfillment()
    {
        return $this->_fulfillment;
    }
    
    /**
     * @param int $status
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setStatus($status)
    {
        $this->_status = (int)$status;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->_status;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/DeliveryNote/DeliveryNote.json", $this->getPublic(array()));
    }
}
?>