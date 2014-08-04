<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * customer order item variation.
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CustomerOrderItemVariation extends DataModel
{
    /**
     * @type Identity Reference to customerOrderItem
     */
    protected $customerOrderItemId = null;

    /**
     * @type Identity Unique customerOrderItemVariation id
     */
    protected $id = null;

    /**
     * @type Identity Reference to productVariation
     */
    protected $productVariationId = null;

    /**
     * @type Identity Reference to productVariationValue
     */
    protected $productVariationValueId = null;

    /**
     * @type string Optional custom text value for variation 
     */
    protected $freeField = '';

    /**
     * @type string Variation name e.g. "color"
     */
    protected $productVariationName = '';

    /**
     * @type string Variation value e.g. "red"
     */
    protected $productVariationValueName = '';

    /**
     * @type double Optional extra surcharge (added to item price)
     */
    protected $surcharge = 0.0;

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'customerOrderItemId',
        'id',
        'productVariationId',
        'productVariationValueId',
    );

    /**
     * @param  Identity $customerOrderItemId Reference to customerOrderItem
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderItemId(Identity $customerOrderItemId)
    {
        return $this->setProperty('CustomerOrderItemId', $customerOrderItemId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationId(Identity $productVariationId)
    {
        return $this->setProperty('ProductVariationId', $productVariationId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueId(Identity $productVariationValueId)
    {
        return $this->setProperty('ProductVariationValueId', $productVariationValueId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setFreeField(Identity $freeField)
    {
        return $this->setProperty('FreeField', $freeField, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationName(Identity $productVariationName)
    {
        return $this->setProperty('ProductVariationName', $productVariationName, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueName(Identity $productVariationValueName)
    {
        return $this->setProperty('ProductVariationValueName', $productVariationValueName, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSurcharge(Identity $surcharge)
    {
        return $this->setProperty('Surcharge', $surcharge, 'double');
    }

    /**
     * @return double Optional extra surcharge (added to item price)
     */
    public function getSurcharge()
    {
        return $this->surcharge;
    }

 
}
