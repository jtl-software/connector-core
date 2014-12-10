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
 * Localized Unit Name.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 * 
 * @Serializer\AccessType("public_method")
 */
class UnitI18n extends DataModel
{
    /**
     * @var Identity Unit id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("unitId")
     * @Serializer\Accessor(getter="getUnitId",setter="setUnitId")
     */
    protected $unitId = null;

    /**
     * @var string Locale
     * @Serializer\Type("string")
     * @Serializer\SerializedName("localeName")
     * @Serializer\Accessor(getter="getLocaleName",setter="setLocaleName")
     */
    protected $localeName = '';

    /**
     * @var string Localized unit name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';


    public function __construct()
    {
        $this->unitId = new Identity;
    }

    /**
     * @param  Identity $unitId Unit id
     * @return \jtl\Connector\Model\UnitI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setUnitId(Identity $unitId)
    {
        return $this->setProperty('unitId', $unitId, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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

    /**
     * @param  string $name Localized unit name
     * @return \jtl\Connector\Model\UnitI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Localized unit name
     */
    public function getName()
    {
        return $this->name;
    }

 
}
