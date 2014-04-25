<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Category
 */

namespace jtl\Connector\Model;

/**
 * A category with sort number, link to parent category and level
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Category
 */
class Category extends DataModel
{
    /**
     * @var Identity Unique category id
     */
    protected $_id = null;
    
    /**
     * @var Identity Optional reference to parent category id
     */
    protected $_parentCategoryId = null;
    
    /**
     * @var int Optional sort order number
     */
    protected $_sort = 0;
    
    /**
     * @var int Optional category level (default 1 for first level)
     */
    protected $_level = 1;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id',
        '_parentCategoryId'
    );
    
    /**
     * Category Setter
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
                case "_parentCategoryId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_sort":
                case "_level":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique category id
     * @return \jtl\Connector\Model\Category
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique category id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $parentCategoryId Optional reference to parent category id
     * @return \jtl\Connector\Model\Category
     */
    public function setParentCategoryId(Identity $parentCategoryId)
    {
        $this->_parentCategoryId = $parentCategoryId;
        return $this;
    }
    
    /**
     * @return Identity Optional reference to parent category id
     */
    public function getParentCategoryId()
    {
        return $this->_parentCategoryId;
    }
    /**
     * @param int $sort Optional sort order number
     * @return \jtl\Connector\Model\Category
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int Optional sort order number
     */
    public function getSort()
    {
        return $this->_sort;
    }
    /**
     * @param int $level Optional category level (default 1 for first level)
     * @return \jtl\Connector\Model\Category
     */
    public function setLevel($level)
    {
        $this->_level = (int)$level;
        return $this;
    }
    
    /**
     * @return int Optional category level (default 1 for first level)
     */
    public function getLevel()
    {
        return $this->_level;
    }
}