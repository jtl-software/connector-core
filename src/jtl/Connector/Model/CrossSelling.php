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
 * Link 2 products that are in a common crossSellingGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class CrossSelling extends DataModel
{
    /**
     * @var Identity Unique crossSelling id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var int Reference to crossSellingGroup
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("crossSellingGroupId")
     * @Serializer\Accessor(getter="getCrossSellingGroupId",setter="setCrossSellingGroupId")
     */
    protected $crossSellingGroupId = 0;

    /**
     * @var int Reference to product (main product)
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("crossSellingProductId")
     * @Serializer\Accessor(getter="getCrossSellingProductId",setter="setCrossSellingProductId")
     */
    protected $crossSellingProductId = 0;

    /**
     * @var int Reference to product (cross selling product)
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
     * @param  Identity $id Unique crossSelling id
     * @return \jtl\Connector\Model\CrossSelling
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
     * @param  int $crossSellingGroupId Reference to crossSellingGroup
     * @return \jtl\Connector\Model\CrossSelling
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setCrossSellingGroupId($crossSellingGroupId)
    {
        return $this->setProperty('crossSellingGroupId', $crossSellingGroupId, 'int');
    }

    /**
     * @return int Reference to crossSellingGroup
     */
    public function getCrossSellingGroupId()
    {
        return $this->crossSellingGroupId;
    }

    /**
     * @param  int $crossSellingProductId Reference to product (main product)
     * @return \jtl\Connector\Model\CrossSelling
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setCrossSellingProductId($crossSellingProductId)
    {
        return $this->setProperty('crossSellingProductId', $crossSellingProductId, 'int');
    }

    /**
     * @return int Reference to product (main product)
     */
    public function getCrossSellingProductId()
    {
        return $this->crossSellingProductId;
    }

    /**
     * @param  int $productId Reference to product (cross selling product)
     * @return \jtl\Connector\Model\CrossSelling
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setProductId($productId)
    {
        return $this->setProperty('productId', $productId, 'int');
    }

    /**
     * @return int Reference to product (cross selling product)
     */
    public function getProductId()
    {
        return $this->productId;
    }

 
}
