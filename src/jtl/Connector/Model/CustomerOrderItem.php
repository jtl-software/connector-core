<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrderItem Model
 * Order item in customer order
 *
 * @access public
 */
class CustomerOrderItem extends DataModel
{
    /**
     * @var string - Unique customerOrderItem id
     */
    protected $_id = "0";
    
    /**
     * @var string - Reference to product
     */
    protected $_productId = "0";
    
    /**
     * @var string - Reference to shippingClass
     */
    protected $_shippingClassId = "0";
    
    /**
     * @var string - Reference to customerOrder
     */
    protected $_customerOrderId = "0";
    
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
     * @var string - Unique Hashsum (if item is part of configurable item
     */
    protected $_unique = '';
    
    /**
     * @var string - References configItemId (if item is part of a configurable item)
     */
    protected $_configItemId = "0";
    
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
?>