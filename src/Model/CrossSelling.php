<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Group cross-sold products belonging to different crossSellingGroups together.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CrossSelling extends DataModel
{
    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var Identity Source product
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;
    
    /**
     * @var CrossSellingItem[] Referenced cross-sold products grouped by their crossSellingGroup
     * @Serializer\Type("array<jtl\Connector\Model\CrossSellingItem>")
     * @Serializer\SerializedName("items")
     * @Serializer\AccessType("reflection")
     */
    protected $items = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->productId = new Identity();
    }
    
    /**
     * @param Identity $id
     * @return CrossSelling
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): CrossSelling
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getId(): Identity
    {
        return $this->id;
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
