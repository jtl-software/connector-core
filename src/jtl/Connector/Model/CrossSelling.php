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
 */
class CrossSelling extends DataModel
{
    /**
     * @var Identity Reference to crossSellingGroup
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $crossSellingGroupId = null;

    /**
     * @var Identity Reference to product (main product)
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $crossSellingProductId = null;

    /**
     * @var Identity Unique crossSelling id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $id = null;

    /**
     * @var Identity Reference to product (cross selling product)
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $productId = null;


    public function __construct()
    {
        $this->crossSellingGroupId = new Identity;
        $this->crossSellingProductId = new Identity;
        $this->id = new Identity;
        $this->productId = new Identity;
    }

    /**
     * @param  Identity $crossSellingGroupId Reference to crossSellingGroup
     * @return \jtl\Connector\Model\CrossSelling
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
     * @param  Identity $crossSellingProductId Reference to product (main product)
     * @return \jtl\Connector\Model\CrossSelling
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCrossSellingProductId(Identity $crossSellingProductId)
    {
        return $this->setProperty('crossSellingProductId', $crossSellingProductId, 'Identity');
    }

    /**
     * @return Identity Reference to product (main product)
     */
    public function getCrossSellingProductId()
    {
        return $this->crossSellingProductId;
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
     * @param  Identity $productId Reference to product (cross selling product)
     * @return \jtl\Connector\Model\CrossSelling
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }

    /**
     * @return Identity Reference to product (cross selling product)
     */
    public function getProductId()
    {
        return $this->productId;
    }

 
}
