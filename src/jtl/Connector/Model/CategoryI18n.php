<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Category
 */

namespace jtl\Connector\Model;

/**
 * Localized category properties. localeName, categoryId and a localized name must be set. 
 *
 * @access public
 * @subpackage Category
 */
class CategoryI18n extends DataModel
{
    /**
     * @var string Locale
     */
    protected $_localeName = '';
    
    /**
     * @var Identity Reference to category
     */
    protected $_categoryId = null;
    
    /**
     * @var string Localized category name
     */
    protected $_name = '';
    
    /**
     * @var string Optional localized category URL
     */
    protected $_urlPath = '';
    
    /**
     * @var string Optional localized Long Description
     */
    protected $_description = '';
    
    /**
     * @var string Optional localized  short description used for meta tag description
     */
    protected $_metaDescription = '';
    
    /**
     * @var string Optional localized meta tag keywords value
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
        '_categoryId'
    );
    
    /**
     * CategoryI18n Setter
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
                case "_urlPath":
                case "_description":
                case "_metaDescription":
                case "_metaKeywords":
                case "_titleTag":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_categoryId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
            }
        }
    }
    
    /**
     * @param string $localeName Locale
     * @return \jtl\Connector\Model\CategoryI18n
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
     * @param Identity $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setCategoryId(Identity $categoryId)
    {
        $this->_categoryId = $categoryId;
        return $this;
    }
    
    /**
     * @return Identity Reference to category
     */
    public function getCategoryId()
    {
        return $this->_categoryId;
    }
    /**
     * @param string $name Localized category name
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Localized category name
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @param string $urlPath Optional localized category URL
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setUrlPath($urlPath)
    {
        $this->_urlPath = (string)$urlPath;
        return $this;
    }
    
    /**
     * @return string Optional localized category URL
     */
    public function getUrlPath()
    {
        return $this->_urlPath;
    }
    /**
     * @param string $description Optional localized Long Description
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;
        return $this;
    }
    
    /**
     * @return string Optional localized Long Description
     */
    public function getDescription()
    {
        return $this->_description;
    }
    /**
     * @param string $metaDescription Optional localized  short description used for meta tag description
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setMetaDescription($metaDescription)
    {
        $this->_metaDescription = (string)$metaDescription;
        return $this;
    }
    
    /**
     * @return string Optional localized  short description used for meta tag description
     */
    public function getMetaDescription()
    {
        return $this->_metaDescription;
    }
    /**
     * @param string $metaKeywords Optional localized meta tag keywords value
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->_metaKeywords = (string)$metaKeywords;
        return $this;
    }
    
    /**
     * @return string Optional localized meta tag keywords value
     */
    public function getMetaKeywords()
    {
        return $this->_metaKeywords;
    }
    /**
     * @param string $titleTag Optional localized title tag value
     * @return \jtl\Connector\Model\CategoryI18n
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