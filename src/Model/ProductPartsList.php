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
 * Define set articles / parts lists.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductPartsList extends AbstractDataModel implements IdentityInterface
{
    /**
     * @var Identity Unique PartsList id, referenced by product.PartsListId
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var double Component quantity
     * @Serializer\Type("double")
     * @Serializer\SerializedName("quantity")
     * @Serializer\Accessor(getter="getQuantity",setter="setQuantity")
     */
    protected $quantity = 0.0;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
    }
    
    /**
     * @param Identity $id Unique PartsList id, referenced by product.PartsListId
     * @return ProductPartsList
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): ProductPartsList
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique PartsList id, referenced by product.PartsListId
     */
    public function getId(): Identity
    {
        return $this->id;
    }

    /**
     * @param double $quantity Component quantity
     * @return ProductPartsList
     */
    public function setQuantity(float $quantity): ProductPartsList
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
