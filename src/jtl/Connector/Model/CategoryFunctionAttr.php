<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Category
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Monolingual category attribute. All properties must be set. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Category
 */
class CategoryFunctionAttr extends DataModel
{
    /**
     * @var Identity Reference to category
     */
    protected $categoryId = null;

    /**
     * @var Identity Unique categoryFunctionAttr id
     */
    protected $id = null;

    /**
     * @var string Attribute key name
     */
    protected $name = '';

    /**
     * @var string Attribute value
     */
    protected $value = '';

    /**
     * @param  Identity $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryFunctionAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  Identity $id Unique categoryFunctionAttr id
     * @return \jtl\Connector\Model\CategoryFunctionAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setValue($value)
    {
        return $this->setProperty('value', $value, 'string');
    }

    /**
     * @return string Attribute value
     */
    public function getValue()
    {
        return $this->value;
    }

 
}
