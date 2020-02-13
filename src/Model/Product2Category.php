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
 * Product-Category Allocation.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class Product2Category extends AbstractIdentity
{
    /**
     * @var Identity Reference to category
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("categoryId")
     * @Serializer\Accessor(getter="getCategoryId",setter="setCategoryId")
     */
    protected $categoryId = null;

    /**
     * Constructor.
     * @param string $endpoint
     * @param int $host
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        parent::__construct($endpoint, $host);
        $this->categoryId = new Identity();
    }
    
    /**
     * @param Identity $categoryId Reference to category
     * @return Product2Category
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryId(Identity $categoryId): Product2Category
    {
        $this->categoryId = $categoryId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to category
     */
    public function getCategoryId(): Identity
    {
        return $this->categoryId;
    }
}
