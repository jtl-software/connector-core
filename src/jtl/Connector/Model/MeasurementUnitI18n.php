<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Localized Measurement Unit Name.
 *
 * @access public
 * @package jtl\Connector\Model
 */
class MeasurementUnitI18n extends DataModel
{
    /**
     * @type Identity Reference to measurementUnitId
     */
    protected $measurementUnitId = null;

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Localized Name
     */
    protected $name = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'measurementUnitId',
    );

    /**
     * @param  Identity $measurementUnitId Reference to measurementUnitId
     * @return \jtl\Connector\Model\MeasurementUnitI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMeasurementUnitId(Identity $measurementUnitId)
    {
        return $this->setProperty('MeasurementUnitId', $measurementUnitId, 'Identity');
    }

    /**
     * @return Identity Reference to measurementUnitId
     */
    public function getMeasurementUnitId()
    {
        return $this->measurementUnitId;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\MeasurementUnitI18n
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
     * @param  string $name Localized Name
     * @return \jtl\Connector\Model\MeasurementUnitI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Localized Name
     */
    public function getName()
    {
        return $this->name;
    }

 
}
