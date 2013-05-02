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
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_productVariationId;
    
    /**
     * @var double
     */
    protected $_extraWeight;
    
    /**
     * @var string
     */
    protected $_sku;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @var double
     */
    protected $_stockLevel;
    
    /**
     * @var double
     */
    protected $_packagingUnitId;
    
    /**
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_productVariationValueId;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var int
     */
    protected $_customerGroupId;
    
    /**
     * @var int
     */
    protected $_productVariationValueId;
    
    /**
     * @var double
     */
    protected $_extraChargeNet;
    
    /**
     * @var int
     */
    protected $_customerGroupId;
    
    /**
     * @var int
     */
    protected $_productVariationValueId;
    
    /**
     * @var int
     */
    protected $_productVariationValueId;
    
    /**
     * @var int
     */
    protected $_productVariationValueTargetId;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\ProductVariationValue
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
     * @param int $productVariationId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setProductVariationId($productVariationId)
    {
        $this->_productVariationId = (int)$productVariationId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductVariationId()
    {
        return $this->_productVariationId;
    }
    
    /**
     * @param double $extraWeight
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setExtraWeight($extraWeight)
    {
        $this->_extraWeight = (double)$extraWeight;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getExtraWeight()
    {
        return $this->_extraWeight;
    }
    
    /**
     * @param string $sku
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setSku($sku)
    {
        $this->_sku = (string)$sku;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSku()
    {
        return $this->_sku;
    }
    
    /**
     * @param int $sort
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getSort()
    {
        return $this->_sort;
    }
    
    /**
     * @param double $stockLevel
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setStockLevel($stockLevel)
    {
        $this->_stockLevel = (double)$stockLevel;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getStockLevel()
    {
        return $this->_stockLevel;
    }
    
    /**
     * @param double $packagingUnitId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setPackagingUnitId($packagingUnitId)
    {
        $this->_packagingUnitId = (double)$packagingUnitId;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getPackagingUnitId()
    {
        return $this->_packagingUnitId;
    }
    
    /**
     * @param int $languageIso
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = (int)$languageIso;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getLanguageIso()
    {
        return $this->_languageIso;
    }
    
    /**
     * @param int $productVariationValueId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = (int)$productVariationValueId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    
    /**
     * @param string $name
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param int $customerGroupId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (int)$customerGroupId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    
    /**
     * @param int $productVariationValueId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = (int)$productVariationValueId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    
    /**
     * @param double $extraChargeNet
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setExtraChargeNet($extraChargeNet)
    {
        $this->_extraChargeNet = (double)$extraChargeNet;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getExtraChargeNet()
    {
        return $this->_extraChargeNet;
    }
    
    /**
     * @param int $customerGroupId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (int)$customerGroupId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    
    /**
     * @param int $productVariationValueId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = (int)$productVariationValueId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    
    /**
     * @param int $productVariationValueId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = (int)$productVariationValueId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    
    /**
     * @param int $productVariationValueTargetId
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function setProductVariationValueTargetId($productVariationValueTargetId)
    {
        $this->_productVariationValueTargetId = (int)$productVariationValueTargetId;
        return $this;
    }
    
    /**
     * @return int
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
        Schema::validateModel(CONNECTOR_DIR . "schema/productvariationvalue/productvariationvalue.json", $this->getPublic(array()));
    }
}
?>