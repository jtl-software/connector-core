<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductSpecialPrice Model
 * @access public
 */
abstract class ProductSpecialPrice extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var string
     */
    protected $_isActive;
    
    /**
     * @var string
     */
    protected $_activeFrom;
    
    /**
     * @var string
     */
    protected $_activeUntil;
    
    /**
     * @var int
     */
    protected $_quantityLimit;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param int $productId
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setProductId($productId)
    {
        $this->_productId = (int)$productId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    /**
     * @param string $isActive
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setIsActive($isActive)
    {
        $this->_isActive = (string)$isActive;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIsActive()
    {
        return $this->_isActive;
    }
    /**
     * @param string $activeFrom
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setActiveFrom($activeFrom)
    {
        $this->_activeFrom = (string)$activeFrom;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getActiveFrom()
    {
        return $this->_activeFrom;
    }
    /**
     * @param string $activeUntil
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setActiveUntil($activeUntil)
    {
        $this->_activeUntil = (string)$activeUntil;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getActiveUntil()
    {
        return $this->_activeUntil;
    }
    /**
     * @param int $quantityLimit
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setQuantityLimit($quantityLimit)
    {
        $this->_quantityLimit = (int)$quantityLimit;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getQuantityLimit()
    {
        return $this->_quantityLimit;
    }
}
?>