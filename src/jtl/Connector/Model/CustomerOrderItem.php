<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrderItem Model
 * Order item in customer order.
 *
 * @access public
 */
class CustomerOrderItem extends DataModel
{
    /**
     * @var string Unique customerOrderItem id
     */
    protected $_id = '';
    
    /**
     * @var string Reference to product
     */
    protected $_productId = '';
    
    /**
     * @var string Reference to shippingClass
     */
    protected $_shippingClassId = '';
    
    /**
     * @var string Reference to customerOrder
     */
    protected $_customerOrderId = '';
    
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
     * @param string $id Unique customerOrderItem id
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique customerOrderItem id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $productId Reference to product
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setProductId($productId)
    {
        $this->_productId = (string)$productId;
        return $this;
    }
    
    /**
     * @return string Reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    /**
     * @param string $shippingClassId Reference to shippingClass
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setShippingClassId($shippingClassId)
    {
        $this->_shippingClassId = (string)$shippingClassId;
        return $this;
    }
    
    /**
     * @return string Reference to shippingClass
     */
    public function getShippingClassId()
    {
        return $this->_shippingClassId;
    }
    /**
     * @param string $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setCustomerOrderId($customerOrderId)
    {
        $this->_customerOrderId = (string)$customerOrderId;
        return $this;
    }
    
    /**
     * @return string Reference to customerOrder
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