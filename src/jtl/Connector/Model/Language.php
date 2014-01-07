<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Language Model
 * Global language model
 *
 * @access public
 */
class Language extends DataModel
{
    /**
     * @var string - Unique language id
     */
    protected $_id = '';
    
    /**
     * @var string - English term
     */
    protected $_nameEnglish = '';
    
    /**
     * @var string - German term
     */
    protected $_nameGerman = '';
    
    /**
     * @var string - Locale
     */
    protected $_localeName = '';
    
    /**
     * @var bool - Flag default language for frontend. Exact 1 language must be marked as default.
     */
    protected $_isDefault = false;
    
    /**
     * Language Setter
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
                case "_nameEnglish":
                case "_nameGerman":
                case "_localeName":
                
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