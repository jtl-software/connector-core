<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Tax rate model (set in JTL-Wawi ERP)..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class TaxRate extends DataModel
{
    /**
     * @type Identity Unique taxRate id
     */
    public $_id = null;

    /**
     * @type Identity Reference to taxClass
     */
    public $_taxClassId = null;

    /**
     * @type Identity Reference to taxZone
     */
    public $_taxZoneId = null;

    /**
     * @type integer|null Optional priority number. Higher value means higher priority
     */
    public $_priority = 0;

    /**
     * @type float|null Tax rate value e.g. 19.00
     */
    public $_rate = 0.0;


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_taxZoneId',
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
     * @param  float $rate Tax rate value e.g. 19.00
     * @return \jtl\Connector\Model\TaxRate
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setRate($rate)
    {
        return $this->setProperty('_rate', $rate, 'float');
    }
    
    /**
     * @return float Tax rate value e.g. 19.00
     */
    public function getRate()
    {
        return $this->_rate;
    }

    /**
     * @param  integer $priority Optional priority number. Higher value means higher priority
     * @return \jtl\Connector\Model\TaxRate
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setPriority($priority)
    {
        return $this->setProperty('_priority', $priority, 'integer');
    }
    
    /**
     * @return integer Optional priority number. Higher value means higher priority
     */
    public function getPriority()
    {
        return $this->_priority;
    }

    /**
     * @param  Identity $id Unique taxRate id
     * @return \jtl\Connector\Model\TaxRate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique taxRate id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $taxZoneId Reference to taxZone
     * @return \jtl\Connector\Model\TaxRate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTaxZoneId(Identity $taxZoneId)
    {
        return $this->setProperty('_taxZoneId', $taxZoneId, 'Identity');
    }
    
    /**
     * @return Identity Reference to taxZone
     */
    public function getTaxZoneId()
    {
        return $this->_taxZoneId;
    }

    /**
     * @param  Identity $taxClassId Reference to taxClass
     * @return \jtl\Connector\Model\TaxRate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTaxClassId(Identity $taxClassId)
    {
        return $this->setProperty('_taxClassId', $taxClassId, 'Identity');
    }
    
    /**
     * @return Identity Reference to taxClass
     */
    public function getTaxClassId()
    {
        return $this->_taxClassId;
    }
}

