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
 * customer order item variation
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerOrderItemVariation extends DataModel
{
    /**
     * @var Identity Unique customerOrderItemVariation id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var Identity Reference to productVariation
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productVariationId")
     * @Serializer\Accessor(getter="getProductVariationId",setter="setProductVariationId")
     */
    protected $productVariationId = null;
    
    /**
     * @var Identity Reference to productVariationValue
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productVariationValueId")
     * @Serializer\Accessor(getter="getProductVariationValueId",setter="setProductVariationValueId")
     */
    protected $productVariationValueId = null;
    
    /**
     * @var string Optional custom text value for variation
     * @Serializer\Type("string")
     * @Serializer\SerializedName("freeField")
     * @Serializer\Accessor(getter="getFreeField",setter="setFreeField")
     */
    protected $freeField = '';
    
    /**
     * @var string Variation name e.g. 'color'
     * @Serializer\Type("string")
     * @Serializer\SerializedName("productVariationName")
     * @Serializer\Accessor(getter="getProductVariationName",setter="setProductVariationName")
     */
    protected $productVariationName = '';
    
    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("surcharge")
     * @Serializer\Accessor(getter="getSurcharge",setter="setSurcharge")
     */
    protected $surcharge = 0.0;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("valueName")
     * @Serializer\Accessor(getter="getValueName",setter="setValueName")
     */
    protected $valueName = '';
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->productVariationValueId = new Identity();
        $this->productVariationId = new Identity();
    }

    /**
     * @param Identity $id Unique customerOrderItemVariation id
     * @return CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): CustomerOrderItemVariation
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique customerOrderItemVariation id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param Identity $productVariationId Reference to productVariation
     * @return CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationId(Identity $productVariationId): CustomerOrderItemVariation
    {
        $this->productVariationId = $productVariationId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to productVariation
     */
    public function getProductVariationId(): Identity
    {
        return $this->productVariationId;
    }
    
    /**
     * @param Identity $productVariationValueId Reference to productVariationValue
     * @return CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueId(Identity $productVariationValueId): CustomerOrderItemVariation
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
     * @param string $freeField Optional custom text value for variation
     * @return CustomerOrderItemVariation
     */
    public function setFreeField(string $freeField): CustomerOrderItemVariation
    {
        $this->freeField = $freeField;
        
        return $this;
    }
    
    /**
     * @return string Optional custom text value for variation
     */
    public function getFreeField(): string
    {
        return $this->freeField;
    }
    
    /**
     * @param string $productVariationName Variation name e.g. 'color'
     * @return CustomerOrderItemVariation
     */
    public function setProductVariationName(string $productVariationName): CustomerOrderItemVariation
    {
        $this->productVariationName = $productVariationName;
        
        return $this;
    }
    
    /**
     * @return string Variation name e.g. 'color'
     */
    public function getProductVariationName(): string
    {
        return $this->productVariationName;
    }
    
    /**
     * @param double $surcharge
     * @return CustomerOrderItemVariation
     */
    public function setSurcharge(float $surcharge): CustomerOrderItemVariation
    {
        $this->surcharge = $surcharge;
        
        return $this;
    }
    
    /**
     * @return double
     */
    public function getSurcharge(): float
    {
        return $this->surcharge;
    }
    
    /**
     * @param string $valueName
     * @return CustomerOrderItemVariation
     */
    public function setValueName(string $valueName): CustomerOrderItemVariation
    {
        $this->valueName = $valueName;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getValueName(): string
    {
        return $this->valueName;
    }
}
