<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Monolingual customer group attribute..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CustomerGroupAttr extends DataModel
{
    /**
     * @type Identity Reference to customerGroup
     */
    protected $customerGroupId = null;

    /**
     * @type Identity Unique customerGroupAttr id
     */
    protected $id = null;

    /**
     * @type string Attribute key
     */
    protected $key = '';

    /**
     * @type string Attribute value
     */
    protected $value = '';

    /**
     * @type \jtl\Connector\Model\CustomerGroup[]
     */
    protected $customerGroup = array();

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'customerGroupId',
        'id',
    );

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\CustomerGroupAttr
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
     * @param  Identity $id Unique customerGroupAttr id
     * @return \jtl\Connector\Model\CustomerGroupAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setKey(Identity $key)
    {
        return $this->setProperty('Key', $key, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setValue(Identity $value)
    {
        return $this->setProperty('Value', $value, 'string');
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
