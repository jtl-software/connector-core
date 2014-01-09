<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Currency Model
 * Currency model properties.
 *
 * @access public
 */
class Currency extends DataModel
{
    /**
     * @var string - Unique currency id
     */
    protected $_id = '';
    
    /**
     * @var string - Currency name
     */
    protected $_name = '';
    
    /**
     * @var string - Currency ISO 4217 (3-letter Uppercase Code)
     */
    protected $_iso = '';
    
    /**
     * @var string - Optional HTML name e.g. "&euro;"
     */
    protected $_nameHtml = '';
    
    /**
     * @var double - Optional conversion factor to default currency. Default is 1 (equals default currency)
     */
    protected $_factor = 1;
    
    /**
     * @var bool - Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
     */
    protected $_isDefault = False;
    
    /**
     * @var bool - Optional: Display currency before or after value. Ignore this flag if you have the correct user locale preference. 
     */
    protected $_hasCurrencySignBeforeValue = False;
    
    /**
     * @var string - Optional delimiter char for cent, default=",". Ignore this flag if you have the correct user locale preference.
     */
    protected $_delimiterCent = ',';
    
    /**
     * @var string - Optional delimiter char for thousand. Default=".". Ignore this flag if you have the correct user locale preference.
     */
    protected $_delimiterThousand = '.';
    
    /**
     * Currency Setter
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
                case "_iso":
                case "_nameHtml":
                case "_delimiterCent":
                case "_delimiterThousand":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_factor":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_isDefault":
                case "_hasCurrencySignBeforeValue":
                
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