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
        'id',
        'customerOrderId',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
    );


    /**
     * @param  string $key Attribute key name
     * @return \jtl\Connector\Model\CustomerOrderAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setKey($key)
    {
        return $this->setProperty('key', $key, 'string');
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
     * @param  Identity $id Unique customerOrderAttr id
     * @return \jtl\Connector\Model\CustomerOrderAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique customerOrderAttr id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\CustomerOrderAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        return $this->setProperty('customerOrderId', $customerOrderId, 'Identity');
    }
    
    /**
     * @return Identity Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->customerOrderId;
    }
}

