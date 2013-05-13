<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * SpecificValue Model
 * @access public
 */
abstract class SpecificValue extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_specificId;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * SpecificValue Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_specificId":
            case "_sort":
            
                $this->$name = (int)$value;
                break;
        
        }
    }
    
    /**
     * SpecificValue Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>