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
     * @var 
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_customerOrderId;
    
    /**
     * @var int
     */
    protected $_note;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * @var double
     */
    protected $_fulfillment;
    
    /**
     * @var 
     */
    protected $_status;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\DeliveryNote
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
     * @param string $customerOrderId
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setCustomerOrderId($customerOrderId)
    {
        $this->_customerOrderId = (string)$customerOrderId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerOrderId()
    {
        return $this->_customerOrderId;
    }
    
    /**
     * @param int $note
     * @return \jtl\Connector\Model\DeliveryNote
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
     * @param double $fulfillment
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setFulfillment($fulfillment)
    {
        $this->_fulfillment = (double)$fulfillment;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getFulfillment()
    {
        return $this->_fulfillment;
    }
    
    /**
     * @param  $status
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setStatus($status)
    {
        $this->_status = ()$status;
        return $this;
    }
    
    /**
     * @return 
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