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
class ConnectorCurrency extends DataModel
{
    /**
     * @type integer 
     */
    protected $connectorId = 0;

    /**
     * @type integer 
     */
    protected $currencyId = 0;

    /**
     * @type boolean 
     */
    protected $isDefault = false;


    /**
     * @type array list of identities
     */
    public $identities = array(
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
     * @return \jtl\Connector\Model\ConnectorCurrency
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
     * @param  integer $currencyId 
     * @return \jtl\Connector\Model\ConnectorCurrency
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setCurrencyId($currencyId)
    {
        return $this->setProperty('currencyId', $currencyId, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @param  boolean $isDefault 
     * @return \jtl\Connector\Model\ConnectorCurrency
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

