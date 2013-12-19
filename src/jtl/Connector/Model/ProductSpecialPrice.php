<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductSpecialPrice Model
 * 
 *
 * @access public
 */
class ProductSpecialPrice extends DataModel
{
    /**
     * @var string - Unique productSpecialPrice id
     */
    protected $_id = "0";
    
    /**
     * @var string - Reference to product
     */
    protected $_productId = "0";
    
    /**
     * @var bool - Special price is active?
     */
    protected $_isActive = false;
    
    /**
     * @var string - Activate special price from date
     */
    protected $_activeFrom = '';
    
    /**
     * @var string - Special price active until date
     */
    protected $_activeUntil = '';
    
    /**
     * @var double - SpecialPrice active until stock level quantity
     */
    protected $_stockLimit = 0.0;
    
    /**
     * @var bool - Consider stockLimit value
     */
    protected $_considerStockLimit = false;
    
    /**
     * @var bool - Consider activeFrom/activeUntil date range
     */
    protected $_considerDateLimit = false;
    
    /**
     * ProductSpecialPrice Setter
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
                case "_activeFrom":
                case "_activeUntil":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_isActive":
                case "_considerStockLimit":
                case "_considerDateLimit":
                
                    $this->$name = (bool)$value;
                    break;
            
                case "_stockLimit":
                
                    $this->$name = (double)$value;
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