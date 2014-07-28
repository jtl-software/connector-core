<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Order item in customer order..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerOrderItem extends DataModel
{
    /**
     * @type Identity Optional reference to configItemId (if item is part of a configurable item)
     */
    public $_configItemId = null;

    /**
     * @type Identity Reference to customerOrder
     */
    public $_customerOrderId = null;

    /**
     * @type Identity Unique customerOrderItem id
     */
    public $_id = null;

    /**
     * @type Identity Reference to product
     */
    public $_productId = null;

    /**
     * @type float|null 
     */
    public $_grossPrice = 0.0;

    /**
     * @type integer 
     */
    public $_kBestellStueckliste = 0;

    /**
     * @type string Order item name
     */
    public $_name = '';

    /**
     * @type float|null Price (net)
     */
    public $_price = 0.0;

    /**
     * @type float|null Quantity purchased
     */
    public $_quantity = 0.0;

    /**
     * @type string Stock keeping Unit (unique item identifier)
     */
    public $_sku = '';

    /**
     * @type integer 
     */
    public $_sort = 0;

    /**
     * @type string 
     */
    public $_type = '';

    /**
     * @type string Optional unique Hashsum (if item is part of configurable item
     */
    public $_unique = '';

    /**
     * @type float|null Value added tax
     */
    public $_vat = 0.0;

    /**
     * Nav [CustomerOrderItem » ZeroOrOne]
     *
     * @type \jtl\Connector\Model\CustomerOrderItemVariation[]
     */
    public $_variations = array();


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_productId',
        '_customerOrderId',
        '_configItemId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
        '_variations' => '\jtl\Connector\Model\CustomerOrderItemVariation',
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  float $grossPrice 
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setGrossPrice($grossPrice)
    {
        return $this->setProperty('_grossPrice', $grossPrice, 'float');
    }
    
    /**
     * @return float 
     */
    public function getGrossPrice()
    {
        return $this->_grossPrice;
    }

    /**
     * @param  float $vat Value added tax
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setVat($vat)
    {
        return $this->setProperty('_vat', $vat, 'float');
    }
    
    /**
     * @return float Value added tax
     */
    public function getVat()
    {
        return $this->_vat;
    }

    /**
     * @param  float $quantity Quantity purchased
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setQuantity($quantity)
    {
        return $this->setProperty('_quantity', $quantity, 'float');
    }
    
    /**
     * @return float Quantity purchased
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }

    /**
     * @param  float $price Price (net)
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setPrice($price)
    {
        return $this->setProperty('_price', $price, 'float');
    }
    
    /**
     * @return float Price (net)
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * @param  string $sku Stock keeping Unit (unique item identifier)
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setSku($sku)
    {
        return $this->setProperty('_sku', $sku, 'string');
    }
    
    /**
     * @return string Stock keeping Unit (unique item identifier)
     */
    public function getSku()
    {
        return $this->_sku;
    }

    /**
     * @param  string $unique Optional unique Hashsum (if item is part of configurable item
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUnique($unique)
    {
        return $this->setProperty('_unique', $unique, 'string');
    }
    
    /**
     * @return string Optional unique Hashsum (if item is part of configurable item
     */
    public function getUnique()
    {
        return $this->_unique;
    }

    /**
     * @param  integer $sort 
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('_sort', $sort, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getSort()
    {
        return $this->_sort;
    }

    /**
     * @param  string $name Order item name
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('_name', $name, 'string');
    }
    
    /**
     * @return string Order item name
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param  integer $kBestellStueckliste 
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKBestellStueckliste($kBestellStueckliste)
    {
        return $this->setProperty('_kBestellStueckliste', $kBestellStueckliste, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKBestellStueckliste()
    {
        return $this->_kBestellStueckliste;
    }

    /**
     * @param  Identity $id Unique customerOrderItem id
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique customerOrderItem id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('_productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }

    /**
     * @param  Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        return $this->setProperty('_customerOrderId', $customerOrderId, 'Identity');
    }
    
    /**
     * @return Identity Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->_customerOrderId;
    }

    /**
     * @param  Identity $configItemId Optional reference to configItemId (if item is part of a configurable item)
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigItemId(Identity $configItemId)
    {
        return $this->setProperty('_configItemId', $configItemId, 'Identity');
    }
    
    /**
     * @return Identity Optional reference to configItemId (if item is part of a configurable item)
     */
    public function getConfigItemId()
    {
        return $this->_configItemId;
    }

    /**
     * @param  string $type 
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setType($type)
    {
        return $this->setProperty('_type', $type, 'string');
    }
    
    /**
     * @return string 
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderItemVariation $variation
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function addVariation(\jtl\Connector\Model\CustomerOrderItemVariation $variation)
    {
        $this->_variations[] = $variation;
        return $this;
    }
    
    /**
     * @return CustomerOrderItemVariation
     */
    public function getVariations()
    {
        return $this->_variations;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function clearVariations()
    {
        $this->_variations = array();
        return $this;
    }
}

