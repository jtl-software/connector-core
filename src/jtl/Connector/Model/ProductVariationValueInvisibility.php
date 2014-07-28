<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Specify productVariationValue to hide from specific customerGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductVariationValueInvisibility extends DataModel
{
    /**
     * @type Identity Reference to customerGroup
     */
    protected $customerGroupId = null;

    /**
     * @type Identity Reference to productVariationValue to hide from customerGroup
     */
    protected $productVariationValueId = null;

    /**
     * @type integer 
     */
    protected $connectorId = 0;


    /**
     * @type array list of identities
     */
    public $identities = array(
        'productVariationValueId',
        'customerGroupId',
    );

    /**
     * @type array list of navigations
     */
    public $navigations = array(
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->navigations;
    }

    /**
     * @param  integer $connectorId 
     * @return \jtl\Connector\Model\ProductVariationValueInvisibility
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setConnectorId($connectorId)
    {
        return $this->setProperty('connectorId', $connectorId, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getConnectorId()
    {
        return $this->connectorId;
    }

    /**
     * @param  Identity $productVariationValueId Reference to productVariationValue to hide from customerGroup
     * @return \jtl\Connector\Model\ProductVariationValueInvisibility
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueId(Identity $productVariationValueId)
    {
        return $this->setProperty('productVariationValueId', $productVariationValueId, 'Identity');
    }
    
    /**
     * @return Identity Reference to productVariationValue to hide from customerGroup
     */
    public function getProductVariationValueId()
    {
        return $this->productVariationValueId;
    }

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ProductVariationValueInvisibility
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('customerGroupId', $customerGroupId, 'Identity');
    }
    
    /**
     * @return Identity Reference to customerGroup
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }
}

