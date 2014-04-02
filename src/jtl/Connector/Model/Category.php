<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Category
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * A category with sort number, link to parent category and level
 *
 * @access public
 * @subpackage Category
 */
class Category extends DataModel
{
    /**
     * @var string Unique category id
     */
    protected $_id = '';             
    
    /**
     * @var string Optional reference to parent category id
     */
    protected $_parentCategoryId = '0';             
    
    /**
     * @var int Optional sort order number
     */
    protected $_sort = 0;             
    
    /**
     * @var int Optional category level (default 1 for first level)
     */
    protected $_level = 1;             
    
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
                
                    $this->$name = (string)$value;
                    break;
            
                case "_sort":
                case "_level":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique category id
     * @return \jtl\Connector\Model\Category
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique category id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $parentCategoryId Optional reference to parent category id
     * @return \jtl\Connector\Model\Category
     */
    public function setParentCategoryId($parentCategoryId)
    {
        $this->_parentCategoryId = (string)$parentCategoryId;
        return $this;
    }
    
    /**
     * @return string Optional reference to parent category id
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