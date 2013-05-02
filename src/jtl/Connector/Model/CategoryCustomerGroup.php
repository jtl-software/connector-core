<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * CategoryCustomerGroup Model
 * @access public
 */
abstract class CategoryCustomerGroup extends Model
{
    /**
     * @var string
     */
    protected $_customerGroupId;
    
    /**
     * @var string
     */
    protected $_categoryId;
    
    /**
     * @var string
     */
    protected $_discount;
    
    /**
     * @param string $customerGroupId
     * @return \jtl\Connector\Model\CategoryCustomerGroup
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (string)$customerGroupId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    
    /**
     * @param string $categoryId
     * @return \jtl\Connector\Model\CategoryCustomerGroup
     */
    public function setCategoryId($categoryId)
    {
        $this->_categoryId = (string)$categoryId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCategoryId()
    {
        return $this->_categoryId;
    }
    
    /**
     * @param string $discount
     * @return \jtl\Connector\Model\CategoryCustomerGroup
     */
    public function setDiscount($discount)
    {
        $this->_discount = (string)$discount;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDiscount()
    {
        return $this->_discount;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/CategoryCustomerGroup/CategoryCustomerGroup.json", $this->getPublic(array()));
    }
}
?>