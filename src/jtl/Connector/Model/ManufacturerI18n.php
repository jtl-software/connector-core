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
     * @var int
     */
    protected $_manufacturerId;
    
    /**
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @var string
     */
    protected $_metaDescription;
    
    /**
     * @var string
     */
    protected $_metaKeywords;
    
    /**
     * @var string
     */
    protected $_titleTag;
    
    /**
     * @param int $manufacturerId
     * @return \jtl\Connector\Model\ManufacturerI18n
     */
    public function setManufacturerId($manufacturerId)
    {
        $this->_manufacturerId = (int)$manufacturerId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getManufacturerId()
    {
        return $this->_manufacturerId;
    }
    
    /**
     * @param int $languageIso
     * @return \jtl\Connector\Model\ManufacturerI18n
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = (int)$languageIso;
        return $this;
    }
    
    /**
     * @return int
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
     * @param string $metaDescription
     * @return \jtl\Connector\Model\ManufacturerI18n
     */
    public function setMetaDescription($metaDescription)
    {
        $this->_metaDescription = (string)$metaDescription;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->_metaDescription;
    }
    
    /**
     * @param string $metaKeywords
     * @return \jtl\Connector\Model\ManufacturerI18n
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->_metaKeywords = (string)$metaKeywords;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->_metaKeywords;
    }
    
    /**
     * @param string $titleTag
     * @return \jtl\Connector\Model\ManufacturerI18n
     */
    public function setTitleTag($titleTag)
    {
        $this->_titleTag = (string)$titleTag;
        return $this;
    }
    
    /**
     * @return string
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
        Schema::validateModel(CONNECTOR_DIR . "schema/manufactureri18n/manufactureri18n.json", $this->getPublic(array()));
    }
}
?>