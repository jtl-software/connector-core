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
 * Delivery note item properties..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage DeliveryNote
 */
class DeliveryNoteItem extends DataModel
{
    /**
     * @var Identity Reference to customerOrderItem
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $customerOrderItemId = null;

    /**
     * @var Identity Reference to deliveryNote
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $deliveryNoteId = null;

    /**
     * @var Identity Unique deliveryNoteItem id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $id = null;

    /**
     * @var Identity Optional reference to warehouse
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $warehouseId = null;

    /**
     * @var string Optional batch number
     * @Serializer\Type("string")
     */
    protected $batchNumber = '';

    /**
     * @var DateTime Optional best before date
     * @Serializer\Type("DateTime")
     */
    protected $bestBefore = null;

    /**
     * @var double Quantity delivered
     * @Serializer\Type("double")
     */
    protected $quantity = 0.0;

    /**
     * @var string Optional serial number
     * @Serializer\Type("string")
     */
    protected $serialNumber = '';


    public function __construct()
    {
        $this->customerOrderItemId = new Identity;
        $this->deliveryNoteId = new Identity;
        $this->id = new Identity;
        $this->warehouseId = new Identity;
    }

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
     * @param  DateTime $bestBefore Optional best before date
     * @return \jtl\Connector\Model\DeliveryNoteItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setBestBefore(DateTime $bestBefore)
    {
        return $this->setProperty('bestBefore', $bestBefore, 'DateTime');
    }

    /**
     * @return DateTime Optional best before date
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
