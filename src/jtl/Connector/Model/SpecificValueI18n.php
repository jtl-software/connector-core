<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Localized specific value text..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class SpecificValueI18n extends DataModel
{
    /**
     * @var Identity Reference to specificValue
     */
    protected $specificValueId = null;

    /**
     * @var string Optional localized description
     */
    protected $description = '';

    /**
     * @var string locale
     */
    protected $localeName = '';

    /**
     * @var string Optional localized meta description value
     */
    protected $metaDescription = '';

    /**
     * @var string Optional localized meta keywords value
     */
    protected $metaKeywords = '';

    /**
     * @var string Optional localized title tag value
     */
    protected $titleTag = '';

    /**
     * @var string Optional localized URL path
     */
    protected $urlPath = '';

    /**
     * @var string Localized value
     */
    protected $value = '';

    /**
     * @param  Identity $specificValueId Reference to specificValue
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSpecificValueId(Identity $specificValueId)
    {
        return $this->setProperty('specificValueId', $specificValueId, 'Identity');
    }

    /**
     * @return Identity Reference to specificValue
     */
    public function getSpecificValueId()
    {
        return $this->specificValueId;
    }

    /**
     * @param  string $description Optional localized description
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('description', $description, 'string');
    }

    /**
     * @return string Optional localized description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  string $localeName locale
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('localeName', $localeName, 'string');
    }

    /**
     * @return string locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }

    /**
     * @param  string $metaDescription Optional localized meta description value
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaDescription($metaDescription)
    {
        return $this->setProperty('metaDescription', $metaDescription, 'string');
    }

    /**
     * @return string Optional localized meta description value
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param  string $metaKeywords Optional localized meta keywords value
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaKeywords($metaKeywords)
    {
        return $this->setProperty('metaKeywords', $metaKeywords, 'string');
    }

    /**
     * @return string Optional localized meta keywords value
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * @param  string $titleTag Optional localized title tag value
     * @return \jtl\Connector\Model\SpecificValueI18n
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
     * @param  string $urlPath Optional localized URL path
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUrlPath($urlPath)
    {
        return $this->setProperty('urlPath', $urlPath, 'string');
    }

    /**
     * @return string Optional localized URL path
     */
    public function getUrlPath()
    {
        return $this->urlPath;
    }

    /**
     * @param  string $value Localized value
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setValue($value)
    {
        return $this->setProperty('value', $value, 'string');
    }

    /**
     * @return string Localized value
     */
    public function getValue()
    {
        return $this->value;
    }

 
}
