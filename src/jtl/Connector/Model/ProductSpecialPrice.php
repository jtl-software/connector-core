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
     * @var string
     */
    protected $_id = "0";
    
    /**
     * @var string
     */
    protected $_productId = "0";
    
    /**
     * @var bool
     */
    protected $_isActive = false;
    
    /**
     * @var string
     */
    protected $_activeFrom = '';
    
    /**
     * @var string
     */
    protected $_activeUntil = '';
    
    /**
     * @var double
     */
    protected $_quantityLimit = 0.0;
    
    /**
     * @var bool
     */
    protected $_considerQuantityLimit = false;
    
    /**
     * @var bool
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
                case "_considerQuantityLimit":
                case "_considerDateLimit":
                
                    $this->$name = (bool)$value;
                    break;
            
                case "_quantityLimit":
                
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