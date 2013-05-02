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
     * @var string
     */
    protected $_customerGroupId;
    
    /**
     * @var string
     */
    protected $_categoryId;
    
    /**
     * @param string $customerGroupId
     * @return \jtl\Connector\Model\CategoryVisibility
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
     * @return \jtl\Connector\Model\CategoryVisibility
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/CategoryVisibility/CategoryVisibility.json", $this->getPublic(array()));
    }
}
?>