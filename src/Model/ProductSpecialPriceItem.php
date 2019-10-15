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
 * special price properties to define a net price for a customerGroup.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductSpecialPriceItem extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected $customerGroupId = null;
    
    /**
     * @var Identity Reference to productSpecialPrice
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productSpecialPriceId")
     * @Serializer\Accessor(getter="getProductSpecialPriceId",setter="setProductSpecialPriceId")
     */
    protected $productSpecialPriceId = null;
    
    /**
     * @var double net price value
     * @Serializer\Type("double")
     * @Serializer\SerializedName("priceNet")
     * @Serializer\Accessor(getter="getPriceNet",setter="setPriceNet")
     */
    protected $priceNet = 0.0;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customerGroupId = new Identity();
        $this->productSpecialPriceId = new Identity();
    }
    
    /**
     * @param Identity $customerGroupId Reference to customerGroup
     * @return ProductSpecialPriceItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId): ProductSpecialPriceItem
    {
        $this->customerGroupId = $customerGroupId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to customerGroup
     */
    public function getCustomerGroupId(): Identity
    {
        return $this->customerGroupId;
    }
    
    /**
     * @param Identity $productSpecialPriceId Reference to productSpecialPrice
     * @return ProductSpecialPriceItem
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductSpecialPriceId(Identity $productSpecialPriceId): ProductSpecialPriceItem
    {
        $this->productSpecialPriceId = $productSpecialPriceId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to productSpecialPrice
     */
    public function getProductSpecialPriceId(): Identity
    {
        return $this->productSpecialPriceId;
    }
    
    /**
     * @param double $priceNet net price value
     * @return ProductSpecialPriceItem
     */
    public function setPriceNet(float $priceNet): ProductSpecialPriceItem
    {
        $this->priceNet = $priceNet;
        
        return $this;
    }
    
    /**
     * @return double net price value
     */
    public function getPriceNet(): float
    {
        return $this->priceNet;
    }
}
