<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Shipment Model with reference to a deliveryNote.
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Shipment extends DataModel
{
    /**
     * @type Identity Reference to deliveryNote
     */
    protected $deliveryNoteId = null;

    /**
     * @type Identity Unique shipment id
     */
    protected $id = null;

    /**
     * @type string Carrier name
     */
    protected $carrierName = '';

    /**
     * @type string Creation date
     */
    protected $created = '';

    /**
     * @type string Optional Identcode
     */
    protected $identCode = '';

    /**
     * @type string Optional shipment note
     */
    protected $note = '';

    /**
     * @type string Optional Tracking URL
     */
    protected $trackingURL = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'deliveryNoteId',
        'id',
    );

    /**
     * @param  Identity $deliveryNoteId Reference to deliveryNote
     * @return \jtl\Connector\Model\Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDeliveryNoteId(Identity $deliveryNoteId)
    {
        return $this->setProperty('DeliveryNoteId', $deliveryNoteId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCarrierName(Identity $carrierName)
    {
        return $this->setProperty('CarrierName', $carrierName, 'string');
    }

    /**
     * @return string Carrier name
     */
    public function getCarrierName()
    {
        return $this->carrierName;
    }

    /**
     * @param  string $created Creation date
     * @return \jtl\Connector\Model\Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCreated(Identity $created)
    {
        return $this->setProperty('Created', $created, 'string');
    }

    /**
     * @return string Creation date
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param  string $identCode Optional Identcode
     * @return \jtl\Connector\Model\Shipment
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIdentCode(Identity $identCode)
    {
        return $this->setProperty('IdentCode', $identCode, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setNote(Identity $note)
    {
        return $this->setProperty('Note', $note, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTrackingURL(Identity $trackingURL)
    {
        return $this->setProperty('TrackingURL', $trackingURL, 'string');
    }

    /**
     * @return string Optional Tracking URL
     */
    public function getTrackingURL()
    {
        return $this->trackingURL;
    }

 
}
