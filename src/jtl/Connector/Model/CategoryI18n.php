<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CategoryI18n Model
 * Locale dependent text content for category
 * @access public
 */
class CategoryI18n extends DataModel
{
    /**
     * @var string Locale name
     */
    protected $_localeName = '';
    
    /**
     * @var string Category id
     */
    protected $_categoryId = "0";
    
    /**
     * @var string Categoryname
     */
    protected $_name = '';
    
    /**
     * @var string Category URL
     */
    protected $_url = '';
    
    /**
     * @var string Category description
     */
    protected $_description = '';
    
    /**
     * @var string Category meta description
     */
    protected $_metaDescription = '';
    
    /**
     * @var string Category meta keywords
     */
    protected $_metaKeywords = '';
    
    /**
     * @var string Category title tag value
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
                case "_url":
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