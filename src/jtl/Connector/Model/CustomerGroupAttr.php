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
     * Nav [CustomerGroupAttr » Many]
     *
     * @type \jtl\Connector\Model\CustomerGroup[]
     */
    protected $customerGroup = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'customerGroupId',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
        'customerGroup' => '\jtl\Connector\Model\CustomerGroup',
    );


    /**
     * @param  string $key Attribute key
     * @return \jtl\Connector\Model\CustomerGroupAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  Identity $id Unique customerGroupAttr id
     * @return \jtl\Connector\Model\CustomerGroupAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\CustomerGroupAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  \jtl\Connector\Model\CustomerGroup $customerGroup
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function addCustomerGroup(\jtl\Connector\Model\CustomerGroup $customerGroup)
    {
        $this->customerGroup[] = $customerGroup;
        return $this;
    }
    
    /**
     * @return CustomerGroup
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

