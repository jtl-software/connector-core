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
     * @type float|null 
     */
    protected $grossPrice = 0.0;

    /**
     * @type integer 
     */
    protected $kBestellStueckliste = 0;

    /**
     * @type string Order item name
     */
    protected $name = '';

    /**
     * @type float|null Price (net)
     */
    protected $price = 0.0;

    /**
     * @type float|null Quantity purchased
     */
    protected $quantity = 0.0;

    /**
     * @type string Stock keeping Unit (unique item identifier)
     */
    protected $sku = '';

    /**
     * @type integer 
     */
    protected $sort = 0;

    /**
     * @type string 
     */
    protected $type = '';

    /**
     * @type string Optional unique Hashsum (if item is part of configurable item
     */
    protected $unique = '';

    /**
     * @type float|null Value added tax
     */
    protected $vat = 0.0;

    /**
     * Nav [CustomerOrderItem » ZeroOrOne]
     *
     * @type \jtl\Connector\Model\CustomerOrderItemVariation[]
     */
    protected $variations = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'productId',
        'customerOrderId',
        'configItemId',
    );

    /**
     * @type array list of propertyInfo
     */
    protected $propertyInfos = array(
        'grossPrice' => 'float',
        'vat' => 'float',
        'quantity' => 'float',
        'price' => 'float',
        'sku' => 'string',
        'unique' => 'string',
        'sort' => 'integer',
        'name' => 'string',
        'kBestellStueckliste' => 'integer',
        'id' => '\jtl\Connector\Model\Identity',
        'productId' => '\jtl\Connector\Model\Identity',
        'customerOrderId' => '\jtl\Connector\Model\Identity',
        'configItemId' => '\jtl\Connector\Model\Identity',
        'variations' => '\jtl\Connector\Model\CustomerOrderItemVariation',
        'type' => 'string',
    );


    /**
     * @param  float $grossPrice 
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setGrossPrice($grossPrice)
    {
        return $this->setProperty('grossPrice', $grossPrice, 'float');
    }
    
    /**
     * @return float 
     */
    public function getGrossPrice()
    {
        return $this->grossPrice;
    }

    /**
     * @param  float $vat Value added tax
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setVat($vat)
    {
        return $this->setProperty('vat', $vat, 'float');
    }
    
    /**
     * @return float Value added tax
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @param  float $quantity Quantity purchased
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setQuantity($quantity)
    {
        return $this->setProperty('quantity', $quantity, 'float');
    }
    
    /**
     * @return float Quantity purchased
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param  float $price Price (net)
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setPrice($price)
    {
        return $this->setProperty('price', $price, 'float');
    }
    
    /**
     * @return float Price (net)
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param  string $sku Stock keeping Unit (unique item identifier)
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $unique Optional unique Hashsum (if item is part of configurable item
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  integer $sort 
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  string $name Order item name
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  integer $kBestellStueckliste 
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKBestellStueckliste($kBestellStueckliste)
    {
        return $this->setProperty('kBestellStueckliste', $kBestellStueckliste, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKBestellStueckliste()
    {
        return $this->kBestellStueckliste;
    }

    /**
     * @param  Identity $id Unique customerOrderItem id
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  Identity $configItemId Optional reference to configItemId (if item is part of a configurable item)
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  string $type 
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setType($type)
    {
        return $this->setProperty('type', $type, 'string');
    }
    
    /**
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderItemVariation $variation
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function addVariation(\jtl\Connector\Model\CustomerOrderItemVariation $variation)
    {
        $this->variations[] = $variation;
        return $this;
    }
    
    /**
     * @return CustomerOrderItemVariation
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

