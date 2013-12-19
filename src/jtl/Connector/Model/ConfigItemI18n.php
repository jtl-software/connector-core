<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ConfigItemI18n Model
 * Localized config item name and description

 *
 * @access public
 */
class ConfigItemI18n extends DataModel
{
    /**
     * @var string - Reference to configItem
     */
    protected $_configItemId = "0";
    
    /**
     * @var string - Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string - Config item name. Will be ignored if inheritProductName==true
     */
    protected $_name = '';
    
    /**
     * @var string - Description (html). Will be ignored, if inheritProductName==true
     */
    protected $_description = '';
    
    /**
     * ConfigItemI18n Setter
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
                case "_configItemId":
                case "_localeName":
                case "_name":
                case "_description":
                
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