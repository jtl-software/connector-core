<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Product-Category Allocation..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class Product2Category extends DataModel
{
    /**
     * @var Identity Unique product2Category id
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
     * @var int Reference to product
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = 0;


    public function __construct()
    {
        $this->id = new Identity;
    }

    /**
     * @param  Identity $id Unique product2Category id
     * @return \jtl\Connector\Model\Product2Category
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  int $categoryId Reference to category
     * @return \jtl\Connector\Model\Product2Category
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
     * @param  int $productId Reference to product
     * @return \jtl\Connector\Model\Product2Category
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setProductId($productId)
    {
        return $this->setProperty('productId', $productId, 'int');
    }

    /**
     * @return int Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

 
}
