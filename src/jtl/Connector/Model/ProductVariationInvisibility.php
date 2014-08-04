<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Specify productVariation to hide from customerGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class ProductVariationInvisibility extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
     */
    protected $customerGroupId = null;

    /**
     * @var Identity Reference to productVariation
     */
    protected $productVariationId = null;

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ProductVariationInvisibility
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
     * @param  Identity $productVariationId Reference to productVariation
     * @return \jtl\Connector\Model\ProductVariationInvisibility
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationId(Identity $productVariationId)
    {
        return $this->setProperty('productVariationId', $productVariationId, 'Identity');
    }

    /**
     * @return Identity Reference to productVariation
     */
    public function getProductVariationId()
    {
        return $this->productVariationId;
    }

 
}
