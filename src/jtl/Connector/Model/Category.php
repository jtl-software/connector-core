<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * Category Model
 * @access public
 */
abstract class Category extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_parentCategoryId;
    
    /**
     * @var 
     */
    protected $_sort;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\Category
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
     * @param  $parentCategoryId
     * @return \jtl\Connector\Model\Category
     */
    public function setParentCategoryId($parentCategoryId)
    {
        $this->_parentCategoryId = ()$parentCategoryId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getParentCategoryId()
    {
        return $this->_parentCategoryId;
    }
    
    /**
     * @param  $sort
     * @return \jtl\Connector\Model\Category
     */
    public function setSort($sort)
    {
        $this->_sort = ()$sort;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSort()
    {
        return $this->_sort;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/Category/Category.json", $this->getPublic(array()));
    }
}
?>