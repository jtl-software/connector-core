<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class SpecialPrice extends DataModel
{
    /**
     * @type Identity 
     */
    public $_customerGroupId = null;

    /**
     * @type Identity 
     */
    public $_productSpecialPriceId = null;

    /**
     * @type integer 
     */
    public $_connectorId = 0;

    /**
     * @type float 
     */
    public $_priceNet = 0.0;


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_productSpecialPriceId',
        '_customerGroupId',
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
     * @param  integer $connectorId 
     * @return \jtl\Connector\Model\SpecialPrice
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
     * @param  Identity $productSpecialPriceId 
     * @return \jtl\Connector\Model\SpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductSpecialPriceId(Identity $productSpecialPriceId)
    {
        return $this->setProperty('_productSpecialPriceId', $productSpecialPriceId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getProductSpecialPriceId()
    {
        return $this->_productSpecialPriceId;
    }

    /**
     * @param  Identity $customerGroupId 
     * @return \jtl\Connector\Model\SpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('_customerGroupId', $customerGroupId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }

    /**
     * @param  float $priceNet 
     * @return \jtl\Connector\Model\SpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setPriceNet($priceNet)
    {
        return $this->setProperty('_priceNet', $priceNet, 'float');
    }
    
    /**
     * @return float 
     */
    public function getPriceNet()
    {
        return $this->_priceNet;
    }
}

