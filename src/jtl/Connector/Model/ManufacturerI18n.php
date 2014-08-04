<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Locale specific text and meta-information for manufacturer..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ManufacturerI18n extends DataModel
{
    /**
     * @type Identity Reference to manufacturer
     */
    protected $manufacturerId = null;

    /**
     * @type string Optional manufacturer description (HTML)
     */
    protected $description = '';

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Optional meta description tag value
     */
    protected $metaDescription = '';

    /**
     * @type string Optional meta keywords tag value
     */
    protected $metaKeywords = '';

    /**
     * @type string Optional title tag value
     */
    protected $titleTag = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'manufacturerId',
    );

    /**
     * @param  Identity $manufacturerId Reference to manufacturer
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setManufacturerId(Identity $manufacturerId)
    {
        return $this->setProperty('ManufacturerId', $manufacturerId, 'Identity');
    }

    /**
     * @return Identity Reference to manufacturer
     */
    public function getManufacturerId()
    {
        return $this->manufacturerId;
    }

    /**
     * @param  string $description Optional manufacturer description (HTML)
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDescription(Identity $description)
    {
        return $this->setProperty('Description', $description, 'string');
    }

    /**
     * @return string Optional manufacturer description (HTML)
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\ManufacturerI18n
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
     * @param  string $metaDescription Optional meta description tag value
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMetaDescription(Identity $metaDescription)
    {
        return $this->setProperty('MetaDescription', $metaDescription, 'string');
    }

    /**
     * @return string Optional meta description tag value
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param  string $metaKeywords Optional meta keywords tag value
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMetaKeywords(Identity $metaKeywords)
    {
        return $this->setProperty('MetaKeywords', $metaKeywords, 'string');
    }

    /**
     * @return string Optional meta keywords tag value
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * @param  string $titleTag Optional title tag value
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTitleTag(Identity $titleTag)
    {
        return $this->setProperty('TitleTag', $titleTag, 'string');
    }

    /**
     * @return string Optional title tag value
     */
    public function getTitleTag()
    {
        return $this->titleTag;
    }

 
}
