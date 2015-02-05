<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Product price item properties.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
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
     * @var Identity Optional quantity to apply netPrice for. Default 1 for default price. A quantity value of 3 means that the given product price will be applied when a customer buys 3 or more items. 
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("quantity")
     * @Serializer\Accessor(getter="getQuantity",setter="setQuantity")
     */
    protected $quantity = null;

    /**
     * @var double Price value (net)
     * @Serializer\Type("double")
     * @Serializer\SerializedName("netPrice")
     * @Serializer\Accessor(getter="getNetPrice",setter="setNetPrice")
     */
    protected $netPrice = 0.0;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productPriceId = new Identity();
        $this->quantity = new Identity();
    }

    /**
     * @param Identity $productPriceId Reference to ProductPrice
     * @return \jtl\Connector\Model\ProductPriceItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductPriceId(Identity $productPriceId)
    {
        return $this->setProperty('productPriceId', $productPriceId, 'Identity');
    }

    /**
     * @return Identity Reference to ProductPrice
     */
    public function getProductPriceId()
    {
        return $this->productPriceId;
    }

    /**
     * @param Identity $quantity Optional quantity to apply netPrice for. Default 1 for default price. A quantity value of 3 means that the given product price will be applied when a customer buys 3 or more items. 
     * @return \jtl\Connector\Model\ProductPriceItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setQuantity(Identity $quantity)
    {
        return $this->setProperty('quantity', $quantity, 'Identity');
    }

    /**
     * @return Identity Optional quantity to apply netPrice for. Default 1 for default price. A quantity value of 3 means that the given product price will be applied when a customer buys 3 or more items. 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param double $netPrice Price value (net)
     * @return \jtl\Connector\Model\ProductPriceItem
     */
    public function setNetPrice($netPrice)
    {
        return $this->setProperty('netPrice', $netPrice, 'double');
    }

    /**
     * @return double Price value (net)
     */
    public function getNetPrice()
    {
        return $this->netPrice;
    }
}
