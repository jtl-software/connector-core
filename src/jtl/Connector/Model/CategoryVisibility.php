<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CategoryVisibility Model
 * @access public
 */
abstract class CategoryVisibility extends DataModel
{
    /**
     * @var int
     */
    protected $_customerGroupId;
    
    /**
     * @var int
     */
    protected $_categoryId;
    
    /**
     * CategoryVisibility Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_customerGroupId":
            case "_categoryId":
            
                $this->$name = (int)$value;
                break;
        
        }
    }
    
    /**
     * CategoryVisibility Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>