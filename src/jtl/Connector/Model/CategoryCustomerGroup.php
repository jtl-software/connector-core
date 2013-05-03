<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CategoryCustomerGroup Model
 * @access public
 */
abstract class CategoryCustomerGroup extends DataModel
{
    /**
     * @var int
     */
    protected $_customerGroupId;
    
    /**
     * @var int
     */
    protected $_categoryId;
    
    /**
     * @var double
     */
    protected $_discount;
    
    /**
     * @param int $customerGroupId
     * @return \jtl\Connector\Model\CategoryCustomerGroup
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (int)$customerGroupId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    /**
     * @param int $categoryId
     * @return \jtl\Connector\Model\CategoryCustomerGroup
     */
    public function setCategoryId($categoryId)
    {
        $this->_categoryId = (int)$categoryId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->_categoryId;
    }
    /**
     * @param double $discount
     * @return \jtl\Connector\Model\CategoryCustomerGroup
     */
    public function setDiscount($discount)
    {
        $this->_discount = (double)$discount;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getDiscount()
    {
        return $this->_discount;
    }
}
?>