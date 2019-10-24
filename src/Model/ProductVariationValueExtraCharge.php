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
 * Extra charge for productVariationValue per customerGroup.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductVariationValueExtraCharge extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected $customerGroupId = null;
    
    /**
     * @var Identity Reference to productVariationValue
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("productVariationValueId")
     * @Serializer\Accessor(getter="getProductVariationValueId",setter="setProductVariationValueId")
     */
    protected $productVariationValueId = null;
    
    /**
     * @var double Extra charge (net)
     * @Serializer\Type("double")
     * @Serializer\SerializedName("extraChargeNet")
     * @Serializer\Accessor(getter="getExtraChargeNet",setter="setExtraChargeNet")
     */
    protected $extraChargeNet = 0.0;
    
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
     * @return ProductVariationValueExtraCharge
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId): ProductVariationValueExtraCharge
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
     * @param Identity $productVariationValueId Reference to productVariationValue
     * @return ProductVariationValueExtraCharge
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueId(Identity $productVariationValueId): ProductVariationValueExtraCharge
    {
        $this->productVariationValueId = $productVariationValueId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to productVariationValue
     */
    public function getProductVariationValueId(): Identity
    {
        return $this->productVariationValueId;
    }
    
    /**
     * @param double $extraChargeNet Extra charge (net)
     * @return ProductVariationValueExtraCharge
     */
    public function setExtraChargeNet(float $extraChargeNet): ProductVariationValueExtraCharge
    {
        $this->extraChargeNet = $extraChargeNet;
        
        return $this;
    }
    
    /**
     * @return double Extra charge (net)
     */
    public function getExtraChargeNet(): float
    {
        return $this->extraChargeNet;
    }
}
