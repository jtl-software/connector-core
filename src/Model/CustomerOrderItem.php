<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Order item in customer order.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerOrderItem extends AbstractIdentity
{
    /**
     * @var string - Discount
     */
    const TYPE_DISCOUNT = 'discount';
    
    /**
     * @var string - Product
     */
    const TYPE_PRODUCT = 'product';
    
    /**
     * @var string - Shipping
     */
    const TYPE_SHIPPING = 'shipping';
    
    /**
     * @var string - Surcharge
     */
    const TYPE_SURCHARGE = 'surcharge';
    
    /**
     * @var string - Coupon
     */
    const TYPE_COUPON = 'coupon';
    
    /**
     * @var Identity Optional reference to configItemId (if item is part of a configurable item)
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("configItemId")
     * @Serializer\Accessor(getter="getConfigItemId",setter="setConfigItemId")
     */
    protected $configItemId = null;

    /**
     * @var Identity Reference to product
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;
    
    /**
     * @var string Order item name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';
    
    /**
     * @var double Price (net)
     * @Serializer\Type("double")
     * @Serializer\SerializedName("price")
     * @Serializer\Accessor(getter="getPrice",setter="setPrice")
     */
    protected $price = 0.0;
    
    /**
     * @var double Price (gross)
     * @Serializer\Type("double")
     * @Serializer\SerializedName("priceGross")
     * @Serializer\Accessor(getter="getPriceGross",setter="setPriceGross")
     */
    protected $priceGross = 0.0;
    
    /**
     * @var double Quantity purchased
     * @Serializer\Type("double")
     * @Serializer\SerializedName("quantity")
     * @Serializer\Accessor(getter="getQuantity",setter="setQuantity")
     */
    protected $quantity = 0.0;
    
    /**
     * @var string Stock keeping Unit (unique item identifier)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("sku")
     * @Serializer\Accessor(getter="getSku",setter="setSku")
     */
    protected $sku = '';
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     * @Serializer\Accessor(getter="getType",setter="setType")
     */
    protected $type = '';
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("note")
     * @Serializer\Accessor(getter="getNote",setter="setNote")
     */
    protected $note = '';
    
    /**
     * @var string Optional unique Hashsum (if item is part of configurable item
     * @Serializer\Type("string")
     * @Serializer\SerializedName("unique")
     * @Serializer\Accessor(getter="getUnique",setter="setUnique")
     */
    protected $unique = '';
    
    /**
     * @var double Value added tax
     * @Serializer\Type("double")
     * @Serializer\SerializedName("vat")
     * @Serializer\Accessor(getter="getVat",setter="setVat")
     */
    protected $vat = 0.0;
    
    /**
     * @var CustomerOrderItemVariation[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CustomerOrderItemVariation>")
     * @Serializer\SerializedName("variations")
     * @Serializer\AccessType("reflection")
     */
    protected $variations = [];

    /**
     * Constructor.
     * @param string $endpoint
     * @param int $host
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        parent::__construct($endpoint, $host);
        $this->productId = new Identity();
        $this->configItemId = new Identity();
    }
    
    /**
     * @param Identity $configItemId Optional reference to configItemId (if item is part of a configurable item)
     * @return CustomerOrderItem
     */
    public function setConfigItemId(Identity $configItemId): CustomerOrderItem
    {
        $this->configItemId = $configItemId;
        
        return $this;
    }
    
    /**
     * @return Identity Optional reference to configItemId (if item is part of a configurable item)
     */
    public function getConfigItemId(): Identity
    {
        return $this->configItemId;
    }

    /**
     * @param Identity $productId Reference to product
     * @return CustomerOrderItem
     */
    public function setProductId(Identity $productId): CustomerOrderItem
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
     * @param string $name Order item name
     * @return CustomerOrderItem
     */
    public function setName(string $name): CustomerOrderItem
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Order item name
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @param double $price Price (net)
     * @return CustomerOrderItem
     */
    public function setPrice(float $price): CustomerOrderItem
    {
        $this->price = $price;
        
        return $this;
    }
    
    /**
     * @return double Price (net)
     */
    public function getPrice(): float
    {
        return $this->price;
    }
    
    /**
     * @param double $priceGross Price (gross)
     * @return CustomerOrderItem
     */
    public function setPriceGross(float $priceGross): CustomerOrderItem
    {
        $this->priceGross = $priceGross;
        
        return $this;
    }
    
    /**
     * @return double PriceGross (gross)
     */
    public function getPriceGross(): float
    {
        return $this->priceGross;
    }
    
    /**
     * @param double $quantity Quantity purchased
     * @return CustomerOrderItem
     */
    public function setQuantity(float $quantity): CustomerOrderItem
    {
        $this->quantity = $quantity;
        
        return $this;
    }
    
    /**
     * @return double Quantity purchased
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }
    
    /**
     * @param string $sku Stock keeping Unit (unique item identifier)
     * @return CustomerOrderItem
     */
    public function setSku(string $sku): CustomerOrderItem
    {
        $this->sku = $sku;
        
        return $this;
    }
    
    /**
     * @return string Stock keeping Unit (unique item identifier)
     */
    public function getSku(): string
    {
        return $this->sku;
    }
    
    /**
     * @param string $type
     * @return CustomerOrderItem
     */
    public function setType(string $type): CustomerOrderItem
    {
        $this->type = $type;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    
    /**
     * @param string $note
     * @return CustomerOrderItem
     */
    public function setNote(string $note): CustomerOrderItem
    {
        $this->note = $note;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }
    
    /**
     * @param string $unique Optional unique Hashsum (if item is part of configurable item
     * @return CustomerOrderItem
     */
    public function setUnique(string $unique): CustomerOrderItem
    {
        $this->unique = $unique;
        
        return $this;
    }
    
    /**
     * @return string Optional unique Hashsum (if item is part of configurable item
     */
    public function getUnique(): string
    {
        return $this->unique;
    }
    
    /**
     * @param double $vat Value added tax
     * @return CustomerOrderItem
     */
    public function setVat(float $vat): CustomerOrderItem
    {
        $this->vat = $vat;
        
        return $this;
    }
    
    /**
     * @return double Value added tax
     */
    public function getVat(): float
    {
        return $this->vat;
    }
    
    /**
     * @param CustomerOrderItemVariation $variation
     * @return CustomerOrderItem
     */
    public function addVariation(CustomerOrderItemVariation $variation): CustomerOrderItem
    {
        $this->variations[] = $variation;
        
        return $this;
    }

    /**
     * @param CustomerOrderItemVariation ...$variations
     * @return CustomerOrderItem
     */
    public function setVariations(CustomerOrderItemVariation ...$variations): CustomerOrderItem
    {
        $this->variations = $variations;
        
        return $this;
    }
    
    /**
     * @return CustomerOrderItemVariation[]
     */
    public function getVariations(): array
    {
        return $this->variations;
    }
    
    /**
     * @return CustomerOrderItem
     */
    public function clearVariations(): CustomerOrderItem
    {
        $this->variations = [];
        
        return $this;
    }
}
