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
     * @type int Optional sort number
     */
    protected $sort = 0;

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'categoryId',
        'id',
    );

    /**
     * @param  Identity $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryAttr
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
     * @param  Identity $id Unique categoryAttr id
     * @return \jtl\Connector\Model\CategoryAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique categoryAttr id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  int $sort Optional sort number
     * @return \jtl\Connector\Model\CategoryAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSort(Identity $sort)
    {
        return $this->setProperty('Sort', $sort, 'int');
    }

    /**
     * @return int Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }

 
}
