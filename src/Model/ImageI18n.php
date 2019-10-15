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
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ImageI18n extends DataModel
{
    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("imageId")
     * @Serializer\Accessor(getter="getImageId",setter="setImageId")
     */
    protected $imageId = null;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("altText")
     * @Serializer\Accessor(getter="getAltText",setter="setAltText")
     */
    protected $altText = '';
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->imageId = new Identity();
    }
    
    /**
     * @param Identity $id
     * @return ImageI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): ImageI18n
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param Identity $imageId
     * @return ImageI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setImageId(Identity $imageId): ImageI18n
    {
        $this->imageId = $imageId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getImageId(): Identity
    {
        return $this->imageId;
    }
    
    /**
     * @param string $altText
     * @return ImageI18n
     */
    public function setAltText(string $altText): ImageI18n
    {
        $this->altText = $altText;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getAltText(): string
    {
        return $this->altText;
    }
    
    /**
     * @param string $languageISO
     * @return ImageI18n
     */
    public function setLanguageISO(string $languageISO): ImageI18n
    {
        $this->languageISO = $languageISO;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLanguageISO(): string
    {
        return $this->languageISO;
    }
}
