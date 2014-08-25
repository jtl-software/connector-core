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
 * Localized category attribute.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Category
 * 
 * @Serializer\AccessType("public_method")
 */
class CategoryAttr extends DataModel
{
    /**
     * @var Identity Unique categoryAttr id
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
     * @var int Optional sort number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = 0;


    public function __construct()
    {
        $this->id = new Identity;
    }

    /**
     * @param  Identity $id Unique categoryAttr id
     * @return \jtl\Connector\Model\CategoryAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  int $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryAttr
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
     * @param  int $sort Optional sort number
     * @return \jtl\Connector\Model\CategoryAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'int');
    }

    /**
     * @return int Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }

 
}
