<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Link 2 products that are in a common crossSellingGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CrossSelling extends DataModel
{
    /**
     * @type Identity Reference to crossSellingGroup
     */
    protected $crossSellingGroupId = null;

    /**
     * @type Identity Reference to product (main product)
     */
    protected $crossSellingProductId = null;

    /**
     * @type Identity Unique crossSelling id
     */
    protected $id = null;

    /**
     * @type Identity Reference to product (cross selling product)
     */
    protected $productId = null;

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'crossSellingGroupId',
        'crossSellingProductId',
        'id',
        'productId',
    );

    /**
     * @param  Identity $crossSellingGroupId Reference to crossSellingGroup
     * @return \jtl\Connector\Model\CrossSelling
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCrossSellingGroupId(Identity $crossSellingGroupId)
    {
        return $this->setProperty('CrossSellingGroupId', $crossSellingGroupId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCrossSellingProductId(Identity $crossSellingProductId)
    {
        return $this->setProperty('CrossSellingProductId', $crossSellingProductId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('ProductId', $productId, 'Identity');
    }

    /**
     * @return Identity Reference to product (cross selling product)
     */
    public function getProductId()
    {
        return $this->productId;
    }

 
}
