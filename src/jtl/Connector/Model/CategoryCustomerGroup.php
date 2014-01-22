<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CategoryCustomerGroup Model
 * Link customergroup with category. Set optional discount on category for customergroup. 
 *
 * @access public
 */
class CategoryCustomerGroup extends DataModel
{
    /**
     * @var string Reference to customerGroup
     */
    protected $_customerGroupId = '';
    
    /**
     * @var string Reference to category
     */
    protected $_categoryId = '';
    
    /**
     * @var double Optional discount on products in specified categoryId for  customerGroupId
     */
    protected $_discount = 0;
    
    /**
     * CategoryCustomerGroup Setter
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
            
                case "_discount":
                
                    $this->$name = (double)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\CategoryCustomerGroup
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (string)$customerGroupId;
        return $this;
    }
    
    /**
     * @return string Reference to customerGroup
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    /**
     * @param string $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryCustomerGroup
     */
    public function setCategoryId($categoryId)
    {
        $this->_categoryId = (string)$categoryId;
        return $this;
    }
    
    /**
     * @return string Reference to category
     */
    public function getCategoryId()
    {
        return $this->_categoryId;
    }
    /**
     * @param double $discount Optional discount on products in specified categoryId for  customerGroupId
     * @return \jtl\Connector\Model\CategoryCustomerGroup
     */
    public function setDiscount($discount)
    {
        $this->_discount = (double)$discount;
        return $this;
    }
    
    /**
     * @return double Optional discount on products in specified categoryId for  customerGroupId
     */
    public function getDiscount()
    {
        return $this->_discount;
    }
}