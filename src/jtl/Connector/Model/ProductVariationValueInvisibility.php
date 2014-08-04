<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Specify productVariationValue to hide from specific customerGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class ProductVariationValueInvisibility extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
     */
    protected $customerGroupId = null;

    /**
     * @var Identity Reference to productVariationValue to hide from customerGroup
     */
    protected $productVariationValueId = null;

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ProductVariationValueInvisibility
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
     * @param  Identity $productVariationValueId Reference to productVariationValue to hide from customerGroup
     * @return \jtl\Connector\Model\ProductVariationValueInvisibility
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueId(Identity $productVariationValueId)
    {
        return $this->setProperty('productVariationValueId', $productVariationValueId, 'Identity');
    }

    /**
     * @return Identity Reference to productVariationValue to hide from customerGroup
     */
    public function getProductVariationValueId()
    {
        return $this->productVariationValueId;
    }

 
}
