<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerGroup Model
 * Customer group model.
 *
 * @access public
 */
class CustomerGroup extends DataModel
{
    /**
     * @var string - Unique customerGroup id
     */
    protected $_id = '';
    
    /**
     * @var string - Customer group name
     */
    protected $_name = '';
    
    /**
     * @var double - Optional percentual discount on all products. Negative Value means surcharge. 
     */
    protected $_discount = 0;
    
    /**
     * @var bool - Optional: Flag default customer group
     */
    protected $_isDefault = false;
    
    /**
     * @var bool - Optional: Show net prices default instead of gross prices
     */
    protected $_applyNetPrice = false;
    
    /**
     * CustomerGroup Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_id":
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_discount":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_isDefault":
                case "_applyNetPrice":
                
                    $this->$name = (bool)$value;
                    break;
            
            }
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