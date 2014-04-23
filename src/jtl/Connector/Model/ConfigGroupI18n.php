<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Localized configGroup
 *
 * @access public
 * @subpackage GlobalData
 */
class ConfigGroupI18n extends DataModel
{
    /**
     * @var Identity Reference to configGroup
     */
    protected $_configGroupId = null;
    
    /**
     * @var string Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string Config group name
     */
    protected $_name = '';
    
    /**
     * @var string Optional description (HTML)
     */
    protected $_description = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_configGroupId'
    );
    
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
     * @param Identity $configGroupId Reference to configGroup
     * @return \jtl\Connector\Model\ConfigGroupI18n
     */
    public function setConfigGroupId(Identity $configGroupId)
    {
        $this->_configGroupId = $configGroupId;
        return $this;
    }
    
    /**
     * @return Identity Reference to configGroup
     */
    public function getConfigGroupId()
    {
        return $this->_configGroupId;
    }
    /**
     * @param string $localeName Locale
     * @return \jtl\Connector\Model\ConfigGroupI18n
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
     * @param string $name Config group name
     * @return \jtl\Connector\Model\ConfigGroupI18n
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Config group name
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @param string $description Optional description (HTML)
     * @return \jtl\Connector\Model\ConfigGroupI18n
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;
        return $this;
    }
    
    /**
     * @return string Optional description (HTML)
     */
    public function getDescription()
    {
        return $this->_description;
    }
}