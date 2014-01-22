<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CategoryFunctionAttr Model
 * Monolingual category attribute. All properties must be set. 
 *
 * @access public
 */
class CategoryFunctionAttr extends DataModel
{
    /**
     * @var string - Unique categoryFunctionAttr id
     */
    protected $_id = '';
    
    /**
     * @var string - Reference to category
     */
    protected $_categoryId = '';
    
    /**
     * @var string - Attribute key name
     */
    protected $_name = '';
    
    /**
     * @var string - Attribute value
     */
    protected $_value = '';
    
    /**
     * CategoryFunctionAttr Setter
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
                case "_id":
                case "_categoryId":
                case "_name":
                case "_value":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id
     * @return \jtl\Connector\Model\CategoryFunctionAttr
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $categoryId
     * @return \jtl\Connector\Model\CategoryFunctionAttr
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
     * @param string $name
     * @return \jtl\Connector\Model\CategoryFunctionAttr
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
     * @return \jtl\Connector\Model\CategoryFunctionAttr
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}