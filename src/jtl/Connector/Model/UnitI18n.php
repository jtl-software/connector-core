<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Localized Unit Name.
 *
 * @access public
 * @package jtl\Connector\Model
 */
class UnitI18n extends DataModel
{
    /**
     * @type Identity Unit id
     */
    protected $unitId = null;

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Localized unit name
     */
    protected $name = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'unitId',
    );

    /**
     * @param  Identity $unitId Unit id
     * @return \jtl\Connector\Model\UnitI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setUnitId(Identity $unitId)
    {
        return $this->setProperty('UnitId', $unitId, 'Identity');
    }

    /**
     * @return Identity Unit id
     */
    public function getUnitId()
    {
        return $this->unitId;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\UnitI18n
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
     * @param  string $name Localized unit name
     * @return \jtl\Connector\Model\UnitI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Localized unit name
     */
    public function getName()
    {
        return $this->name;
    }

 
}
