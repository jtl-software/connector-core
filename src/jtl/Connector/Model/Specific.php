<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Specific Model
 * @access public
 */
abstract class Specific extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @var int
     */
    protected $_global;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_type;
    
    /**
     * Specific Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_sort":
            case "_global":
            
                $this->$name = (int)$value;
                break;
        
            case "_name":
            case "_type":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * Specific Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>