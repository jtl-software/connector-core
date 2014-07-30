<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Product-ConfigGroup Assignment..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductConfigGroup extends DataModel
{
    /**
     * @type Identity Reference to configGroup
     */
    protected $configGroupId = null;

    /**
     * @type Identity Unique productConfigGroup id
     */
    protected $id = null;

    /**
     * @type Identity Reference to product
     */
    protected $productId = null;

    /**
     * @type integer Optional sort number
     */
    protected $sort = 0;


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'productId',
        'configGroupId',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
    );


    /**
     * @param  integer $sort Optional sort number
     * @return \jtl\Connector\Model\ProductConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  Identity $id Unique productConfigGroup id
     * @return \jtl\Connector\Model\ProductConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique productConfigGroup id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductConfigGroup
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
     * @param  Identity $configGroupId Reference to configGroup
     * @return \jtl\Connector\Model\ProductConfigGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigGroupId(Identity $configGroupId)
    {
        return $this->setProperty('configGroupId', $configGroupId, 'Identity');
    }
    
    /**
     * @return Identity Reference to configGroup
     */
    public function getConfigGroupId()
    {
        return $this->configGroupId;
    }
}

