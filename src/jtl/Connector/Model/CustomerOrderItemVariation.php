<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage CustomerOrder
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * customer order item variation.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage CustomerOrder
 * 
 * @Serializer\AccessType("public_method")
 */
class CustomerOrderItemVariation extends DataModel
{
    /**
     * @var Identity Unique customerOrderItemVariation id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var int Reference to customerOrderItem
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("customerOrderItemId")
     * @Serializer\Accessor(getter="getCustomerOrderItemId",setter="setCustomerOrderItemId")
     */
    protected $customerOrderItemId = 0;

    /**
     * @var string Optional custom text value for variation 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("freeField")
     * @Serializer\Accessor(getter="getFreeField",setter="setFreeField")
     */
    protected $freeField = '';

    /**
     * @var int Reference to productVariation
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("productVariationId")
     * @Serializer\Accessor(getter="getProductVariationId",setter="setProductVariationId")
     */
    protected $productVariationId = 0;

    /**
     * @var string Variation name e.g. "color"
     * @Serializer\Type("string")
     * @Serializer\SerializedName("productVariationName")
     * @Serializer\Accessor(getter="getProductVariationName",setter="setProductVariationName")
     */
    protected $productVariationName = '';

    /**
     * @var int Reference to productVariationValue
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("productVariationValueId")
     * @Serializer\Accessor(getter="getProductVariationValueId",setter="setProductVariationValueId")
     */
    protected $productVariationValueId = 0;

    /**
     * @var string Variation value e.g. "red"
     * @Serializer\Type("string")
     * @Serializer\SerializedName("productVariationValueName")
     * @Serializer\Accessor(getter="getProductVariationValueName",setter="setProductVariationValueName")
     */
    protected $productVariationValueName = '';

    /**
     * @var double Optional extra surcharge (added to item price)
     * @Serializer\Type("double")
     * @Serializer\SerializedName("surcharge")
     * @Serializer\Accessor(getter="getSurcharge",setter="setSurcharge")
     */
    protected $surcharge = 0.0;


    public function __construct()
    {
        $this->id = new Identity;
    }

    /**
     * @param  Identity $id Unique customerOrderItemVariation id
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique customerOrderItemVariation id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  int $customerOrderItemId Reference to customerOrderItem
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setCustomerOrderItemId($customerOrderItemId)
    {
        return $this->setProperty('customerOrderItemId', $customerOrderItemId, 'int');
    }

    /**
     * @return int Reference to customerOrderItem
     */
    public function getCustomerOrderItemId()
    {
        return $this->customerOrderItemId;
    }

    /**
     * @param  string $freeField Optional custom text value for variation 
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setFreeField($freeField)
    {
        return $this->setProperty('freeField', $freeField, 'string');
    }

    /**
     * @return string Optional custom text value for variation 
     */
    public function getFreeField()
    {
        return $this->freeField;
    }

    /**
     * @param  int $productVariationId Reference to productVariation
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setProductVariationId($productVariationId)
    {
        return $this->setProperty('productVariationId', $productVariationId, 'int');
    }

    /**
     * @return int Reference to productVariation
     */
    public function getProductVariationId()
    {
        return $this->productVariationId;
    }

    /**
     * @param  string $productVariationName Variation name e.g. "color"
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setProductVariationName($productVariationName)
    {
        return $this->setProperty('productVariationName', $productVariationName, 'string');
    }

    /**
     * @return string Variation name e.g. "color"
     */
    public function getProductVariationName()
    {
        return $this->productVariationName;
    }

    /**
     * @param  int $productVariationValueId Reference to productVariationValue
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        return $this->setProperty('productVariationValueId', $productVariationValueId, 'int');
    }

    /**
     * @return int Reference to productVariationValue
     */
    public function getProductVariationValueId()
    {
        return $this->productVariationValueId;
    }

    /**
     * @param  string $productVariationValueName Variation value e.g. "red"
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setProductVariationValueName($productVariationValueName)
    {
        return $this->setProperty('productVariationValueName', $productVariationValueName, 'string');
    }

    /**
     * @return string Variation value e.g. "red"
     */
    public function getProductVariationValueName()
    {
        return $this->productVariationValueName;
    }

    /**
     * @param  double $surcharge Optional extra surcharge (added to item price)
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setSurcharge($surcharge)
    {
        return $this->setProperty('surcharge', $surcharge, 'double');
    }

    /**
     * @return double Optional extra surcharge (added to item price)
     */
    public function getSurcharge()
    {
        return $this->surcharge;
    }

 
}
