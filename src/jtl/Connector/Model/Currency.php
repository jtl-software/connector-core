<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Currency Model
 * Holds currency data
 *
 * @access public
 */
class Currency extends DataModel
{
    /**
     * @var string - Unique id
     */
    protected $_id = "0";
    
    /**
     * @var string - Currency name
     */
    protected $_name = '';
    
    /**
     * @var string - Currency ISO 4217 (3-letter Uppercase Code)
     */
    protected $_iso = '';
    
    /**
     * @var string - Html name e.g. "&euro;"
     */
    protected $_nameHtml = '';
    
    /**
     * @var double - Conversion factor to default currency
     */
    protected $_factor = 0.0;
    
    /**
     * @var bool - Default currency
     */
    protected $_isDefault = False;
    
    /**
     * @var bool - Display currency before or after value. Ignore this flag if you have the correct user locale preference. 
     */
    protected $_hasCurrencySignBeforeValue = False;
    
    /**
     * @var string - Delimiter char for cent, default=",". Ignore this flag if you have the correct user locale preference.
     */
    protected $_delimiterCent = ",";
    
    /**
     * @var string - Delimiter char for thousand. Default=".". Ignore this flag if you have the correct user locale preference.
     */
    protected $_delimiterThousand = ".";
    
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