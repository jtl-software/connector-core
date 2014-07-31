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
class ConnectorLanguage extends DataModel
{
    /**
     * @type integer 
     */
    protected $connectorId = 0;

    /**
     * @type boolean 
     */
    protected $isDefault = false;

    /**
     * @type integer 
     */
    protected $languageId = 0;


    /**
     * @type array list of identities
     */
    protected $identities = array(
    );

    /**
     * @param  integer $connectorId 
     * @return \jtl\Connector\Model\ConnectorLanguage
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
     * @param  integer $languageId 
     * @return \jtl\Connector\Model\ConnectorLanguage
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setLanguageId($languageId)
    {
        return $this->setProperty('languageId', $languageId, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * @param  boolean $isDefault 
     * @return \jtl\Connector\Model\ConnectorLanguage
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

