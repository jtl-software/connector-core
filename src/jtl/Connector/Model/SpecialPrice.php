<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * special price properties to define a net price for a customerGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class SpecialPrice extends DataModel
{
    /**
     * @type Identity Reference to customerGroup
     */
    protected $customerGroupId = null;

    /**
     * @type Identity Reference to productSpecialPrice
     */
    protected $productSpecialPriceId = null;

    /**
     * @type double net price value
     */
    protected $priceNet = 0.0;

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'customerGroupId',
        'productSpecialPriceId',
    );

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\SpecialPrice
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
     * @param  Identity $productSpecialPriceId Reference to productSpecialPrice
     * @return \jtl\Connector\Model\SpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductSpecialPriceId(Identity $productSpecialPriceId)
    {
        return $this->setProperty('ProductSpecialPriceId', $productSpecialPriceId, 'Identity');
    }

    /**
     * @return Identity Reference to productSpecialPrice
     */
    public function getProductSpecialPriceId()
    {
        return $this->productSpecialPriceId;
    }

    /**
     * @param  double $priceNet net price value
     * @return \jtl\Connector\Model\SpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPriceNet(Identity $priceNet)
    {
        return $this->setProperty('PriceNet', $priceNet, 'double');
    }

    /**
     * @return double net price value
     */
    public function getPriceNet()
    {
        return $this->priceNet;
    }

 
}
