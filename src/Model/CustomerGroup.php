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
 * Customer group model.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerGroup extends DataModel
{
    /**
     * @var Identity Unique customerGroup id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var boolean Optional: Show net prices default instead of gross prices
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("applyNetPrice")
     * @Serializer\Accessor(getter="getApplyNetPrice",setter="setApplyNetPrice")
     */
    protected $applyNetPrice = false;
    
    /**
     * @var double Optional percentual discount on all products. Negative Value means surcharge.
     * @Serializer\Type("double")
     * @Serializer\SerializedName("discount")
     * @Serializer\Accessor(getter="getDiscount",setter="setDiscount")
     */
    protected $discount = 0.0;
    
    /**
     * @var boolean Optional: Flag default customer group
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isDefault")
     * @Serializer\Accessor(getter="getIsDefault",setter="setIsDefault")
     */
    protected $isDefault = false;
    
    /**
     * @var CustomerGroupAttr[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CustomerGroupAttr>")
     * @Serializer\SerializedName("attributes")
     * @Serializer\AccessType("reflection")
     */
    protected $attributes = [];
    
    /**
     * @var CustomerGroupI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CustomerGroupI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
    }
    
    /**
     * @param Identity $id Unique customerGroup id
     * @return CustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): CustomerGroup
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique customerGroup id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param boolean $applyNetPrice Optional: Show net prices default instead of gross prices
     * @return CustomerGroup
     */
    public function setApplyNetPrice(bool $applyNetPrice): CustomerGroup
    {
        $this->applyNetPrice = $applyNetPrice;
        
        return $this;
    }
    
    /**
     * @return boolean Optional: Show net prices default instead of gross prices
     */
    public function getApplyNetPrice(): bool
    {
        return $this->applyNetPrice;
    }
    
    /**
     * @param double $discount Optional percentual discount on all products. Negative Value means surcharge.
     * @return CustomerGroup
     */
    public function setDiscount(float $discount): CustomerGroup
    {
        $this->discount = $discount;
        
        return $this;
    }
    
    /**
     * @return double Optional percentual discount on all products. Negative Value means surcharge.
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }
    
    /**
     * @param boolean $isDefault Optional: Flag default customer group
     * @return CustomerGroup
     */
    public function setIsDefault(bool $isDefault): CustomerGroup
    {
        $this->isDefault = $isDefault;
        
        return $this;
    }
    
    /**
     * @return boolean Optional: Flag default customer group
     */
    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }
    
    /**
     * @param CustomerGroupAttr $attribute
     * @return CustomerGroup
     */
    public function addAttribute(CustomerGroupAttr $attribute): CustomerGroup
    {
        $this->attributes[] = $attribute;
        
        return $this;
    }
    
    /**
     * @param array $attributes
     * @return CustomerGroup
     */
    public function setAttributes(array $attributes): CustomerGroup
    {
        $this->attributes = $attributes;
        
        return $this;
    }
    
    /**
     * @return CustomerGroupAttr[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
    
    /**
     * @return CustomerGroup
     */
    public function clearAttributes(): CustomerGroup
    {
        $this->attributes = [];
        
        return $this;
    }
    
    /**
     * @param CustomerGroupI18n $i18n
     * @return CustomerGroup
     */
    public function addI18n(CustomerGroupI18n $i18n): CustomerGroup
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }
    
    /**
     * @param array $i18ns
     * @return CustomerGroup
     */
    public function setI18ns(array $i18ns): CustomerGroup
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return CustomerGroupI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }
    
    /**
     * @return CustomerGroup
     */
    public function clearI18ns(): CustomerGroup
    {
        $this->i18ns = [];
        
        return $this;
    }
}
