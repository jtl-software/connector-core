<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Category
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Specifies which CustomerGroup is not permitted to view category.
 *
 * @access public
 * @subpackage Category
 */
class CategoryInvisibility extends DataModel
{
    /**
     * @var Identity Reference to customerGroup that is not allowed to view categoryId
     */
    protected $_customerGroupId = null;
    
    /**
     * @var Identity Reference to category to hide from customerGroupId
     */
    protected $_categoryId = null;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        'customerGroupId',
        'categoryId'
    );
    
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
                
                    $this->$name = Identity::convert($value);
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $customerGroupId Reference to customerGroup that is not allowed to view categoryId
     * @return \jtl\Connector\Model\CategoryInvisibility
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        $this->_customerGroupId = $customerGroupId;
        return $this;
    }
    
    /**
     * @return Identity Reference to customerGroup that is not allowed to view categoryId
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    /**
     * @param Identity $categoryId Reference to category to hide from customerGroupId
     * @return \jtl\Connector\Model\CategoryInvisibility
     */
    public function setCategoryId(Identity $categoryId)
    {
        $this->_categoryId = $categoryId;
        return $this;
    }
    
    /**
     * @return Identity Reference to category to hide from customerGroupId
     */
    public function getCategoryId()
    {
        return $this->_categoryId;
    }
}