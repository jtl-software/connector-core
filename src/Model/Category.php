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
 * A category with sort number, link to parent category and level
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class Category extends DataModel
{
    /**
     * @var Identity Unique category id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var Identity Optional reference to parent category id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("parentCategoryId")
     * @Serializer\Accessor(getter="getParentCategoryId",setter="setParentCategoryId")
     */
    protected $parentCategoryId = null;
    
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isActive")
     * @Serializer\Accessor(getter="getIsActive",setter="setIsActive")
     */
    protected $isActive = false;
    
    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("level")
     * @Serializer\Accessor(getter="getLevel",setter="setLevel")
     */
    protected $level = 0;
    
    /**
     * @var integer Optional sort order number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = 0;
    
    /**
     * @var CategoryAttr[]
     * @Serializer\Type("array<jtl\Connector\Model\CategoryAttr>")
     * @Serializer\SerializedName("attributes")
     * @Serializer\AccessType("reflection")
     */
    protected $attributes = [];
    
    /**
     * @var CategoryCustomerGroup[]
     * @Serializer\Type("array<jtl\Connector\Model\CategoryCustomerGroup>")
     * @Serializer\SerializedName("customerGroups")
     * @Serializer\AccessType("reflection")
     */
    protected $customerGroups = [];
    
    /**
     * @var CategoryI18n[]
     * @Serializer\Type("array<jtl\Connector\Model\CategoryI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];
    
    /**
     * @var CategoryInvisibility[]
     * @Serializer\Type("array<jtl\Connector\Model\CategoryInvisibility>")
     * @Serializer\SerializedName("invisibilities")
     * @Serializer\AccessType("reflection")
     */
    protected $invisibilities = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->parentCategoryId = new Identity();
    }
    
    /**
     * @param Identity $id Unique category id
     * @return Category
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): Category
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique category id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param Identity $parentCategoryId Optional reference to parent category id
     * @return Category
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setParentCategoryId(Identity $parentCategoryId): Category
    {
        return $this->setProperty('parentCategoryId', $parentCategoryId, 'Identity');
    }
    
    /**
     * @return Identity Optional reference to parent category id
     */
    public function getParentCategoryId()
    {
        return $this->parentCategoryId;
    }
    
    /**
     * @param boolean $isActive
     * @return Category
     */
    public function setIsActive(bool $isActive): Category
    {
        return $this->setProperty('isActive', $isActive, 'boolean');
    }
    
    /**
     * @return boolean
     */
    public function getIsActive(): bool
    {
        return $this->isActive;
    }
    
    /**
     * @param integer $level
     * @return Category
     */
    public function setLevel(int $level): Category
    {
        return $this->setProperty('level', $level, 'integer');
    }
    
    /**
     * @return integer
     */
    public function getLevel(): int
    {
        return $this->level;
    }
    
    /**
     * @param integer $sort Optional sort order number
     * @return Category
     */
    public function setSort(int $sort): Category
    {
        return $this->setProperty('sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort order number
     */
    public function getSort(): int
    {
        return $this->sort;
    }
    
    /**
     * @param CategoryAttr $attribute
     * @return Category
     */
    public function addAttribute(CategoryAttr $attribute): Category
    {
        $this->attributes[] = $attribute;
        
        return $this;
    }
    
    /**
     * @param array $attributes
     * @return Category
     */
    public function setAttributes(array $attributes): Category
    {
        $this->attributes = $attributes;
        
        return $this;
    }
    
    /**
     * @return CategoryAttr[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
    
    /**
     * @return Category
     */
    public function clearAttributes(): Category
    {
        $this->attributes = [];
        
        return $this;
    }
    
    /**
     * @param CategoryCustomerGroup $customerGroup
     * @return Category
     */
    public function addCustomerGroup(CategoryCustomerGroup $customerGroup): Category
    {
        $this->customerGroups[] = $customerGroup;
        
        return $this;
    }
    
    /**
     * @param array $customerGroups
     * @return Category
     */
    public function setCustomerGroups(array $customerGroups): Category
    {
        $this->customerGroups = $customerGroups;
        
        return $this;
    }
    
    /**
     * @return CategoryCustomerGroup[]
     */
    public function getCustomerGroups(): array
    {
        return $this->customerGroups;
    }
    
    /**
     * @return Category
     */
    public function clearCustomerGroups(): Category
    {
        $this->customerGroups = [];
        
        return $this;
    }
    
    /**
     * @param CategoryI18n $i18n
     * @return Category
     */
    public function addI18n(CategoryI18n $i18n): Category
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }
    
    /**
     * @param array $i18ns
     * @return Category
     */
    public function setI18ns(array $i18ns): Category
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return CategoryI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }
    
    /**
     * @return Category
     */
    public function clearI18ns(): Category
    {
        $this->i18ns = [];
        
        return $this;
    }
    
    /**
     * @param CategoryInvisibility $invisibility
     * @return Category
     */
    public function addInvisibility(CategoryInvisibility $invisibility): Category
    {
        $this->invisibilities[] = $invisibility;
        
        return $this;
    }
    
    /**
     * @param array $invisibilities
     * @return Category
     */
    public function setInvisibilities(array $invisibilities): Category
    {
        $this->invisibilities = $invisibilities;
        
        return $this;
    }
    
    /**
     * @return CategoryInvisibility[]
     */
    public function getInvisibilities(): array
    {
        return $this->invisibilities;
    }
    
    /**
     * @return Category
     */
    public function clearInvisibilities(): Category
    {
        $this->invisibilities = [];
        
        return $this;
    }
}
