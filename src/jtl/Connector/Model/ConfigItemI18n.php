<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ConfigItemI18n Model
 * Localized config item name and description.
 *
 * @access public
 */
class ConfigItemI18n extends DataModel
{
    /**
     * @var string - Reference to configItem
     */
    protected $_configItemId = '';
    
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
     * @param string $configItemId
     * @return \jtl\Connector\Model\ConfigItemI18n
     */
    public function setConfigItemId($configItemId)
    {
        $this->_configItemId = (string)$configItemId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getConfigItemId()
    {
        return $this->_configItemId;
    }
    
    /**
     * @param string $localeName
     * @return \jtl\Connector\Model\ConfigItemI18n
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
     * @param string $name
     * @return \jtl\Connector\Model\ConfigItemI18n
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param string $description
     * @return \jtl\Connector\Model\ConfigItemI18n
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}