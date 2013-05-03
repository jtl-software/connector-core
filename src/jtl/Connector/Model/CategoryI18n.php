<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CategoryI18n Model
 * @access public
 */
abstract class CategoryI18n extends DataModel
{
    /**
     * @var string
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_categoryId;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_url;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @param string $languageIso
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = (string)$languageIso;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLanguageIso()
    {
        return $this->_languageIso;
    }
    /**
     * @param int $categoryId
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setCategoryId($categoryId)
    {
        $this->_categoryId = (int)$categoryId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->_categoryId;
    }
    /**
     * @param string $name
     * @return \jtl\Connector\Model\CategoryI18n
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
     * @param string $url
     * @return \jtl\Connector\Model\CategoryI18n
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
     * @return \jtl\Connector\Model\CategoryI18n
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
}
?>