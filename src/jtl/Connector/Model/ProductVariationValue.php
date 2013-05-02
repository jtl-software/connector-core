<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ProductVariationValue Model
 * @access public
 */
abstract class ProductVariationValue extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_productVariationId;
    
    /**
     * @var 
     */
    protected $_extraWeight;
    
    /**
     * @var 
     */
    protected $_sku;
    
    /**
     * @var 
     */
    protected $_sort;
    
    /**
     * @var 
     */
    protected $_stockLevel;
    
    /**
     * @var 
     */
    protected $_packagingUnitId;
    
    /**
     * @var 
     */
    protected $_languageIso;
    
    /**
     * @var 
     */
    protected $_productVariationValueId;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_customerGroupId;
    
    /**
     * @var 
     */
    protected $_productVariationValueId;
    
    /**
     * @var 
     */
    protected $_extraChargeNet;
    
    /**
     * @var string
     */
    protected $_customerGroupId;
    
    /**
     * @var 
     */
    protected $_productVariationValueId;
    
    /**
     * @var 
     */
    protected $_productVariationValueId;
    
    /**
     * @var 
     */
    protected $_productVariationValueTargetId;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\ProductVariationValue
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
     * @param  $productVariationId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setProductVariationId($productVariationId)
    {
        $this->_productVariationId = ()$productVariationId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductVariationId()
    {
        return $this->_productVariationId;
    }
    
    /**
     * @param  $extraWeight
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setExtraWeight($extraWeight)
    {
        $this->_extraWeight = ()$extraWeight;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getExtraWeight()
    {
        return $this->_extraWeight;
    }
    
    /**
     * @param  $sku
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setSku($sku)
    {
        $this->_sku = ()$sku;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSku()
    {
        return $this->_sku;
    }
    
    /**
     * @param  $sort
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setSort($sort)
    {
        $this->_sort = ()$sort;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSort()
    {
        return $this->_sort;
    }
    
    /**
     * @param  $stockLevel
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setStockLevel($stockLevel)
    {
        $this->_stockLevel = ()$stockLevel;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getStockLevel()
    {
        return $this->_stockLevel;
    }
    
    /**
     * @param  $packagingUnitId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setPackagingUnitId($packagingUnitId)
    {
        $this->_packagingUnitId = ()$packagingUnitId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getPackagingUnitId()
    {
        return $this->_packagingUnitId;
    }
    
    /**
     * @param  $languageIso
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = ()$languageIso;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getLanguageIso()
    {
        return $this->_languageIso;
    }
    
    /**
     * @param  $productVariationValueId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = ()$productVariationValueId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    
    /**
     * @param int $name
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setName($name)
    {
        $this->_name = (int)$name;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param string $customerGroupId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (string)$customerGroupId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    
    /**
     * @param  $productVariationValueId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = ()$productVariationValueId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    
    /**
     * @param  $extraChargeNet
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setExtraChargeNet($extraChargeNet)
    {
        $this->_extraChargeNet = ()$extraChargeNet;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getExtraChargeNet()
    {
        return $this->_extraChargeNet;
    }
    
    /**
     * @param string $customerGroupId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (string)$customerGroupId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    
    /**
     * @param  $productVariationValueId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = ()$productVariationValueId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    
    /**
     * @param  $productVariationValueId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = ()$productVariationValueId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    
    /**
     * @param  $productVariationValueTargetId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setProductVariationValueTargetId($productVariationValueTargetId)
    {
        $this->_productVariationValueTargetId = ()$productVariationValueTargetId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductVariationValueTargetId()
    {
        return $this->_productVariationValueTargetId;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductVariationValue/ProductVariationValue.json", $this->getPublic(array()));
    }
}
?>