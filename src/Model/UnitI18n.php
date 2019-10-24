<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Localized Unit Name
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class UnitI18n extends AbstractI18n
{
    /**
     * @var Identity Unit id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("unitId")
     * @Serializer\Accessor(getter="getUnitId",setter="setUnitId")
     */
    protected $unitId = null;

    /**
     * @var string Localized unit name
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
        $this->unitId = new Identity();
    }
    
    /**
     * @param Identity $unitId Unit id
     * @return UnitI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setUnitId(Identity $unitId): UnitI18n
    {
        $this->unitId = $unitId;
        
        return $this;
    }
    
    /**
     * @return Identity Unit id
     */
    public function getUnitId(): Identity
    {
        return $this->unitId;
    }

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
