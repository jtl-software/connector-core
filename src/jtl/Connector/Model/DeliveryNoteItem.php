<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Delivery note item properties..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class DeliveryNoteItem extends DataModel
{
    /**
     * @var Identity Reference to customerOrderItem
     */
    protected $customerOrderItemId = null;

    /**
     * @var Identity Reference to deliveryNote
     */
    protected $deliveryNoteId = null;

    /**
     * @var Identity Unique deliveryNoteItem id
     */
    protected $id = null;

    /**
     * @var Identity Optional reference to warehouse
     */
    protected $warehouseId = null;

    /**
     * @var string Optional batch number
     */
    protected $batchNumber = '';

    /**
     * @var string Optional best before date
     */
    protected $bestBefore = '';

    /**
     * @var double Quantity delivered
     */
    protected $quantity = 0.0;

    /**
     * @var string Optional serial number
     */
    protected $serialNumber = '';

    /**
     * @param  Identity $customerOrderItemId Reference to customerOrderItem
     * @return \jtl\Connector\Model\DeliveryNoteItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderItemId(Identity $customerOrderItemId)
    {
        return $this->setProperty('customerOrderItemId', $customerOrderItemId, 'Identity');
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
     * @param  Identity $id Unique deliveryNoteItem id
     * @return \jtl\Connector\Model\DeliveryNoteItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setWarehouseId(Identity $warehouseId)
    {
        return $this->setProperty('warehouseId', $warehouseId, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setBatchNumber($batchNumber)
    {
        return $this->setProperty('batchNumber', $batchNumber, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setBestBefore($bestBefore)
    {
        return $this->setProperty('bestBefore', $bestBefore, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setQuantity($quantity)
    {
        return $this->setProperty('quantity', $quantity, 'double');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setSerialNumber($serialNumber)
    {
        return $this->setProperty('serialNumber', $serialNumber, 'string');
    }

    /**
     * @return string Optional serial number
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

 
}
