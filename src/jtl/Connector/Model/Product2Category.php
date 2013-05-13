<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Product2Category Model
 * @access public
 */
abstract class Product2Category extends DataModel
{
    /**
     * @var int
     */
    protected $_id = 0;
    
    /**
     * @var int
     */
    protected $_categoryId;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * Product2Category Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_categoryId":
            case "_productId":
            
                $this->$name = (int)$value;
                break;
        
        }
    }
    
    /**
     * Product2Category Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>