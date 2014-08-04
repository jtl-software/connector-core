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
     protected $identities = array(
        'specificId',
    );

    /**
     * @param  Identity $specificId Reference to specific
     * @return \jtl\Connector\Model\SpecificI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSpecificId(Identity $specificId)
    {
        return $this->setProperty('SpecificId', $specificId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('LocaleName', $localeName, 'string');
    }

    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }

    /**
     * @param  string $name Localized name
     * @return \jtl\Connector\Model\SpecificI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Localized name
     */
    public function getName()
    {
        return $this->name;
    }

 
}
