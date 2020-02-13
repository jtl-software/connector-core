<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Group cross-sold products belonging to different crossSellingGroups together.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CrossSelling extends AbstractIdentity
{
    /**
     * @var Identity Source product
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;
    
    /**
     * @var CrossSellingItem[] Referenced cross-sold products grouped by their crossSellingGroup
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CrossSellingItem>")
     * @Serializer\SerializedName("items")
     * @Serializer\AccessType("reflection")
     */
    protected $items = [];

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
     * @param Identity $productId Source product
     * @return CrossSelling
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId): CrossSelling
    {
        $this->productId = $productId;
        
        return $this;
    }
    
    /**
     * @return Identity Source product
     */
    public function getProductId(): Identity
    {
        return $this->productId;
    }
    
    /**
     * @param CrossSellingItem $item
     * @return CrossSelling
     */
    public function addItem(CrossSellingItem $item): CrossSelling
    {
        $this->items[] = $item;
        
        return $this;
    }
    
    /**
     * @param CrossSellingItem ...$items
     * @return CrossSelling
     */
    public function setItems(CrossSellingItem ...$items): CrossSelling
    {
        $this->items = $items;
        
        return $this;
    }
    
    /**
     * @return CrossSellingItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
    
    /**
     * @return CrossSelling
     */
    public function clearItems(): CrossSelling
    {
        $this->items = [];
        
        return $this;
    }
}
