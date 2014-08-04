<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Link customergroup with category. Set optional discount on category for customergroup. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CategoryCustomerGroup extends DataModel
{
    /**
     * @type Identity Reference to category
     */
    protected $categoryId = null;

    /**
     * @type Identity Reference to customerGroup
     */
    protected $customerGroupId = null;

    /**
     * @type double Optional discount on products in specified categoryId for  customerGroupId
     */
    protected $discount = 0.0;

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'categoryId',
        'customerGroupId',
    );

    /**
     * @param  Identity $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryCustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryId(Identity $categoryId)
    {
        return $this->setProperty('CategoryId', $categoryId, 'Identity');
    }

    /**
     * @return Identity Reference to category
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\CategoryCustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('CustomerGroupId', $customerGroupId, 'Identity');
    }

    /**
     * @return Identity Reference to customerGroup
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }

    /**
     * @param  double $discount Optional discount on products in specified categoryId for  customerGroupId
     * @return \jtl\Connector\Model\CategoryCustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDiscount(Identity $discount)
    {
        return $this->setProperty('Discount', $discount, 'double');
    }

    /**
     * @return double Optional discount on products in specified categoryId for  customerGroupId
     */
    public function getDiscount()
    {
        return $this->discount;
    }

 
}
