<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Response
 */

namespace jtl\Connector\Response;

/**
 * DeliveryNote Response Container Class
 * @access public
 */
class DeliveryNoteContainer
{
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $deliveryNotes;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $deliveryNoteItems;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $shipments;
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getDeliveryNotes()
    {
        return $this->deliveryNotes;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addDeliveryNote(Response $response)
    {
        if ($this->deliveryNotes === null) {
            $this->deliveryNotes = array();
        }
        
        $this->deliveryNotes[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getDeliveryNoteItems()
    {
        return $this->deliveryNoteItems;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addDeliveryNoteItem(Response $response)
    {
        if ($this->deliveryNoteItems === null) {
            $this->deliveryNoteItems = array();
        }
        
        $this->deliveryNoteItems[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getShipments()
    {
        return $this->shipments;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addShipment(Response $response)
    {
        if ($this->shipments === null) {
            $this->shipments = array();
        }
        
        $this->shipments[] = $response;
    }
    
}