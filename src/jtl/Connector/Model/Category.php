<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Category Model
 * @access public
 */
abstract class Category extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_parentCategoryId;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\Category
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
     * @param int $parentCategoryId
     * @return \jtl\Connector\Model\Category
     */
    public function setParentCategoryId($parentCategoryId)
    {
        $this->_parentCategoryId = (int)$parentCategoryId;
        return $this;
    }
    
    /**
     * @return int
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
}
?>