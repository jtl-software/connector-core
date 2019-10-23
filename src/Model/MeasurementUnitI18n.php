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
class MeasurementUnitI18n extends AbstractI18n
{
    /**
     * @var string Localized Name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';
    
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
