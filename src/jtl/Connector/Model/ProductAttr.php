<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductAttr Model
 * @access public
 */
abstract class ProductAttr extends DataModel
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
    protected $_sort;
    
    /**
     * @var bool
     */
    protected $_isVisible;
    
    /**
     * ProductAttr Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_productId":
            case "_sort":
            
                $this->$name = (int)$value;
                break;
        
            case "_isVisible":
            
                $this->$name = (bool)$value;
                break;
        
        }
    }
    
    /**
     * ProductAttr Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>