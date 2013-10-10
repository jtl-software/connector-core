<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrderPosition Model
 * @access public
 */
class CustomerOrderPosition extends DataModel
{
    /**
     * @var string
     */
    protected $_id = "0";
    
    /**
     * @var string
     */
    protected $_productId = "0";
    
    /**
     * @var string
     */
    protected $_shippingClassId = "0";
    
    /**
     * @var string
     */
    protected $_customerOrderId = "0";
    
    /**
     * @var string
     */
    protected $_name = '';
    
    /**
     * @var string
     */
    protected $_sku = '';
    
    /**
     * @var double
     */
    protected $_price = 0.0;
    
    /**
     * @var double
     */
    protected $_vat = 0.0;
    
    /**
     * @var int
     */
    protected $_quantity = 0;
    
    /**
     * @var int
     */
    protected $_type = 0;
    
    /**
     * @var string
     */
    protected $_unique = '';
    
    /**
     * @var string
     */
    protected $_configItemId = "0";
    
    /**
     * CustomerOrderPosition Setter
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
                case "_unique":
                case "_configItemId":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_price":
                case "_vat":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_quantity":
                case "_type":
                
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