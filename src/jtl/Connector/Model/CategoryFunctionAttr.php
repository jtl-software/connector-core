<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Monolingual category attribute. All properties must be set. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CategoryFunctionAttr extends DataModel
{
    /**
     * @type Identity Reference to category
     */
    protected $categoryId = null;

    /**
     * @type Identity Unique categoryFunctionAttr id
     */
    protected $id = null;

    /**
     * @type string Attribute key name
     */
    protected $name = '';

    /**
     * @type string Attribute value
     */
    protected $value = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'categoryId',
        'id',
    );

    /**
     * @param  Identity $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryFunctionAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryId(Identity $categoryId)
    {
        return $this->setProperty('CategoryId', $categoryId, 'Identity');
    }

    /**
     * @return Identity Reference to category
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param  Identity $id Unique categoryFunctionAttr id
     * @return \jtl\Connector\Model\CategoryFunctionAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique categoryFunctionAttr id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $name Attribute key name
     * @return \jtl\Connector\Model\CategoryFunctionAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Attribute key name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $value Attribute value
     * @return \jtl\Connector\Model\CategoryFunctionAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setValue(Identity $value)
    {
        return $this->setProperty('Value', $value, 'string');
    }

    /**
     * @return string Attribute value
     */
    public function getValue()
    {
        return $this->value;
    }

 
}
