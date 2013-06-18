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
     * @var \jtl\Connector\Model\deliveryNote[]
     */
    protected $_deliveryNotes;
    
    /**
     * @var \jtl\Connector\Model\deliveryNotePos[]
     */
    protected $_deliveryNotePoss;
    
    /**
     * @var \jtl\Connector\Model\shipment[]
     */
    protected $_shipments;
        
    /**
     * @return array \jtl\Connector\Model\deliveryNote
     */
    public function getDeliveryNotes()
    {
        return $this->_deliveryNotes;
    }
        
    /**
     * @return array \jtl\Connector\Model\deliveryNotePos
     */
    public function getDeliveryNotePoss()
    {
        return $this->_deliveryNotePoss;
    }
        
    /**
     * @return array \jtl\Connector\Model\shipment
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