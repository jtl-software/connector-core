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
 * Localized config item name and description.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ConfigItemI18n extends AbstractI18n
{
    /**
     * @var string Description (html). Will be ignored, if inheritProductName==true
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected $description = '';

    /**
     * @var string Config item name. Will be ignored if inheritProductName==true
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';

    /**
     * @param string $description Description (html). Will be ignored, if inheritProductName==true
     * @return ConfigItemI18n
     */
    public function setDescription(string $description): ConfigItemI18n
    {
        $this->description = $description;
        
        return $this;
    }
    
    /**
     * @return string Description (html). Will be ignored, if inheritProductName==true
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $name Config item name. Will be ignored if inheritProductName==true
     * @return ConfigItemI18n
     */
    public function setName(string $name): ConfigItemI18n
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Config item name. Will be ignored if inheritProductName==true
     */
    public function getName(): string
    {
        return $this->name;
    }
}
