<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage DeliveryNote
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * A delivery note created for shipment..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage DeliveryNote
 */
class DeliveryNote extends DataModel
{
    /**
     * @var Identity Reference to customerOrder
     */
    protected $customerOrderId = null;

    /**
     * @var Identity Unique deliveryNote id
     */
    protected $id = null;

    /**
     * @var DateTime Creation date
     */
    protected $created = null;

    /**
     * @var bool Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     */
    protected $isFulfillment = false;

    /**
     * @var string Optional text note
     */
    protected $note = '';

    /**
     * @var int Delivery status
     */
    protected $status = 0;

    /**
     * @var \jtl\Connector\Model\DeliveryNoteItem[]
     */
    protected $items = array();

    /**
     * @param  Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        return $this->setProperty('customerOrderId', $customerOrderId, 'Identity');
    }

    /**
     * @return Identity Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->customerOrderId;
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
     * @param  \jtl\Connector\Model\DeliveryNoteItem $items
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
