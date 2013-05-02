<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ManufacturerI18n Model
 * @access public
 */
abstract class ManufacturerI18n extends Model
{
    /**
     * @var 
     */
    protected $_manufacturerId;
    
    /**
     * @var 
     */
    protected $_languageIso;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @var 
     */
    protected $_metaDescription;
    
    /**
     * @var 
     */
    protected $_metaKeywords;
    
    /**
     * @var 
     */
    protected $_titleTag;
    
    /**
     * @param  $manufacturerId
     * @return \jtl\Connector\Model\ManufacturerI18n
     */
    public function setManufacturerId($manufacturerId)
    {
        $this->_manufacturerId = ()$manufacturerId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getManufacturerId()
    {
        return $this->_manufacturerId;
    }
    
    /**
     * @param  $languageIso
     * @return \jtl\Connector\Model\ManufacturerI18n
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = ()$languageIso;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getLanguageIso()
    {
        return $this->_languageIso;
    }
    
    /**
     * @param string $description
     * @return \jtl\Connector\Model\ManufacturerI18n
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
     * @param  $metaDescription
     * @return \jtl\Connector\Model\ManufacturerI18n
     */
    public function setMetaDescription($metaDescription)
    {
        $this->_metaDescription = ()$metaDescription;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getMetaDescription()
    {
        return $this->_metaDescription;
    }
    
    /**
     * @param  $metaKeywords
     * @return \jtl\Connector\Model\ManufacturerI18n
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->_metaKeywords = ()$metaKeywords;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getMetaKeywords()
    {
        return $this->_metaKeywords;
    }
    
    /**
     * @param  $titleTag
     * @return \jtl\Connector\Model\ManufacturerI18n
     */
    public function setTitleTag($titleTag)
    {
        $this->_titleTag = ()$titleTag;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getTitleTag()
    {
        return $this->_titleTag;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ManufacturerI18n/ManufacturerI18n.json", $this->getPublic(array()));
    }
}
?>