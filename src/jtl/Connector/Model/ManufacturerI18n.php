<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Manufacturer
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Locale specific text and meta-information for manufacturer..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Manufacturer
 */
class ManufacturerI18n extends DataModel
{
    /**
     * @var Identity Reference to manufacturer
     */
    protected $manufacturerId = null;

    /**
     * @var string Optional manufacturer description (HTML)
     */
    protected $description = '';

    /**
     * @var string Locale
     */
    protected $localeName = '';

    /**
     * @var string Optional meta description tag value
     */
    protected $metaDescription = '';

    /**
     * @var string Optional meta keywords tag value
     */
    protected $metaKeywords = '';

    /**
     * @var string Optional title tag value
     */
    protected $titleTag = '';

    /**
     * @param  Identity $manufacturerId Reference to manufacturer
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setManufacturerId(Identity $manufacturerId)
    {
        return $this->setProperty('manufacturerId', $manufacturerId, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('description', $description, 'string');
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
     * @param  string $metaDescription Optional meta description tag value
     * @return \jtl\Connector\Model\ManufacturerI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaDescription($metaDescription)
    {
        return $this->setProperty('metaDescription', $metaDescription, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaKeywords($metaKeywords)
    {
        return $this->setProperty('metaKeywords', $metaKeywords, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setTitleTag($titleTag)
    {
        return $this->setProperty('titleTag', $titleTag, 'string');
    }

    /**
     * @return string Optional title tag value
     */
    public function getTitleTag()
    {
        return $this->titleTag;
    }

 
}
