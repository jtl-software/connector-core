<?php

/**
 * @copyright  2010-2015 JTL-Software GmbH
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Specifies which CustomerGroup is not permitted to view category.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CategoryInvisibility extends AbstractModel
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
     * @return Identity Reference to customerGroup that is not allowed to view categoryId
     */
    public function getCustomerGroupId(): Identity
    {
        return $this->customerGroupId;
    }

    /**
     * @param Identity $customerGroupId Reference to customerGroup that is not allowed to view categoryId
     *
     * @return CategoryInvisibility
     */
    public function setCustomerGroupId(Identity $customerGroupId): CategoryInvisibility
    {
        $this->customerGroupId = $customerGroupId;

        return $this;
    }
}
