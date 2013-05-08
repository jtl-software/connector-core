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
abstract class ProductSpecialPrice extends DataModel
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
     * @var string
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
     * @var int
     */
    protected $_quantityLimit;
    
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
            case "_quantityLimit":
            
                $this->$name = (int)$value;
                break;
        
            case "_isActive":
            case "_activeFrom":
            case "_activeUntil":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * ProductSpecialPrice Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>