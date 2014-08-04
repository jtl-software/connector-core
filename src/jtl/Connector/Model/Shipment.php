<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Shipment Model with reference to a deliveryNote.
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Shipment extends DataModel
{
    /**
     * @var Identity Reference to deliveryNote
     */
    protected $deliveryNoteId = null;

    /**
     * @var Identity Unique shipment id
     */
    protected $id = null;

    /**
     * @var string Carrier name
     */
    protected $carrierName = '';

    /**
     * @var DateTime Creation date
     */
    protected $created = null;

    /**
     * @var string Optional Identcode
     */
    protected $identCode = '';

    /**
     * @var string Optional shipment note
     */
    protected $note = '';

    /**
     * @var string Optional Tracking URL
     */
    protected $trackingURL = '';

    /**
     * @param  Identity $deliveryNoteId Reference to deliveryNote
     * @return \jtl\Connector\Model\Shipment
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDeliveryNoteId(Identity $deliveryNoteId)
    {
        return $this->setProperty('deliveryNoteId', $deliveryNoteId, 'Identity');
    }

    /**
     * @return Identity Reference to deliveryNote
     */
    public function getDeliveryNoteId()
    {
        return $this->deliveryNoteId;
    }

    /**
     * @param  Identity $id Unique shipment id
     * @return \jtl\Connector\Model\Shipment
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique shipment id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $carrierName Carrier name
     * @return \jtl\Connector\Model\Shipment
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCarrierName($carrierName)
    {
        return $this->setProperty('carrierName', $carrierName, 'string');
    }

    /**
     * @return string Carrier name
     */
    public function getCarrierName()
    {
        return $this->carrierName;
    }

    /**
     * @param  DateTime $created Creation date
     * @return \jtl\Connector\Model\Shipment
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreated(DateTime $created)
    {
        return $this->setProperty('created', $created, 'DateTime');
    }

    /**
     * @return DateTime Creation date
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param  string $identCode Optional Identcode
     * @return \jtl\Connector\Model\Shipment
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setIdentCode($identCode)
    {
        return $this->setProperty('identCode', $identCode, 'string');
    }

    /**
     * @return string Optional Identcode
     */
    public function getIdentCode()
    {
        return $this->identCode;
    }

    /**
     * @param  string $note Optional shipment note
     * @return \jtl\Connector\Model\Shipment
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setNote($note)
    {
        return $this->setProperty('note', $note, 'string');
    }

    /**
     * @return string Optional shipment note
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param  string $trackingURL Optional Tracking URL
     * @return \jtl\Connector\Model\Shipment
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setTrackingURL($trackingURL)
    {
        return $this->setProperty('trackingURL', $trackingURL, 'string');
    }

    /**
     * @return string Optional Tracking URL
     */
    public function getTrackingURL()
    {
        return $this->trackingURL;
    }

 
}
