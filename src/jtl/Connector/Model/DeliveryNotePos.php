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
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_orderPosition;
    
    /**
     * @var double
     */
    protected $_quantity;
    
    /**
     * @var int
     */
    protected $_stock;
    
    /**
     * @var string
     */
    protected $_serialNumber;
    
    /**
     * @var string
     */
    protected $_batchNumber;
    
    /**
     * @var string
     */
    protected $_bestBefore;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\DeliveryNotePos
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
     * @param int $orderPosition
     * @return \jtl\Connector\Model\DeliveryNotePos
     */
    public function setOrderPosition($orderPosition)
    {
        $this->_orderPosition = (int)$orderPosition;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getOrderPosition()
    {
        return $this->_orderPosition;
    }
    
    /**
     * @param double $quantity
     * @return \jtl\Connector\Model\DeliveryNotePos
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
     * @param int $stock
     * @return \jtl\Connector\Model\DeliveryNotePos
     */
    public function setStock($stock)
    {
        $this->_stock = (int)$stock;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getStock()
    {
        return $this->_stock;
    }
    
    /**
     * @param string $serialNumber
     * @return \jtl\Connector\Model\DeliveryNotePos
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
     * @return \jtl\Connector\Model\DeliveryNotePos
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
     * @return \jtl\Connector\Model\DeliveryNotePos
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/deliverynotepos/deliverynotepos.json", $this->getPublic(array()));
    }
}
?>