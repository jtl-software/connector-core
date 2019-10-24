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
 * Localized configGroup
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ConfigGroupI18n extends AbstractI18n
{
    /**
     * @var Identity Reference to configGroup
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("configGroupId")
     * @Serializer\Accessor(getter="getConfigGroupId",setter="setConfigGroupId")
     */
    protected $configGroupId = null;
    
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
     * Constructor
     */
    public function __construct()
    {
        $this->configGroupId = new Identity();
    }
    
    /**
     * @param Identity $configGroupId Reference to configGroup
     * @return ConfigGroupI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigGroupId(Identity $configGroupId): ConfigGroupI18n
    {
        $this->configGroupId = $configGroupId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to configGroup
     */
    public function getConfigGroupId(): Identity
    {
        return $this->configGroupId;
    }
    
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
