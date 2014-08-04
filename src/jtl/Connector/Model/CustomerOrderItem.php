<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Order item in customer order..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CustomerOrderItem extends DataModel
{
    /**
     * @type Identity Optional reference to configItemId (if item is part of a configurable item)
     */
    protected $configItemId = null;

    /**
     * @type Identity Reference to customerOrder
     */
    protected $customerOrderId = null;

    /**
     * @type Identity Unique customerOrderItem id
     */
    protected $id = null;

    /**
     * @type Identity Reference to product
     */
    protected $productId = null;

    /**
     * @type Identity Reference to shippingClass
     */
    protected $shippingClassId = null;

    /**
     * @type string Order item name
     */
    protected $name = '';

    /**
     * @type double Price (net)
     */
    protected $price = 0.0;

    /**
     * @type int Quantity purchased
     */
    protected $quantity = 0;

    /**
     * @type string Stock keeping Unit (unique item identifier)
     */
    protected $sku = '';

    /**
     * @type string Item type e.g. "product" or "shipping"
     */
    protected $type = '';

    /**
     * @type string Optional unique Hashsum (if item is part of configurable item
     */
    protected $unique = '';

    /**
     * @type double Value added tax
     */
    protected $vat = 0.0;

    /**
     * @type \jtl\Connector\Model\CustomerOrderItemVariation[]
     */
    protected $variations = array();

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'configItemId',
        'customerOrderId',
        'id',
        'productId',
        'shippingClassId',
    );

    /**
     * @param  Identity $configItemId Optional reference to configItemId (if item is part of a configurable item)
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigItemId(Identity $configItemId)
    {
        return $this->setProperty('ConfigItemId', $configItemId, 'Identity');
    }

    /**
     * @return Identity Optional reference to configItemId (if item is part of a configurable item)
     */
    public function getConfigItemId()
    {
        return $this->configItemId;
    }

    /**
     * @param  Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\CustomerOrderItem
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
     * @param  Identity $id Unique customerOrderItem id
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique customerOrderItem id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('ProductId', $productId, 'Identity');
    }

    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  Identity $shippingClassId Reference to shippingClass
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingClassId(Identity $shippingClassId)
    {
        return $this->setProperty('ShippingClassId', $shippingClassId, 'Identity');
    }

    /**
     * @return Identity Reference to shippingClass
     */
    public function getShippingClassId()
    {
        return $this->shippingClassId;
    }

    /**
     * @param  string $name Order item name
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Order item name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  double $price Price (net)
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPrice(Identity $price)
    {
        return $this->setProperty('Price', $price, 'double');
    }

    /**
     * @return double Price (net)
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param  int $quantity Quantity purchased
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setQuantity(Identity $quantity)
    {
        return $this->setProperty('Quantity', $quantity, 'int');
    }

    /**
     * @return int Quantity purchased
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param  string $sku Stock keeping Unit (unique item identifier)
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSku(Identity $sku)
    {
        return $this->setProperty('Sku', $sku, 'string');
    }

    /**
     * @return string Stock keeping Unit (unique item identifier)
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param  string $type Item type e.g. "product" or "shipping"
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setType(Identity $type)
    {
        return $this->setProperty('Type', $type, 'string');
    }

    /**
     * @return string Item type e.g. "product" or "shipping"
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param  string $unique Optional unique Hashsum (if item is part of configurable item
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setUnique(Identity $unique)
    {
        return $this->setProperty('Unique', $unique, 'string');
    }

    /**
     * @return string Optional unique Hashsum (if item is part of configurable item
     */
    public function getUnique()
    {
        return $this->unique;
    }

    /**
     * @param  double $vat Value added tax
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setVat(Identity $vat)
    {
        return $this->setProperty('Vat', $vat, 'double');
    }

    /**
     * @return double Value added tax
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderItemVariation $variations
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function addVariation(\jtl\Connector\Model\CustomerOrderItemVariation $variation)
    {
        $this->variations[] = $variation;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CustomerOrderItemVariation[]
     */
    public function getVariations()
    {
        return $this->variations;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function clearVariations()
    {
        $this->variations = array();
        return $this;
    }
 
}
