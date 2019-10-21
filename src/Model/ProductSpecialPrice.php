<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Special product price properties to specify date and stock limits.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductSpecialPrice extends DataModel
{
    /**
     * @var Identity Unique productSpecialPrice id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var Identity Reference to product
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;
    
    /**
     * @var DateTime Optional: Activate special price from date
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("activeFromDate")
     * @Serializer\Accessor(getter="getActiveFromDate",setter="setActiveFromDate")
     */
    protected $activeFromDate = null;
    
    /**
     * @var DateTime Optional: Special price active until date
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("activeUntilDate")
     * @Serializer\Accessor(getter="getActiveUntilDate",setter="setActiveUntilDate")
     */
    protected $activeUntilDate = null;
    
    /**
     * @var boolean Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("considerDateLimit")
     * @Serializer\Accessor(getter="getConsiderDateLimit",setter="setConsiderDateLimit")
     */
    protected $considerDateLimit = false;
    
    /**
     * @var boolean Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("considerStockLimit")
     * @Serializer\Accessor(getter="getConsiderStockLimit",setter="setConsiderStockLimit")
     */
    protected $considerStockLimit = false;
    
    /**
     * @var boolean Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isActive")
     * @Serializer\Accessor(getter="getIsActive",setter="setIsActive")
     */
    protected $isActive = false;
    
    /**
     * @var integer Optional: SpecialPrice active until stock level quantity
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("stockLimit")
     * @Serializer\Accessor(getter="getStockLimit",setter="setStockLimit")
     */
    protected $stockLimit = 0;
    
    /**
     * @var ProductSpecialPriceItem[]
     * @Serializer\Type("array<jtl\Connector\Model\ProductSpecialPriceItem>")
     * @Serializer\SerializedName("items")
     * @Serializer\AccessType("reflection")
     */
    protected $items = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->productId = new Identity();
    }
    
    /**
     * @param Identity $id Unique productSpecialPrice id
     * @return ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): ProductSpecialPrice
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique productSpecialPrice id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param Identity $productId Reference to product
     * @return ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId): ProductSpecialPrice
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
     * @param DateTime $activeFromDate Optional: Activate special price from date
     * @return ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setActiveFromDate(DateTime $activeFromDate = null): ProductSpecialPrice
    {
        $this->activeFromDate = $activeFromDate;
        
        return $this;
    }
    
    /**
     * @return DateTime Optional: Activate special price from date
     */
    public function getActiveFromDate(): ?DateTime
    {
        return $this->activeFromDate;
    }
    
    /**
     * @param DateTime $activeUntilDate Optional: Special price active until date
     * @return ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setActiveUntilDate(DateTime $activeUntilDate = null): ProductSpecialPrice
    {
        $this->activeUntilDate = $activeUntilDate;
        
        return $this;
    }
    
    /**
     * @return DateTime Optional: Special price active until date
     */
    public function getActiveUntilDate(): ?DateTime
    {
        return $this->activeUntilDate;
    }
    
    /**
     * @param boolean $considerDateLimit Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     * @return ProductSpecialPrice
     */
    public function setConsiderDateLimit(bool $considerDateLimit): ProductSpecialPrice
    {
        $this->considerDateLimit = $considerDateLimit;
        
        return $this;
    }
    
    /**
     * @return boolean Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     */
    public function getConsiderDateLimit(): bool
    {
        return $this->considerDateLimit;
    }
    
    /**
     * @param boolean $considerStockLimit Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     * @return ProductSpecialPrice
     */
    public function setConsiderStockLimit(bool $considerStockLimit): ProductSpecialPrice
    {
        $this->considerStockLimit = $considerStockLimit;
        
        return $this;
    }
    
    /**
     * @return boolean Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     */
    public function getConsiderStockLimit(): bool
    {
        return $this->considerStockLimit;
    }
    
    /**
     * @param boolean $isActive Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match.
     * @return ProductSpecialPrice
     */
    public function setIsActive(bool $isActive): ProductSpecialPrice
    {
        $this->isActive = $isActive;
        
        return $this;
    }
    
    /**
     * @return boolean Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match.
     */
    public function getIsActive(): bool
    {
        return $this->isActive;
    }
    
    /**
     * @param integer $stockLimit Optional: SpecialPrice active until stock level quantity
     * @return ProductSpecialPrice
     */
    public function setStockLimit(int $stockLimit): ProductSpecialPrice
    {
        $this->stockLimit = $stockLimit;
        
        return $this;
    }
    
    /**
     * @return integer Optional: SpecialPrice active until stock level quantity
     */
    public function getStockLimit(): int
    {
        return $this->stockLimit;
    }
    
    /**
     * @param ProductSpecialPriceItem $item
     * @return ProductSpecialPrice
     */
    public function addItem(ProductSpecialPriceItem $item): ProductSpecialPrice
    {
        $this->items[] = $item;
        
        return $this;
    }
    
    /**
     * @param array $items
     * @return ProductSpecialPrice
     */
    public function setItems(array $items): ProductSpecialPrice
    {
        $this->items = $items;
        
        return $this;
    }
    
    /**
     * @return ProductSpecialPriceItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
    
    /**
     * @return ProductSpecialPrice
     */
    public function clearItems(): ProductSpecialPrice
    {
        $this->items = [];
        
        return $this;
    }
}
