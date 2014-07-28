<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * A category with sort number, link to parent category and level.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Category extends DataModel
{
    /**
     * @type Identity Unique category id
     */
    public $_id = null;

    /**
     * @type Identity Optional reference to parent category id
     */
    public $_parentCategoryId = null;

    /**
     * @type string 
     */
    public $_description = '';

    /**
     * @type boolean 
     */
    public $_flagDelete = false;

    /**
     * @type boolean 
     */
    public $_flagUpdate = false;

    /**
     * @type boolean 
     */
    public $_isActive = false;

    /**
     * @type integer 
     */
    public $_level = 0;

    /**
     * @type string 
     */
    public $_name = '';

    /**
     * @type integer|null Optional sort order number
     */
    public $_sort = 0;

    /**
     * @type string 
     */
    public $_url = '';

    /**
     * Nav [ParentCategory » ZeroOrOne]
     *
     * @type \jtl\Connector\Model\Category[]
     */
    public $_children = array();

    /**
     * Nav [ChildCategory » Many]
     *
     * @type \jtl\Connector\Model\Category[]
     */
    public $_parent = array();

    /**
     * Nav [Category » One]
     *
     * @type \jtl\Connector\Model\CategoryI18n[]
     */
    public $_i18ns = array();

    /**
     * Nav [Category » One]
     *
     * @type \jtl\Connector\Model\CategoryInvisibility[]
     */
    public $_invisibilities = array();

    /**
     * Nav [Category » One]
     *
     * @type \jtl\Connector\Model\CategoryCustomerGroup[]
     */
    public $_customerGroups = array();

    /**
     * Nav [Category » One]
     *
     * @type \jtl\Connector\Model\CategoryAttr[]
     */
    public $_attributes = array();


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_parentCategoryId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
        '_children' => '\jtl\Connector\Model\Category',
        '_parent' => '\jtl\Connector\Model\Category',
        '_i18ns' => '\jtl\Connector\Model\CategoryI18n',
        '_invisibilities' => '\jtl\Connector\Model\CategoryInvisibility',
        '_customerGroups' => '\jtl\Connector\Model\CategoryCustomerGroup',
        '_attributes' => '\jtl\Connector\Model\CategoryAttr',
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  string $name 
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('_name', $name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param  string $description 
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('_description', $description, 'string');
    }
    
    /**
     * @return string 
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param  integer $sort Optional sort order number
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('_sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort order number
     */
    public function getSort()
    {
        return $this->_sort;
    }

    /**
     * @param  string $url 
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUrl($url)
    {
        return $this->setProperty('_url', $url, 'string');
    }
    
    /**
     * @return string 
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * @param  Identity $id Unique category id
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique category id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $parentCategoryId Optional reference to parent category id
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setParentCategoryId(Identity $parentCategoryId)
    {
        return $this->setProperty('_parentCategoryId', $parentCategoryId, 'Identity');
    }
    
    /**
     * @return Identity Optional reference to parent category id
     */
    public function getParentCategoryId()
    {
        return $this->_parentCategoryId;
    }

    /**
     * @param  boolean $flagUpdate 
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setFlagUpdate($flagUpdate)
    {
        return $this->setProperty('_flagUpdate', $flagUpdate, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getFlagUpdate()
    {
        return $this->_flagUpdate;
    }

    /**
     * @param  boolean $isActive 
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('_isActive', $isActive, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->_isActive;
    }

    /**
     * @param  boolean $flagDelete 
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setFlagDelete($flagDelete)
    {
        return $this->setProperty('_flagDelete', $flagDelete, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getFlagDelete()
    {
        return $this->_flagDelete;
    }

    /**
     * @param  integer $level 
     * @return \jtl\Connector\Model\Category
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setLevel($level)
    {
        return $this->setProperty('_level', $level, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getLevel()
    {
        return $this->_level;
    }

    /**
     * @param  \jtl\Connector\Model\Category $child
     * @return \jtl\Connector\Model\Category
     */
    public function addChild(\jtl\Connector\Model\Category $child)
    {
        $this->_children[] = $child;
        return $this;
    }
    
    /**
     * @return Category
     */
    public function getChildren()
    {
        return $this->_children;
    }

    /**
     * @return \jtl\Connector\Model\Category
     */
    public function clearChildren()
    {
        $this->_children = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\Category $parent
     * @return \jtl\Connector\Model\Category
     */
    public function addParent(\jtl\Connector\Model\Category $parent)
    {
        $this->_parent[] = $parent;
        return $this;
    }
    
    /**
     * @return Category
     */
    public function getParent()
    {
        return $this->_parent;
    }

    /**
     * @return \jtl\Connector\Model\Category
     */
    public function clearParent()
    {
        $this->_parent = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CategoryI18n $i18ns
     * @return \jtl\Connector\Model\Category
     */
    public function addI18ns(\jtl\Connector\Model\CategoryI18n $i18ns)
    {
        $this->_i18ns[] = $i18ns;
        return $this;
    }
    
    /**
     * @return CategoryI18n
     */
    public function getI18ns()
    {
        return $this->_i18ns;
    }

    /**
     * @return \jtl\Connector\Model\Category
     */
    public function clearI18ns()
    {
        $this->_i18ns = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CategoryInvisibility $invisibility
     * @return \jtl\Connector\Model\Category
     */
    public function addInvisibility(\jtl\Connector\Model\CategoryInvisibility $invisibility)
    {
        $this->_invisibilities[] = $invisibility;
        return $this;
    }
    
    /**
     * @return CategoryInvisibility
     */
    public function getInvisibilities()
    {
        return $this->_invisibilities;
    }

    /**
     * @return \jtl\Connector\Model\Category
     */
    public function clearInvisibilities()
    {
        $this->_invisibilities = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CategoryCustomerGroup $customerGroup
     * @return \jtl\Connector\Model\Category
     */
    public function addCustomerGroup(\jtl\Connector\Model\CategoryCustomerGroup $customerGroup)
    {
        $this->_customerGroups[] = $customerGroup;
        return $this;
    }
    
    /**
     * @return CategoryCustomerGroup
     */
    public function getCustomerGroups()
    {
        return $this->_customerGroups;
    }

    /**
     * @return \jtl\Connector\Model\Category
     */
    public function clearCustomerGroups()
    {
        $this->_customerGroups = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CategoryAttr $attribute
     * @return \jtl\Connector\Model\Category
     */
    public function addAttribute(\jtl\Connector\Model\CategoryAttr $attribute)
    {
        $this->_attributes[] = $attribute;
        return $this;
    }
    
    /**
     * @return CategoryAttr
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }

    /**
     * @return \jtl\Connector\Model\Category
     */
    public function clearAttributes()
    {
        $this->_attributes = array();
        return $this;
    }
}

