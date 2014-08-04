<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Order item in customer order..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CustomerOrderItem extends DataModel
{
    /**
     * @var Identity Optional reference to configItemId (if item is part of a configurable item)
     */
    protected $configItemId = null;

    /**
     * @var Identity Reference to customerOrder
     */
    protected $customerOrderId = null;

    /**
     * @var Identity Unique customerOrderItem id
     */
    protected $id = null;

    /**
     * @var Identity Reference to product
     */
    protected $productId = null;

    /**
     * @var Identity Reference to shippingClass
     */
    protected $shippingClassId = null;

    /**
     * @var string Order item name
     */
    protected $name = '';

    /**
     * @var double Price (net)
     */
    protected $price = 0.0;

    /**
     * @var int Quantity purchased
     */
    protected $quantity = 0;

    /**
     * @var string Stock keeping Unit (unique item identifier)
     */
    protected $sku = '';

    /**
     * @var string Item type e.g. "product" or "shipping"
     */
    protected $type = '';

    /**
     * @var string Optional unique Hashsum (if item is part of configurable item
     */
    protected $unique = '';

    /**
     * @var double Value added tax
     */
    protected $vat = 0.0;

    /**
     * @var \jtl\Connector\Model\CustomerOrderItemVariation[]
     */
    protected $variations = array();

    /**
     * @param  Identity $configItemId Optional reference to configItemId (if item is part of a configurable item)
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigItemId(Identity $configItemId)
    {
        return $this->setProperty('configItemId', $configItemId, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        return $this->setProperty('customerOrderId', $customerOrderId, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
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
     * @param  Identity $shippingClassId Reference to shippingClass
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingClassId(Identity $shippingClassId)
    {
        return $this->setProperty('shippingClassId', $shippingClassId, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setPrice($price)
    {
        return $this->setProperty('price', $price, 'double');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setQuantity($quantity)
    {
        return $this->setProperty('quantity', $quantity, 'int');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setSku($sku)
    {
        return $this->setProperty('sku', $sku, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setType($type)
    {
        return $this->setProperty('type', $type, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUnique($unique)
    {
        return $this->setProperty('unique', $unique, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setVat($vat)
    {
        return $this->setProperty('vat', $vat, 'double');
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
