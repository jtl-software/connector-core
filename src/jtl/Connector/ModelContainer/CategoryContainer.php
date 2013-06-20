<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelContainer
 */

namespace jtl\Connector\ModelContainer;

/**
 * Category Container Class
 * @access public
 */
class CategoryContainer extends CoreContainer
{
    /**
     * @var \jtl\Connector\Model\Category[]
     */
    protected $_categories;
    
    /**
     * @var \jtl\Connector\Model\CategoryI18n[]
     */
    protected $_categoryI18ns;
    
    /**
     * @var \jtl\Connector\Model\CategoryAttr[]
     */
    protected $_categoryAttrs;
    
    /**
     * @var \jtl\Connector\Model\CategoryVisibility[]
     */
    protected $_categoryVisibilities;
    
    /**
     * @var \jtl\Connector\Model\CategoryCustomerGroup[]
     */
    protected $_categoryCustomerGroups;
        
    /**
     * @return array \jtl\Connector\Model\Category
     */
    public function getCategories()
    {
        return $this->_categories;
    }
        
    /**
     * @return array \jtl\Connector\Model\CategoryI18n
     */
    public function getCategoryI18ns()
    {
        return $this->_categoryI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\CategoryAttr
     */
    public function getCategoryAttrs()
    {
        return $this->_categoryAttrs;
    }
        
    /**
     * @return array \jtl\Connector\Model\CategoryVisibility
     */
    public function getCategoryVisibilities()
    {
        return $this->_categoryVisibilities;
    }
        
    /**
     * @return array \jtl\Connector\Model\CategoryCustomerGroup
     */
    public function getCategoryCustomerGroups()
    {
        return $this->_categoryCustomerGroups;
    }
        
    public $items = array(
        "category" => array("Category", "Categories"),
        "category_i18n" => array("CategoryI18n", "CategoryI18ns"),
        "category_attr" => array("CategoryAttr", "CategoryAttrs"),
        "category_visibility" => array("CategoryVisibility", "CategoryVisibilities"),
        "category_customer_group" => array("CategoryCustomerGroup", "CategoryCustomerGroups")
    );
}
?>