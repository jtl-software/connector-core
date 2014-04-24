<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage CustomerOrder
 */

namespace jtl\Connector\Model;

/**
 * Order item in customer order.
 *
 * @access public
 * @subpackage CustomerOrder
 */
class CustomerOrderItem extends DataModel
{
    /**
     * @var Identity Unique customerOrderItem id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to product
     */
    protected $_productId = null;
    
    /**
     * @var Identity Reference to shippingClass
     */
    protected $_shippingClassId = null;
    
    /**
     * @var Identity Reference to customerOrder
     */
    protected $_customerOrderId = null;
    
    /**
     * @var string Order item name
     */
    protected $_name = '';
    
    /**
     * @var string Stock keeping Unit (unique item identifier)
     */
    protected $_sku = '';
    
    /**
     * @var double Price (net)
     */
    protected $_price = 0.0;
    
    /**
     * @var double Value added tax
     */
    protected $_vat = 0.0;
    
    /**
     * @var int Quantity purchased
     */
    protected $_quantity = 0;
    
    /**
     * @var string Item type e.g. "product" or "shipping"
     */
    protected $_type = '';
    
    /**
     * @var string Optional unique Hashsum (if item is part of configurable item
     */
    protected $_unique = '';
    
    /**
     * @var string Optional reference to configItemId (if item is part of a configurable item)
     */
    protected $_configItemId = '0';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id',
        '_productId',
        '_shippingClassId',
        '_customerOrderId'
    );
    
    /**
     * CustomerOrderItem Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_id":
                case "_productId":
                case "_shippingClassId":
                case "_customerOrderId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_name":
                case "_sku":
                case "_type":
                case "_unique":
                case "_configItemId":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_price":
                case "_vat":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_quantity":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique customerOrderItem id
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique customerOrderItem id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $productId Reference to product
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setProductId(Identity $productId)
    {
        $this->_productId = $productId;
        return $this;
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    /**
     * @param Identity $shippingClassId Reference to shippingClass
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setShippingClassId(Identity $shippingClassId)
    {
        $this->_shippingClassId = $shippingClassId;
        return $this;
    }
    
    /**
     * @return Identity Reference to shippingClass
     */
    public function getShippingClassId()
    {
        return $this->_shippingClassId;
    }
    /**
     * @param Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        $this->_customerOrderId = $customerOrderId;
        return $this;
    }
    
    /**
     * @return Identity Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->_customerOrderId;
    }
    /**
     * @param string $name Order item name
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Order item name
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @param string $sku Stock keeping Unit (unique item identifier)
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setSku($sku)
    {
        $this->_sku = (string)$sku;
        return $this;
    }
    
    /**
     * @return string Stock keeping Unit (unique item identifier)
     */
    public function getSku()
    {
        return $this->_sku;
    }
    /**
     * @param double $price Price (net)
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setPrice($price)
    {
        $this->_price = (double)$price;
        return $this;
    }
    
    /**
     * @return double Price (net)
     */
    public function getPrice()
    {
        return $this->_price;
    }
    /**
     * @param double $vat Value added tax
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setVat($vat)
    {
        $this->_vat = (double)$vat;
        return $this;
    }
    
    /**
     * @return double Value added tax
     */
    public function getVat()
    {
        return $this->_vat;
    }
    /**
     * @param int $quantity Quantity purchased
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setQuantity($quantity)
    {
        $this->_quantity = (int)$quantity;
        return $this;
    }
    
    /**
     * @return int Quantity purchased
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }
    /**
     * @param string $type Item type e.g. "product" or "shipping"
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setType($type)
    {
        $this->_type = (string)$type;
        return $this;
    }
    
    /**
     * @return string Item type e.g. "product" or "shipping"
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @param string $unique Optional unique Hashsum (if item is part of configurable item
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setUnique($unique)
    {
        $this->_unique = (string)$unique;
        return $this;
    }
    
    /**
     * @return string Optional unique Hashsum (if item is part of configurable item
     */
    public function getUnique()
    {
        return $this->_unique;
    }
    /**
     * @param string $configItemId Optional reference to configItemId (if item is part of a configurable item)
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setConfigItemId($configItemId)
    {
        $this->_configItemId = (string)$configItemId;
        return $this;
    }
    
    /**
     * @return string Optional reference to configItemId (if item is part of a configurable item)
     */
    public function getConfigItemId()
    {
        return $this->_configItemId;
    }
}