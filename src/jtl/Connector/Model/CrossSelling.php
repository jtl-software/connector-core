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
class CrossSelling extends DataModel
{
    /**
     * @var string Reference to crossSellingGroup
     * @Serializer\Type("string")
     * @Serializer\SerializedName("crossSellingGroupId")
     * @Serializer\Accessor(getter="getCrossSellingGroupId",setter="setCrossSellingGroupId")
     */
    protected $crossSellingGroupId = '';

    /**
     * @var string Unique crossSelling id
     * @Serializer\Type("string")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = '';

    /**
     * @var string Reference to product (main product)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = '';


    /**
     * @param string $crossSellingGroupId Reference to crossSellingGroup
     * @return \jtl\Connector\Model\CrossSelling
     */
    public function setCrossSellingGroupId($crossSellingGroupId)
    {
        return $this->setProperty('crossSellingGroupId', $crossSellingGroupId, 'string');
    }

    /**
     * @return string Reference to crossSellingGroup
     */
    public function getCrossSellingGroupId()
    {
        return $this->crossSellingGroupId;
    }

    /**
     * @param string $id Unique crossSelling id
     * @return \jtl\Connector\Model\CrossSelling
     */
    public function setId($id)
    {
        return $this->setProperty('id', $id, 'string');
    }

    /**
     * @return string Unique crossSelling id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $productId Reference to product (main product)
     * @return \jtl\Connector\Model\CrossSelling
     */
    public function setProductId($productId)
    {
        return $this->setProperty('productId', $productId, 'string');
    }

    /**
     * @return string Reference to product (main product)
     */
    public function getProductId()
    {
        return $this->productId;
    }
}
