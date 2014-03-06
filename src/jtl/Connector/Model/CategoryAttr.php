<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CategoryAttr Model
 * Localized category attribute
 *
 * @access public
 */
class CategoryAttr extends DataModel
{
    /**
     * @var string Unique categoryAttr id
     */
    protected $_id = '';             
    
    /**
     * @var string Reference to category
     */
    protected $_categoryId = '';             
    
    /**
     * @var int Optional sort number
     */
    protected $_sort = 0;             
    
    /**
     * CategoryAttr Setter
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
                
                    $this->$name = (string)$value;
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique categoryAttr id
     * @return \jtl\Connector\Model\CategoryAttr
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique categoryAttr id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryAttr
     */
    public function setCategoryId($categoryId)
    {
        $this->_categoryId = (string)$categoryId;
        return $this;
    }
    
    /**
     * @return string Reference to category
     */
    public function getCategoryId()
    {
        return $this->_categoryId;
    }
    /**
     * @param int $sort Optional sort number
     * @return \jtl\Connector\Model\CategoryAttr
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int Optional sort number
     */
    public function getSort()
    {
        return $this->_sort;
    }
}