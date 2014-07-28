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
class ConnectorCustomerGroup extends DataModel
{
    /**
     * @type Identity 
     */
    protected $customerGroupId = null;

    /**
     * @type integer 
     */
    protected $connectorId = 0;

    /**
     * @type boolean 
     */
    protected $isDefault = false;


    /**
     * @type array list of identities
     */
    public $identities = array(
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
     * @return \jtl\Connector\Model\ConnectorCustomerGroup
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
     * @param  Identity $customerGroupId 
     * @return \jtl\Connector\Model\ConnectorCustomerGroup
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
     * @param  boolean $isDefault 
     * @return \jtl\Connector\Model\ConnectorCustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsDefault($isDefault)
    {
        return $this->setProperty('isDefault', $isDefault, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }
}

