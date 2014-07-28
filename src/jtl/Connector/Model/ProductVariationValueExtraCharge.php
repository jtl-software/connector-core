<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Extra charge for productVariationValue per customerGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductVariationValueExtraCharge extends DataModel
{
    /**
     * @type Identity Reference to customerGroup
     */
    protected $customerGroupId = null;

    /**
     * @type Identity Reference to productVariationValue
     */
    protected $productVariationValueId = null;

    /**
     * @type integer 
     */
    protected $connectorId = 0;

    /**
     * @type float Extra charge (net)
     */
    protected $extraChargeNet = 0.0;


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
     * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
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
     * @param  float $extraChargeNet Extra charge (net)
     * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setExtraChargeNet($extraChargeNet)
    {
        return $this->setProperty('extraChargeNet', $extraChargeNet, 'float');
    }
    
    /**
     * @return float Extra charge (net)
     */
    public function getExtraChargeNet()
    {
        return $this->extraChargeNet;
    }

    /**
     * @param  Identity $productVariationValueId Reference to productVariationValue
     * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
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
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ProductVariationValueExtraCharge
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

