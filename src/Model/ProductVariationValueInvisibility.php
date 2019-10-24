<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Specify productVariationValue to hide from specific customerGroup.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductVariationValueInvisibility extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected $customerGroupId = null;
    
    /**
     * @var Identity Reference to productVariationValue to hide from customerGroup
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("productVariationValueId")
     * @Serializer\Accessor(getter="getProductVariationValueId",setter="setProductVariationValueId")
     */
    protected $productVariationValueId = null;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customerGroupId = new Identity();
        $this->productVariationValueId = new Identity();
    }
    
    /**
     * @param Identity $customerGroupId Reference to customerGroup
     * @return ProductVariationValueInvisibility
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId): ProductVariationValueInvisibility
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
     * @param Identity $productVariationValueId Reference to productVariationValue to hide from customerGroup
     * @return ProductVariationValueInvisibility
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueId(Identity $productVariationValueId): ProductVariationValueInvisibility
    {
        $this->productVariationValueId = $productVariationValueId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to productVariationValue to hide from customerGroup
     */
    public function getProductVariationValueId(): Identity
    {
        return $this->productVariationValueId;
    }
}
