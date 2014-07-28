<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Specifies which CustomerGroup is not permitted to view category..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CategoryInvisibility extends DataModel
{
    /**
     * @type Identity Reference to category to hide from customerGroupId
     */
    protected $categoryId = null;

    /**
     * @type Identity Reference to customerGroup that is not allowed to view categoryId
     */
    protected $customerGroupId = null;

    /**
     * @type integer 
     */
    protected $connectorId = 0;


    /**
     * @type array list of identities
     */
    public $identities = array(
        'categoryId',
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
     * @return \jtl\Connector\Model\CategoryInvisibility
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
     * @param  Identity $categoryId Reference to category to hide from customerGroupId
     * @return \jtl\Connector\Model\CategoryInvisibility
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryId(Identity $categoryId)
    {
        return $this->setProperty('categoryId', $categoryId, 'Identity');
    }
    
    /**
     * @return Identity Reference to category to hide from customerGroupId
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param  Identity $customerGroupId Reference to customerGroup that is not allowed to view categoryId
     * @return \jtl\Connector\Model\CategoryInvisibility
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('customerGroupId', $customerGroupId, 'Identity');
    }
    
    /**
     * @return Identity Reference to customerGroup that is not allowed to view categoryId
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }
}

