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
 * Locale specific texts for product
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class ProductI18n extends DataModel
{
    /**
     * @var Identity 
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("platformId")
     * @Serializer\Accessor(getter="getPlatformId",setter="setPlatformId")
     */
    protected $platformId = null;

    /**
     * @var Identity Reference to product
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;

    /**
     * @var integer 
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("connectorId")
     * @Serializer\Accessor(getter="getConnectorId",setter="setConnectorId")
     */
    protected $connectorId = 0;

    /**
     * @var string Optional product description
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected $description = '';

    /**
     * @var string locale
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("metaDescription")
     * @Serializer\Accessor(getter="getMetaDescription",setter="setMetaDescription")
     */
    protected $metaDescription = '';

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("metaKeywords")
     * @Serializer\Accessor(getter="getMetaKeywords",setter="setMetaKeywords")
     */
    protected $metaKeywords = '';

    /**
     * @var string Product name / title
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';

    /**
     * @var string Optional product shortdescription
     * @Serializer\Type("string")
     * @Serializer\SerializedName("shortDescription")
     * @Serializer\Accessor(getter="getShortDescription",setter="setShortDescription")
     */
    protected $shortDescription = '';

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("titleTag")
     * @Serializer\Accessor(getter="getTitleTag",setter="setTitleTag")
     */
    protected $titleTag = '';

    /**
     * @var string Optional path of product URL
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
        $this->productId = new Identity();
        $this->platformId = new Identity();
    }

    /**
     * @param Identity $platformId 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPlatformId(Identity $platformId)
    {
        return $this->setProperty('platformId', $platformId, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getPlatformId()
    {
        return $this->platformId;
    }

    /**
     * @param Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }

    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param integer $connectorId 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setConnectorId(integer $connectorId)
    {
        return $this->setProperty('connectorId', $connectorId, 'integer');
    }

    /**
     * @return integer 
     */
    public function getConnectorId()
    {
        return $this->connectorId;
    }

    /**
     * @param string $description Optional product description
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setDescription($description)
    {
        return $this->setProperty('description', $description, 'string');
    }

    /**
     * @return string Optional product description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $languageISO locale
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setLanguageISO($languageISO)
    {
        return $this->setProperty('languageISO', $languageISO, 'string');
    }

    /**
     * @return string locale
     */
    public function getLanguageISO()
    {
        return $this->languageISO;
    }

    /**
     * @param string $metaDescription 
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setMetaDescription($metaDescription)
    {
        return $this->setProperty('metaDescription', $metaDescription, 'string');
    }

    /**
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param string $metaKeywords 
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setMetaKeywords($metaKeywords)
    {
        return $this->setProperty('metaKeywords', $metaKeywords, 'string');
    }

    /**
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * @param string $name Product name / title
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Product name / title
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $shortDescription Optional product shortdescription
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setShortDescription($shortDescription)
    {
        return $this->setProperty('shortDescription', $shortDescription, 'string');
    }

    /**
     * @return string Optional product shortdescription
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @param string $titleTag 
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setTitleTag($titleTag)
    {
        return $this->setProperty('titleTag', $titleTag, 'string');
    }

    /**
     * @return string 
     */
    public function getTitleTag()
    {
        return $this->titleTag;
    }

    /**
     * @param string $urlPath Optional path of product URL
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setUrlPath($urlPath)
    {
        return $this->setProperty('urlPath', $urlPath, 'string');
    }

    /**
     * @return string Optional path of product URL
     */
    public function getUrlPath()
    {
        return $this->urlPath;
    }
}
