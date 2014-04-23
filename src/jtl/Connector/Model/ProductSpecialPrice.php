<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Special product price properties to specify date and stock limits.
 *
 * @access public
 * @subpackage Product
 */
class ProductSpecialPrice extends DataModel
{
    /**
     * @var Identity Unique productSpecialPrice id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to product
     */
    protected $_productId = null;
    
    /**
     * @var bool Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
     */
    protected $_isActive = true;
    
    /**
     * @var string Optional: Activate special price from date
     */
    protected $_activeFrom = null;
    
    /**
     * @var string Optional: Special price active until date
     */
    protected $_activeUntil = null;
    
    /**
     * @var double Optional: SpecialPrice active until stock level quantity
     */
    protected $_stockLimit = 0;
    
    /**
     * @var bool Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     */
    protected $_considerStockLimit = false;
    
    /**
     * @var bool Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     */
    protected $_considerDateLimit = false;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id',
        '_productId'
    );
    
    /**
     * ProductSpecialPrice Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_id":
                case "_productId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_isActive":
                case "_considerStockLimit":
                case "_considerDateLimit":
                
                    $this->$name = (bool)$value;
                    break;
            
                case "_activeFrom":
                case "_activeUntil":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_stockLimit":
                
                    $this->$name = (double)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique productSpecialPrice id
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique productSpecialPrice id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setProductId(Identity $productId)
    {
        $this->_productId = $productId;
        return $this;
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    /**
     * @param bool $isActive Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setIsActive($isActive)
    {
        $this->_isActive = (bool)$isActive;
        return $this;
    }
    
    /**
     * @return bool Special price is active? Default true, to activate specialPrice. Special price can still be inactivated, if date or stock Limitations do not match. 
     */
    public function getIsActive()
    {
        return $this->_isActive;
    }
    /**
     * @param string $activeFrom Optional: Activate special price from date
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setActiveFrom($activeFrom)
    {
        $this->_activeFrom = (string)$activeFrom;
        return $this;
    }
    
    /**
     * @return string Optional: Activate special price from date
     */
    public function getActiveFrom()
    {
        return $this->_activeFrom;
    }
    /**
     * @param string $activeUntil Optional: Special price active until date
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setActiveUntil($activeUntil)
    {
        $this->_activeUntil = (string)$activeUntil;
        return $this;
    }
    
    /**
     * @return string Optional: Special price active until date
     */
    public function getActiveUntil()
    {
        return $this->_activeUntil;
    }
    /**
     * @param double $stockLimit Optional: SpecialPrice active until stock level quantity
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setStockLimit($stockLimit)
    {
        $this->_stockLimit = (double)$stockLimit;
        return $this;
    }
    
    /**
     * @return double Optional: SpecialPrice active until stock level quantity
     */
    public function getStockLimit()
    {
        return $this->_stockLimit;
    }
    /**
     * @param bool $considerStockLimit Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setConsiderStockLimit($considerStockLimit)
    {
        $this->_considerStockLimit = (bool)$considerStockLimit;
        return $this;
    }
    
    /**
     * @return bool Optional: Consider stockLimit value. If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     */
    public function getConsiderStockLimit()
    {
        return $this->_considerStockLimit;
    }
    /**
     * @param bool $considerDateLimit Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setConsiderDateLimit($considerDateLimit)
    {
        $this->_considerDateLimit = (bool)$considerDateLimit;
        return $this;
    }
    
    /**
     * @return bool Optional: Consider activeFrom/activeUntil date range. If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     */
    public function getConsiderDateLimit()
    {
        return $this->_considerDateLimit;
    }
}