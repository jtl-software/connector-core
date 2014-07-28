<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Customer group price for config item..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ConfigItemPrice extends DataModel
{
    /**
     * @type Identity Reference to configItem
     */
    public $_configItemId = null;

    /**
     * @type Identity Reference to customerGroup
     */
    public $_customerGroupId = null;

    /**
     * @type Identity 
     */
    public $_taxClassId = null;

    /**
     * @type integer 
     */
    public $_connectorId = 0;

    /**
     * @type float|null Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
     */
    public $_price = 0.0;

    /**
     * @type integer|null Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
     */
    public $_type = 0;


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_configItemId',
        '_customerGroupId',
        '_taxClassId',
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
     * @param  float $price Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
     * @return \jtl\Connector\Model\ConfigItemPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setPrice($price)
    {
        return $this->setProperty('_price', $price, 'float');
    }
    
    /**
     * @return float Net price or percental value to add/deduct to/from product price (depending on type). Positive value means surcharge, negative value means discount. Also see configItem.vat for value added tax.
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * @param  integer $connectorId 
     * @return \jtl\Connector\Model\ConfigItemPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setConnectorId($connectorId)
    {
        return $this->setProperty('_connectorId', $connectorId, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getConnectorId()
    {
        return $this->_connectorId;
    }

    /**
     * @param  integer $type Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
     * @return \jtl\Connector\Model\ConfigItemPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setType($type)
    {
        return $this->setProperty('_type', $type, 'integer');
    }
    
    /**
     * @return integer Optional type. Default is fixed price (Type 0). Type 1 defines percental price type.
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param  Identity $configItemId Reference to configItem
     * @return \jtl\Connector\Model\ConfigItemPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigItemId(Identity $configItemId)
    {
        return $this->setProperty('_configItemId', $configItemId, 'Identity');
    }
    
    /**
     * @return Identity Reference to configItem
     */
    public function getConfigItemId()
    {
        return $this->_configItemId;
    }

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ConfigItemPrice
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
     * @param  Identity $taxClassId 
     * @return \jtl\Connector\Model\ConfigItemPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTaxClassId(Identity $taxClassId)
    {
        return $this->setProperty('_taxClassId', $taxClassId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getTaxClassId()
    {
        return $this->_taxClassId;
    }
}

