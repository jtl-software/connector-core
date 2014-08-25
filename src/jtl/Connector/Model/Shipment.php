<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage DeliveryNote
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Shipment Model with reference to a deliveryNote.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage DeliveryNote
 * 
 * @Serializer\AccessType("public_method")
 */
class Shipment extends DataModel
{
    /**
     * @var Identity Unique shipment id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var string Carrier name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("carrierName")
     * @Serializer\Accessor(getter="getCarrierName",setter="setCarrierName")
     */
    protected $carrierName = '';

    /**
     * @var DateTime Creation date
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("created")
     * @Serializer\Accessor(getter="getCreated",setter="setCreated")
     */
    protected $created = null;

    /**
     * @var int Reference to deliveryNote
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("deliveryNoteId")
     * @Serializer\Accessor(getter="getDeliveryNoteId",setter="setDeliveryNoteId")
     */
    protected $deliveryNoteId = 0;

    /**
     * @var string Optional Identcode
     * @Serializer\Type("string")
     * @Serializer\SerializedName("identCode")
     * @Serializer\Accessor(getter="getIdentCode",setter="setIdentCode")
     */
    protected $identCode = '';

    /**
     * @var string Optional shipment note
     * @Serializer\Type("string")
     * @Serializer\SerializedName("note")
     * @Serializer\Accessor(getter="getNote",setter="setNote")
     */
    protected $note = '';

    /**
     * @var string Optional Tracking URL
     * @Serializer\Type("string")
     * @Serializer\SerializedName("trackingURL")
     * @Serializer\Accessor(getter="getTrackingURL",setter="setTrackingURL")
     */
    protected $trackingURL = '';


    public function __construct()
    {
        $this->id = new Identity;
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
    public function setCreated(DateTime $created = null)
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
     * @param  int $deliveryNoteId Reference to deliveryNote
     * @return \jtl\Connector\Model\Shipment
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setDeliveryNoteId($deliveryNoteId)
    {
        return $this->setProperty('deliveryNoteId', $deliveryNoteId, 'int');
    }

    /**
     * @return int Reference to deliveryNote
     */
    public function getDeliveryNoteId()
    {
        return $this->deliveryNoteId;
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
