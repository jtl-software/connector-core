<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelAdapter
 */

namespace jtl\Connector\ModelAdapter;

/**
 * DeliveryNote Adapter Class
 * @access public
 */
class DeliveryNoteAdapter extends CoreAdapter
{
    /**
     * @var \jtl\Connector\Model\deliveryNote
     */
    protected $_deliveryNote;
    
    /**
     * @var \jtl\Connector\Model\deliveryNotePos
     */
    protected $_deliveryNotePos;
    
    /**
     * @var \jtl\Connector\Model\shipment
     */
    protected $_shipment;
        
    /**
     * @return \jtl\Connector\Model\deliveryNote
     */
    public function getDeliveryNote()
    {
        return $this->_deliveryNote;
    }    
    /**
     * @return \jtl\Connector\Model\deliveryNotePos
     */
    public function getDeliveryNotePos()
    {
        return $this->_deliveryNotePos;
    }    
    /**
     * @return \jtl\Connector\Model\shipment
     */
    public function getShipment()
    {
        return $this->_shipment;
    }
    
    public $items = array(
        "deliverynote" => "DeliveryNote",
        "deliverynotepos" => "DeliveryNotePos",
        "shipment" => "Shipment"
    );
}
?>