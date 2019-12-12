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
 * Global language model
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class Language extends AbstractI18n implements IdentityInterface
{
    /**
     * @var Identity Unique language id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var boolean Flag default language for frontend. Exact 1 language must be marked as default.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isDefault")
     * @Serializer\Accessor(getter="getIsDefault",setter="setIsDefault")
     */
    protected $isDefault = false;

    /**
     * @var string English term
     * @Serializer\Type("string")
     * @Serializer\SerializedName("nameEnglish")
     * @Serializer\Accessor(getter="getNameEnglish",setter="setNameEnglish")
     */
    protected $nameEnglish = '';
    
    /**
     * @var string German term
     * @Serializer\Type("string")
     * @Serializer\SerializedName("nameGerman")
     * @Serializer\Accessor(getter="getNameGerman",setter="setNameGerman")
     */
    protected $nameGerman = '';
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
    }
    
    /**
     * @param Identity $id Unique language id
     * @return Language
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): Language
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique language id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param boolean $isDefault Flag default language for frontend. Exact 1 language must be marked as default.
     * @return Language
     */
    public function setIsDefault(bool $isDefault): Language
    {
        $this->isDefault = $isDefault;
        
        return $this;
    }
    
    /**
     * @return boolean Flag default language for frontend. Exact 1 language must be marked as default.
     */
    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }

    /**
     * @param string $nameEnglish English term
     * @return Language
     */
    public function setNameEnglish(string $nameEnglish): Language
    {
        $this->nameEnglish = $nameEnglish;
        
        return $this;
    }
    
    /**
     * @return string English term
     */
    public function getNameEnglish(): string
    {
        return $this->nameEnglish;
    }
    
    /**
     * @param string $nameGerman German term
     * @return Language
     */
    public function setNameGerman(string $nameGerman): Language
    {
        $this->nameGerman = $nameGerman;
        
        return $this;
    }
    
    /**
     * @return string German term
     */
    public function getNameGerman(): string
    {
        return $this->nameGerman;
    }
}
