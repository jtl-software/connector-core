<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * DeliveryNotePos Model
 * @access public
 */
abstract class DeliveryNotePos extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_orderPosition;
    
    /**
     * @var 
     */
    protected $_quantity;
    
    /**
     * @var 
     */
    protected $_stock;
    
    /**
     * @var 
     */
    protected $_serialNumber;
    
    /**
     * @var 
     */
    protected $_batchNumber;
    
    /**
     * @var 
     */
    protected $_bestBefore;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\DeliveryNotePos
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
     * @param  $orderPosition
     * @return \jtl\Connector\Model\DeliveryNotePos
     */
    public function setOrderPosition($orderPosition)
    {
        $this->_orderPosition = ()$orderPosition;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getOrderPosition()
    {
        return $this->_orderPosition;
    }
    
    /**
     * @param  $quantity
     * @return \jtl\Connector\Model\DeliveryNotePos
     */
    public function setQuantity($quantity)
    {
        $this->_quantity = ()$quantity;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }
    
    /**
     * @param  $stock
     * @return \jtl\Connector\Model\DeliveryNotePos
     */
    public function setStock($stock)
    {
        $this->_stock = ()$stock;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getStock()
    {
        return $this->_stock;
    }
    
    /**
     * @param  $serialNumber
     * @return \jtl\Connector\Model\DeliveryNotePos
     */
    public function setSerialNumber($serialNumber)
    {
        $this->_serialNumber = ()$serialNumber;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSerialNumber()
    {
        return $this->_serialNumber;
    }
    
    /**
     * @param  $batchNumber
     * @return \jtl\Connector\Model\DeliveryNotePos
     */
    public function setBatchNumber($batchNumber)
    {
        $this->_batchNumber = ()$batchNumber;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getBatchNumber()
    {
        return $this->_batchNumber;
    }
    
    /**
     * @param  $bestBefore
     * @return \jtl\Connector\Model\DeliveryNotePos
     */
    public function setBestBefore($bestBefore)
    {
        $this->_bestBefore = ()$bestBefore;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getBestBefore()
    {
        return $this->_bestBefore;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/DeliveryNotePos/DeliveryNotePos.json", $this->getPublic(array()));
    }
}
?>