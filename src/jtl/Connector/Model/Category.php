<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Category
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * A category with sort number, link to parent category and level.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Category
 * 
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
     * @var bool Flag if category is active
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isActive")
     * @Serializer\Accessor(getter="getIsActive",setter="setIsActive")
     */
    protected $isActive = false;

    /**
     * @var int Optional category level (default 1 for first level)
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("level")
     * @Serializer\Accessor(getter="getLevel",setter="setLevel")
     */
    protected $level = 0;

    /**
     * @var int Optional sort order number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = 0;

    /**
     * End: 1 (One of Category)
     *      * (Collection of CategoryInvisibility)
     *
     * @var \jtl\Connector\Model\CategoryInvisibility[]
     * @Serializer\Type("array<jtl\Connector\Model\CategoryInvisibility>")
     * @Serializer\SerializedName("invisibilities")
     * @Serializer\AccessType("reflection")
     */
    protected $invisibilities = array();

    /**
     * End: 1 (One of Category)
     *      * (Collection of CategoryI18n)
     *
     * @var \jtl\Connector\Model\CategoryI18n[]
     * @Serializer\Type("array<jtl\Connector\Model\CategoryI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = array();

    /**
     * End: 1 (One of Category)
     *      * (Collection of CategoryCustomerGroup)
     *
     * @var \jtl\Connector\Model\CategoryCustomerGroup[]
     * @Serializer\Type("array<jtl\Connector\Model\CategoryCustomerGroup>")
     * @Serializer\SerializedName("customerGroups")
     * @Serializer\AccessType("reflection")
     */
    protected $customerGroups = array();

    /**
     * End: 0..1 (Zero or One of Category)
     *      * (Collection of Category)
     *
     * @var \jtl\Connector\Model\Category[]
     * @Serializer\Type("array<jtl\Connector\Model\Category>")
     * @Serializer\SerializedName("children")
     * @Serializer\AccessType("reflection")
     */
    protected $children = array();

    /**
     * End: 1 (One of Category)
     *      * (Collection of CategoryAttr)
     *
     * @var \jtl\Connector\Model\CategoryAttr[]
     * @Serializer\Type("array<jtl\Connector\Model\CategoryAttr>")
     * @Serializer\SerializedName("attributes")
     * @Serializer\AccessType("reflection")
     */
    protected $attributes = array();


    public function __construct()
    {
        $this->id = new Identity;
        $this->parentCategoryId = new Identity;
    }

    /**
     * @param  Identity $id Unique category id
     * @return \jtl\Connector\Model\Category
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique category id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $parentCategoryId Optional reference to parent category id
     * @return \jtl\Connector\Model\Category
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setParentCategoryId(Identity $parentCategoryId)
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
     * @param  bool $isActive Flag if category is active
     * @return \jtl\Connector\Model\Category
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('isActive', $isActive, 'bool');
    }

    /**
     * @return bool Flag if category is active
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param  int $level Optional category level (default 1 for first level)
     * @return \jtl\Connector\Model\Category
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setLevel($level)
    {
        return $this->setProperty('level', $level, 'int');
    }

    /**
     * @return int Optional category level (default 1 for first level)
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param  int $sort Optional sort order number
     * @return \jtl\Connector\Model\Category
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'int');
    }

    /**
     * @return int Optional sort order number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  \jtl\Connector\Model\CategoryInvisibility $invisibility
     * @return \jtl\Connector\Model\Category
     */
    public function addInvisibility(\jtl\Connector\Model\CategoryInvisibility $invisibility)
    {
        $this->invisibilities[] = $invisibility;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CategoryInvisibility[]
     */
    public function getInvisibilities()
    {
        return $this->invisibilities;
    }

    /**
     * @return \jtl\Connector\Model\Category
     */
    public function clearInvisibilities()
    {
        $this->invisibilities = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CategoryI18n $i18n
     * @return \jtl\Connector\Model\Category
     */
    public function addI18n(\jtl\Connector\Model\CategoryI18n $i18n)
    {
        $this->i18ns[] = $i18n;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CategoryI18n[]
     */
    public function getI18ns()
    {
        return $this->i18ns;
    }

    /**
     * @return \jtl\Connector\Model\Category
     */
    public function clearI18ns()
    {
        $this->i18ns = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CategoryCustomerGroup $customerGroup
     * @return \jtl\Connector\Model\Category
     */
    public function addCustomerGroup(\jtl\Connector\Model\CategoryCustomerGroup $customerGroup)
    {
        $this->customerGroups[] = $customerGroup;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CategoryCustomerGroup[]
     */
    public function getCustomerGroups()
    {
        return $this->customerGroups;
    }

    /**
     * @return \jtl\Connector\Model\Category
     */
    public function clearCustomerGroups()
    {
        $this->customerGroups = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\Category $child
     * @return \jtl\Connector\Model\Category
     */
    public function addChild(\jtl\Connector\Model\Category $child)
    {
        $this->children[] = $child;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\Category[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @return \jtl\Connector\Model\Category
     */
    public function clearChildren()
    {
        $this->children = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CategoryAttr $attribute
     * @return \jtl\Connector\Model\Category
     */
    public function addAttribute(\jtl\Connector\Model\CategoryAttr $attribute)
    {
        $this->attributes[] = $attribute;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CategoryAttr[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return \jtl\Connector\Model\Category
     */
    public function clearAttributes()
    {
        $this->attributes = array();
        return $this;
    }

 
}
