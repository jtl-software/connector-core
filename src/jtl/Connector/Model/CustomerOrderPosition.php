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
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var int
     */
    protected $_shippingClassId;
    
    /**
     * @var int
     */
    protected $_customerOrderId;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_sku;
    
    /**
     * @var double
     */
    protected $_singlePrice;
    
    /**
     * @var double
     */
    protected $_price;
    
    /**
     * @var double
     */
    protected $_vat;
    
    /**
     * @var int
     */
    protected $_quantity;
    
    /**
     * @var int
     */
    protected $_type;
    
    /**
     * @var string
     */
    protected $_unique;
    
    /**
     * @var int
     */
    protected $_configItemId;
    
    /**
     * CustomerOrderPosition Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if ($value === null) {
            $this->$name = null;
            return;
        }
        
        switch ($name) {
            case "_id":
            case "_productId":
            case "_shippingClassId":
            case "_customerOrderId":
            case "_quantity":
            case "_type":
            case "_configItemId":
            
                if (is_numeric($value)) {
                    $this->$name = (int)$value;                
                }
                break;
        
            case "_name":
            case "_sku":
            case "_unique":
            
                if (strlen(trim($value)) > 0) {
                    $this->$name = (string)$value;
                }
                break;
        
            case "_singlePrice":
            case "_price":
            case "_vat":
            
                if (is_numeric($value)) {
                    $this->$name = (double)$value;                
                }
                break;
        
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