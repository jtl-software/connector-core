<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Specify product to hide from customerGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductInvisibility extends DataModel
{
    /**
     * @type Identity Reference to customerGroup
     */
    protected $customerGroupId = null;

    /**
     * @type Identity Reference to product
     */
    protected $productId = null;

    /**
     * @type integer 
     */
    protected $connectorId = 0;


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'productId',
        'customerGroupId',
    );

    /**
     * @type array list of propertyInfo
     */
    protected $propertyInfos = array(
        'connectorId' => 'integer',
        'productId' => '\jtl\Connector\Model\Identity',
        'customerGroupId' => '\jtl\Connector\Model\Identity',
    );


    /**
     * @param  integer $connectorId 
     * @return \jtl\Connector\Model\ProductInvisibility
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
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductInvisibility
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ProductInvisibility
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

