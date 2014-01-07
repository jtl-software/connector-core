<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CategoryI18n Model
 * Localized category properties. localeName, categoryId and a localized name must be set. 
 *
 * @access public
 */
class CategoryI18n extends DataModel
{
    /**
     * @var string - Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string - Reference to category
     */
    protected $_categoryId = '';
    
    /**
     * @var string - Localized category name
     */
    protected $_name = '';
    
    /**
     * @var string - Optional localized category URL
     */
    protected $_urlPath = '';
    
    /**
     * @var string - Optional localized Long Description
     */
    protected $_description = '';
    
    /**
     * @var string - Optional localized  short description used for meta tag description
     */
    protected $_metaDescription = '';
    
    /**
     * @var string - Optional localized meta tag keywords value
     */
    protected $_metaKeywords = '';
    
    /**
     * @var string - Optional localized title tag value
     */
    protected $_titleTag = '';
    
    /**
     * CategoryI18n Setter
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
                case "_categoryId":
                case "_name":
                case "_urlPath":
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