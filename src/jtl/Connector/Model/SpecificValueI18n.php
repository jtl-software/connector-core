<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Specific
 */

namespace jtl\Connector\Model;

/**
 * Localized specific value text.
 *
 * @access public
 * @subpackage Specific
 */
class SpecificValueI18n extends DataModel
{
    /**
     * @var string locale
     */
    protected $_localeName = '';
    
    /**
     * @var Identity Reference to specificValue
     */
    protected $_specificValueId = null;
    
    /**
     * @var string Localized value
     */
    protected $_value = '';
    
    /**
     * @var string Optional localized URL path
     */
    protected $_urlPath = '';
    
    /**
     * @var string Optional localized description
     */
    protected $_description = '';
    
    /**
     * @var string Optional localized meta description value
     */
    protected $_metaDescription = '';
    
    /**
     * @var string Optional localized meta keywords value
     */
    protected $_metaKeywords = '';
    
    /**
     * @var string Optional localized title tag value
     */
    protected $_titleTag = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_specificValueId'
    );
    
    /**
     * SpecificValueI18n Setter
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
                case "_value":
                case "_urlPath":
                case "_description":
                case "_metaDescription":
                case "_metaKeywords":
                case "_titleTag":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_specificValueId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
            }
        }
    }
    
    /**
     * @param string $localeName locale
     * @return \jtl\Connector\Model\SpecificValueI18n
     */
    public function setLocaleName($localeName)
    {
        $this->_localeName = (string)$localeName;
        return $this;
    }
    
    /**
     * @return string locale
     */
    public function getLocaleName()
    {
        return $this->_localeName;
    }
    /**
     * @param Identity $specificValueId Reference to specificValue
     * @return \jtl\Connector\Model\SpecificValueI18n
     */
    public function setSpecificValueId(Identity $specificValueId)
    {
        $this->_specificValueId = $specificValueId;
        return $this;
    }
    
    /**
     * @return Identity Reference to specificValue
     */
    public function getSpecificValueId()
    {
        return $this->_specificValueId;
    }
    /**
     * @param string $value Localized value
     * @return \jtl\Connector\Model\SpecificValueI18n
     */
    public function setValue($value)
    {
        $this->_value = (string)$value;
        return $this;
    }
    
    /**
     * @return string Localized value
     */
    public function getValue()
    {
        return $this->_value;
    }
    /**
     * @param string $urlPath Optional localized URL path
     * @return \jtl\Connector\Model\SpecificValueI18n
     */
    public function setUrlPath($urlPath)
    {
        $this->_urlPath = (string)$urlPath;
        return $this;
    }
    
    /**
     * @return string Optional localized URL path
     */
    public function getUrlPath()
    {
        return $this->_urlPath;
    }
    /**
     * @param string $description Optional localized description
     * @return \jtl\Connector\Model\SpecificValueI18n
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;
        return $this;
    }
    
    /**
     * @return string Optional localized description
     */
    public function getDescription()
    {
        return $this->_description;
    }
    /**
     * @param string $metaDescription Optional localized meta description value
     * @return \jtl\Connector\Model\SpecificValueI18n
     */
    public function setMetaDescription($metaDescription)
    {
        $this->_metaDescription = (string)$metaDescription;
        return $this;
    }
    
    /**
     * @return string Optional localized meta description value
     */
    public function getMetaDescription()
    {
        return $this->_metaDescription;
    }
    /**
     * @param string $metaKeywords Optional localized meta keywords value
     * @return \jtl\Connector\Model\SpecificValueI18n
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->_metaKeywords = (string)$metaKeywords;
        return $this;
    }
    
    /**
     * @return string Optional localized meta keywords value
     */
    public function getMetaKeywords()
    {
        return $this->_metaKeywords;
    }
    /**
     * @param string $titleTag Optional localized title tag value
     * @return \jtl\Connector\Model\SpecificValueI18n
     */
    public function setTitleTag($titleTag)
    {
        $this->_titleTag = (string)$titleTag;
        return $this;
    }
    
    /**
     * @return string Optional localized title tag value
     */
    public function getTitleTag()
    {
        return $this->_titleTag;
    }
}