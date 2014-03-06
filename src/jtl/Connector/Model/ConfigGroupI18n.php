<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ConfigGroupI18n Model
 * Localized configGroup
 *
 * @access public
 */
class ConfigGroupI18n extends DataModel
{
    /**
     * @var string - Reference to configGroup
     */
    protected $_configGroupId = '';
    
    /**
     * @var string - Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string - Config group name
     */
    protected $_name = '';
    
    /**
     * @var string - Optional description (HTML)
     */
    protected $_description = '';
    
    /**
     * ConfigGroupI18n Setter
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
                case "_configGroupId":
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