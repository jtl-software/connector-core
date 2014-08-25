<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Manufacturer
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Locale specific text and meta-information for manufacturer..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Manufacturer
 * 
 * @Serializer\AccessType("public_method")
 */
class ManufacturerI18n extends DataModel
{
    /**
     * @var Identity Locale
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("localeName")
     * @Serializer\Accessor(getter="getLocaleName",setter="setLocaleName")
     */
    protected $localeName = null;

    /**
     * @var Identity Reference to manufacturer
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("manufacturerId")
     * @Serializer\Accessor(getter="getManufacturerId",setter="setManufacturerId")
     */
    protected $manufacturerId = null;

    /**
     * @var string Optional manufacturer description (HTML)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected $description = '';

    /**
     * @var string Optional meta description tag value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("metaDescription")
     * @Serializer\Accessor(getter="getMetaDescription",setter="setMetaDescription")
     */
    protected $metaDescription = '';

    /**
     * @var string Optional meta keywords tag value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("metaKeywords")
     * @Serializer\Accessor(getter="getMetaKeywords",setter="setMetaKeywords")
     */
    protected $metaKeywords = '';

    /**
     * @var string Optional title tag value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("titleTag")
     * @Serializer\Accessor(getter="getTitleTag",setter="setTitleTag")
     */
    protected $titleTag = '';


    public function __construct()
    {
        $this->localeName = new Identity;
        $this->manufacturerId = new Identity;
    }

    /**
     * @param  Identity $localeName Locale
     * @return \jtl\Connector\Model\ManufacturerI18n
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
