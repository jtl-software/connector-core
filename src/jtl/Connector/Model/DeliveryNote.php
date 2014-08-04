<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * A delivery note created for shipment..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class DeliveryNote extends DataModel
{
    /**
     * @type Identity Reference to customerOrder
     */
    protected $customerOrderId = null;

    /**
     * @type Identity Unique deliveryNote id
     */
    protected $id = null;

    /**
     * @type string Creation date
     */
    protected $created = '';

    /**
     * @type bool Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     */
    protected $isFulfillment = false;

    /**
     * @type string Optional text note
     */
    protected $note = '';

    /**
     * @type int Delivery status
     */
    protected $status = 0;

    /**
     * @type \jtl\Connector\Model\DeliveryNoteItem[]
     */
    protected $items = array();

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'customerOrderId',
        'id',
    );

    /**
     * @param  Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        return $this->setProperty('CustomerOrderId', $customerOrderId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique deliveryNote id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $created Creation date
     * @return \jtl\Connector\Model\DeliveryNote
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
     * @param  bool $isFulfillment Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsFulfillment(Identity $isFulfillment)
    {
        return $this->setProperty('IsFulfillment', $isFulfillment, 'bool');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setNote(Identity $note)
    {
        return $this->setProperty('Note', $note, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setStatus(Identity $status)
    {
        return $this->setProperty('Status', $status, 'int');
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
