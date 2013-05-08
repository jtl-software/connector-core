<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Warehouse Model
 * @access public
 */
abstract class Warehouse extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * Warehouse Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            
                $this->$name = (int)$value;
                break;
        
        }
    }
    
    /**
     * Warehouse Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>