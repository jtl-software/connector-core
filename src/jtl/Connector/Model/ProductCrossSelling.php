<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Link 2 products that are in a common crossSellingGroup.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class ProductCrossSelling extends DataModel
{
    /**
     * @var Identity Referenced target product ID
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("crossProductId")
     * @Serializer\Accessor(getter="getCrossProductId",setter="setCrossProductId")
     */
    protected $crossProductId = null;

    /**
     * @var Identity Reference to crossSellingGroup
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("crossSellingGroupId")
     * @Serializer\Accessor(getter="getCrossSellingGroupId",setter="setCrossSellingGroupId")
     */
    protected $crossSellingGroupId = null;

    /**
     * @var Identity Unique crossSelling id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var Identity Reference to product (main product)
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->productId = new Identity();
        $this->crossProductId = new Identity();
        $this->crossSellingGroupId = new Identity();
    }

    /**
     * @param Identity $crossProductId Referenced target product ID
     * @return \jtl\Connector\Model\ProductCrossSelling
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCrossProductId(Identity $crossProductId)
    {
        return $this->setProperty('crossProductId', $crossProductId, 'Identity');
    }

    /**
     * @return Identity Referenced target product ID
     */
    public function getCrossProductId()
    {
        return $this->crossProductId;
    }

    /**
     * @param Identity $crossSellingGroupId Reference to crossSellingGroup
     * @return \jtl\Connector\Model\ProductCrossSelling
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCrossSellingGroupId(Identity $crossSellingGroupId)
    {
        return $this->setProperty('crossSellingGroupId', $crossSellingGroupId, 'Identity');
    }

    /**
     * @return Identity Reference to crossSellingGroup
     */
    public function getCrossSellingGroupId()
    {
        return $this->crossSellingGroupId;
    }

    /**
     * @param Identity $id Unique crossSelling id
     * @return \jtl\Connector\Model\ProductCrossSelling
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique crossSelling id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Identity $productId Reference to product (main product)
     * @return \jtl\Connector\Model\ProductCrossSelling
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }

    /**
     * @return Identity Reference to product (main product)
     */
    public function getProductId()
    {
        return $this->productId;
    }
}
