<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Monolingual attribute for a customerorder..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CustomerOrderAttr extends DataModel
{
    /**
     * @type Identity Reference to customerOrder
     */
    protected $customerOrderId = null;

    /**
     * @type Identity Unique customerOrderAttr id
     */
    protected $id = null;

    /**
     * @type string Attribute key name
     */
    protected $key = '';

    /**
     * @type string Attribute value
     */
    protected $value = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'customerOrderId',
        'id',
    );

    /**
     * @param  Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\CustomerOrderAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        return $this->setProperty('CustomerOrderId', $customerOrderId, 'Identity');
    }

    /**
     * @return Identity Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->customerOrderId;
    }

    /**
     * @param  Identity $id Unique customerOrderAttr id
     * @return \jtl\Connector\Model\CustomerOrderAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique customerOrderAttr id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $key Attribute key name
     * @return \jtl\Connector\Model\CustomerOrderAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setKey(Identity $key)
    {
        return $this->setProperty('Key', $key, 'string');
    }

    /**
     * @return string Attribute key name
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param  string $value Attribute value
     * @return \jtl\Connector\Model\CustomerOrderAttr
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

 
}
