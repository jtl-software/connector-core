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
 * Product price item properties.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductPriceItem extends DataModel
{
    /**
     * @var Identity Reference to ProductPrice
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productPriceId")
     * @Serializer\Accessor(getter="getProductPriceId",setter="setProductPriceId")
     */
    protected $productPriceId = null;
    
    /**
     * @var double Price value (net)
     * @Serializer\Type("double")
     * @Serializer\SerializedName("netPrice")
     * @Serializer\Accessor(getter="getNetPrice",setter="setNetPrice")
     */
    protected $netPrice = 0.0;
    
    /**
     * @var integer Optional quantity to apply netPrice for. Default 1 for default price. A quantity value of 3 means that the given product price will be applied when a customer buys 3 or more items.
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("quantity")
     * @Serializer\Accessor(getter="getQuantity",setter="setQuantity")
     */
    protected $quantity = 0;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productPriceId = new Identity();
    }
    
    /**
     * @param Identity $productPriceId Reference to ProductPrice
     * @return ProductPriceItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductPriceId(Identity $productPriceId): ProductPriceItem
    {
        $this->productPriceId = $productPriceId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to ProductPrice
     */
    public function getProductPriceId(): Identity
    {
        return $this->productPriceId;
    }
    
    /**
     * @param double $netPrice Price value (net)
     * @return ProductPriceItem
     */
    public function setNetPrice(float $netPrice): ProductPriceItem
    {
        $this->netPrice = $netPrice;
        
        return $this;
    }
    
    /**
     * @return double Price value (net)
     */
    public function getNetPrice(): float
    {
        return $this->netPrice;
    }
    
    /**
     * @param integer $quantity Optional quantity to apply netPrice for. Default 1 for default price. A quantity value of 3 means that the given product price will be applied when a customer buys 3 or more items.
     * @return ProductPriceItem
     */
    public function setQuantity(int $quantity): ProductPriceItem
    {
        $this->quantity = $quantity;
        
        return $this;
    }
    
    /**
     * @return float Optional quantity to apply netPrice for. Default 1 for default price. A quantity value of 3 means that the given product price will be applied when a customer buys 3 or more items.
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }
}
