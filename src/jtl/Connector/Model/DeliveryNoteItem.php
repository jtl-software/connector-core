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
 * 
 * @Serializer\AccessType("public_method")
 */
class DeliveryNoteItem extends DataModel
{
    /**
     * @var Identity Unique deliveryNoteItem id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var string Optional batch number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("batchNumber")
     * @Serializer\Accessor(getter="getBatchNumber",setter="setBatchNumber")
     */
    protected $batchNumber = '';

    /**
     * @var DateTime Optional best before date
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("bestBefore")
     * @Serializer\Accessor(getter="getBestBefore",setter="setBestBefore")
     */
    protected $bestBefore = null;

    /**
     * @var int Reference to customerOrderItem
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("customerOrderItemId")
     * @Serializer\Accessor(getter="getCustomerOrderItemId",setter="setCustomerOrderItemId")
     */
    protected $customerOrderItemId = 0;

    /**
     * @var int Reference to deliveryNote
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("deliveryNoteId")
     * @Serializer\Accessor(getter="getDeliveryNoteId",setter="setDeliveryNoteId")
     */
    protected $deliveryNoteId = 0;

    /**
     * @var double Quantity delivered
     * @Serializer\Type("double")
     * @Serializer\SerializedName("quantity")
     * @Serializer\Accessor(getter="getQuantity",setter="setQuantity")
     */
    protected $quantity = 0.0;

    /**
     * @var string Optional serial number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("serialNumber")
     * @Serializer\Accessor(getter="getSerialNumber",setter="setSerialNumber")
     */
    protected $serialNumber = '';

    /**
     * @var int Optional reference to warehouse
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("warehouseId")
     * @Serializer\Accessor(getter="getWarehouseId",setter="setWarehouseId")
     */
    protected $warehouseId = 0;


    public function __construct()
    {
        $this->id = new Identity;
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
    public function setBestBefore(DateTime $bestBefore = null)
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
     * @param  int $customerOrderItemId Reference to customerOrderItem
     * @return \jtl\Connector\Model\DeliveryNoteItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setCustomerOrderItemId($customerOrderItemId)
    {
        return $this->setProperty('customerOrderItemId', $customerOrderItemId, 'int');
    }

    /**
     * @return int Reference to customerOrderItem
     */
    public function getCustomerOrderItemId()
    {
        return $this->customerOrderItemId;
    }

    /**
     * @param  int $deliveryNoteId Reference to deliveryNote
     * @return \jtl\Connector\Model\DeliveryNoteItem
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

    /**
     * @param  int $warehouseId Optional reference to warehouse
     * @return \jtl\Connector\Model\DeliveryNoteItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setWarehouseId($warehouseId)
    {
        return $this->setProperty('warehouseId', $warehouseId, 'int');
    }

    /**
     * @return int Optional reference to warehouse
     */
    public function getWarehouseId()
    {
        return $this->warehouseId;
    }

 
}
