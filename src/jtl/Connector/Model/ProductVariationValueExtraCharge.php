<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Extra charge for productVariationValue per customerGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class ProductVariationValueExtraCharge extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
     */
    protected $customerGroupId = null;

    /**
     * @var Identity Reference to productVariationValue
     */
    protected $productVariationValueId = null;

    /**
     * @var double Extra charge (net)
     */
    protected $extraChargeNet = 0.0;

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
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
     * @param  Identity $productVariationValueId Reference to productVariationValue
     * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueId(Identity $productVariationValueId)
    {
        return $this->setProperty('productVariationValueId', $productVariationValueId, 'Identity');
    }

    /**
     * @return Identity Reference to productVariationValue
     */
    public function getProductVariationValueId()
    {
        return $this->productVariationValueId;
    }

    /**
     * @param  double $extraChargeNet Extra charge (net)
     * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setExtraChargeNet($extraChargeNet)
    {
        return $this->setProperty('extraChargeNet', $extraChargeNet, 'double');
    }

    /**
     * @return double Extra charge (net)
     */
    public function getExtraChargeNet()
    {
        return $this->extraChargeNet;
    }

 
}
