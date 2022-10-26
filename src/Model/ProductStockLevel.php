<?php

/**
 * @copyright  2010-2015 JTL-Software GmbH
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductStockLevel extends AbstractModel
{
    /**
     * @var Identity
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;

    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("stockLevel")
     * @Serializer\Accessor(getter="getStockLevel",setter="setStockLevel")
     */
    protected $stockLevel = 0.0;

    /**
     * ProductStockLevel constructor.
     */
    public function __construct()
    {
        $this->productId = new Identity();
    }

    /**
     * @return Identity
     */
    public function getProductId(): Identity
    {
        return $this->productId;
    }

    /**
     * @param Identity $productId
     *
     * @return ProductStockLevel
     */
    public function setProductId(Identity $productId): ProductStockLevel
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @return double
     */
    public function getStockLevel(): float
    {
        return $this->stockLevel;
    }

    /**
     * @param double $stockLevel
     *
     * @return ProductStockLevel
     */
    public function setStockLevel(float $stockLevel): ProductStockLevel
    {
        $this->stockLevel = $stockLevel;

        return $this;
    }
}
