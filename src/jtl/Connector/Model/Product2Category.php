<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Product-Category Allocation..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Product2Category extends DataModel
{
    /**
     * @type Identity Reference to category
     */
    protected $categoryId = null;

    /**
     * @type Identity Unique product2Category id
     */
    protected $id = null;

    /**
     * @type Identity Reference to product
     */
    protected $productId = null;


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'productId',
        'categoryId',
    );

    /**
     * @param  Identity $id Unique product2Category id
     * @return \jtl\Connector\Model\Product2Category
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique product2Category id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\Product2Category
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  Identity $categoryId Reference to category
     * @return \jtl\Connector\Model\Product2Category
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
}

