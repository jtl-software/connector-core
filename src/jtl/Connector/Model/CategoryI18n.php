<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Localized category properties. localeName, categoryId and a localized name must be set. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CategoryI18n extends DataModel
{
    /**
     * @type Identity Reference to category
     */
    protected $categoryId = null;

    /**
     * @type string Optional localized Long Description
     */
    protected $description = '';

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Optional localized  short description used for meta tag description
     */
    protected $metaDescription = '';

    /**
     * @type string Optional localized meta tag keywords value
     */
    protected $metaKeywords = '';

    /**
     * @type string Localized category name
     */
    protected $name = '';

    /**
     * @type string Optional localized title tag value
     */
    protected $titleTag = '';

    /**
     * @type string Optional localized category URL
     */
    protected $urlPath = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'categoryId',
    );

    /**
     * @param  Identity $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryId(Identity $categoryId)
    {
        return $this->setProperty('CategoryId', $categoryId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDescription(Identity $description)
    {
        return $this->setProperty('Description', $description, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('LocaleName', $localeName, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMetaDescription(Identity $metaDescription)
    {
        return $this->setProperty('MetaDescription', $metaDescription, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMetaKeywords(Identity $metaKeywords)
    {
        return $this->setProperty('MetaKeywords', $metaKeywords, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTitleTag(Identity $titleTag)
    {
        return $this->setProperty('TitleTag', $titleTag, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setUrlPath(Identity $urlPath)
    {
        return $this->setProperty('UrlPath', $urlPath, 'string');
    }

    /**
     * @return string Optional localized category URL
     */
    public function getUrlPath()
    {
        return $this->urlPath;
    }

 
}
