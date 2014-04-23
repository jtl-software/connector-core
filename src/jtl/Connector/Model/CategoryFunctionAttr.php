<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Category
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Monolingual category attribute. All properties must be set. 
 *
 * @access public
 * @subpackage Category
 */
class CategoryFunctionAttr extends DataModel
{
    /**
     * @var Identity Unique categoryFunctionAttr id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to category
     */
    protected $_categoryId = null;
    
    /**
     * @var string Attribute key name
     */
    protected $_name = '';
    
    /**
     * @var string Attribute value
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
                
                    $this->$name = ($value instanceof Identity) ? $value : null;
                    break;
            
                case "_name":
                case "_value":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique categoryFunctionAttr id
     * @return \jtl\Connector\Model\CategoryFunctionAttr
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique categoryFunctionAttr id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryFunctionAttr
     */
    public function setCategoryId(Identity $categoryId)
    {
        $this->_categoryId = $categoryId;
        return $this;
    }
    
    /**
     * @return Identity Reference to category
     */
    public function getCategoryId()
    {
        return $this->_categoryId;
    }
    /**
     * @param string $name Attribute key name
     * @return \jtl\Connector\Model\CategoryFunctionAttr
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Attribute key name
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @param string $value Attribute value
     * @return \jtl\Connector\Model\CategoryFunctionAttr
     */
    public function setValue($value)
    {
        $this->_value = (string)$value;
        return $this;
    }
    
    /**
     * @return string Attribute value
     */
    public function getValue()
    {
        return $this->_value;
    }
}