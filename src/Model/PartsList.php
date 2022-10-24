<?php

/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Define set articles / parts lists.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class PartsList extends AbstractIdentity
{
    /**
     * @var Identity Reference to a component / product
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;

    /**
     * @var double Component quantity
     * @Serializer\Type("double")
     * @Serializer\SerializedName("quantity")
     * @Serializer\Accessor(getter="getQuantity",setter="setQuantity")
     */
    protected $quantity = 0.0;

    /**
     * Constructor.
     * @param string $endpoint
     * @param int $host
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        parent::__construct($endpoint, $host);
        $this->productId = new Identity();
    }

    /**
     * @param Identity $productId Reference to a component / product
     * @return PartsList
     */
    public function setProductId(Identity $productId): PartsList
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @return Identity Reference to a component / product
     */
    public function getProductId(): Identity
    {
        return $this->productId;
    }

    /**
     * @param double $quantity Component quantity
     * @return PartsList
     */
    public function setQuantity(float $quantity): PartsList
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return double Component quantity
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }
}
