<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Warehousei18n Model
 * @access public
 */
abstract class Warehousei18n extends DataModel
{
    /**
     * @var int
     */
    protected $_id = 0;
    
    /**
     * @var string
     */
    protected $_name = "0";
    
    /**
     * Warehousei18n Setter
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
        
            case "_name":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * Warehousei18n Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>