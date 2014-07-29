<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Special product price properties to specify date and stock limits..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductSpecialPrice extends DataModel
{
    /**
     * @type Identity Unique productSpecialPrice id
     */
    protected $id = null;

    /**
     * @type Identity Reference to product
     */
    protected $productId = null;

    /**
     * @type DateTime|null Optional: Activate special price from date
     */
    protected $activeFrom = null;

    /**
     * @type DateTime|null Optional: Special price active until date
     */
    protected $activeUntil = null;

    /**
     * @type integer|null Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     */
    protected $considerDateLimit = 0;

    /**
     * @type integer|null Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     */
    protected $considerStockLimit = 0;

    /**
     * @type boolean Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
     */
    protected $isActive = false;

    /**
     * @type integer|null Optional: SpecialPrice active until stock level quantity
     */
    protected $stockLimit = 0;

    /**
     * Nav [ProductSpecialPrice » One]
     *
     * @type \jtl\Connector\Model\SpecialPrice[]
     */
    protected $specialPrices = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'productId',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
        'specialPrices' => '\jtl\Connector\Model\SpecialPrice',
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->navigations;
    }

    /**
     * @param  DateTime $activeFrom Optional: Activate special price from date
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setActiveFrom(DateTime $activeFrom)
    {
        return $this->setProperty('activeFrom', $activeFrom, 'DateTime');
    }
    
    /**
     * @return DateTime Optional: Activate special price from date
     */
    public function getActiveFrom()
    {
        return $this->activeFrom;
    }

    /**
     * @param  integer $stockLimit Optional: SpecialPrice active until stock level quantity
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setStockLimit($stockLimit)
    {
        return $this->setProperty('stockLimit', $stockLimit, 'integer');
    }
    
    /**
     * @return integer Optional: SpecialPrice active until stock level quantity
     */
    public function getStockLimit()
    {
        return $this->stockLimit;
    }

    /**
     * @param  DateTime $activeUntil Optional: Special price active until date
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setActiveUntil(DateTime $activeUntil)
    {
        return $this->setProperty('activeUntil', $activeUntil, 'DateTime');
    }
    
    /**
     * @return DateTime Optional: Special price active until date
     */
    public function getActiveUntil()
    {
        return $this->activeUntil;
    }

    /**
     * @param  integer $considerDateLimit Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setConsiderDateLimit($considerDateLimit)
    {
        return $this->setProperty('considerDateLimit', $considerDateLimit, 'integer');
    }
    
    /**
     * @return integer Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     */
    public function getConsiderDateLimit()
    {
        return $this->considerDateLimit;
    }

    /**
     * @param  integer $considerStockLimit Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setConsiderStockLimit($considerStockLimit)
    {
        return $this->setProperty('considerStockLimit', $considerStockLimit, 'integer');
    }
    
    /**
     * @return integer Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     */
    public function getConsiderStockLimit()
    {
        return $this->considerStockLimit;
    }

    /**
     * @param  Identity $id Unique productSpecialPrice id
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique productSpecialPrice id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  boolean $isActive Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('isActive', $isActive, 'boolean');
    }
    
    /**
     * @return boolean Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param  \jtl\Connector\Model\SpecialPrice $specialPrice
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function addSpecialPrice(\jtl\Connector\Model\SpecialPrice $specialPrice)
    {
        $this->specialPrices[] = $specialPrice;
        return $this;
    }

    /**
     * @param  array $specialPrices
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function addSpecialPrices(array $specialPrices)
    {
		$this->specialPrices = array_merge($this->specialPrices, $specialPrices);
        return $this;
    }
    
    /**
     * @return SpecialPrice
     */
    public function getSpecialPrices()
    {
        return $this->specialPrices;
    }

    /**
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function clearSpecialPrices()
    {
        $this->specialPrices = array();
        return $this;
    }
}

