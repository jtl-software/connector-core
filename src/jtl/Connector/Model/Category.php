<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Category
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * A category with sort number, link to parent category and level.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Category
 */
class Category extends DataModel
{
    /**
     * @var Identity Unique category id
     */
    protected $id = null;

    /**
     * @var Identity Optional reference to parent category id
     */
    protected $parentCategoryId = null;

    /**
     * @var bool 
     */
    protected $isActive = false;

    /**
     * @var int Optional category level (default 1 for first level)
     */
    protected $level = 0;

    /**
     * @var int Optional sort order number
     */
    protected $sort = 0;

    /**
     * @var \jtl\Connector\Model\ParentCategory[]
     */
    protected $parent = array();

    /**
     * @var \jtl\Connector\Model\CategoryInvisibility[]
     */
    protected $invisibilities = array();

    /**
     * @var \jtl\Connector\Model\CategoryI18n[]
     */
    protected $i18ns = array();

    /**
     * @var \jtl\Connector\Model\CategoryCustomerGroup[]
     */
    protected $customerGroups = array();

    /**
     * @var \jtl\Connector\Model\ChildCategory[]
     */
    protected $children = array();

    /**
     * @var \jtl\Connector\Model\CategoryAttr[]
     */
    protected $attributes = array();

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
     * @param  bool $isActive 
     * @return \jtl\Connector\Model\Category
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('isActive', $isActive, 'bool');
    }

    /**
     * @return bool 
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
     * @param  \jtl\Connector\Model\ParentCategory $parent
     * @return \jtl\Connector\Model\Category
     */
    public function addParent(\jtl\Connector\Model\ParentCategory $parent)
    {
        $this->parent[] = $parent;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ParentCategory[]
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return \jtl\Connector\Model\Category
     */
    public function clearParent()
    {
        $this->parent = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CategoryInvisibility $invisibilities
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
     * @param  \jtl\Connector\Model\CategoryI18n $i18ns
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
     * @param  \jtl\Connector\Model\CategoryCustomerGroup $customerGroups
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
     * @param  \jtl\Connector\Model\ChildCategory $children
     * @return \jtl\Connector\Model\Category
     */
    public function addChild(\jtl\Connector\Model\ChildCategory $child)
    {
        $this->children[] = $child;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ChildCategory[]
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
     * @param  \jtl\Connector\Model\CategoryAttr $attributes
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
