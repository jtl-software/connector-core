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
     * @type string Optional: Activate special price from date
     */
    protected $activeFrom = '';

    /**
     * @type string Optional: Special price active until date
     */
    protected $activeUntil = '';

    /**
     * @type bool Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     */
    protected $considerDateLimit = false;

    /**
     * @type bool Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     */
    protected $considerStockLimit = false;

    /**
     * @type bool Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
     */
    protected $isActive = false;

    /**
     * @type double Optional: SpecialPrice active until stock level quantity
     */
    protected $stockLimit = 0.0;

    /**
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
     * @param  Identity $id Unique productSpecialPrice id
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
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
        return $this->setProperty('ProductId', $productId, 'Identity');
    }

    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  string $activeFrom Optional: Activate special price from date
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setActiveFrom(Identity $activeFrom)
    {
        return $this->setProperty('ActiveFrom', $activeFrom, 'string');
    }

    /**
     * @return string Optional: Activate special price from date
     */
    public function getActiveFrom()
    {
        return $this->activeFrom;
    }

    /**
     * @param  string $activeUntil Optional: Special price active until date
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setActiveUntil(Identity $activeUntil)
    {
        return $this->setProperty('ActiveUntil', $activeUntil, 'string');
    }

    /**
     * @return string Optional: Special price active until date
     */
    public function getActiveUntil()
    {
        return $this->activeUntil;
    }

    /**
     * @param  bool $considerDateLimit Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConsiderDateLimit(Identity $considerDateLimit)
    {
        return $this->setProperty('ConsiderDateLimit', $considerDateLimit, 'bool');
    }

    /**
     * @return bool Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     */
    public function getConsiderDateLimit()
    {
        return $this->considerDateLimit;
    }

    /**
     * @param  bool $considerStockLimit Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConsiderStockLimit(Identity $considerStockLimit)
    {
        return $this->setProperty('ConsiderStockLimit', $considerStockLimit, 'bool');
    }

    /**
     * @return bool Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     */
    public function getConsiderStockLimit()
    {
        return $this->considerStockLimit;
    }

    /**
     * @param  bool $isActive Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsActive(Identity $isActive)
    {
        return $this->setProperty('IsActive', $isActive, 'bool');
    }

    /**
     * @return bool Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param  double $stockLimit Optional: SpecialPrice active until stock level quantity
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setStockLimit(Identity $stockLimit)
    {
        return $this->setProperty('StockLimit', $stockLimit, 'double');
    }

    /**
     * @return double Optional: SpecialPrice active until stock level quantity
     */
    public function getStockLimit()
    {
        return $this->stockLimit;
    }

    /**
     * @param  \jtl\Connector\Model\SpecialPrice $specialPrices
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function addSpecialPrice(\jtl\Connector\Model\SpecialPrice $specialPrice)
    {
        $this->specialPrices[] = $specialPrice;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\SpecialPrice[]
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
