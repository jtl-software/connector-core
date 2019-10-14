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
 * @Serializer\AccessType("public_method")
 */
class ProductI18n extends DataModel
{
    /**
     * @var Identity Reference to product
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("deliveryStatus")
     * @Serializer\Accessor(getter="getDeliveryStatus",setter="setDeliveryStatus")
     */
    protected $deliveryStatus = '';
    
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
     * @Serializer\SerializedName("measurementUnitName")
     * @Serializer\Accessor(getter="getMeasurementUnitName",setter="setMeasurementUnitName")
     */
    protected $measurementUnitName = '';
    
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
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("unitName")
     * @Serializer\Accessor(getter="getUnitName",setter="setUnitName")
     */
    protected $unitName = '';
    
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
    }
    
    /**
     * @param Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        $this->productId = $productId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }
    
    /**
     * @param string $deliveryStatus
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setDeliveryStatus($deliveryStatus)
    {
        $this->deliveryStatus = $deliveryStatus;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDeliveryStatus()
    {
        return $this->deliveryStatus;
    }
    
    /**
     * @param string $description Optional product description
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setDescription($description)
    {
        $this->description = $description;
        
        return $this;
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
        $this->languageISO = $languageISO;
        
        return $this;
    }
    
    /**
     * @return string locale
     */
    public function getLanguageISO()
    {
        return $this->languageISO;
    }
    
    /**
     * @param string $measurementUnitName
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setMeasurementUnitName($measurementUnitName)
    {
        $this->measurementUnitName = $measurementUnitName;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMeasurementUnitName()
    {
        return $this->measurementUnitName;
    }
    
    /**
     * @param string $metaDescription
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
        
        return $this;
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
        $this->metaKeywords = $metaKeywords;
        
        return $this;
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
        $this->name = $name;
        
        return $this;
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
        $this->shortDescription = $shortDescription;
        
        return $this;
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
        $this->titleTag = $titleTag;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTitleTag()
    {
        return $this->titleTag;
    }
    
    /**
     * @param string $unitName
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setUnitName($unitName)
    {
        $this->unitName = $unitName;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getUnitName()
    {
        return $this->unitName;
    }
    
    /**
     * @param string $urlPath Optional path of product URL
     * @return \jtl\Connector\Model\ProductI18n
     */
    public function setUrlPath($urlPath)
    {
        $this->urlPath = $urlPath;
        
        return $this;
    }
    
    /**
     * @return string Optional path of product URL
     */
    public function getUrlPath()
    {
        return $this->urlPath;
    }
}
