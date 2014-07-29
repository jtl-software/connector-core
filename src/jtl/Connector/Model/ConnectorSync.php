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
class ConnectorSync extends DataModel
{
    /**
     * @type Byte[] 
     */
    protected $action = null;

    /**
     * @type integer 
     */
    protected $key = 0;

    /**
     * @type integer 
     */
    protected $syncId = 0;

    /**
     * @type integer 
     */
    protected $type = 0;


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
     * @param  integer $syncId 
     * @return \jtl\Connector\Model\ConnectorSync
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSyncId($syncId)
    {
        return $this->setProperty('syncId', $syncId, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getSyncId()
    {
        return $this->syncId;
    }

    /**
     * @param  integer $key 
     * @return \jtl\Connector\Model\ConnectorSync
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
     * @return \jtl\Connector\Model\ConnectorSync
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
     * @param  Byte[] $action 
     * @return \jtl\Connector\Model\ConnectorSync
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

