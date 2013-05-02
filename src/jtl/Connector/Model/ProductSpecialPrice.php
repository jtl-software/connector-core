<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ProductSpecialPrice Model
 * @access public
 */
abstract class ProductSpecialPrice extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_productId;
    
    /**
     * @var 
     */
    protected $_isActive;
    
    /**
     * @var 
     */
    protected $_activeFrom;
    
    /**
     * @var 
     */
    protected $_activeUntil;
    
    /**
     * @var 
     */
    protected $_quantityLimit;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setId($id)
    {
        $this->_id = ()$id;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param  $productId
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setProductId($productId)
    {
        $this->_productId = ()$productId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    
    /**
     * @param  $isActive
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setIsActive($isActive)
    {
        $this->_isActive = ()$isActive;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIsActive()
    {
        return $this->_isActive;
    }
    
    /**
     * @param  $activeFrom
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setActiveFrom($activeFrom)
    {
        $this->_activeFrom = ()$activeFrom;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getActiveFrom()
    {
        return $this->_activeFrom;
    }
    
    /**
     * @param  $activeUntil
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setActiveUntil($activeUntil)
    {
        $this->_activeUntil = ()$activeUntil;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getActiveUntil()
    {
        return $this->_activeUntil;
    }
    
    /**
     * @param  $quantityLimit
     * @return \jtl\Connector\Model\ProductSpecialPrice
     */
    public function setQuantityLimit($quantityLimit)
    {
        $this->_quantityLimit = ()$quantityLimit;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getQuantityLimit()
    {
        return $this->_quantityLimit;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductSpecialPrice/ProductSpecialPrice.json", $this->getPublic(array()));
    }
}
?>