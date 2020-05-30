<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use InvalidArgumentException;
use Jtl\Connector\Core\Config\GlobalConfig;
use Jtl\Connector\Core\Config\ConfigSchema;
use JMS\Serializer\Annotation as Serializer;

/**
 * A category with sort number, link to parent category and level
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class Category extends AbstractIdentity implements IdentificationInterface
{
    /**
     * @var Identity Optional reference to parent category id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
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
     * @var TranslatableAttribute[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\TranslatableAttribute>")
     * @Serializer\SerializedName("attributes")
     * @Serializer\AccessType("reflection")
     */
    protected $attributes = [];
    
    /**
     * @var CategoryCustomerGroup[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CategoryCustomerGroup>")
     * @Serializer\SerializedName("customerGroups")
     * @Serializer\AccessType("reflection")
     */
    protected $customerGroups = [];
    
    /**
     * @var CategoryI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CategoryI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];
    
    /**
     * @var CategoryInvisibility[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CategoryInvisibility>")
     * @Serializer\SerializedName("invisibilities")
     * @Serializer\AccessType("reflection")
     */
    protected $invisibilities = [];

    /**
     * Constructor.
     * @param string $endpoint
     * @param int $host
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        parent::__construct($endpoint, $host);
        $this->parentCategoryId = new Identity();
    }

    public function getIdentificationStrings(string $mainLanguageIso): array
    {
        $strings = [];
        if ($this->getParentCategoryId()->getHost() > 0) {
            $strings[] = sprintf('Parent Wawi PK = %s', $this->getParentCategoryId()->getHost());
        }

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
     * @param Identity $parentCategoryId Optional reference to parent category id
     * @return Category
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setParentCategoryId(Identity $parentCategoryId): Category
    {
        $this->parentCategoryId = $parentCategoryId;
        
        return $this;
    }
    
    /**
     * @return Identity Optional reference to parent category id
     */
    public function getParentCategoryId(): Identity
    {
        return $this->parentCategoryId;
    }
    
    /**
     * @param boolean $isActive
     * @return Category
     */
    public function setIsActive(bool $isActive): Category
    {
        $this->isActive = $isActive;
        
        return $this;
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
        $this->level = $level;
        
        return $this;
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
        $this->sort = $sort;
        
        return $this;
    }
    
    /**
     * @return integer Optional sort order number
     */
    public function getSort(): int
    {
        return $this->sort;
    }
    
    /**
     * @param TranslatableAttribute $attribute
     * @return Category
     */
    public function addAttribute(TranslatableAttribute $attribute): Category
    {
        $this->attributes[] = $attribute;
        
        return $this;
    }
    
    /**
     * @param TranslatableAttribute ...$attributes
     * @return Category
     */
    public function setAttributes(TranslatableAttribute ...$attributes): Category
    {
        $this->attributes = $attributes;
        
        return $this;
    }
    
    /**
     * @return TranslatableAttribute[]
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
     * @param CategoryCustomerGroup ...$customerGroups
     * @return Category
     */
    public function setCustomerGroups(CategoryCustomerGroup ...$customerGroups): Category
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
     * @param CategoryI18n ...$i18ns
     * @return Category
     */
    public function setI18ns(CategoryI18n ...$i18ns): Category
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
     * @param CategoryInvisibility ...$invisibilities
     * @return Category
     */
    public function setInvisibilities(CategoryInvisibility ...$invisibilities): Category
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
