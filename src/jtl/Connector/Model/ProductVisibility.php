<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVisibility Model
 * @access public
 */
abstract class ProductVisibility extends DataModel
{
    /**
     * @var int
     */
    protected $_customerGroupId;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * ProductVisibility Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_customerGroupId":
            case "_productId":
            
                $this->$name = (int)$value;
                break;
        
        }
    }
    
    /**
     * ProductVisibility Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>