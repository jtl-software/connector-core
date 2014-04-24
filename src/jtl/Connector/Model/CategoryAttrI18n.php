<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Category
 */

namespace jtl\Connector\Model;

/**
 * Localized key-value-pair for categoryAttr. All properties must be specified. 
 *
 * @access public
 * @subpackage Category
 */
class CategoryAttrI18n extends DataModel
{
    /**
     * @var string Locale
     */
    protected $_localeName = '';
    
    /**
     * @var Identity Reference to categoryAttr
     */
    protected $_categoryAttrId = null;
    
    /**
     * @var string Attribute key
     */
    protected $_key = '';
    
    /**
     * @var string Attribute value
     */
    protected $_value = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_categoryAttrId'
    );
    
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
                case "_key":
                case "_value":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_categoryAttrId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
            }
        }
    }
    
    /**
     * @param string $localeName Locale
     * @return \jtl\Connector\Model\CategoryAttrI18n
     */
    public function setLocaleName($localeName)
    {
        $this->_localeName = (string)$localeName;
        return $this;
    }
    
    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->_localeName;
    }
    /**
     * @param Identity $categoryAttrId Reference to categoryAttr
     * @return \jtl\Connector\Model\CategoryAttrI18n
     */
    public function setCategoryAttrId(Identity $categoryAttrId)
    {
        $this->_categoryAttrId = $categoryAttrId;
        return $this;
    }
    
    /**
     * @return Identity Reference to categoryAttr
     */
    public function getCategoryAttrId()
    {
        return $this->_categoryAttrId;
    }
    /**
     * @param string $key Attribute key
     * @return \jtl\Connector\Model\CategoryAttrI18n
     */
    public function setKey($key)
    {
        $this->_key = (string)$key;
        return $this;
    }
    
    /**
     * @return string Attribute key
     */
    public function getKey()
    {
        return $this->_key;
    }
    /**
     * @param string $value Attribute value
     * @return \jtl\Connector\Model\CategoryAttrI18n
     */
    public function setValue($value)
    {
        $this->_value = (string)$value;
        return $this;
    }
    
    /**
     * @return string Attribute value
     */
    public function getValue()
    {
        return $this->_value;
    }
}