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
     * @var \jtl\Connector\Model\CategoryAttrI18n[]
     */
    protected $_categoryAttrI18ns;
    
    /**
     * @var \jtl\Connector\Model\CategoryFunctionAttr[]
     */
    protected $_categoryFunctionAttrs;
    
    /**
     * @var \jtl\Connector\Model\CategoryInvisibility[]
     */
    protected $_categoryInvisibilities;
    
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
     * @return array \jtl\Connector\Model\CategoryAttrI18n
     */
    public function getCategoryAttrI18ns()
    {
        return $this->_categoryAttrI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\CategoryFunctionAttr
     */
    public function getCategoryFunctionAttrs()
    {
        return $this->_categoryFunctionAttrs;
    }
        
    /**
     * @return array \jtl\Connector\Model\CategoryInvisibility
     */
    public function getCategoryInvisibilities()
    {
        return $this->_categoryInvisibilities;
    }
        
    /**
     * @return array \jtl\Connector\Model\CategoryCustomerGroup
     */
    public function getCategoryCustomerGroups()
    {
        return $this->_categoryCustomerGroups;
    }

    /**
     * (non-PHPdoc)
     * @see \jtl\Connector\ModelContainer\CoreContainer::getMainModel()
     */
    public function getMainModel()
    {
        $arr = $this->getCategories();

        return reset($arr) ?: null;
    }
        
    public $items = array(
        "category" => array("Category", "Categories"),
        "category_i18n" => array("CategoryI18n", "CategoryI18ns"),
        "category_attr" => array("CategoryAttr", "CategoryAttrs"),
        "category_attr_i18n" => array("CategoryAttrI18n", "CategoryAttrI18ns"),
        "category_function_attr" => array("CategoryFunctionAttr", "CategoryFunctionAttrs"),
        "category_invisibility" => array("CategoryInvisibility", "CategoryInvisibilities"),
        "category_customer_group" => array("CategoryCustomerGroup", "CategoryCustomerGroups")
    );
}
?>