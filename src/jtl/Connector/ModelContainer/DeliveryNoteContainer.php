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
     * @var \jtl\Connector\Model\DeliveryNotePos[]
     */
    protected $_deliveryNotePoss;
    
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
     * @return array \jtl\Connector\Model\DeliveryNotePos
     */
    public function getDeliveryNotePoss()
    {
        return $this->_deliveryNotePoss;
    }
        
    /**
     * @return array \jtl\Connector\Model\Shipment
     */
    public function getShipments()
    {
        return $this->_shipments;
    }
        
    public $items = array(
        "deliverynote" => array("DeliveryNote", "DeliveryNotes"),
        "deliverynotepos" => array("DeliveryNotePos", "DeliveryNotePoss"),
        "shipment" => array("Shipment", "Shipments")
    );
}
?>