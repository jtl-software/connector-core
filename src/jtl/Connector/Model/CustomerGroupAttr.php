<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Monolingual customer group attribute..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 * 
 * @Serializer\AccessType("public_method")
 */
class CustomerGroupAttr extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected $customerGroupId = null;

    /**
     * @var Identity Unique customerGroupAttr id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var string Attribute key
     * @Serializer\Type("string")
     * @Serializer\SerializedName("key")
     * @Serializer\Accessor(getter="getKey",setter="setKey")
     */
    protected $key = '';

    /**
     * @var string Attribute value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     * @Serializer\Accessor(getter="getValue",setter="setValue")
     */
    protected $value = '';

    /**
     * End: 1 (One of CustomerGroup)
     *      * (Collection of CustomerGroupAttr)
     *
     * @var \jtl\Connector\Model\CustomerGroup[]
     * @Serializer\Type("array<jtl\Connector\Model\CustomerGroup>")
     * @Serializer\SerializedName("customerGroup")
     * @Serializer\AccessType("reflection")
     */
    protected $customerGroup = array();


    public function __construct()
    {
        $this->customerGroupId = new Identity;
        $this->id = new Identity;
    }

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\CustomerGroupAttr
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
     * @param  Identity $id Unique customerGroupAttr id
     * @return \jtl\Connector\Model\CustomerGroupAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique customerGroupAttr id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $key Attribute key
     * @return \jtl\Connector\Model\CustomerGroupAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setKey($key)
    {
        return $this->setProperty('key', $key, 'string');
    }

    /**
     * @return string Attribute key
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param  string $value Attribute value
     * @return \jtl\Connector\Model\CustomerGroupAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setValue($value)
    {
        return $this->setProperty('value', $value, 'string');
    }

    /**
     * @return string Attribute value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerGroup $customerGroup
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function addCustomerGroup(\jtl\Connector\Model\CustomerGroup $customerGroup)
    {
        $this->customerGroup[] = $customerGroup;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CustomerGroup[]
     */
    public function getCustomerGroup()
    {
        return $this->customerGroup;
    }

    /**
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function clearCustomerGroup()
    {
        $this->customerGroup = array();
        return $this;
    }

 
}
