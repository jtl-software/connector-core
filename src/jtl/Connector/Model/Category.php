<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * A category with sort number, link to parent category and level.
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Category extends DataModel
{
    /**
     * @type Identity Unique category id
     */
    protected $id = null;

    /**
     * @type Identity Optional reference to parent category id
     */
    protected $parentCategoryId = null;

    /**
     * @type string 
     */
    protected $description = '';

    /**
     * @type boolean 
     */
    protected $flagDelete = false;

    /**
     * @type boolean 
     */
    protected $flagUpdate = false;

    /**
     * @type boolean 
     */
    protected $isActive = false;

    /**
     * @type integer 
     */
    protected $level = 0;

    /**
     * @type string 
     */
    protected $name = '';

    /**
     * @type integer|null Optional sort order number
     */
    protected $sort = 0;

    /**
     * @type string 
     */
    protected $url = '';

    /**
     * Nav [ParentCategory » ZeroOrOne]
     *
     * @type \jtl\Connector\Model\Category[]
     */
    protected $children = array();

    /**
     * Nav [Category » One]
     *
     * @type \jtl\Connector\Model\CategoryI18n[]
     */
    protected $i18ns = array();

    /**
     * Nav [Category » One]
     *
     * @type \jtl\Connector\Model\CategoryInvisibility[]
     */
    protected $invisibilities = array();

    /**
     * Nav [Category » One]
     *
     * @type \jtl\Connector\Model\CategoryCustomerGroup[]
     */
    protected $customerGroups = array();

    /**
     * Nav [Category » One]
     *
     * @type \jtl\Connector\Model\CategoryAttr[]
     */
    protected $attributes = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'parentCategoryId',
    );

    /**
     * @type array list of propertyInfo
     */
    protected $propertyInfos = array(
        'name' => 'string',
        'description' => 'string',
        'sort' => 'integer',
        'url' => 'string',
        'id' => '\jtl\Connector\Model\Identity',
        'parentCategoryId' => '\jtl\Connector\Model\Identity',
        'flagUpdate' => 'boolean',
        'isActive' => 'boolean',
        'flagDelete' => 'boolean',
        'children' => '\jtl\Connector\Model\Category',
        'i18ns' => '\jtl\Connector\Model\CategoryI18n',
        'invisibilities' => '\jtl\Connector\Model\CategoryInvisibility',
        'customerGroups' => '\jtl\Connector\Model\CategoryCustomerGroup',
        'attributes' => '\jtl\Connector\Model\CategoryAttr',
        'level' => 'integer',
    );


    /**
     * @param  string $name 
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $description 
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('description', $description, 'string');
    }
    
    /**
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  integer $sort Optional sort order number
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort order number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  string $url 
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUrl($url)
    {
        return $this->setProperty('url', $url, 'string');
    }
    
    /**
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param  Identity $id Unique category id
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  boolean $flagUpdate 
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setFlagUpdate($flagUpdate)
    {
        return $this->setProperty('flagUpdate', $flagUpdate, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getFlagUpdate()
    {
        return $this->flagUpdate;
    }

    /**
     * @param  boolean $isActive 
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('isActive', $isActive, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param  boolean $flagDelete 
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setFlagDelete($flagDelete)
    {
        return $this->setProperty('flagDelete', $flagDelete, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getFlagDelete()
    {
        return $this->flagDelete;
    }

    /**
     * @param  integer $level 
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setLevel($level)
    {
        return $this->setProperty('level', $level, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
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
     * @return Category
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
     * @param  \jtl\Connector\Model\CategoryI18n $i18n
     * @return \jtl\Connector\Model\Category
     */
    public function addI18n(\jtl\Connector\Model\CategoryI18n $i18n)
    {
        $this->i18ns[] = $i18n;
        return $this;
    }
    
    /**
     * @return CategoryI18n
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
     * @param  \jtl\Connector\Model\CategoryInvisibility $invisibility
     * @return \jtl\Connector\Model\Category
     */
    public function addInvisibility(\jtl\Connector\Model\CategoryInvisibility $invisibility)
    {
        $this->invisibilities[] = $invisibility;
        return $this;
    }
    
    /**
     * @return CategoryInvisibility
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
     * @param  \jtl\Connector\Model\CategoryCustomerGroup $customerGroup
     * @return \jtl\Connector\Model\Category
     */
    public function addCustomerGroup(\jtl\Connector\Model\CategoryCustomerGroup $customerGroup)
    {
        $this->customerGroups[] = $customerGroup;
        return $this;
    }
    
    /**
     * @return CategoryCustomerGroup
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
     * @param  \jtl\Connector\Model\CategoryAttr $attribute
     * @return \jtl\Connector\Model\Category
     */
    public function addAttribute(\jtl\Connector\Model\CategoryAttr $attribute)
    {
        $this->attributes[] = $attribute;
        return $this;
    }
    
    /**
     * @return CategoryAttr
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

