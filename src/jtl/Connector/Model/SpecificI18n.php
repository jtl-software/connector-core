<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Localized name for specific..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class SpecificI18n extends DataModel
{
    /**
     * @type Identity Reference to specific
     */
    protected $specificId = null;

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Localized name
     */
    protected $name = '';


    /**
     * @type array list of identities
     */
    public $identities = array(
        'specificId',
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
     * @param  string $name Localized name
     * @return \jtl\Connector\Model\SpecificI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }
    
    /**
     * @return string Localized name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  Identity $specificId Reference to specific
     * @return \jtl\Connector\Model\SpecificI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSpecificId(Identity $specificId)
    {
        return $this->setProperty('specificId', $specificId, 'Identity');
    }
    
    /**
     * @return Identity Reference to specific
     */
    public function getSpecificId()
    {
        return $this->specificId;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\SpecificI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('localeName', $localeName, 'string');
    }
    
    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }
}

