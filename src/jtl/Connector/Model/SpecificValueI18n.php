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
     * @type string 
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
     * @type array list of navigations
     */
    protected $navigations = array(
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->navigations;
    }

    /**
     * @param  string $value Localized value
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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

    /**
     * @param  string $urlPath 
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUrlPath($urlPath)
    {
        return $this->setProperty('urlPath', $urlPath, 'string');
    }
    
    /**
     * @return string 
     */
    public function getUrlPath()
    {
        return $this->urlPath;
    }

    /**
     * @param  string $titleTag Optional localized title tag value
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $metaKeywords Optional localized meta keywords value
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $metaDescription Optional localized meta description value
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $description Optional localized description
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  Identity $specificValueId Reference to specificValue
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  string $localeName locale
     * @return \jtl\Connector\Model\SpecificValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
}

