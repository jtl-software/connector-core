<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Specifies which CustomerGroup is not permitted to view category..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CategoryInvisibility extends DataModel
{
    /**
     * @type Identity Reference to category to hide from customerGroupId
     */
    protected $categoryId = null;

    /**
     * @type Identity Reference to customerGroup that is not allowed to view categoryId
     */
    protected $customerGroupId = null;

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'categoryId',
        'customerGroupId',
    );

    /**
     * @param  Identity $categoryId Reference to category to hide from customerGroupId
     * @return \jtl\Connector\Model\CategoryInvisibility
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryId(Identity $categoryId)
    {
        return $this->setProperty('CategoryId', $categoryId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('CustomerGroupId', $customerGroupId, 'Identity');
    }

    /**
     * @return Identity Reference to customerGroup that is not allowed to view categoryId
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }

 
}
