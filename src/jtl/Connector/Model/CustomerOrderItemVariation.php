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
 */
class CustomerOrderItemVariation extends DataModel
{
    /**
     * @var Identity Reference to customerOrderItem
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $customerOrderItemId = null;

    /**
     * @var Identity Unique customerOrderItemVariation id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $id = null;

    /**
     * @var Identity Reference to productVariation
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $productVariationId = null;

    /**
     * @var Identity Reference to productVariationValue
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $productVariationValueId = null;

    /**
     * @var string Optional custom text value for variation 
     * @Serializer\Type("string")
     */
    protected $freeField = '';

    /**
     * @var string Variation name e.g. "color"
     * @Serializer\Type("string")
     */
    protected $productVariationName = '';

    /**
     * @var string Variation value e.g. "red"
     * @Serializer\Type("string")
     */
    protected $productVariationValueName = '';

    /**
     * @var double Optional extra surcharge (added to item price)
     * @Serializer\Type("double")
     */
    protected $surcharge = 0.0;


    public function __construct()
    {
        $this->customerOrderItemId = new Identity;
        $this->id = new Identity;
        $this->productVariationId = new Identity;
        $this->productVariationValueId = new Identity;
    }

    /**
     * @param  Identity $customerOrderItemId Reference to customerOrderItem
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderItemId(Identity $customerOrderItemId)
    {
        return $this->setProperty('customerOrderItemId', $customerOrderItemId, 'Identity');
    }

    /**
     * @return Identity Reference to customerOrderItem
     */
    public function getCustomerOrderItemId()
    {
        return $this->customerOrderItemId;
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
     * @param  Identity $productVariationId Reference to productVariation
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationId(Identity $productVariationId)
    {
        return $this->setProperty('productVariationId', $productVariationId, 'Identity');
    }

    /**
     * @return Identity Reference to productVariation
     */
    public function getProductVariationId()
    {
        return $this->productVariationId;
    }

    /**
     * @param  Identity $productVariationValueId Reference to productVariationValue
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueId(Identity $productVariationValueId)
    {
        return $this->setProperty('productVariationValueId', $productVariationValueId, 'Identity');
    }

    /**
     * @return Identity Reference to productVariationValue
     */
    public function getProductVariationValueId()
    {
        return $this->productVariationValueId;
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
