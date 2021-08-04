<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class DeliveryNoteTrackingList extends AbstractModel
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';
    
    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     * @Serializer\SerializedName("codes")
     * @Serializer\AccessType("reflection")
     */
    protected $codes = [];
    
    
    /**
     * @param string $name
     * @return DeliveryNoteTrackingList
     */
    public function setName(string $name): DeliveryNoteTrackingList
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @param string $code
     * @return DeliveryNoteTrackingList
     */
    public function addCode(string $code): DeliveryNoteTrackingList
    {
        $this->codes[] = $code;
        
        return $this;
    }

    /**
     * @param string ...$codes
     * @return DeliveryNoteTrackingList
     */
    public function setCodes(string ...$codes): DeliveryNoteTrackingList
    {
        $this->codes = $codes;
        
        return $this;
    }
    
    /**
     * @return string[]
     */
    public function getCodes(): array
    {
        return $this->codes;
    }
    
    /**
     * @return DeliveryNoteTrackingList
     */
    public function clearCodes(): DeliveryNoteTrackingList
    {
        $this->codes = [];
        
        return $this;
    }
}
