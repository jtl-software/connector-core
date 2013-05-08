<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * DeliveryStatus Model
 * @access public
 */
abstract class DeliveryStatus extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * DeliveryStatus Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_languageIso":
            
                $this->$name = (int)$value;
                break;
        
            case "_name":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * DeliveryStatus Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>