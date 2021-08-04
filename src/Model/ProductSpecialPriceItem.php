<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * special price properties to define a net price for a customerGroup.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductSpecialPriceItem extends AbstractModel
{
    /**
     * @var Identity Reference to customerGroup
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected $customerGroupId = null;

    /**
     * @var double net price value
     * @Serializer\Type("double")
     * @Serializer\SerializedName("priceNet")
     * @Serializer\Accessor(getter="getPriceNet",setter="setPriceNet")
     */
    protected $priceNet = 0.0;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customerGroupId = new Identity();
    }
    
    /**
     * @param Identity $customerGroupId Reference to customerGroup
     * @return ProductSpecialPriceItem
     */
    public function setCustomerGroupId(Identity $customerGroupId): ProductSpecialPriceItem
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
     * @param double $priceNet net price value
     * @return ProductSpecialPriceItem
     */
    public function setPriceNet(float $priceNet): ProductSpecialPriceItem
    {
        $this->priceNet = $priceNet;
        
        return $this;
    }
    
    /**
     * @return double net price value
     */
    public function getPriceNet(): float
    {
        return $this->priceNet;
    }
}
