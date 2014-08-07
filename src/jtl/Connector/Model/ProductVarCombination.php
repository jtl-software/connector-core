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
 * Product to productVariationValue Allocation..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class ProductVarCombination extends DataModel
{
    /**
     * @var Identity Reference to product
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $productId = null;

    /**
     * @var Identity Reference to productVariation
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $productVariationId = null;

    /**
     * @var Identity Reference to productVariationValue
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $productVariationValueId = null;


    public function __construct()
    {
        $this->productId = new Identity;
        $this->productVariationId = new Identity;
        $this->productVariationValueId = new Identity;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductVarCombination
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  Identity $productVariationId Reference to productVariation
     * @return \jtl\Connector\Model\ProductVarCombination
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationId(Identity $productVariationId)
    {
        return $this->setProperty('productVariationId', $productVariationId, 'Identity');
    }

    /**
     * @return Identity Reference to productVariation
     */
    public function getProductVariationId()
    {
        return $this->productVariationId;
    }

    /**
     * @param  Identity $productVariationValueId Reference to productVariationValue
     * @return \jtl\Connector\Model\ProductVarCombination
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueId(Identity $productVariationValueId)
    {
        return $this->setProperty('productVariationValueId', $productVariationValueId, 'Identity');
    }

    /**
     * @return Identity Reference to productVariationValue
     */
    public function getProductVariationValueId()
    {
        return $this->productVariationValueId;
    }

 
}
