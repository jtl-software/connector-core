<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Special product price properties to specify date and stock limits..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductSpecialPrice extends DataModel
{
    /**
     * @type Identity Unique productSpecialPrice id
     */
    public $_id = null;

    /**
     * @type Identity Reference to product
     */
    public $_productId = null;

    /**
     * @type DateTime|null Optional: Activate special price from date
     */
    public $_activeFrom = null;

    /**
     * @type DateTime|null Optional: Special price active until date
     */
    public $_activeUntil = null;

    /**
     * @type integer|null Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     */
    public $_considerDateLimit = 0;

    /**
     * @type integer|null Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     */
    public $_considerStockLimit = 0;

    /**
     * @type boolean Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
     */
    public $_isActive = false;

    /**
     * @type integer|null Optional: SpecialPrice active until stock level quantity
     */
    public $_stockLimit = 0;

    /**
     * Nav [ProductSpecialPrice » One]
     *
     * @type \jtl\Connector\Model\SpecialPrice[]
     */
    public $_specialPrices = array();


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_productId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
        '_specialPrices' => '\jtl\Connector\Model\SpecialPrice',
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
     * @param  DateTime $activeFrom Optional: Activate special price from date
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setActiveFrom(DateTime $activeFrom)
    {
        return $this->setProperty('_activeFrom', $activeFrom, 'DateTime');
    }
    
    /**
     * @return DateTime Optional: Activate special price from date
     */
    public function getActiveFrom()
    {
        return $this->_activeFrom;
    }

    /**
     * @param  integer $stockLimit Optional: SpecialPrice active until stock level quantity
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setStockLimit($stockLimit)
    {
        return $this->setProperty('_stockLimit', $stockLimit, 'integer');
    }
    
    /**
     * @return integer Optional: SpecialPrice active until stock level quantity
     */
    public function getStockLimit()
    {
        return $this->_stockLimit;
    }

    /**
     * @param  DateTime $activeUntil Optional: Special price active until date
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setActiveUntil(DateTime $activeUntil)
    {
        return $this->setProperty('_activeUntil', $activeUntil, 'DateTime');
    }
    
    /**
     * @return DateTime Optional: Special price active until date
     */
    public function getActiveUntil()
    {
        return $this->_activeUntil;
    }

    /**
     * @param  integer $considerDateLimit Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setConsiderDateLimit($considerDateLimit)
    {
        return $this->setProperty('_considerDateLimit', $considerDateLimit, 'integer');
    }
    
    /**
     * @return integer Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     */
    public function getConsiderDateLimit()
    {
        return $this->_considerDateLimit;
    }

    /**
     * @param  integer $considerStockLimit Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setConsiderStockLimit($considerStockLimit)
    {
        return $this->setProperty('_considerStockLimit', $considerStockLimit, 'integer');
    }
    
    /**
     * @return integer Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     */
    public function getConsiderStockLimit()
    {
        return $this->_considerStockLimit;
    }

    /**
     * @param  Identity $id Unique productSpecialPrice id
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique productSpecialPrice id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('_productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }

    /**
     * @param  boolean $isActive Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('_isActive', $isActive, 'boolean');
    }
    
    /**
     * @return boolean Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
     */
    public function getIsActive()
    {
        return $this->_isActive;
    }

    /**
     * @param  \jtl\Connector\Model\SpecialPrice $specialPrice
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function addSpecialPrice(\jtl\Connector\Model\SpecialPrice $specialPrice)
    {
        $this->_specialPrices[] = $specialPrice;
        return $this;
    }
    
    /**
     * @return SpecialPrice
     */
    public function getSpecialPrices()
    {
        return $this->_specialPrices;
    }

    /**
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function clearSpecialPrices()
    {
        $this->_specialPrices = array();
        return $this;
    }
}

