<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelAdapter
 */

namespace jtl\Connector\ModelAdapter;

/**
 * Category Adapter Class
 * @access public
 */
class CategoryAdapter extends CoreAdapter
{
    /**
     * @var \jtl\Connector\Model\category
     */
    protected $_category;
    
    /**
     * @var \jtl\Connector\Model\categoryI18n
     */
    protected $_categoryI18n;
    
    /**
     * @var \jtl\Connector\Model\categoryAttr
     */
    protected $_categoryAttr;
    
    /**
     * @var \jtl\Connector\Model\categoryVisibility
     */
    protected $_categoryVisibility;
    
    /**
     * @var \jtl\Connector\Model\categoryCustomerGroup
     */
    protected $_categoryCustomerGroup;
        
    /**
     * @return \jtl\Connector\Model\category
     */
    public function getCategory()
    {
        return $this->_category;
    }    
    /**
     * @return \jtl\Connector\Model\categoryI18n
     */
    public function getCategoryI18n()
    {
        return $this->_categoryI18n;
    }    
    /**
     * @return \jtl\Connector\Model\categoryAttr
     */
    public function getCategoryAttr()
    {
        return $this->_categoryAttr;
    }    
    /**
     * @return \jtl\Connector\Model\categoryVisibility
     */
    public function getCategoryVisibility()
    {
        return $this->_categoryVisibility;
    }    
    /**
     * @return \jtl\Connector\Model\categoryCustomerGroup
     */
    public function getCategoryCustomerGroup()
    {
        return $this->_categoryCustomerGroup;
    }
    
    public $items = array(
        "category" => "Category",
        "categoryi18n" => "CategoryI18n",
        "categoryattr" => "CategoryAttr",
        "categoryvisibility" => "CategoryVisibility",
        "categorycustomergroup" => "CategoryCustomerGroup"
    );
}
?>