<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Product to specificValue Assignment. Product specifics are used to assign characteristic product attributes like color or  size... When different products have common specifics, products are similar. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductSpecific extends DataModel
{
    /**
     * @type Identity Unique productSpecific id
     */
    protected $id = null;

    /**
     * @type Identity Reference to product
     */
    protected $productId = null;

    /**
     * @type Identity Reference to specificValue
     */
    protected $specificValueId = null;

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'id',
        'productId',
        'specificValueId',
    );

    /**
     * @param  Identity $id Unique productSpecific id
     * @return \jtl\Connector\Model\ProductSpecific
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique productSpecific id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductSpecific
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('ProductId', $productId, 'Identity');
    }

    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  Identity $specificValueId Reference to specificValue
     * @return \jtl\Connector\Model\ProductSpecific
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSpecificValueId(Identity $specificValueId)
    {
        return $this->setProperty('SpecificValueId', $specificValueId, 'Identity');
    }

    /**
     * @return Identity Reference to specificValue
     */
    public function getSpecificValueId()
    {
        return $this->specificValueId;
    }

 
}
