<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Internal
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * special price properties to define a net price for a customerGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Internal
 * @JMS\AccessType("public_method")
 */
class SpecialPrice extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $customerGroupId = null;

    /**
     * @var Identity Reference to productSpecialPrice
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $productSpecialPriceId = null;

    /**
     * @var double net price value
	 * @JMS\Type("double")
     */
    protected $priceNet = 0.0;

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\SpecialPrice
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
     * @param  Identity $productSpecialPriceId Reference to productSpecialPrice
     * @return \jtl\Connector\Model\SpecialPrice
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductSpecialPriceId(Identity $productSpecialPriceId)
    {
        return $this->setProperty('productSpecialPriceId', $productSpecialPriceId, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setPriceNet($priceNet)
    {
        return $this->setProperty('priceNet', $priceNet, 'double');
    }

    /**
     * @return double net price value
     */
    public function getPriceNet()
    {
        return $this->priceNet;
    }

 
}
