<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Product price properties.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductPrice extends AbstractIdentity
{
    /**
     * @var Identity Reference to customerGroup
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected $customerGroupId = null;
    
    /**
     * @var Identity Reference to customer
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerId")
     * @Serializer\Accessor(getter="getCustomerId",setter="setCustomerId")
     */
    protected $customerId = null;

    /**
     * @var Identity Reference to product
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;

    /**
     * @var ProductPriceItem[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductPriceItem>")
     * @Serializer\SerializedName("items")
     * @Serializer\AccessType("reflection")
     */
    protected $items = [];

    /**
     * Constructor.
     * @param string $endpoint
     * @param int $host
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        parent::__construct($endpoint, $host);
        $this->customerGroupId = new Identity();
        $this->productId = new Identity();
        $this->customerId = new Identity();
    }
    
    /**
     * @param Identity $customerGroupId Reference to customerGroup
     * @return ProductPrice
     */
    public function setCustomerGroupId(Identity $customerGroupId): ProductPrice
    {
        $this->customerGroupId = $customerGroupId;
        return $this;
    }
    
    /**
     * @return Identity Reference to customerGroup
     */
    public function getCustomerGroupId(): Identity
    {
        return $this->customerGroupId;
    }
    
    /**
     * @param Identity $customerId Reference to customer
     * @return ProductPrice
     */
    public function setCustomerId(Identity $customerId): ProductPrice
    {
        $this->customerId = $customerId;
        return $this;
    }
    
    /**
     * @return Identity Reference to customer
     */
    public function getCustomerId(): Identity
    {
        return $this->customerId;
    }

    /**
     * @param Identity $productId Reference to product
     * @return ProductPrice
     */
    public function setProductId(Identity $productId): ProductPrice
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
     * @param ProductPriceItem $item
     * @return ProductPrice
     */
    public function addItem(ProductPriceItem $item): ProductPrice
    {
        $this->items[] = $item;
        
        return $this;
    }

    /**
     * @param ProductPriceItem ...$items
     * @return ProductPrice
     */
    public function setItems(ProductPriceItem ...$items): ProductPrice
    {
        $this->items = $items;
        
        return $this;
    }
    
    /**
     * @return ProductPriceItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
    
    /**
     * @return ProductPrice
     */
    public function clearItems(): ProductPrice
    {
        $this->items = [];
        
        return $this;
    }
}
