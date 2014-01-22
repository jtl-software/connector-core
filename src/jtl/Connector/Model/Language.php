<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Language Model
 * Global language model
 *
 * @access public
 */
class Language extends DataModel
{
    /**
     * @var string Unique language id
     */
    protected $_id = '';
    
    /**
     * @var string English term
     */
    protected $_nameEnglish = '';
    
    /**
     * @var string German term
     */
    protected $_nameGerman = '';
    
    /**
     * @var string Locale
     */
    protected $_localeName = '';
    
    /**
     * @var bool Flag default language for frontend. Exact 1 language must be marked as default.
     */
    protected $_isDefault = false;
    
    /**
     * Language Setter
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
                case "_id":
                case "_nameEnglish":
                case "_nameGerman":
                case "_localeName":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_isDefault":
                
                    $this->$name = (bool)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique language id
     * @return \jtl\Connector\Model\Language
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique language id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $nameEnglish English term
     * @return \jtl\Connector\Model\Language
     */
    public function setNameEnglish($nameEnglish)
    {
        $this->_nameEnglish = (string)$nameEnglish;
        return $this;
    }
    
    /**
     * @return string English term
     */
    public function getNameEnglish()
    {
        return $this->_nameEnglish;
    }
    /**
     * @param string $nameGerman German term
     * @return \jtl\Connector\Model\Language
     */
    public function setNameGerman($nameGerman)
    {
        $this->_nameGerman = (string)$nameGerman;
        return $this;
    }
    
    /**
     * @return string German term
     */
    public function getNameGerman()
    {
        return $this->_nameGerman;
    }
    /**
     * @param string $localeName Locale
     * @return \jtl\Connector\Model\Language
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
     * @param bool $isDefault Flag default language for frontend. Exact 1 language must be marked as default.
     * @return \jtl\Connector\Model\Language
     */
    public function setIsDefault($isDefault)
    {
        $this->_isDefault = (bool)$isDefault;
        return $this;
    }
    
    /**
     * @return bool Flag default language for frontend. Exact 1 language must be marked as default.
     */
    public function getIsDefault()
    {
        return $this->_isDefault;
    }
}