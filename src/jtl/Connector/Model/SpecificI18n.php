<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * SpecificI18n Model
 * Localized name for specific.
 *
 * @access public
 */
class SpecificI18n extends DataModel
{
    /**
     * @var string - Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string - Reference to specific
     */
    protected $_specificId = '';
    
    /**
     * @var string - Localized name
     */
    protected $_name = '';
    
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
                case "_specificId":
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $localeName
     * @return \jtl\Connector\Model\SpecificI18n
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
     * @param string $specificId
     * @return \jtl\Connector\Model\SpecificI18n
     */
    public function setSpecificId($specificId)
    {
        $this->_specificId = (string)$specificId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSpecificId()
    {
        return $this->_specificId;
    }
    
    /**
     * @param string $name
     * @return \jtl\Connector\Model\SpecificI18n
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}