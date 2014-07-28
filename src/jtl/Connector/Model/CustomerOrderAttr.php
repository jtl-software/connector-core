<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Monolingual attribute for a customerorder..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerOrderAttr extends DataModel
{
    /**
     * @type Identity Reference to customerOrder
     */
    public $_customerOrderId = null;

    /**
     * @type Identity Unique customerOrderAttr id
     */
    public $_id = null;

    /**
     * @type string Attribute key name
     */
    public $_key = '';

    /**
     * @type string Attribute value
     */
    public $_value = '';


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_customerOrderId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  string $key Attribute key name
     * @return \jtl\Connector\Model\CustomerOrderAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setKey($key)
    {
        return $this->setProperty('_key', $key, 'string');
    }
    
    /**
     * @return string Attribute key name
     */
    public function getKey()
    {
        return $this->_key;
    }

    /**
     * @param  string $value Attribute value
     * @return \jtl\Connector\Model\CustomerOrderAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setValue($value)
    {
        return $this->setProperty('_value', $value, 'string');
    }
    
    /**
     * @return string Attribute value
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * @param  Identity $id Unique customerOrderAttr id
     * @return \jtl\Connector\Model\CustomerOrderAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique customerOrderAttr id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\CustomerOrderAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        return $this->setProperty('_customerOrderId', $customerOrderId, 'Identity');
    }
    
    /**
     * @return Identity Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->_customerOrderId;
    }
}

