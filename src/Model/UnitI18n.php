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
 * Localized Unit Name
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class UnitI18n extends AbstractI18n
{
    /**
     * @var string Localized unit name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';

    /**
     * @param string $name Localized unit name
     * @return UnitI18n
     */
    public function setName(string $name): UnitI18n
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Localized unit name
     */
    public function getName(): string
    {
        return $this->name;
    }
}
