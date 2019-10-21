<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class DeliveryNoteItem extends DataModel
{
    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerOrderItemId")
     * @Serializer\Accessor(getter="getCustomerOrderItemId",setter="setCustomerOrderItemId")
     */
    protected $customerOrderItemId = null;
    
    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("deliveryNoteId")
     * @Serializer\Accessor(getter="getDeliveryNoteId",setter="setDeliveryNoteId")
     */
    protected $deliveryNoteId = null;
    
    /**
     * @var Identity Reference to product
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;
    
    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("quantity")
     * @Serializer\Accessor(getter="getQuantity",setter="setQuantity")
     */
    protected $quantity = 0.0;
    
    /**
     * @var DeliveryNoteItemInfo[]
     * @Serializer\Type("array<jtl\Connector\Model\DeliveryNoteItemInfo>")
     * @Serializer\SerializedName("info")
     * @Serializer\AccessType("reflection")
     */
    protected $info = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->deliveryNoteId = new Identity();
        $this->productId = new Identity();
        $this->customerOrderItemId = new Identity();
    }
    
    /**
     * @param Identity $customerOrderItemId
     * @return DeliveryNoteItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderItemId(Identity $customerOrderItemId): DeliveryNoteItem
    {
        $this->customerOrderItemId = $customerOrderItemId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getCustomerOrderItemId(): Identity
    {
        return $this->customerOrderItemId;
    }
    
    /**
     * @param Identity $deliveryNoteId
     * @return DeliveryNoteItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDeliveryNoteId(Identity $deliveryNoteId): DeliveryNoteItem
    {
        $this->deliveryNoteId = $deliveryNoteId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getDeliveryNoteId(): Identity
    {
        return $this->deliveryNoteId;
    }
    
    /**
     * @param Identity $productId Reference to product
     * @return DeliveryNoteItem
     */
    public function setProductId(Identity $productId): DeliveryNoteItem
    {
        $this->productId = $productId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId(): Identity
    {
        return $this->productId;
    }
    
    /**
     * @param Identity $id
     * @return DeliveryNoteItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): DeliveryNoteItem
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param double $quantity
     * @return DeliveryNoteItem
     */
    public function setQuantity(float $quantity): DeliveryNoteItem
    {
        $this->quantity = $quantity;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }
    
    /**
     * @param DeliveryNoteItemInfo $info
     * @return DeliveryNoteItem
     */
    public function addInfo(DeliveryNoteItemInfo $info): DeliveryNoteItem
    {
        $this->info[] = $info;
        
        return $this;
    }
    
    /**
     * @param array $info
     * @return DeliveryNoteItem
     */
    public function setInfo(array $info): DeliveryNoteItem
    {
        $this->info = $info;
        
        return $this;
    }
    
    /**
     * @return DeliveryNoteItemInfo[]
     */
    public function getInfo(): array
    {
        return $this->info;
    }
    
    /**
     * @return DeliveryNoteItem
     */
    public function clearInfo(): DeliveryNoteItem
    {
        $this->info = [];
        
        return $this;
    }
}
