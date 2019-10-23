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
 * Localized configGroup
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ConfigGroupI18n extends AbstractI18n
{
    /**
     * @var string Optional description (HTML)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected $description = '';

    /**
     * @var string Config group name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';

    /**
     * @param string $description Optional description (HTML)
     * @return ConfigGroupI18n
     */
    public function setDescription(string $description): string
    {
        $this->description = $description;
        
        return $this;
    }
    
    /**
     * @return string Optional description (HTML)
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $name Config group name
     * @return ConfigGroupI18n
     */
    public function setName(string $name): string
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Config group name
     */
    public function getName(): string
    {
        return $this->name;
    }
}
