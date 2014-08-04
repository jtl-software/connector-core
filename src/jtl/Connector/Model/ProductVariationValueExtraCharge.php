<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Extra charge for productVariationValue per customerGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductVariationValueExtraCharge extends DataModel
{
    /**
     * @type Identity Reference to customerGroup
     */
    protected $customerGroupId = null;

    /**
     * @type Identity Reference to productVariationValue
     */
    protected $productVariationValueId = null;

    /**
     * @type double Extra charge (net)
     */
    protected $extraChargeNet = 0.0;

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'customerGroupId',
        'productVariationValueId',
    );

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
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
     * @param  Identity $productVariationValueId Reference to productVariationValue
     * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueId(Identity $productVariationValueId)
    {
        return $this->setProperty('ProductVariationValueId', $productVariationValueId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setExtraChargeNet(Identity $extraChargeNet)
    {
        return $this->setProperty('ExtraChargeNet', $extraChargeNet, 'double');
    }

    /**
     * @return double Extra charge (net)
     */
    public function getExtraChargeNet()
    {
        return $this->extraChargeNet;
    }

 
}
