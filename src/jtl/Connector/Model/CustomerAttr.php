<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Monolingual customer attribute..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CustomerAttr extends DataModel
{
    /**
     * @type Identity Reference to customer
     */
    protected $customerId = null;

    /**
     * @type Identity Unique customerAttr id
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
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'customerId',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
    );


    /**
     * @param  string $key Attribute key
     * @return \jtl\Connector\Model\CustomerAttr
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
     * @return \jtl\Connector\Model\CustomerAttr
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
     * @param  Identity $id Unique customerAttr id
     * @return \jtl\Connector\Model\CustomerAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique customerAttr id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $customerId Reference to customer
     * @return \jtl\Connector\Model\CustomerAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId)
    {
        return $this->setProperty('customerId', $customerId, 'Identity');
    }
    
    /**
     * @return Identity Reference to customer
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }
}

