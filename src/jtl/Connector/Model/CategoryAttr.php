<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CategoryAttr Model
 * @access public
 */
abstract class CategoryAttr extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_categoryId;
    
    /**
     * @var string
     */
    protected $_languageIso;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_value;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\CategoryAttr
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
     * @param int $categoryId
     * @return \jtl\Connector\Model\CategoryAttr
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
     * @param string $languageIso
     * @return \jtl\Connector\Model\CategoryAttr
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
     * @param string $name
     * @return \jtl\Connector\Model\CategoryAttr
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
     * @param string $value
     * @return \jtl\Connector\Model\CategoryAttr
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
}
?>