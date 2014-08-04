<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Delivery note item properties..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class DeliveryNoteItem extends DataModel
{
    /**
     * @type Identity Reference to customerOrderItem
     */
    protected $customerOrderItemId = null;

    /**
     * @type Identity Reference to deliveryNote
     */
    protected $deliveryNoteId = null;

    /**
     * @type Identity Unique deliveryNoteItem id
     */
    protected $id = null;

    /**
     * @type Identity Optional reference to warehouse
     */
    protected $warehouseId = null;

    /**
     * @type string Optional batch number
     */
    protected $batchNumber = '';

    /**
     * @type string Optional best before date
     */
    protected $bestBefore = '';

    /**
     * @type double Quantity delivered
     */
    protected $quantity = 0.0;

    /**
     * @type string Optional serial number
     */
    protected $serialNumber = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'customerOrderItemId',
        'deliveryNoteId',
        'id',
        'warehouseId',
    );

    /**
     * @param  Identity $customerOrderItemId Reference to customerOrderItem
     * @return \jtl\Connector\Model\DeliveryNoteItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderItemId(Identity $customerOrderItemId)
    {
        return $this->setProperty('CustomerOrderItemId', $customerOrderItemId, 'Identity');
    }

    /**
     * @return Identity Reference to customerOrderItem
     */
    public function getCustomerOrderItemId()
    {
        return $this->customerOrderItemId;
    }

    /**
     * @param  Identity $deliveryNoteId Reference to deliveryNote
     * @return \jtl\Connector\Model\DeliveryNoteItem
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
     * @param  Identity $id Unique deliveryNoteItem id
     * @return \jtl\Connector\Model\DeliveryNoteItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique deliveryNoteItem id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $warehouseId Optional reference to warehouse
     * @return \jtl\Connector\Model\DeliveryNoteItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setWarehouseId(Identity $warehouseId)
    {
        return $this->setProperty('WarehouseId', $warehouseId, 'Identity');
    }

    /**
     * @return Identity Optional reference to warehouse
     */
    public function getWarehouseId()
    {
        return $this->warehouseId;
    }

    /**
     * @param  string $batchNumber Optional batch number
     * @return \jtl\Connector\Model\DeliveryNoteItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBatchNumber(Identity $batchNumber)
    {
        return $this->setProperty('BatchNumber', $batchNumber, 'string');
    }

    /**
     * @return string Optional batch number
     */
    public function getBatchNumber()
    {
        return $this->batchNumber;
    }

    /**
     * @param  string $bestBefore Optional best before date
     * @return \jtl\Connector\Model\DeliveryNoteItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setBestBefore(Identity $bestBefore)
    {
        return $this->setProperty('BestBefore', $bestBefore, 'string');
    }

    /**
     * @return string Optional best before date
     */
    public function getBestBefore()
    {
        return $this->bestBefore;
    }

    /**
     * @param  double $quantity Quantity delivered
     * @return \jtl\Connector\Model\DeliveryNoteItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setQuantity(Identity $quantity)
    {
        return $this->setProperty('Quantity', $quantity, 'double');
    }

    /**
     * @return double Quantity delivered
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param  string $serialNumber Optional serial number
     * @return \jtl\Connector\Model\DeliveryNoteItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSerialNumber(Identity $serialNumber)
    {
        return $this->setProperty('SerialNumber', $serialNumber, 'string');
    }

    /**
     * @return string Optional serial number
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

 
}
