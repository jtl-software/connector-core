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
class ConnectorSyncQueue extends DataModel
{
    /**
     * @type Byte[] 
     */
    protected $action = null;

    /**
     * @type integer 
     */
    protected $connectorId = 0;

    /**
     * @type integer 
     */
    protected $key = 0;

    /**
     * @type integer 
     */
    protected $queueId = 0;

    /**
     * @type integer 
     */
    protected $tryCount = 0;

    /**
     * @type integer 
     */
    protected $type = 0;


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
     * @param  integer $queueId 
     * @return \jtl\Connector\Model\ConnectorSyncQueue
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setQueueId($queueId)
    {
        return $this->setProperty('queueId', $queueId, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getQueueId()
    {
        return $this->queueId;
    }

    /**
     * @param  integer $connectorId 
     * @return \jtl\Connector\Model\ConnectorSyncQueue
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
     * @param  integer $key 
     * @return \jtl\Connector\Model\ConnectorSyncQueue
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKey($key)
    {
        return $this->setProperty('key', $key, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param  integer $type 
     * @return \jtl\Connector\Model\ConnectorSyncQueue
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
     * @param  integer $tryCount 
     * @return \jtl\Connector\Model\ConnectorSyncQueue
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setTryCount($tryCount)
    {
        return $this->setProperty('tryCount', $tryCount, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getTryCount()
    {
        return $this->tryCount;
    }

    /**
     * @param  Byte[] $action 
     * @return \jtl\Connector\Model\ConnectorSyncQueue
     * @throws InvalidArgumentException if the provided argument is not of type 'Byte[]'.
     */
    public function setAction(Byte[] $action)
    {
        return $this->setProperty('action', $action, 'Byte[]');
    }
    
    /**
     * @return Byte[] 
     */
    public function getAction()
    {
        return $this->action;
    }
}

