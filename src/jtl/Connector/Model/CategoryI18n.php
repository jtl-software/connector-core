<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Localized category properties. localeName, categoryId and a localized name must be set. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CategoryI18n extends DataModel
{
    /**
     * @var Identity Reference to category
     */
    protected $categoryId = null;

    /**
     * @var string Optional localized Long Description
     */
    protected $description = '';

    /**
     * @var string Locale
     */
    protected $localeName = '';

    /**
     * @var string Optional localized  short description used for meta tag description
     */
    protected $metaDescription = '';

    /**
     * @var string Optional localized meta tag keywords value
     */
    protected $metaKeywords = '';

    /**
     * @var string Localized category name
     */
    protected $name = '';

    /**
     * @var string Optional localized title tag value
     */
    protected $titleTag = '';

    /**
     * @var string Optional localized category URL
     */
    protected $urlPath = '';

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
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('localeName', $localeName, 'string');
    }

    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
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
