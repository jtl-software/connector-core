<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Customer group model.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerGroup extends AbstractIdentity implements IdentificationInterface
{
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
     * @param string $mainLanguageIso
     * @return array
     */
    public function getIdentificationStrings(string $mainLanguageIso): array
    {
        $strings = [];

        $name = '';
        foreach ($this->getI18ns() as $i18n) {
            $name = $i18n->getName();
            if ($mainLanguageIso === $i18n->getLanguageIso()) {
                break;
            }
        }

        if (!empty($name)) {
            $strings[] = sprintf('Name = %s', $name);
        }

        return $strings;
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
     * @param CustomerGroupAttr ...$attributes
     * @return CustomerGroup
     */
    public function setAttributes(CustomerGroupAttr ...$attributes): CustomerGroup
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
     * @param CustomerGroupI18n ...$i18ns
     * @return CustomerGroup
     */
    public function setI18ns(CustomerGroupI18n ...$i18ns): CustomerGroup
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
