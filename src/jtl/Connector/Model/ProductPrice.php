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
class ProductPrice extends DataModel
{
    /**
     * @type Identity 
     */
    public $_customerGroupId = null;

    /**
     * @type Identity 
     */
    public $_productId = null;

    /**
     * @type float 
     */
    public $_netPrice = 0.0;

    /**
     * @type integer 
     */
    public $_quantity = 0;


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_customerGroupId',
        '_productId',
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
     * @param  Identity $customerGroupId 
     * @return \jtl\Connector\Model\ProductPrice
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
     * @param  Identity $productId 
     * @return \jtl\Connector\Model\ProductPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('_productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getProductId()
    {
        return $this->_productId;
    }

    /**
     * @param  float $netPrice 
     * @return \jtl\Connector\Model\ProductPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPrice($netPrice)
    {
        return $this->setProperty('_netPrice', $netPrice, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPrice()
    {
        return $this->_netPrice;
    }

    /**
     * @param  integer $quantity 
     * @return \jtl\Connector\Model\ProductPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setQuantity($quantity)
    {
        return $this->setProperty('_quantity', $quantity, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }
}

