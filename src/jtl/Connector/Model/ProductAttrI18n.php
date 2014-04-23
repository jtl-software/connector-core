<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Localized key-value-pair for productAttr.
 *
 * @access public
 * @subpackage Product
 */
class ProductAttrI18n extends DataModel
{
    /**
     * @var string Locale
     */
    protected $_localeName = '';
    
    /**
     * @var Identity Reference to productAttr
     */
    protected $_productAttrId = null;
    
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
        'productAttrId'
    );
    
    /**
     * ProductAttrI18n Setter
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
            
                case "_productAttrId":
                
                    $this->$name = Identity::convert();
                    break;
            
            }
        }
    }
    
    /**
     * @param string $localeName Locale
     * @return \jtl\Connector\Model\ProductAttrI18n
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
     * @param Identity $productAttrId Reference to productAttr
     * @return \jtl\Connector\Model\ProductAttrI18n
     */
    public function setProductAttrId(Identity $productAttrId)
    {
        $this->_productAttrId = $productAttrId;
        return $this;
    }
    
    /**
     * @return Identity Reference to productAttr
     */
    public function getProductAttrId()
    {
        return $this->_productAttrId;
    }
    /**
     * @param string $key Attribute key
     * @return \jtl\Connector\Model\ProductAttrI18n
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
     * @return \jtl\Connector\Model\ProductAttrI18n
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