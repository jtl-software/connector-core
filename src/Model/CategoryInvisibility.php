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
 * Specifies which CustomerGroup is not permitted to view category.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CategoryInvisibility extends AbstractDataModel
{
    /**
     * @var Identity Reference to customerGroup that is not allowed to view categoryId
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected $customerGroupId = null;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customerGroupId = new Identity();
    }

    /**
     * @param Identity $customerGroupId Reference to customerGroup that is not allowed to view categoryId
     * @return CategoryInvisibility
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId): CategoryInvisibility
    {
        $this->customerGroupId = $customerGroupId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to customerGroup that is not allowed to view categoryId
     */
    public function getCustomerGroupId(): Identity
    {
        return $this->customerGroupId;
    }
}
