<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * customer order item variation.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerOrderItemVariation extends DataModel
{
    /**
     * @type Identity Reference to customerOrderItem
     */
    public $_customerOrderItemId = null;

    /**
     * @type Identity Unique customerOrderItemVariation id
     */
    public $_id = null;

    /**
     * @type Identity 
     */
    public $_productId = null;

    /**
     * @type Identity Reference to productVariation
     */
    public $_productVariationId = null;

    /**
     * @type Identity Reference to productVariationValue
     */
    public $_productVariationValueId = null;

    /**
     * @type string Variation name e.g. "color"
     */
    public $_productVariationName = '';

    /**
     * @type string Variation value e.g. "red"
     */
    public $_productVariationValueName = '';

    /**
     * @type float|null Optional extra surcharge (added to item price)
     */
    public $_surcharge = 0.0;


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_productVariationValueId',
        '_customerOrderItemId',
        '_productId',
        '_productVariationId',
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
     * @param  string $productVariationName Variation name e.g. "color"
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setProductVariationName($productVariationName)
    {
        return $this->setProperty('_productVariationName', $productVariationName, 'string');
    }
    
    /**
     * @return string Variation name e.g. "color"
     */
    public function getProductVariationName()
    {
        return $this->_productVariationName;
    }

    /**
     * @param  string $productVariationValueName Variation value e.g. "red"
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setProductVariationValueName($productVariationValueName)
    {
        return $this->setProperty('_productVariationValueName', $productVariationValueName, 'string');
    }
    
    /**
     * @return string Variation value e.g. "red"
     */
    public function getProductVariationValueName()
    {
        return $this->_productVariationValueName;
    }

    /**
     * @param  float $surcharge Optional extra surcharge (added to item price)
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setSurcharge($surcharge)
    {
        return $this->setProperty('_surcharge', $surcharge, 'float');
    }
    
    /**
     * @return float Optional extra surcharge (added to item price)
     */
    public function getSurcharge()
    {
        return $this->_surcharge;
    }

    /**
     * @param  Identity $id Unique customerOrderItemVariation id
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique customerOrderItemVariation id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $productVariationValueId Reference to productVariationValue
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueId(Identity $productVariationValueId)
    {
        return $this->setProperty('_productVariationValueId', $productVariationValueId, 'Identity');
    }
    
    /**
     * @return Identity Reference to productVariationValue
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }

    /**
     * @param  Identity $customerOrderItemId Reference to customerOrderItem
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderItemId(Identity $customerOrderItemId)
    {
        return $this->setProperty('_customerOrderItemId', $customerOrderItemId, 'Identity');
    }
    
    /**
     * @return Identity Reference to customerOrderItem
     */
    public function getCustomerOrderItemId()
    {
        return $this->_customerOrderItemId;
    }

    /**
     * @param  Identity $productId 
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
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
     * @param  Identity $productVariationId Reference to productVariation
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationId(Identity $productVariationId)
    {
        return $this->setProperty('_productVariationId', $productVariationId, 'Identity');
    }
    
    /**
     * @return Identity Reference to productVariation
     */
    public function getProductVariationId()
    {
        return $this->_productVariationId;
    }
}

