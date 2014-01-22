<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CategoryAttrI18n Model
 * Localized key-value-pair for categoryAttr. All properties must be specified. 
 *
 * @access public
 */
class CategoryAttrI18n extends DataModel
{
    /**
     * @var string - Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string - Reference to categoryAttr
     */
    protected $_categoryAttrId = '';
    
    /**
     * @var string - Attribute key
     */
    protected $_key = '';
    
    /**
     * @var string - Attribute value
     */
    protected $_value = '';
    
    /**
     * CategoryAttrI18n Setter
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
                case "_categoryAttrId":
                case "_key":
                case "_value":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $localeName
     * @return \jtl\Connector\Model\CategoryAttrI18n
     */
    public function setLocaleName($localeName)
    {
        $this->_localeName = (string)$localeName;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLocaleName()
    {
        return $this->_localeName;
    }
    
    /**
     * @param string $categoryAttrId
     * @return \jtl\Connector\Model\CategoryAttrI18n
     */
    public function setCategoryAttrId($categoryAttrId)
    {
        $this->_categoryAttrId = (string)$categoryAttrId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCategoryAttrId()
    {
        return $this->_categoryAttrId;
    }
    
    /**
     * @param string $key
     * @return \jtl\Connector\Model\CategoryAttrI18n
     */
    public function setKey($key)
    {
        $this->_key = (string)$key;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getKey()
    {
        return $this->_key;
    }
    
    /**
     * @param string $value
     * @return \jtl\Connector\Model\CategoryAttrI18n
     */
    public function setValue($value)
    {
        $this->_value = (string)$value;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getValue()
    {
        return $this->_value;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}