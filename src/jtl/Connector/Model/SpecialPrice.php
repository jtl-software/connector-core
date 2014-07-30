<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class SpecialPrice extends DataModel
{
    /**
     * @type Identity 
     */
    protected $customerGroupId = null;

    /**
     * @type Identity 
     */
    protected $productSpecialPriceId = null;

    /**
     * @type integer 
     */
    protected $connectorId = 0;

    /**
     * @type float 
     */
    protected $priceNet = 0.0;


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'productSpecialPriceId',
        'customerGroupId',
    );

    /**
     * @type array list of propertyInfo
     */
    protected $propertyInfos = array(
        'connectorId' => 'integer',
        'productSpecialPriceId' => '\jtl\Connector\Model\Identity',
        'customerGroupId' => '\jtl\Connector\Model\Identity',
        'priceNet' => 'float',
    );


    /**
     * @param  integer $connectorId 
     * @return \jtl\Connector\Model\SpecialPrice
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
     * @param  Identity $productSpecialPriceId 
     * @return \jtl\Connector\Model\SpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductSpecialPriceId(Identity $productSpecialPriceId)
    {
        return $this->setProperty('productSpecialPriceId', $productSpecialPriceId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getProductSpecialPriceId()
    {
        return $this->productSpecialPriceId;
    }

    /**
     * @param  Identity $customerGroupId 
     * @return \jtl\Connector\Model\SpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('customerGroupId', $customerGroupId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }

    /**
     * @param  float $priceNet 
     * @return \jtl\Connector\Model\SpecialPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setPriceNet($priceNet)
    {
        return $this->setProperty('priceNet', $priceNet, 'float');
    }
    
    /**
     * @return float 
     */
    public function getPriceNet()
    {
        return $this->priceNet;
    }
}

