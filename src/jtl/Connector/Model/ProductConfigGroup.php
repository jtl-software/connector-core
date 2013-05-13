<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductConfigGroup Model
 * @access public
 */
abstract class ProductConfigGroup extends DataModel
{
    /**
     * @var int
     */
    protected $_configGroupId = 0;
    
    /**
     * @var int
     */
    protected $_productId = 0;
    
    /**
     * @var int
     */
    protected $_sort = 0;
    
    /**
     * ProductConfigGroup Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_configGroupId":
            case "_productId":
            case "_sort":
            
                $this->$name = (int)$value;
                break;
        
        }
    }
    
    /**
     * ProductConfigGroup Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>