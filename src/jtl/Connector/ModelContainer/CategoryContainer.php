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
     * @var \jtl\Connector\Model\category[]
     */
    protected $_categories;
    
    /**
     * @var \jtl\Connector\Model\categoryI18n[]
     */
    protected $_categoryI18ns;
    
    /**
     * @var \jtl\Connector\Model\categoryAttr[]
     */
    protected $_categoryAttrs;
    
    /**
     * @var \jtl\Connector\Model\categoryVisibility[]
     */
    protected $_categoryVisibilities;
    
    /**
     * @var \jtl\Connector\Model\categoryCustomerGroup[]
     */
    protected $_categoryCustomerGroups;
        
    /**
     * @return array \jtl\Connector\Model\category
     */
    public function getCategories()
    {
        return $this->_categories;
    }
        
    /**
     * @return array \jtl\Connector\Model\categoryI18n
     */
    public function getCategoryI18ns()
    {
        return $this->_categoryI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\categoryAttr
     */
    public function getCategoryAttrs()
    {
        return $this->_categoryAttrs;
    }
        
    /**
     * @return array \jtl\Connector\Model\categoryVisibility
     */
    public function getCategoryVisibilities()
    {
        return $this->_categoryVisibilities;
    }
        
    /**
     * @return array \jtl\Connector\Model\categoryCustomerGroup
     */
    public function getCategoryCustomerGroups()
    {
        return $this->_categoryCustomerGroups;
    }
        
    public $items = array(
        "category" => array("Categori", "Categories"),
        "categoryi18n" => array("CategoryI18n", "CategoryI18ns"),
        "categoryattr" => array("CategoryAttr", "CategoryAttrs"),
        "categoryvisibility" => array("CategoryVisibiliti", "CategoryVisibilities"),
        "categorycustomergroup" => array("CategoryCustomerGroup", "CategoryCustomerGroups")
    );
}
?>