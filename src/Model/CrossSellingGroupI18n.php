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
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CrossSellingGroupI18n extends AbstractI18n
{
    /**
     * @var Identity
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("crossSellingGroupId")
     * @Serializer\Accessor(getter="getCrossSellingGroupId",setter="setCrossSellingGroupId")
     */
    protected $crossSellingGroupId = null;
    
    /**
     * @var string Optional localized description
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected $description = '';
    
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
        $this->crossSellingGroupId = new Identity();
    }
    
    /**
     * @param Identity $crossSellingGroupId
     * @return CrossSellingGroupI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCrossSellingGroupId(Identity $crossSellingGroupId): CrossSellingGroupI18n
    {
        $this->crossSellingGroupId = $crossSellingGroupId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getCrossSellingGroupId(): Identity
    {
        return $this->crossSellingGroupId;
    }
    
    /**
     * @param string $description Optional localized description
     * @return CrossSellingGroupI18n
     */
    public function setDescription(string $description): CrossSellingGroupI18n
    {
        $this->description = $description;
        
        return $this;
    }
    
    /**
     * @return string Optional localized description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $name Localized name
     * @return CrossSellingGroupI18n
     */
    public function setName(string $name): CrossSellingGroupI18n
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
