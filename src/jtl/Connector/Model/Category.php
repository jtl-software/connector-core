<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Category Model
 * A category with sort number, link to parent category and level
 *
 * @access public
 */
class Category extends DataModel
{
    /**
     * @var string - Unique category id
     */
    protected $_id = '';
    
    /**
     * @var string - Optional reference to parent category id
     */
    protected $_parentCategoryId = '0';
    
    /**
     * @var int - Optional sort order number
     */
    protected $_sort = 0;
    
    /**
     * @var int - Optional category level (default 1 for first level)
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
     * @param string $id
     * @return \jtl\Connector\Model\Category
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
     * @param string $parentCategoryId
     * @return \jtl\Connector\Model\Category
     */
    public function setParentCategoryId($parentCategoryId)
    {
        $this->_parentCategoryId = (string)$parentCategoryId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getParentCategoryId()
    {
        return $this->_parentCategoryId;
    }
    
    /**
     * @param int $sort
     * @return \jtl\Connector\Model\Category
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getSort()
    {
        return $this->_sort;
    }
    
    /**
     * @param int $level
     * @return \jtl\Connector\Model\Category
     */
    public function setLevel($level)
    {
        $this->_level = (int)$level;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->_level;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}