<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * SpecificValue Model
 * @access public
 */
abstract class SpecificValue extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_specificId;
    
    /**
     * @var 
     */
    protected $_sort;
    
    /**
     * @var 
     */
    protected $_languageIso;
    
    /**
     * @var 
     */
    protected $_specificValueId;
    
    /**
     * @var 
     */
    protected $_value;
    
    /**
     * @var 
     */
    protected $_url;
    
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
     * @param  $id
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setId($id)
    {
        $this->_id = ()$id;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param  $specificId
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setSpecificId($specificId)
    {
        $this->_specificId = ()$specificId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSpecificId()
    {
        return $this->_specificId;
    }
    
    /**
     * @param  $sort
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setSort($sort)
    {
        $this->_sort = ()$sort;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSort()
    {
        return $this->_sort;
    }
    
    /**
     * @param  $languageIso
     * @return \jtl\Connector\Model\SpecificValue
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
     * @param  $specificValueId
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setSpecificValueId($specificValueId)
    {
        $this->_specificValueId = ()$specificValueId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSpecificValueId()
    {
        return $this->_specificValueId;
    }
    
    /**
     * @param  $value
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setValue($value)
    {
        $this->_value = ()$value;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getValue()
    {
        return $this->_value;
    }
    
    /**
     * @param  $url
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setUrl($url)
    {
        $this->_url = ()$url;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getUrl()
    {
        return $this->_url;
    }
    
    /**
     * @param string $description
     * @return \jtl\Connector\Model\SpecificValue
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
     * @return \jtl\Connector\Model\SpecificValue
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
     * @return \jtl\Connector\Model\SpecificValue
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
     * @return \jtl\Connector\Model\SpecificValue
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
        Schema::validateModel(CONNECTOR_DIR . "schema/SpecificValue/SpecificValue.json", $this->getPublic(array()));
    }
}
?>