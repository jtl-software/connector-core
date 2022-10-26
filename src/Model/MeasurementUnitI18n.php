<?php

/**
 * @copyright  2010-2015 JTL-Software GmbH
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Localized Measurement Unit Name
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
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
     * @return string Localized Name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name Localized Name
     *
     * @return MeasurementUnitI18n
     */
    public function setName(string $name): MeasurementUnitI18n
    {
        $this->name = $name;

        return $this;
    }
}
