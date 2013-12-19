<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ManufacturerI18n Model
 * Locale specific Text and meta-information for manufacturer
 *
 * @access public
 */
class ManufacturerI18n extends DataModel
{
    /**
     * @var string - Reference to manufacturer
     */
    protected $_manufacturerId = "0";
    
    /**
     * @var string - Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string - Manufacturer description (HTML)
     */
    protected $_description = '';
    
    /**
     * @var string - Meta description tag value
     */
    protected $_metaDescription = '';
    
    /**
     * @var string - Meta keywords tag value
     */
    protected $_metaKeywords = '';
    
    /**
     * @var string - Title tag value
     */
    protected $_titleTag = '';
    
    /**
     * ManufacturerI18n Setter
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
                case "_manufacturerId":
                case "_localeName":
                case "_description":
                case "_metaDescription":
                case "_metaKeywords":
                case "_titleTag":
                
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