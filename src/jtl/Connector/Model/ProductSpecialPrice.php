<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductSpecialPrice Model
 * @access public
 */
class ProductSpecialPrice extends DataModel
{
    /**
     * @var int
     */
    protected $_id = 0;
    
    /**
     * @var int
     */
    protected $_productId = 0;
    
    /**
     * @var bool
     */
    protected $_isActive;
    
    /**
     * @var string
     */
    protected $_activeFrom;
    
    /**
     * @var string
     */
    protected $_activeUntil;
    
    /**
     * @var double
     */
    protected $_quantityLimit;
    
    /**
     * @var bool
     */
    protected $_considerQuantityLimit;
    
    /**
     * @var bool
     */
    protected $_considerDateLimit;
    
    /**
     * ProductSpecialPrice Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_productId":
            
                $this->$name = (int)$value;
                break;
        
            case "_isActive":
            case "_considerQuantityLimit":
            case "_considerDateLimit":
            
                $this->$name = (bool)$value;
                break;
        
            case "_activeFrom":
            case "_activeUntil":
            
                $this->$name = (string)$value;
                break;
        
            case "_quantityLimit":
            
                $this->$name = (double)$value;
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