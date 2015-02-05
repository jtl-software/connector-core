
<?php

/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Customer group price for config item.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class ConfigItemPrice extends DataModel
{

    /**
     * @var string Reference to configItem
     * @Serializer\Type("string")
     * @Serializer\SerializedName("configItemId")
     * @Serializer\Accessor(getter="getConfigItemId",setter="setConfigItemId")
     */
    protected $configItemId = '';


    /**
     * @var string Reference to customerGroup
     * @Serializer\Type("string")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected $customerGroupId = '';


    /**
     * @var double Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
     * @Serializer\Type("double")
     * @Serializer\SerializedName("price")
     * @Serializer\Accessor(getter="getPrice",setter="setPrice")
     */
    protected $price = 0.0;


    /**
     * @var string Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     * @Serializer\Accessor(getter="getType",setter="setType")
     */
    protected $type = '';



	public function __construct()
	{
	}
	
 
    /**
     * @param string $configItemId Reference to configItem
     * @return \jtl\Connector\Model\ConfigItemPrice
     */
    public function setConfigItemId($configItemId)
    {
        return $this->setProperty('configItemId', $configItemId, 'string');
    }

    /**
     * @return string Reference to configItem
     */
    public function getConfigItemId()
    {
        return $this->configItemId;
    }
	
 
    /**
     * @param string $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ConfigItemPrice
     */
    public function setCustomerGroupId($customerGroupId)
    {
        return $this->setProperty('customerGroupId', $customerGroupId, 'string');
    }

    /**
     * @return string Reference to customerGroup
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }
	
 
    /**
     * @param double $price Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
     * @return \jtl\Connector\Model\ConfigItemPrice
     */
    public function setPrice($price)
    {
        return $this->setProperty('price', $price, 'double');
    }

    /**
     * @return double Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
     */
    public function getPrice()
    {
        return $this->price;
    }
	
 
    /**
     * @param string $type Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
     * @return \jtl\Connector\Model\ConfigItemPrice
     */
    public function setType($type)
    {
        return $this->setProperty('type', $type, 'string');
    }

    /**
     * @return string Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
     */
    public function getType()
    {
        return $this->type;
    }


}
