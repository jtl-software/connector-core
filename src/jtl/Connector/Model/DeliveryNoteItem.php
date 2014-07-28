<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Delivery note item properties..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class DeliveryNoteItem extends DataModel
{
    /**
     * @type Identity Reference to customerOrderItem
     */
    public $_customerOrderItemId = null;

    /**
     * @type Identity Reference to deliveryNote
     */
    public $_deliveryNoteId = null;

    /**
     * @type string 
     */
    public $_cHinweis = '';

    /**
     * @type float|null Quantity delivered
     */
    public $_quantity = 0.0;


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_deliveryNoteId',
        '_customerOrderItemId',
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
     * @param  float $quantity Quantity delivered
     * @return \jtl\Connector\Model\DeliveryNoteItem
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setQuantity($quantity)
    {
        return $this->setProperty('_quantity', $quantity, 'float');
    }
    
    /**
     * @return float Quantity delivered
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }

    /**
     * @param  string $cHinweis 
     * @return \jtl\Connector\Model\DeliveryNoteItem
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCHinweis($cHinweis)
    {
        return $this->setProperty('_cHinweis', $cHinweis, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCHinweis()
    {
        return $this->_cHinweis;
    }

    /**
     * @param  Identity $deliveryNoteId Reference to deliveryNote
     * @return \jtl\Connector\Model\DeliveryNoteItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDeliveryNoteId(Identity $deliveryNoteId)
    {
        return $this->setProperty('_deliveryNoteId', $deliveryNoteId, 'Identity');
    }
    
    /**
     * @return Identity Reference to deliveryNote
     */
    public function getDeliveryNoteId()
    {
        return $this->_deliveryNoteId;
    }

    /**
     * @param  Identity $customerOrderItemId Reference to customerOrderItem
     * @return \jtl\Connector\Model\DeliveryNoteItem
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
}

