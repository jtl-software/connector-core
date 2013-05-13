<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * SpecialPrice Model
 * @access public
 */
abstract class SpecialPrice extends DataModel
{
    /**
     * @var int
     */
    protected $_customerGroupId = 0;
    
    /**
     * @var int
     */
    protected $_productSpecialPriceId = 0;
    
    /**
     * @var double
     */
    protected $_priceNet;
    
    /**
     * SpecialPrice Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_customerGroupId":
            case "_productSpecialPriceId":
            
                $this->$name = (int)$value;
                break;
        
            case "_priceNet":
            
                $this->$name = (double)$value;
                break;
        
        }
    }
    
    /**
     * SpecialPrice Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>