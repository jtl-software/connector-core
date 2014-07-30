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
     * @type Identity 
     */
    protected $productId = null;

    /**
     * @type Identity Reference to productVariation
     */
    protected $productVariationId = null;

    /**
     * @type Identity Reference to productVariationValue
     */
    protected $productVariationValueId = null;

    /**
     * @type string Variation name e.g. "color"
     */
    protected $productVariationName = '';

    /**
     * @type string Variation value e.g. "red"
     */
    protected $productVariationValueName = '';

    /**
     * @type float|null Optional extra surcharge (added to item price)
     */
    protected $surcharge = 0.0;


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'productVariationValueId',
        'customerOrderItemId',
        'productId',
        'productVariationId',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
    );


    /**
     * @param  string $productVariationName Variation name e.g. "color"
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  float $surcharge Optional extra surcharge (added to item price)
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setSurcharge($surcharge)
    {
        return $this->setProperty('surcharge', $surcharge, 'float');
    }
    
    /**
     * @return float Optional extra surcharge (added to item price)
     */
    public function getSurcharge()
    {
        return $this->surcharge;
    }

    /**
     * @param  Identity $id Unique customerOrderItemVariation id
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  Identity $productVariationValueId Reference to productVariationValue
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  Identity $customerOrderItemId Reference to customerOrderItem
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  Identity $productId 
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  Identity $productVariationId Reference to productVariation
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
}

