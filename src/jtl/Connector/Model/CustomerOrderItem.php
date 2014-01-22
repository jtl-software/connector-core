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
     * @var string - Unique customerOrderItem id
     */
    protected $_id = '';
    
    /**
     * @var string - Reference to product
     */
    protected $_productId = '';
    
    /**
     * @var string - Reference to shippingClass
     */
    protected $_shippingClassId = '';
    
    /**
     * @var string - Reference to customerOrder
     */
    protected $_customerOrderId = '';
    
    /**
     * @var string - Order item name
     */
    protected $_name = '';
    
    /**
     * @var string - Stock keeping Unit (unique item identifier)
     */
    protected $_sku = '';
    
    /**
     * @var double - Price (net)
     */
    protected $_price = 0.0;
    
    /**
     * @var double - Value added tax
     */
    protected $_vat = 0.0;
    
    /**
     * @var int - Quantity purchased
     */
    protected $_quantity = 0;
    
    /**
     * @var string - Item type e.g. "product" or "shipping"
     */
    protected $_type = '';
    
    /**
     * @var string - Optional unique Hashsum (if item is part of configurable item
     */
    protected $_unique = '';
    
    /**
     * @var string - Optional reference to configItemId (if item is part of a configurable item)
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
     * @param string $id
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $productId
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setProductId($productId)
    {
        $this->_productId = (string)$productId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    
    /**
     * @param string $shippingClassId
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setShippingClassId($shippingClassId)
    {
        $this->_shippingClassId = (string)$shippingClassId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getShippingClassId()
    {
        return $this->_shippingClassId;
    }
    
    /**
     * @param string $customerOrderId
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setCustomerOrderId($customerOrderId)
    {
        $this->_customerOrderId = (string)$customerOrderId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerOrderId()
    {
        return $this->_customerOrderId;
    }
    
    /**
     * @param string $name
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param string $sku
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setSku($sku)
    {
        $this->_sku = (string)$sku;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSku()
    {
        return $this->_sku;
    }
    
    /**
     * @param double $price
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setPrice($price)
    {
        $this->_price = (double)$price;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getPrice()
    {
        return $this->_price;
    }
    
    /**
     * @param double $vat
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setVat($vat)
    {
        $this->_vat = (double)$vat;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getVat()
    {
        return $this->_vat;
    }
    
    /**
     * @param int $quantity
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setQuantity($quantity)
    {
        $this->_quantity = (int)$quantity;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }
    
    /**
     * @param string $type
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setType($type)
    {
        $this->_type = (string)$type;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }
    
    /**
     * @param string $unique
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setUnique($unique)
    {
        $this->_unique = (string)$unique;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getUnique()
    {
        return $this->_unique;
    }
    
    /**
     * @param string $configItemId
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function setConfigItemId($configItemId)
    {
        $this->_configItemId = (string)$configItemId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getConfigItemId()
    {
        return $this->_configItemId;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}