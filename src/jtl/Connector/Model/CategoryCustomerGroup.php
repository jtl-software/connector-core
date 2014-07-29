<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Link customergroup with category. Set optional discount on category for customergroup. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CategoryCustomerGroup extends DataModel
{
    /**
     * @type Identity Reference to category
     */
    protected $categoryId = null;

    /**
     * @type Identity Reference to customerGroup
     */
    protected $customerGroupId = null;

    /**
     * @type integer 
     */
    protected $connectorId = 0;

    /**
     * @type float|null Optional discount on products in specified categoryId for  customerGroupId
     */
    protected $discount = 0.0;


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'categoryId',
        'customerGroupId',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
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
     * @return \jtl\Connector\Model\CategoryCustomerGroup
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
     * @param  float $discount Optional discount on products in specified categoryId for  customerGroupId
     * @return \jtl\Connector\Model\CategoryCustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setDiscount($discount)
    {
        return $this->setProperty('discount', $discount, 'float');
    }
    
    /**
     * @return float Optional discount on products in specified categoryId for  customerGroupId
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param  Identity $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryCustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryId(Identity $categoryId)
    {
        return $this->setProperty('categoryId', $categoryId, 'Identity');
    }
    
    /**
     * @return Identity Reference to category
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\CategoryCustomerGroup
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

