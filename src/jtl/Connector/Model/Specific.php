<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Specific Model
 * Specific model.
Specific is defined as a characteristic product attribute Like "color". 
Specifics can be used for after-search-filtering. 
 *
 * @access public
 */
class Specific extends DataModel
{
    /**
     * @var string - Unique specific id
     */
    protected $_id = "0";
    
    /**
     * @var int - Sort number
     */
    protected $_sort = 0;
    
    /**
     * @var bool - Global specific means the specific can be used like a category (e.g. show all red products in shop)
     */
    protected $_isGlobal = false;
    
    /**
     * @var string - Specific type (radio, dropdown, image...)
     */
    protected $_type = '';
    
    /**
     * Specific Setter
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
                case "_type":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
                case "_isGlobal":
                
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