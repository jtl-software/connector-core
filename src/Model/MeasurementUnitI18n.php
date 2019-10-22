<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Localized Measurement Unit Name
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class MeasurementUnitI18n extends DataModel
{
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
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->measurementUnitId = new Identity();
    }
    
    /**
     * @param Identity $measurementUnitId Reference to measurementUnitId
     * @return MeasurementUnitI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMeasurementUnitId(Identity $measurementUnitId): MeasurementUnitI18n
    {
        $this->measurementUnitId = $measurementUnitId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to measurementUnitId
     */
    public function getMeasurementUnitId(): Identity
    {
        return $this->measurementUnitId;
    }

    /**
     * @param string $name Localized Name
     * @return MeasurementUnitI18n
     */
    public function setName(string $name): MeasurementUnitI18n
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Localized Name
     */
    public function getName(): string
    {
        return $this->name;
    }
}
