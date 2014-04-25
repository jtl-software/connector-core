<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Category
 */

namespace jtl\Connector\Model;

/**
 * Localized category attribute
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Category
 */
class CategoryAttr extends DataModel
{
    /**
     * @var Identity Unique categoryAttr id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to category
     */
    protected $_categoryId = null;
    
    /**
     * @var int Optional sort number
     */
    protected $_sort = 0;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id',
        '_categoryId'
    );
    
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
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique categoryAttr id
     * @return \jtl\Connector\Model\CategoryAttr
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique categoryAttr id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryAttr
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