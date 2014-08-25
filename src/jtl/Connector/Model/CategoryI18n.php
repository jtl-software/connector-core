<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Category
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Localized category properties. localeName, categoryId and a localized name must be set. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Category
 * 
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
     * @var Identity Locale
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("localeName")
     * @Serializer\Accessor(getter="getLocaleName",setter="setLocaleName")
     */
    protected $localeName = null;

    /**
     * @var string Optional localized Long Description
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected $description = '';

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


    public function __construct()
    {
        $this->categoryId = new Identity;
        $this->localeName = new Identity;
    }

    /**
     * @param  Identity $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryId(Identity $categoryId)
    {
        return $this->setProperty('categoryId', $categoryId, 'Identity');
    }

    /**
     * @return Identity Reference to category
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param  Identity $localeName Locale
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('localeName', $localeName, 'Identity');
    }

    /**
     * @return Identity Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }

    /**
     * @param  string $description Optional localized Long Description
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('description', $description, 'string');
    }

    /**
     * @return string Optional localized Long Description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  string $metaDescription Optional localized  short description used for meta tag description
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaDescription($metaDescription)
    {
        return $this->setProperty('metaDescription', $metaDescription, 'string');
    }

    /**
     * @return string Optional localized  short description used for meta tag description
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param  string $metaKeywords Optional localized meta tag keywords value
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaKeywords($metaKeywords)
    {
        return $this->setProperty('metaKeywords', $metaKeywords, 'string');
    }

    /**
     * @return string Optional localized meta tag keywords value
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * @param  string $name Localized category name
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Localized category name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $titleTag Optional localized title tag value
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setTitleTag($titleTag)
    {
        return $this->setProperty('titleTag', $titleTag, 'string');
    }

    /**
     * @return string Optional localized title tag value
     */
    public function getTitleTag()
    {
        return $this->titleTag;
    }

    /**
     * @param  string $urlPath Optional localized category URL
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUrlPath($urlPath)
    {
        return $this->setProperty('urlPath', $urlPath, 'string');
    }

    /**
     * @return string Optional localized category URL
     */
    public function getUrlPath()
    {
        return $this->urlPath;
    }

 
}
