<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Category
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Specifies which CustomerGroup is not permitted to view category..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Category
 */
class CategoryInvisibility extends DataModel
{
    /**
     * @var Identity Reference to category to hide from customerGroupId
     */
    protected $categoryId = null;

    /**
     * @var Identity Reference to customerGroup that is not allowed to view categoryId
     */
    protected $customerGroupId = null;

    /**
     * @param  Identity $categoryId Reference to category to hide from customerGroupId
     * @return \jtl\Connector\Model\CategoryInvisibility
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryId(Identity $categoryId)
    {
        return $this->setProperty('categoryId', $categoryId, 'Identity');
    }

    /**
     * @return Identity Reference to category to hide from customerGroupId
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param  Identity $customerGroupId Reference to customerGroup that is not allowed to view categoryId
     * @return \jtl\Connector\Model\CategoryInvisibility
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('customerGroupId', $customerGroupId, 'Identity');
    }

    /**
     * @return Identity Reference to customerGroup that is not allowed to view categoryId
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }

 
}
