<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

/**
 * Localized Measurement Unit Name
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class MeasurementUnitI18n extends DataModel
{
    /**
     * @var Identity Reference to measurementUnitId
     */
    protected $_measurementUnitId = null;
    
    /**
     * @var string Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string Localized Name
     */
    protected $_name = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_measurementUnitId'
    );
    
    /**
     * MeasurementUnitI18n Setter
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
                case "_measurementUnitId":
                
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
     * @param Identity $measurementUnitId Reference to measurementUnitId
     * @return \jtl\Connector\Model\MeasurementUnitI18n
     */
    public function setMeasurementUnitId(Identity $measurementUnitId)
    {
        $this->_measurementUnitId = $measurementUnitId;
        return $this;
    }
    
    /**
     * @return Identity Reference to measurementUnitId
     */
    public function getMeasurementUnitId()
    {
        return $this->_measurementUnitId;
    }
    /**
     * @param string $localeName Locale
     * @return \jtl\Connector\Model\MeasurementUnitI18n
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
     * @param string $name Localized Name
     * @return \jtl\Connector\Model\MeasurementUnitI18n
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Localized Name
     */
    public function getName()
    {
        return $this->_name;
    }
}