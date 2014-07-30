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
class ConnectorLink extends DataModel
{
    /**
     * @type integer 
     */
    protected $connectorId = 0;

    /**
     * @type string 
     */
    protected $endpointId = '';

    /**
     * @type integer 
     */
    protected $type = 0;

    /**
     * @type integer 
     */
    protected $wawiId = 0;


    /**
     * @type array list of identities
     */
    protected $identities = array(
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
    );


    /**
     * @param  integer $connectorId 
     * @return \jtl\Connector\Model\ConnectorLink
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
     * @param  integer $type 
     * @return \jtl\Connector\Model\ConnectorLink
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setType($type)
    {
        return $this->setProperty('type', $type, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param  string $endpointId 
     * @return \jtl\Connector\Model\ConnectorLink
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setEndpointId($endpointId)
    {
        return $this->setProperty('endpointId', $endpointId, 'string');
    }
    
    /**
     * @return string 
     */
    public function getEndpointId()
    {
        return $this->endpointId;
    }

    /**
     * @param  integer $wawiId 
     * @return \jtl\Connector\Model\ConnectorLink
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setWawiId($wawiId)
    {
        return $this->setProperty('wawiId', $wawiId, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getWawiId()
    {
        return $this->wawiId;
    }
}

