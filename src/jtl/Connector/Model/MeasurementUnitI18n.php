<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Localized Measurement Unit Name.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 * 
 * @Serializer\AccessType("public_method")
 */
class MeasurementUnitI18n extends DataModel
{
    /**
     * @var Identity Locale
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("localeName")
     * @Serializer\Accessor(getter="getLocaleName",setter="setLocaleName")
     */
    protected $localeName = null;

    /**
     * @var Identity Reference to measurementUnitId
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("measurementUnitId")
     * @Serializer\Accessor(getter="getMeasurementUnitId",setter="setMeasurementUnitId")
     */
    protected $measurementUnitId = null;

    /**
     * @var string Localized Name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';


    public function __construct()
    {
        $this->localeName = new Identity;
        $this->measurementUnitId = new Identity;
    }

    /**
     * @param  Identity $localeName Locale
     * @return \jtl\Connector\Model\MeasurementUnitI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('localeName', $localeName, 'Identity');
    }

    /**
     * @return Identity Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }

    /**
     * @param  Identity $measurementUnitId Reference to measurementUnitId
     * @return \jtl\Connector\Model\MeasurementUnitI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMeasurementUnitId(Identity $measurementUnitId)
    {
        return $this->setProperty('measurementUnitId', $measurementUnitId, 'Identity');
    }

    /**
     * @return Identity Reference to measurementUnitId
     */
    public function getMeasurementUnitId()
    {
        return $this->measurementUnitId;
    }

    /**
     * @param  string $name Localized Name
     * @return \jtl\Connector\Model\MeasurementUnitI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Localized Name
     */
    public function getName()
    {
        return $this->name;
    }

 
}
