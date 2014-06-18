<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelContainer
 */

namespace jtl\Connector\ModelContainer;

/**
 * DeliveryNote Container Class
 * @access public
 */
class DeliveryNoteContainer extends CoreContainer
{
    /**
     * @var \jtl\Connector\Model\DeliveryNote[]
     */
    protected $_deliveryNotes;
    
    /**
     * @var \jtl\Connector\Model\DeliveryNoteItem[]
     */
    protected $_deliveryNoteItems;
    
    /**
     * @var \jtl\Connector\Model\Shipment[]
     */
    protected $_shipments;
    
    /**
     * @return array \jtl\Connector\Model\DeliveryNote
     */
    public function getDeliveryNotes()
    {
        return $this->_deliveryNotes;
    }
    
    /**
     * @return array \jtl\Connector\Model\DeliveryNoteItem
     */
    public function getDeliveryNoteItems()
    {
        return $this->_deliveryNoteItems;
    }
    
    /**
     * @return array \jtl\Connector\Model\Shipment
     */
    public function getShipments()
    {
        return $this->_shipments;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Connector\ModelContainer\CoreContainer::getMainModel()
     */
    public function getMainModel()
    {
        $arr = $this->getDeliveryNotes();
        
        return reset($arr) ?: null;
    }
    
    public $items = array(
        "delivery_note" => array("DeliveryNote", "DeliveryNotes"),
        "delivery_note_item" => array("DeliveryNoteItem", "DeliveryNoteItems"),
        "shipment" => array("Shipment", "Shipments")
    );
}