<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * ToDo: Remove (deprecated).
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductVariationValueDependency extends DataModel
{
    /**
     * @type Identity 
     */
    protected $productVariationValueId = null;

    /**
     * @type Identity 
     */
    protected $productVariationValueTargetId = null;

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'productVariationValueId',
        'productVariationValueTargetId',
    );

    /**
     * @param  Identity $productVariationValueId 
     * @return \jtl\Connector\Model\ProductVariationValueDependency
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueId(Identity $productVariationValueId)
    {
        return $this->setProperty('ProductVariationValueId', $productVariationValueId, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getProductVariationValueId()
    {
        return $this->productVariationValueId;
    }

    /**
     * @param  Identity $productVariationValueTargetId 
     * @return \jtl\Connector\Model\ProductVariationValueDependency
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueTargetId(Identity $productVariationValueTargetId)
    {
        return $this->setProperty('ProductVariationValueTargetId', $productVariationValueTargetId, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getProductVariationValueTargetId()
    {
        return $this->productVariationValueTargetId;
    }

 
}
