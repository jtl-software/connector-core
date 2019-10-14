<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
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
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryId(Identity $categoryId): Identity
    {
        return $this->setProperty('categoryId', $categoryId, 'Identity');
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
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setDescription(string $description): CategoryI18n
    {
        return $this->setProperty('description', $description, 'string');
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
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setLanguageISO($languageISO): CategoryI18n
    {
        return $this->setProperty('languageISO', $languageISO, 'string');
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
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setMetaDescription(string $metaDescription): CategoryI18n
    {
        return $this->setProperty('metaDescription', $metaDescription, 'string');
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
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setMetaKeywords(string $metaKeywords): CategoryI18n
    {
        return $this->setProperty('metaKeywords', $metaKeywords, 'string');
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
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setName(string $name): CategoryI18n
    {
        return $this->setProperty('name', $name, 'string');
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
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setTitleTag(string $titleTag): CategoryI18n
    {
        return $this->setProperty('titleTag', $titleTag, 'string');
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
     * @return \jtl\Connector\Model\CategoryI18n
     */
    public function setUrlPath(string $urlPath): CategoryI18n
    {
        return $this->setProperty('urlPath', $urlPath, 'string');
    }
    
    /**
     * @return string Optional localized category URL
     */
    public function getUrlPath(): string
    {
        return $this->urlPath;
    }
}
