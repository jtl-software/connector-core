<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Product price properties.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 *
 * @Serializer\AccessType("public_method")
 */
class ProductPrice extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected $customerGroupId = null;

    /**
     * @var Identity Reference to customer
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerId")
     * @Serializer\Accessor(getter="getCustomerId",setter="setCustomerId")
     */
    protected $customerId = null;

    /**
     * @var Identity Unique ProductPrice id
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
     * @var string Optional stock keeping unit identifier
     * @Serializer\Type("string")
     * @Serializer\SerializedName("sku")
     * @Serializer\Accessor(getter="getSku",setter="setSku")
     */
    protected $sku = '';

    /**
     * @var double
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("double")
     * @Serializer\SerializedName("vat")
     * @Serializer\Accessor(getter="getVat",setter="setVat")
     */
    protected $vat = null;

    /**
     * @var Identity Tax class id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("taxClassId")
     * @Serializer\Accessor(getter="getTaxClassId",setter="setTaxClassId")
     */
    protected $taxClassId = null;

    /**
     * @var ProductPriceItem[]
     * @Serializer\Type("array<jtl\Connector\Model\ProductPriceItem>")
     * @Serializer\SerializedName("items")
     * @Serializer\AccessType("reflection")
     */
    protected $items = [];

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customerGroupId = new Identity();
        $this->id = new Identity();
        $this->productId = new Identity();
        $this->customerId = new Identity();
        $this->taxClassId = new Identity();
    }

    /**
     * @param Identity $customerGroupId Reference to customerGroup
     * @return ProductPrice
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('customerGroupId', $customerGroupId, 'Identity');
    }

    /**
     * @return Identity Reference to customerGroup
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }

    /**
     * @param Identity $customerId Reference to customer
     * @return ProductPrice
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId)
    {
        return $this->setProperty('customerId', $customerId, 'Identity');
    }

    /**
     * @return Identity Reference to customer
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param Identity $id Unique ProductPrice id
     * @return ProductPrice
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique ProductPrice id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Identity $productId Reference to product
     * @return ProductPrice
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }

    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     * @return $this
     */
    public function setSku(string $sku): ProductPrice
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getVat(): ?float
    {
        return $this->vat;
    }

    /**
     * @param float|null $vat
     * @return $this
     */
    public function setVat(?float $vat): ProductPrice
    {
        $this->vat = $vat;
        return $this;
    }

    /**
     * @return Identity
     */
    public function getTaxClassId(): ?Identity
    {
        return $this->taxClassId;
    }

    /**
     * @param Identity $taxClassId
     * @return ProductPrice
     */
    public function setTaxClassId(Identity $taxClassId): ProductPrice
    {
        $this->taxClassId = $taxClassId;
        return $this;
    }

    /**
     * @param ProductPriceItem $item
     * @return ProductPrice
     */
    public function addItem(ProductPriceItem $item)
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * @param array $items
     * @return ProductPrice
     */
    public function setItems(array $items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return ProductPriceItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return ProductPrice
     */
    public function clearItems()
    {
        $this->items = [];
        return $this;
    }

    /**
     * @param array|string[] $publics
     * @return stdClass|\stdClass
     */
    public function getPublic(array $publics = ['fields', 'isEncrypted', 'identities', '_type'])
    {
        $publics[] = 'vat';
        $publics[] = 'sku';

        return parent::getPublic($publics);
    }
}
