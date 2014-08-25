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
 * A delivery note created for shipment..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage DeliveryNote
 * 
 * @Serializer\AccessType("public_method")
 */
class DeliveryNote extends DataModel
{
    /**
     * @var Identity Unique deliveryNote id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var DateTime Creation date
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("created")
     * @Serializer\Accessor(getter="getCreated",setter="setCreated")
     */
    protected $created = null;

    /**
     * @var int Reference to customerOrder
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("customerOrderId")
     * @Serializer\Accessor(getter="getCustomerOrderId",setter="setCustomerOrderId")
     */
    protected $customerOrderId = 0;

    /**
     * @var bool Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isFulfillment")
     * @Serializer\Accessor(getter="getIsFulfillment",setter="setIsFulfillment")
     */
    protected $isFulfillment = false;

    /**
     * @var string Optional text note
     * @Serializer\Type("string")
     * @Serializer\SerializedName("note")
     * @Serializer\Accessor(getter="getNote",setter="setNote")
     */
    protected $note = '';

    /**
     * @var int Delivery status
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("status")
     * @Serializer\Accessor(getter="getStatus",setter="setStatus")
     */
    protected $status = 0;

    /**
     * End: 1 (One of DeliveryNote)
     *      * (Collection of DeliveryNoteItem)
     *
     * @var \jtl\Connector\Model\DeliveryNoteItem[]
     * @Serializer\Type("array<jtl\Connector\Model\DeliveryNoteItem>")
     * @Serializer\SerializedName("items")
     * @Serializer\AccessType("reflection")
     */
    protected $items = array();


    public function __construct()
    {
        $this->id = new Identity;
    }

    /**
     * @param  Identity $id Unique deliveryNote id
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique deliveryNote id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  DateTime $created Creation date
     * @return \jtl\Connector\Model\DeliveryNote
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
     * @param  int $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setCustomerOrderId($customerOrderId)
    {
        return $this->setProperty('customerOrderId', $customerOrderId, 'int');
    }

    /**
     * @return int Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->customerOrderId;
    }

    /**
     * @param  bool $isFulfillment Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsFulfillment($isFulfillment)
    {
        return $this->setProperty('isFulfillment', $isFulfillment, 'bool');
    }

    /**
     * @return bool Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     */
    public function getIsFulfillment()
    {
        return $this->isFulfillment;
    }

    /**
     * @param  string $note Optional text note
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setNote($note)
    {
        return $this->setProperty('note', $note, 'string');
    }

    /**
     * @return string Optional text note
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param  int $status Delivery status
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setStatus($status)
    {
        return $this->setProperty('status', $status, 'int');
    }

    /**
     * @return int Delivery status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param  \jtl\Connector\Model\DeliveryNoteItem $item
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function addItem(\jtl\Connector\Model\DeliveryNoteItem $item)
    {
        $this->items[] = $item;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\DeliveryNoteItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function clearItems()
    {
        $this->items = array();
        return $this;
    }

 
}
