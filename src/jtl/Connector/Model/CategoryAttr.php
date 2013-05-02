<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * CategoryAttr Model
 * @access public
 */
abstract class CategoryAttr extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_categoryId;
    
    /**
     * @var 
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @var 
     */
    protected $_value;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\CategoryAttr
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
     * @param string $categoryId
     * @return \jtl\Connector\Model\CategoryAttr
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
     * @param  $languageIso
     * @return \jtl\Connector\Model\CategoryAttr
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
     * @param int $name
     * @return \jtl\Connector\Model\CategoryAttr
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
     * @param  $value
     * @return \jtl\Connector\Model\CategoryAttr
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/CategoryAttr/CategoryAttr.json", $this->getPublic(array()));
    }
}
?>