<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Localized category attribute.
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CategoryAttr extends DataModel
{
    /**
     * @type Identity Reference to category
     */
    protected $categoryId = null;

    /**
     * @type Identity Unique categoryAttr id
     */
    protected $id = null;

    /**
     * @type string 
     */
    protected $name = '';

    /**
     * @type integer 
     */
    protected $sort = 0;

    /**
     * @type string 
     */
    protected $value = '';


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'categoryId',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
    );


    /**
     * @param  string $name 
     * @return \jtl\Connector\Model\CategoryAttr
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
     * @param  string $value 
     * @return \jtl\Connector\Model\CategoryAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setValue($value)
    {
        return $this->setProperty('value', $value, 'string');
    }
    
    /**
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param  Identity $id Unique categoryAttr id
     * @return \jtl\Connector\Model\CategoryAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique categoryAttr id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryId(Identity $categoryId)
    {
        return $this->setProperty('categoryId', $categoryId, 'Identity');
    }
    
    /**
     * @return Identity Reference to category
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param  integer $sort 
     * @return \jtl\Connector\Model\CategoryAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getSort()
    {
        return $this->sort;
    }
}

