<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ConfigItemPrice Model
 * @access public
 */
class ConfigItemPrice extends DataModel
{
    /**
     * @var int
     */
    protected $_configItemId;
    
    /**
     * @var int
     */
    protected $_customerGroupId;
    
    /**
     * @var int
     */
    protected $_taxClassId;
    
    /**
     * @var float
     */
    protected $_price;
    
    /**
     * @var int
     */
    protected $_type;
    
    /**
     * ConfigItemPrice Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if ($value === null) {
            $this->$name = null;
            return;
        }
        
        switch ($name) {
            case "_configItemId":
            case "_customerGroupId":
            case "_taxClassId":
            case "_type":
            
                if (is_numeric($value)) {
                    $this->$name = (int)$value;                
                }
                break;
        
            case "_price":
            
                if (is_numeric($value)) {
                    $this->$name = (float)$value;
                }
                break;
        
        }
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
?>