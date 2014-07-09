<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

/**
 * Localized Unit Name
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class UnitI18n extends DataModel
{
    /**
     * @var Identity Unit id
     */
    protected $_unitId = null;
    
    /**
     * @var string Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string Localized unit name
     */
    protected $_name = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_unitId'
    );
    
    /**
     * UnitI18n Setter
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
                case "_unitId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_localeName":
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $unitId Unit id
     * @return \jtl\Connector\Model\UnitI18n
     */
    public function setUnitId(Identity $unitId)
    {
        $this->_unitId = $unitId;
        return $this;
    }
    
    /**
     * @return Identity Unit id
     */
    public function getUnitId()
    {
        return $this->_unitId;
    }
    /**
     * @param string $localeName Locale
     * @return \jtl\Connector\Model\UnitI18n
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
     * @param string $name Localized unit name
     * @return \jtl\Connector\Model\UnitI18n
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Localized unit name
     */
    public function getName()
    {
        return $this->_name;
    }
}