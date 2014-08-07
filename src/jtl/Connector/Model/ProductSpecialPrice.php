<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Special product price properties to specify date and stock limits..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class ProductSpecialPrice extends DataModel
{
    /**
     * @var Identity Unique productSpecialPrice id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $id = null;

    /**
     * @var Identity Reference to product
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $productId = null;

    /**
     * @var DateTime Optional: Activate special price from date
     * @Serializer\Type("DateTime")
     */
    protected $activeFrom = null;

    /**
     * @var DateTime Optional: Special price active until date
     * @Serializer\Type("DateTime")
     */
    protected $activeUntil = null;

    /**
     * @var bool Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     * @Serializer\Type("boolean")
     */
    protected $considerDateLimit = false;

    /**
     * @var bool Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     * @Serializer\Type("boolean")
     */
    protected $considerStockLimit = false;

    /**
     * @var bool Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
     * @Serializer\Type("boolean")
     */
    protected $isActive = false;

    /**
     * @var double Optional: SpecialPrice active until stock level quantity
     * @Serializer\Type("double")
     */
    protected $stockLimit = 0.0;

    /**
     * @var \jtl\Connector\Model\SpecialPrice[]
     * @Serializer\Type("array<jtl\Connector\Model\SpecialPrice>")
     */
    protected $specialPrices = array();

    public function __construct()
    {
        $this->id = new Identity;
        $this->productId = new Identity;
    }

    /**
     * @param  Identity $id Unique productSpecialPrice id
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  DateTime $activeFrom Optional: Activate special price from date
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
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
     * @param  DateTime $activeUntil Optional: Special price active until date
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
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
     * @param  bool $considerDateLimit Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     * @return \jtl\Connector\Model\ProductSpecialPrice
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setConsiderDateLimit($considerDateLimit)
    {
        return $this->setProperty('considerDateLimit', $considerDateLimit, 'bool');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setConsiderStockLimit($considerStockLimit)
    {
        return $this->setProperty('considerStockLimit', $considerStockLimit, 'bool');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('isActive', $isActive, 'bool');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setStockLimit($stockLimit)
    {
        return $this->setProperty('stockLimit', $stockLimit, 'double');
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
