<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * TaxRate Model
 * @access public
 */
abstract class TaxRate extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_taxZoneId;
    
    /**
     * @var int
     */
    protected $_taxClassId;
    
    /**
     * @var double
     */
    protected $_taxRate;
    
    /**
     * @var int
     */
    protected $_priority;
    
    /**
     * TaxRate Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_taxZoneId":
            case "_taxClassId":
            case "_priority":
            
                $this->$name = (int)$value;
                break;
        
            case "_taxRate":
            
                $this->$name = (double)$value;
                break;
        
        }
    }
    
    /**
     * TaxRate Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>