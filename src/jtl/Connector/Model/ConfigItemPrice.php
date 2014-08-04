<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Customer group price for config item..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ConfigItemPrice extends DataModel
{
    /**
     * @type Identity Reference to configItem
     */
    protected $configItemId = null;

    /**
     * @type Identity Reference to customerGroup
     */
    protected $customerGroupId = null;

    /**
     * @type float Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
     */
    protected $price = 0.0;

    /**
     * @type int Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
     */
    protected $type = 0;

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'configItemId',
        'customerGroupId',
    );

    /**
     * @param  Identity $configItemId Reference to configItem
     * @return \jtl\Connector\Model\ConfigItemPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigItemId(Identity $configItemId)
    {
        return $this->setProperty('ConfigItemId', $configItemId, 'Identity');
    }

    /**
     * @return Identity Reference to configItem
     */
    public function getConfigItemId()
    {
        return $this->configItemId;
    }

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ConfigItemPrice
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
     * @param  float $price Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
     * @return \jtl\Connector\Model\ConfigItemPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPrice(Identity $price)
    {
        return $this->setProperty('Price', $price, 'float');
    }

    /**
     * @return float Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param  int $type Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
     * @return \jtl\Connector\Model\ConfigItemPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setType(Identity $type)
    {
        return $this->setProperty('Type', $type, 'int');
    }

    /**
     * @return int Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
     */
    public function getType()
    {
        return $this->type;
    }

 
}
