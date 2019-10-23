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
 * Locale specific text and meta-information for manufacturer.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ManufacturerI18n extends AbstractI18n
{
    /**
     * @var Identity Reference to manufacturer
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("manufacturerId")
     * @Serializer\Accessor(getter="getManufacturerId",setter="setManufacturerId")
     */
    protected $manufacturerId = null;
    
    /**
     * @var string Optional manufacturer description (HTML)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected $description = '';

    /**
     * @var string Optional meta description tag value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("metaDescription")
     * @Serializer\Accessor(getter="getMetaDescription",setter="setMetaDescription")
     */
    protected $metaDescription = '';
    
    /**
     * @var string Optional meta keywords tag value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("metaKeywords")
     * @Serializer\Accessor(getter="getMetaKeywords",setter="setMetaKeywords")
     */
    protected $metaKeywords = '';
    
    /**
     * @var string Optional title tag value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("titleTag")
     * @Serializer\Accessor(getter="getTitleTag",setter="setTitleTag")
     */
    protected $titleTag = '';
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->manufacturerId = new Identity();
    }
    
    /**
     * @param Identity $manufacturerId Reference to manufacturer
     * @return ManufacturerI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setManufacturerId(Identity $manufacturerId): ManufacturerI18n
    {
        $this->manufacturerId = $manufacturerId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to manufacturer
     */
    public function getManufacturerId(): Identity
    {
        return $this->manufacturerId;
    }
    
    /**
     * @param string $description Optional manufacturer description (HTML)
     * @return ManufacturerI18n
     */
    public function setDescription(string $description): ManufacturerI18n
    {
        $this->description = $description;
        
        return $this;
    }
    
    /**
     * @return string Optional manufacturer description (HTML)
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    
    /**
     * @param string $metaDescription Optional meta description tag value
     * @return ManufacturerI18n
     */
    public function setMetaDescription(string $metaDescription): ManufacturerI18n
    {
        $this->metaDescription = $metaDescription;
        
        return $this;
    }
    
    /**
     * @return string Optional meta description tag value
     */
    public function getMetaDescription(): string
    {
        return $this->metaDescription;
    }
    
    /**
     * @param string $metaKeywords Optional meta keywords tag value
     * @return ManufacturerI18n
     */
    public function setMetaKeywords(string $metaKeywords): ManufacturerI18n
    {
        $this->metaKeywords = $metaKeywords;
        
        return $this;
    }
    
    /**
     * @return string Optional meta keywords tag value
     */
    public function getMetaKeywords(): string
    {
        return $this->metaKeywords;
    }
    
    /**
     * @param string $titleTag Optional title tag value
     * @return ManufacturerI18n
     */
    public function setTitleTag(string $titleTag): ManufacturerI18n
    {
        $this->titleTag = $titleTag;
        
        return $this;
    }
    
    /**
     * @return string Optional title tag value
     */
    public function getTitleTag(): string
    {
        return $this->titleTag;
    }
}
