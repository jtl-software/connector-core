<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Manufacturer
 */

namespace jtl\Connector\Model;

/**
 * Locale specific text and meta-information for manufacturer.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Manufacturer
 */
class ManufacturerI18n extends DataModel
{
    /**
     * @var Identity Reference to manufacturer
     */
    protected $_manufacturerId = null;
    
    /**
     * @var string Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string Optional manufacturer description (HTML)
     */
    protected $_description = '';
    
    /**
     * @var string Optional meta description tag value
     */
    protected $_metaDescription = '';
    
    /**
     * @var string Optional meta keywords tag value
     */
    protected $_metaKeywords = '';
    
    /**
     * @var string Optional title tag value
     */
    protected $_titleTag = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_manufacturerId'
    );
    
    /**
     * ManufacturerI18n Setter
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
                case "_manufacturerId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_localeName":
                case "_description":
                case "_metaDescription":
                case "_metaKeywords":
                case "_titleTag":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $manufacturerId Reference to manufacturer
     * @return \jtl\Connector\Model\ManufacturerI18n
     */
    public function setManufacturerId(Identity $manufacturerId)
    {
        $this->_manufacturerId = $manufacturerId;
        return $this;
    }
    
    /**
     * @return Identity Reference to manufacturer
     */
    public function getManufacturerId()
    {
        return $this->_manufacturerId;
    }
    /**
     * @param string $localeName Locale
     * @return \jtl\Connector\Model\ManufacturerI18n
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
     * @param string $description Optional manufacturer description (HTML)
     * @return \jtl\Connector\Model\ManufacturerI18n
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;
        return $this;
    }
    
    /**
     * @return string Optional manufacturer description (HTML)
     */
    public function getDescription()
    {
        return $this->_description;
    }
    /**
     * @param string $metaDescription Optional meta description tag value
     * @return \jtl\Connector\Model\ManufacturerI18n
     */
    public function setMetaDescription($metaDescription)
    {
        $this->_metaDescription = (string)$metaDescription;
        return $this;
    }
    
    /**
     * @return string Optional meta description tag value
     */
    public function getMetaDescription()
    {
        return $this->_metaDescription;
    }
    /**
     * @param string $metaKeywords Optional meta keywords tag value
     * @return \jtl\Connector\Model\ManufacturerI18n
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->_metaKeywords = (string)$metaKeywords;
        return $this;
    }
    
    /**
     * @return string Optional meta keywords tag value
     */
    public function getMetaKeywords()
    {
        return $this->_metaKeywords;
    }
    /**
     * @param string $titleTag Optional title tag value
     * @return \jtl\Connector\Model\ManufacturerI18n
     */
    public function setTitleTag($titleTag)
    {
        $this->_titleTag = (string)$titleTag;
        return $this;
    }
    
    /**
     * @return string Optional title tag value
     */
    public function getTitleTag()
    {
        return $this->_titleTag;
    }
}