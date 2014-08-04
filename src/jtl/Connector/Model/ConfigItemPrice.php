<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Customer group price for config item..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class ConfigItemPrice extends DataModel
{
    /**
     * @var Identity Reference to configItem
     */
    protected $configItemId = null;

    /**
     * @var Identity Reference to customerGroup
     */
    protected $customerGroupId = null;

    /**
     * @var float Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
     */
    protected $price = 0.0;

    /**
     * @var int Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
     */
    protected $type = 0;

    /**
     * @param  Identity $configItemId Reference to configItem
     * @return \jtl\Connector\Model\ConfigItemPrice
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigItemId(Identity $configItemId)
    {
        return $this->setProperty('configItemId', $configItemId, 'Identity');
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
     * @param  float $price Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
     * @return \jtl\Connector\Model\ConfigItemPrice
     * @throws \InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setPrice($price)
    {
        return $this->setProperty('price', $price, 'float');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setType($type)
    {
        return $this->setProperty('type', $type, 'int');
    }

    /**
     * @return int Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
     */
    public function getType()
    {
        return $this->type;
    }

 
}
