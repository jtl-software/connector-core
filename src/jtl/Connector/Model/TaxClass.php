<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * TaxClass Model
 * Tax class model (set in JTL-Wawi ERP)
 *
 * @access public
 */
class TaxClass extends DataModel
{
    /**
     * @var string - Unique taxClass id
     */
    protected $_id = "0";
    
    /**
     * @var string - Tax class name
     */
    protected $_name = '';
    
    /**
     * @var bool - Flag default tax class
     */
    protected $_isDefault = false;
    
    /**
     * TaxClass Setter
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
            
                case "_isDefault":
                
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