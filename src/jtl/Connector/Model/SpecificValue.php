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
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_specificId;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_specificValueId;
    
    /**
     * @var string
     */
    protected $_value;
    
    /**
     * @var string
     */
    protected $_url;
    
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
     * @param int $id
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param int $specificId
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setSpecificId($specificId)
    {
        $this->_specificId = (int)$specificId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getSpecificId()
    {
        return $this->_specificId;
    }
    
    /**
     * @param int $sort
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getSort()
    {
        return $this->_sort;
    }
    
    /**
     * @param int $languageIso
     * @return \jtl\Connector\Model\SpecificValue
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
     * @param int $specificValueId
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setSpecificValueId($specificValueId)
    {
        $this->_specificValueId = (int)$specificValueId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getSpecificValueId()
    {
        return $this->_specificValueId;
    }
    
    /**
     * @param string $value
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setValue($value)
    {
        $this->_value = (string)$value;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getValue()
    {
        return $this->_value;
    }
    
    /**
     * @param string $url
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setUrl($url)
    {
        $this->_url = (string)$url;
        return $this;
    }
    
    /**
     * @return string
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
     * @param string $metaDescription
     * @return \jtl\Connector\Model\SpecificValue
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
     * @return \jtl\Connector\Model\SpecificValue
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
     * @return \jtl\Connector\Model\SpecificValue
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
        Schema::validateModel(CONNECTOR_DIR . "schema/specificvalue/specificvalue.json", $this->getPublic(array()));
    }
}
?>