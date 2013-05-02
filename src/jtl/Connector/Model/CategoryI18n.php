<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * CategoryI18n Model
 * @access public
 */
abstract class CategoryI18n extends Model
{
    /**
     * @var 
     */
    protected $_languageIso;
    
    /**
     * @var string
     */
    protected $_categoryId;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @var 
     */
    protected $_url;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @param  $languageIso
     * @return \jtl\Connector\Model\CategoryI18n
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
     * @param string $categoryId
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setCategoryId($categoryId)
    {
        $this->_categoryId = (string)$categoryId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCategoryId()
    {
        return $this->_categoryId;
    }
    
    /**
     * @param int $name
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setName($name)
    {
        $this->_name = (int)$name;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param  $url
     * @return \jtl\Connector\Model\CategoryI18n
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
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/CategoryI18n/CategoryI18n.json", $this->getPublic(array()));
    }
}
?>