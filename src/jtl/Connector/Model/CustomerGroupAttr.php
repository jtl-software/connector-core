<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Monolingual customer group attribute..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerGroupAttr extends DataModel
{
    /**
     * @type Identity Reference to customerGroup
     */
    public $_customerGroupId = null;

    /**
     * @type Identity Unique customerGroupAttr id
     */
    public $_id = null;

    /**
     * @type string Attribute key
     */
    public $_key = '';

    /**
     * @type string Attribute value
     */
    public $_value = '';

    /**
     * Nav [CustomerGroupAttr » Many]
     *
     * @type \jtl\Connector\Model\CustomerGroup[]
     */
    public $_customerGroup = array();


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_customerGroupId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
        '_customerGroup' => '\jtl\Connector\Model\CustomerGroup',
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
     * @param  string $key Attribute key
     * @return \jtl\Connector\Model\CustomerGroupAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setKey($key)
    {
        return $this->setProperty('_key', $key, 'string');
    }
    
    /**
     * @return string Attribute key
     */
    public function getKey()
    {
        return $this->_key;
    }

    /**
     * @param  string $value Attribute value
     * @return \jtl\Connector\Model\CustomerGroupAttr
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
     * @param  Identity $id Unique customerGroupAttr id
     * @return \jtl\Connector\Model\CustomerGroupAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique customerGroupAttr id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\CustomerGroupAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('_customerGroupId', $customerGroupId, 'Identity');
    }
    
    /**
     * @return Identity Reference to customerGroup
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerGroup $customerGroup
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function addCustomerGroup(\jtl\Connector\Model\CustomerGroup $customerGroup)
    {
        $this->_customerGroup[] = $customerGroup;
        return $this;
    }
    
    /**
     * @return CustomerGroup
     */
    public function getCustomerGroup()
    {
        return $this->_customerGroup;
    }

    /**
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function clearCustomerGroup()
    {
        $this->_customerGroup = array();
        return $this;
    }
}

