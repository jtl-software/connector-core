<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductSpecialPrice Model
 * Special product price properties to specify date and stock limits.
 *
 * @access public
 */
class ProductSpecialPrice extends DataModel
{
    /**
     * @var string - Unique productSpecialPrice id
     */
    protected $_id = '';
    
    /**
     * @var string - Reference to product
     */
    protected $_productId = '';
    
    /**
     * @var bool - Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
     */
    protected $_isActive = true;
    
    /**
     * @var string - Optional: Activate special price from date
     */
    protected $_activeFrom = null;
    
    /**
     * @var string - Optional: Special price active until date
     */
    protected $_activeUntil = null;
    
    /**
     * @var double - Optional: SpecialPrice active until stock level quantity
     */
    protected $_stockLimit = 0;
    
    /**
     * @var bool - Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     */
    protected $_considerStockLimit = false;
    
    /**
     * @var bool - Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
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