<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ProductWarehouseInfo Model
 * @access public
 */
abstract class ProductWarehouseInfo extends Model
{
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var int
     */
    protected $_warehouseId;
    
    /**
     * @var double
     */
    protected $_stockLevel;
    
    /**
     * @var string
     */
    protected $_inflowDate;
    
    /**
     * @param int $productId
     * @return \jtl\Connector\Model\ProductWarehouseInfo
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
     * @param int $warehouseId
     * @return \jtl\Connector\Model\ProductWarehouseInfo
     */
    public function setWarehouseId($warehouseId)
    {
        $this->_warehouseId = (int)$warehouseId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getWarehouseId()
    {
        return $this->_warehouseId;
    }
    
    /**
     * @param double $stockLevel
     * @return \jtl\Connector\Model\ProductWarehouseInfo
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
     * @param string $inflowDate
     * @return \jtl\Connector\Model\ProductWarehouseInfo
     */
    public function setInflowDate($inflowDate)
    {
        $this->_inflowDate = (string)$inflowDate;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getInflowDate()
    {
        return $this->_inflowDate;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/productwarehouseinfo/productwarehouseinfo.json", $this->getPublic(array()));
    }
}
?>