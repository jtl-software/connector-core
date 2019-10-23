<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductStockLevel extends DataModel
{
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("stockLevel")
     * @Serializer\Accessor(getter="getStockLevel",setter="setStockLevel")
     */
    protected $stockLevel = 0.0;

    /**
     * @param double $stockLevel
     * @return ProductStockLevel
     */
    public function setStockLevel(float $stockLevel): ProductStockLevel
    {
        $this->stockLevel = $stockLevel;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getStockLevel(): float
    {
        return $this->stockLevel;
    }
}
