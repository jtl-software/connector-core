<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

/**
 * Localized config item name and description.
 *
 * @access public
 * @subpackage GlobalData
 */
class ConfigItemI18n extends DataModel
{
    /**
     * @var Identity Reference to configItem
     */
    protected $_configItemId = null;
    
    /**
     * @var string Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string Config item name. Will be ignored if inheritProductName==true
     */
    protected $_name = '';
    
    /**
     * @var string Description (html). Will be ignored, if inheritProductName==true
     */
    protected $_description = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_configItemId'
    );
    
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
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_localeName":
                case "_name":
                case "_description":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $configItemId Reference to configItem
     * @return \jtl\Connector\Model\ConfigItemI18n
     */
    public function setConfigItemId(Identity $configItemId)
    {
        $this->_configItemId = $configItemId;
        return $this;
    }
    
    /**
     * @return Identity Reference to configItem
     */
    public function getConfigItemId()
    {
        return $this->_configItemId;
    }
    /**
     * @param string $localeName Locale
     * @return \jtl\Connector\Model\ConfigItemI18n
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
     * @param string $name Config item name. Will be ignored if inheritProductName==true
     * @return \jtl\Connector\Model\ConfigItemI18n
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Config item name. Will be ignored if inheritProductName==true
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @param string $description Description (html). Will be ignored, if inheritProductName==true
     * @return \jtl\Connector\Model\ConfigItemI18n
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;
        return $this;
    }
    
    /**
     * @return string Description (html). Will be ignored, if inheritProductName==true
     */
    public function getDescription()
    {
        return $this->_description;
    }
}