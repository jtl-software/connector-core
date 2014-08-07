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
 * Product to warehouse info association..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class ProductWarehouseInfo extends DataModel
{
    /**
     * @var Identity Reference to product
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $productId = null;

    /**
     * @var Identity Reference to warehouse
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $warehouseId = null;

    /**
     * @var DateTime Optional product inflow date for specified warehouse
     * @Serializer\Type("DateTime")
     */
    protected $inflowDate = null;

    /**
     * @var double Optional product inflow quantity for specified warehouse
     * @Serializer\Type("double")
     */
    protected $inflowQuantity = 0.0;

    /**
     * @var double Optional product stock level in specified warehouse
     * @Serializer\Type("double")
     */
    protected $stockLevel = 0.0;


    public function __construct()
    {
        $this->productId = new Identity;
        $this->warehouseId = new Identity;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductWarehouseInfo
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
     * @param  Identity $warehouseId Reference to warehouse
     * @return \jtl\Connector\Model\ProductWarehouseInfo
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setWarehouseId(Identity $warehouseId)
    {
        return $this->setProperty('warehouseId', $warehouseId, 'Identity');
    }

    /**
     * @return Identity Reference to warehouse
     */
    public function getWarehouseId()
    {
        return $this->warehouseId;
    }

    /**
     * @param  DateTime $inflowDate Optional product inflow date for specified warehouse
     * @return \jtl\Connector\Model\ProductWarehouseInfo
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setInflowDate(DateTime $inflowDate)
    {
        return $this->setProperty('inflowDate', $inflowDate, 'DateTime');
    }

    /**
     * @return DateTime Optional product inflow date for specified warehouse
     */
    public function getInflowDate()
    {
        return $this->inflowDate;
    }

    /**
     * @param  double $inflowQuantity Optional product inflow quantity for specified warehouse
     * @return \jtl\Connector\Model\ProductWarehouseInfo
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setInflowQuantity($inflowQuantity)
    {
        return $this->setProperty('inflowQuantity', $inflowQuantity, 'double');
    }

    /**
     * @return double Optional product inflow quantity for specified warehouse
     */
    public function getInflowQuantity()
    {
        return $this->inflowQuantity;
    }

    /**
     * @param  double $stockLevel Optional product stock level in specified warehouse
     * @return \jtl\Connector\Model\ProductWarehouseInfo
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setStockLevel($stockLevel)
    {
        return $this->setProperty('stockLevel', $stockLevel, 'double');
    }

    /**
     * @return double Optional product stock level in specified warehouse
     */
    public function getStockLevel()
    {
        return $this->stockLevel;
    }

 
}
