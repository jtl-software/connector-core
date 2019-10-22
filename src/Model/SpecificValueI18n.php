<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;
use jtl\Connector\Model\Common\I18n;

/**
 * Localized specific value text.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class SpecificValueI18n extends I18n
{
    /**
     * @var Identity Reference to specificValue
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("specificValueId")
     * @Serializer\Accessor(getter="getSpecificValueId",setter="setSpecificValueId")
     */
    protected $specificValueId = null;
    
    /**
     * @var string Optional localized description
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected $description = '';

    /**
     * @var string Optional localized meta description value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("metaDescription")
     * @Serializer\Accessor(getter="getMetaDescription",setter="setMetaDescription")
     */
    protected $metaDescription = '';
    
    /**
     * @var string Optional localized meta keywords value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("metaKeywords")
     * @Serializer\Accessor(getter="getMetaKeywords",setter="setMetaKeywords")
     */
    protected $metaKeywords = '';
    
    /**
     * @var string Optional localized title tag value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("titleTag")
     * @Serializer\Accessor(getter="getTitleTag",setter="setTitleTag")
     */
    protected $titleTag = '';
    
    /**
     * @var string Optional localized URL path
     * @Serializer\Type("string")
     * @Serializer\SerializedName("urlPath")
     * @Serializer\Accessor(getter="getUrlPath",setter="setUrlPath")
     */
    protected $urlPath = '';
    
    /**
     * @var string Localized value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     * @Serializer\Accessor(getter="getValue",setter="setValue")
     */
    protected $value = '';
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->specificValueId = new Identity();
    }
    
    /**
     * @param Identity $specificValueId Reference to specificValue
     * @return SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSpecificValueId(Identity $specificValueId): SpecificValueI18n
    {
        $this->specificValueId = $specificValueId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to specificValue
     */
    public function getSpecificValueId(): Identity
    {
        return $this->specificValueId;
    }
    
    /**
     * @param string $description Optional localized description
     * @return SpecificValueI18n
     */
    public function setDescription(string $description): SpecificValueI18n
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
     * @param string $metaDescription Optional localized meta description value
     * @return SpecificValueI18n
     */
    public function setMetaDescription(string $metaDescription): SpecificValueI18n
    {
        $this->metaDescription = $metaDescription;
        
        return $this;
    }
    
    /**
     * @return string Optional localized meta description value
     */
    public function getMetaDescription(): string
    {
        return $this->metaDescription;
    }
    
    /**
     * @param string $metaKeywords Optional localized meta keywords value
     * @return SpecificValueI18n
     */
    public function setMetaKeywords(string $metaKeywords): SpecificValueI18n
    {
        $this->metaKeywords = $metaKeywords;
        
        return $this;
    }
    
    /**
     * @return string Optional localized meta keywords value
     */
    public function getMetaKeywords(): string
    {
        return $this->metaKeywords;
    }
    
    /**
     * @param string $titleTag Optional localized title tag value
     * @return SpecificValueI18n
     */
    public function setTitleTag(string $titleTag): SpecificValueI18n
    {
        $this->titleTag = $titleTag;
        
        return $this;
    }
    
    /**
     * @return string Optional localized title tag value
     */
    public function getTitleTag(): string
    {
        return $this->titleTag;
    }
    
    /**
     * @param string $urlPath Optional localized URL path
     * @return SpecificValueI18n
     */
    public function setUrlPath(string $urlPath): SpecificValueI18n
    {
        $this->urlPath = $urlPath;
        
        return $this;
    }
    
    /**
     * @return string Optional localized URL path
     */
    public function getUrlPath(): string
    {
        return $this->urlPath;
    }
    
    /**
     * @param string $value Localized value
     * @return SpecificValueI18n
     */
    public function setValue(string $value): SpecificValueI18n
    {
        $this->value = $value;
        
        return $this;
    }
    
    /**
     * @return string Localized value
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
