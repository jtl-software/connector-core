<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Link customergroup with category. Set optional discount on category for customergroup.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CategoryCustomerGroup extends AbstractModel
{
    /**
     * @var Identity Reference to customerGroup
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected $customerGroupId = null;
    
    /**
     * @var double Optional discount on products in specified categoryId for  customerGroupId
     * @Serializer\Type("double")
     * @Serializer\SerializedName("discount")
     * @Serializer\Accessor(getter="getDiscount",setter="setDiscount")
     */
    protected $discount = 0.0;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customerGroupId = new Identity();
    }

    /**
     * @param Identity $customerGroupId Reference to customerGroup
     * @return CategoryCustomerGroup
     */
    public function setCustomerGroupId(Identity $customerGroupId): CategoryCustomerGroup
    {
        $this->customerGroupId = $customerGroupId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to customerGroup
     */
    public function getCustomerGroupId(): Identity
    {
        return $this->customerGroupId;
    }
    
    /**
     * @param double $discount Optional discount on products in specified categoryId for  customerGroupId
     * @return CategoryCustomerGroup
     */
    public function setDiscount(float $discount): CategoryCustomerGroup
    {
        $this->discount = $discount;
        
        return $this;
    }
    
    /**
     * @return double Optional discount on products in specified categoryId for  customerGroupId
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }
}
