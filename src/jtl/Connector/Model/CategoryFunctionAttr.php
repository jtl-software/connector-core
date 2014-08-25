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
 * Monolingual category attribute. All properties must be set. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Category
 * 
 * @Serializer\AccessType("public_method")
 */
class CategoryFunctionAttr extends DataModel
{
    /**
     * @var Identity Unique categoryFunctionAttr id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var int Reference to category
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("categoryId")
     * @Serializer\Accessor(getter="getCategoryId",setter="setCategoryId")
     */
    protected $categoryId = 0;

    /**
     * @var string Attribute key name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';

    /**
     * @var string Attribute value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     * @Serializer\Accessor(getter="getValue",setter="setValue")
     */
    protected $value = '';


    public function __construct()
    {
        $this->id = new Identity;
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
     * @param  int $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryFunctionAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setCategoryId($categoryId)
    {
        return $this->setProperty('categoryId', $categoryId, 'int');
    }

    /**
     * @return int Reference to category
     */
    public function getCategoryId()
    {
        return $this->categoryId;
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
