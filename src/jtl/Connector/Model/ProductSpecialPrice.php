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
     * @var string
     */
    protected $_id = '';
    
    /**
     * @var string
     */
    protected $_productId = '';
    
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
     * @var string
     */
    protected $_considerQuantityLimit = '';
    
    /**
     * @var string
     */
    protected $_considerDateLimit = '';
    
    /**
     * ProductSpecialPrice Setter
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
            case "_activeFrom":
            case "_activeUntil":
            case "_considerQuantityLimit":
            case "_considerDateLimit":
            
                $this->$name = (string)$value;
                break;
        
            case "_isActive":
            
                $this->$name = (bool)$value;
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