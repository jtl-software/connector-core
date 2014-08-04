<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Localized specific value text..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class SpecificValueI18n extends DataModel
{
    /**
     * @type Identity Reference to specificValue
     */
    protected $specificValueId = null;

    /**
     * @type string Optional localized description
     */
    protected $description = '';

    /**
     * @type string locale
     */
    protected $localeName = '';

    /**
     * @type string Optional localized meta description value
     */
    protected $metaDescription = '';

    /**
     * @type string Optional localized meta keywords value
     */
    protected $metaKeywords = '';

    /**
     * @type string Optional localized title tag value
     */
    protected $titleTag = '';

    /**
     * @type string Optional localized URL path
     */
    protected $urlPath = '';

    /**
     * @type string Localized value
     */
    protected $value = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'specificValueId',
    );

    /**
     * @param  Identity $specificValueId Reference to specificValue
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSpecificValueId(Identity $specificValueId)
    {
        return $this->setProperty('SpecificValueId', $specificValueId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDescription(Identity $description)
    {
        return $this->setProperty('Description', $description, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('LocaleName', $localeName, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMetaDescription(Identity $metaDescription)
    {
        return $this->setProperty('MetaDescription', $metaDescription, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMetaKeywords(Identity $metaKeywords)
    {
        return $this->setProperty('MetaKeywords', $metaKeywords, 'string');
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
     * @param  string $urlPath Optional localized URL path
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setUrlPath(Identity $urlPath)
    {
        return $this->setProperty('UrlPath', $urlPath, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setValue(Identity $value)
    {
        return $this->setProperty('Value', $value, 'string');
    }

    /**
     * @return string Localized value
     */
    public function getValue()
    {
        return $this->value;
    }

 
}
