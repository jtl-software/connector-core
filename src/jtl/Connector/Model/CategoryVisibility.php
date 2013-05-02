<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * CategoryVisibility Model
 * @access public
 */
abstract class CategoryVisibility extends Model
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
     * @param int $customerGroupId
     * @return \jtl\Connector\Model\CategoryVisibility
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
     * @return \jtl\Connector\Model\CategoryVisibility
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/categoryvisibility/categoryvisibility.json", $this->getPublic(array()));
    }
}
?>