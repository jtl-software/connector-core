<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Localized category properties. localeName, categoryId and a localized name must be set.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CategoryI18n extends DataModel
{
    /**
     * @var Identity Reference to category
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("categoryId")
     * @Serializer\Accessor(getter="getCategoryId",setter="setCategoryId")
     */
    protected $categoryId = null;
    
    /**
     * @var string Optional localized Long Description
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected $description = '';
    
    /**
     * @var string Locale
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';
    
    /**
     * @var string Optional localized  short description used for meta tag description
     * @Serializer\Type("string")
     * @Serializer\SerializedName("metaDescription")
     * @Serializer\Accessor(getter="getMetaDescription",setter="setMetaDescription")
     */
    protected $metaDescription = '';
    
    /**
     * @var string Optional localized meta tag keywords value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("metaKeywords")
     * @Serializer\Accessor(getter="getMetaKeywords",setter="setMetaKeywords")
     */
    protected $metaKeywords = '';
    
    /**
     * @var string Localized category name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';
    
    /**
     * @var string Optional localized title tag value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("titleTag")
     * @Serializer\Accessor(getter="getTitleTag",setter="setTitleTag")
     */
    protected $titleTag = '';
    
    /**
     * @var string Optional localized category URL
     * @Serializer\Type("string")
     * @Serializer\SerializedName("urlPath")
     * @Serializer\Accessor(getter="getUrlPath",setter="setUrlPath")
     */
    protected $urlPath = '';
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categoryId = new Identity();
    }
    
    /**
     * @param Identity $categoryId Reference to category
     * @return CategoryI18n
     */
    public function setCategoryId(Identity $categoryId): CategoryI18n
    {
        $this->categoryId = $categoryId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to category
     */
    public function getCategoryId(): Identity
    {
        return $this->categoryId;
    }
    
    /**
     * @param string $description Optional localized Long Description
     * @return CategoryI18n
     */
    public function setDescription(string $description): CategoryI18n
    {
        $this->description = $description;
        
        return $this;
    }
    
    /**
     * @return string Optional localized Long Description
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    
    /**
     * @param string $languageISO Locale
     * @return CategoryI18n
     */
    public function setLanguageISO(
        string $languageISO
    ): CategoryI18n {
        $this->languageISO = $languageISO;
        
        return $this;
    }
    
    /**
     * @return string Locale
     */
    public function getLanguageISO(): string
    {
        return $this->languageISO;
    }
    
    /**
     * @param string $metaDescription Optional localized  short description used for meta tag description
     * @return CategoryI18n
     */
    public function setMetaDescription(string $metaDescription): CategoryI18n
    {
        $this->metaDescription = $metaDescription;
        
        return $this;
    }
    
    /**
     * @return string Optional localized  short description used for meta tag description
     */
    public function getMetaDescription(): string
    {
        return $this->metaDescription;
    }
    
    /**
     * @param string $metaKeywords Optional localized meta tag keywords value
     * @return CategoryI18n
     */
    public function setMetaKeywords(string $metaKeywords): CategoryI18n
    {
        $this->metaKeywords = $metaKeywords;
        
        return $this;
    }
    
    /**
     * @return string Optional localized meta tag keywords value
     */
    public function getMetaKeywords(): string
    {
        return $this->metaKeywords;
    }
    
    /**
     * @param string $name Localized category name
     * @return CategoryI18n
     */
    public function setName(string $name): CategoryI18n
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Localized category name
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @param string $titleTag Optional localized title tag value
     * @return CategoryI18n
     */
    public function setTitleTag(string $titleTag): CategoryI18n
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
     * @param string $urlPath Optional localized category URL
     * @return CategoryI18n
     */
    public function setUrlPath(string $urlPath): CategoryI18n
    {
        $this->urlPath = $urlPath;
        
        return $this;
    }
    
    /**
     * @return string Optional localized category URL
     */
    public function getUrlPath(): string
    {
        return $this->urlPath;
    }
}
