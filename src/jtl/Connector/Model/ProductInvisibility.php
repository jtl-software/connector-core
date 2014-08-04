<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Specify product to hide from customerGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductInvisibility extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
     */
    protected $customerGroupId = null;

    /**
     * @var Identity Reference to product
     */
    protected $productId = null;

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ProductInvisibility
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('customerGroupId', $customerGroupId, 'Identity');
    }

    /**
     * @return Identity Reference to customerGroup
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductInvisibility
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }

    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

 
}
