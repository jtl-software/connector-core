<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CategoryInvisibility Model
 * Specifies which CustomerGroup is not permitted to view category.
 *
 * @access public
 */
class CategoryInvisibility extends DataModel
{
    /**
     * @var string Reference to customerGroup that is not allowed to view categoryId
     */
    protected $_customerGroupId = '';
    
    /**
     * @var string Reference to category to hide from customerGroupId
     */
    protected $_categoryId = '';
    
    /**
     * CategoryInvisibility Setter
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
                case "_customerGroupId":
                case "_categoryId":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $customerGroupId Reference to customerGroup that is not allowed to view categoryId
     * @return \jtl\Connector\Model\CategoryInvisibility
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (string)$customerGroupId;
        return $this;
    }
    
    /**
     * @return string Reference to customerGroup that is not allowed to view categoryId
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    /**
     * @param string $categoryId Reference to category to hide from customerGroupId
     * @return \jtl\Connector\Model\CategoryInvisibility
     */
    public function setCategoryId($categoryId)
    {
        $this->_categoryId = (string)$categoryId;
        return $this;
    }
    
    /**
     * @return string Reference to category to hide from customerGroupId
     */
    public function getCategoryId()
    {
        return $this->_categoryId;
    }
}