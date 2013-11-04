<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerGroupI18n Model
 * Locale specific translation for customer group name
 *
 * @access public
 */
class CustomerGroupI18n extends DataModel
{
    /**
     * @var string - Locale name
     */
    protected $_localeName = '';
    
    /**
     * @var string - References the customer group
     */
    protected $_customerGroupId = "0";
    
    /**
     * @var string - Locale specific customer group name
     */
    protected $_name = '';
    
    /**
     * CustomerGroupI18n Setter
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
                case "_localeName":
                case "_customerGroupId":
                case "_name":
                
                    $this->$name = (string)$value;
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