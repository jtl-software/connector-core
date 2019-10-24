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
 * Localized name for specific.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class SpecificI18n extends AbstractI18n
{
    /**
     * @var Identity Reference to specific
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("specificId")
     * @Serializer\Accessor(getter="getSpecificId",setter="setSpecificId")
     */
    protected $specificId = null;

    /**
     * @var string Localized name
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
        $this->specificId = new Identity();
    }
    
    /**
     * @param Identity $specificId Reference to specific
     * @return SpecificI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSpecificId(Identity $specificId): SpecificI18n
    {
        $this->specificId = $specificId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to specific
     */
    public function getSpecificId(): Identity
    {
        return $this->specificId;
    }

    /**
     * @param string $name Localized name
     * @return SpecificI18n
     */
    public function setName(string $name): SpecificI18n
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Localized name
     */
    public function getName(): string
    {
        return $this->name;
    }
}
