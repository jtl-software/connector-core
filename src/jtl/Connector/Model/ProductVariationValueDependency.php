<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * ToDo: Remove (deprecated).
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductVariationValueDependency extends DataModel
{
    /**
     * @var Identity 
     */
    protected $productVariationValueId = null;

    /**
     * @var Identity 
     */
    protected $productVariationValueTargetId = null;

    /**
     * @param  Identity $productVariationValueId 
     * @return \jtl\Connector\Model\ProductVariationValueDependency
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueId(Identity $productVariationValueId)
    {
        return $this->setProperty('productVariationValueId', $productVariationValueId, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueTargetId(Identity $productVariationValueTargetId)
    {
        return $this->setProperty('productVariationValueTargetId', $productVariationValueTargetId, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getProductVariationValueTargetId()
    {
        return $this->productVariationValueTargetId;
    }

 
}
