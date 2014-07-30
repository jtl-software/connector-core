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
class ConnectorLog extends DataModel
{
    /**
     * @type Identity 
     */
    protected $id = null;

    /**
     * @type integer 
     */
    protected $connectorId = 0;

    /**
     * @type DateTime 
     */
    protected $date = null;

    /**
     * @type string 
     */
    protected $message = '';


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
    );


    /**
     * @param  integer $connectorId 
     * @return \jtl\Connector\Model\ConnectorLog
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
     * @param  string $message 
     * @return \jtl\Connector\Model\ConnectorLog
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMessage($message)
    {
        return $this->setProperty('message', $message, 'string');
    }
    
    /**
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param  DateTime $date 
     * @return \jtl\Connector\Model\ConnectorLog
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setDate(DateTime $date)
    {
        return $this->setProperty('date', $date, 'DateTime');
    }
    
    /**
     * @return DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param  Identity $id 
     * @return \jtl\Connector\Model\ConnectorLog
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getId()
    {
        return $this->id;
    }
}

