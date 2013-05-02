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
     * @var 
     */
    protected $_productId;
    
    /**
     * @var 
     */
    protected $_warehouseId;
    
    /**
     * @var 
     */
    protected $_stockLevel;
    
    /**
     * @var 
     */
    protected $_inflowDate;
    
    /**
     * @param  $productId
     * @return \jtl\Connector\Model\ProductWarehouseInfo
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
     * @param  $warehouseId
     * @return \jtl\Connector\Model\ProductWarehouseInfo
     */
    public function setWarehouseId($warehouseId)
    {
        $this->_warehouseId = ()$warehouseId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getWarehouseId()
    {
        return $this->_warehouseId;
    }
    
    /**
     * @param  $stockLevel
     * @return \jtl\Connector\Model\ProductWarehouseInfo
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
     * @param  $inflowDate
     * @return \jtl\Connector\Model\ProductWarehouseInfo
     */
    public function setInflowDate($inflowDate)
    {
        $this->_inflowDate = ()$inflowDate;
        return $this;
    }
    
    /**
     * @return 
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
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductWarehouseInfo/ProductWarehouseInfo.json", $this->getPublic(array()));
    }
}
?>