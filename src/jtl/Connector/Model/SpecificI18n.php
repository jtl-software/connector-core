<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Specific
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Localized name for specific.
 *
 * @access public
 * @subpackage Specific
 */
class SpecificI18n extends DataModel
{
    /**
     * @var string Locale
     */
    protected $_localeName = '';
    
    /**
     * @var Identity Reference to specific
     */
    protected $_specificId = null;
    
    /**
     * @var string Localized name
     */
    protected $_name = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_specificId'
    );
    
    /**
     * SpecificI18n Setter
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
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_specificId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
            }
        }
    }
    
    /**
     * @param string $localeName Locale
     * @return \jtl\Connector\Model\SpecificI18n
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
     * @param Identity $specificId Reference to specific
     * @return \jtl\Connector\Model\SpecificI18n
     */
    public function setSpecificId(Identity $specificId)
    {
        $this->_specificId = $specificId;
        return $this;
    }
    
    /**
     * @return Identity Reference to specific
     */
    public function getSpecificId()
    {
        return $this->_specificId;
    }
    /**
     * @param string $name Localized name
     * @return \jtl\Connector\Model\SpecificI18n
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Localized name
     */
    public function getName()
    {
        return $this->_name;
    }
}